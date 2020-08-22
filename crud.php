<?php


class crud
{
    function conn_to_db() {
        return new mysqli("192.168.2.4", "weatheruser","9Sqv6HP", "weatherdata");
    }

    function custom_query($sql) {
        $conn = $this->conn_to_db();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result->fetch_row()[0];
    }

    function read_all($timespan = 24) {
        // get latest weather read timestamp and convert it so you can subtract the timespan from it in hours,
        // then convert that back to the timestamp string for the sql query

        $latest = $this->latest_read();
        $latest = strtotime($latest);
        $time = $latest - $timespan * 60 * 60;
        $datetime = date("Y-m-d H:i:s", $time);

        $conn = $this->conn_to_db();
        $sql = "SELECT * FROM `hum_temp` where `id` >= ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $datetime);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    function latest_read() {
        $conn = $this->conn_to_db();
        $sql = "SELECT `id` FROM `hum_temp` ORDER BY `id` DESC LIMIT 1 ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result->fetch_row()[0];
    }
}