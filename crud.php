<?php


class crud
{
    function conn_to_db() {
        return new mysqli("192.168.2.5", "weatheruser","9Sqv6HP", "weatherdata");
    }

    function custom_query($sql) {
        $conn = $this->conn_to_db();
        $stmt = $conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->get_result();
        $stmt->close();
        $conn->close();
        return $result->fetch_row();
    }
}