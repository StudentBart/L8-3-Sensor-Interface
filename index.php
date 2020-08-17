<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
$crud  = new crud();

$cur_hum = $crud->custom_query('SELECT humidity FROM `hum_temp` ORDER BY id DESC LIMIT 1');
$cur_temp = $crud->custom_query('SELECT temperature FROM `hum_temp` ORDER BY id DESC LIMIT 1');

//max SELECT MAX(temperature) FROM `hum_temp`

var_dump($crud->read_all());
?>

<html lang="en-en">
<head>
    <title><?=$cur_hum?>% | <?=$cur_temp?>°C</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            let hum_data = google.visualization.arrayToDataTable([
                ['Time', 'Humidity'],
                ['00:00', 56],
                ['00:15', 57],
                ['00:30', 53],
                ['00:45', 54]
            ]);

            let temp_data = google.visualization.arrayToDataTable([
                ['Time', 'Temperature'],
                ['00:00', 25],
                ['00:15', 26],
                ['00:30', 24],
                ['00:45', 26]
            ]);

            let hum_options = {
                hAxis: {
                    title: 'Time'
                },
                vAxis: {
                    title: 'Humidity %'
                },
                title: 'bedroom Humidity',
                curveType: 'function',
                legend: {position: 'none'}
            };
            let temp_options = {
                hAxis: {
                    title: 'Time'
                },
                vAxis: {
                    title: '°C'
                },
                title: 'bedroom Temperature',
                curveType: 'function',
                legend: {position: 'none'}
            };

            let hum_chart = new google.visualization.LineChart($('#hum_chart')[0]);
            let temp_chart = new google.visualization.LineChart($('#temp_chart')[0]);

            hum_chart.draw(hum_data, hum_options);
            temp_chart.draw(temp_data, temp_options);
        }
    </script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div id="hum_chart" class="home_chart"></div>
<div id="temp_chart" class="home_chart"></div>
</body>
</html>

