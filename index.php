<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
$crud  = new crud();

$cur_hum = $crud->custom_query('SELECT humidity FROM `hum_temp` ORDER BY id DESC LIMIT 1');
$cur_temp = $crud->custom_query('SELECT temperature FROM `hum_temp` ORDER BY id DESC LIMIT 1');

$today = date("Y-m-d 00:00:00");

$high_hum = $crud->custom_query("SELECT MAX(humidity) FROM `hum_temp` where `id` >= '$today'");
$high_temp = $crud->custom_query("SELECT MAX(temperature) FROM `hum_temp` where `id` >= '$today'");

$low_hum = $crud->custom_query("SELECT MIN(humidity) FROM `hum_temp` where `id` >= '$today'");
$low_temp = $crud->custom_query("SELECT MIN(temperature) FROM `hum_temp` where `id` >= '$today'");
?>

<html lang="en-us">
<head>
    <title><?=$cur_hum?>% | <?=$cur_temp?>°C</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="functions.js"></script>
    <script type="text/javascript" src="core.js"></script>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="today_info">
        <h2 id="today_title">Today's weather</h2>
        <div id="today_hum">
            <h4>Humidity</h4>
            <div class="now"><?=$cur_hum?>%</div>
            <div class="high">
                <p>highest</p>
                <div id="hum_high"><?=$high_hum?>%</div>
            </div>
            <div class="low">
                <p>lowest</p>
                <div id="hum_low"><?=$low_hum?>%</div>
            </div>
        </div>
        <div id="today_temp">
            <h4>Temperature</h4>
            <div class="now"><?=$cur_temp?>℃</div>
            <div class="high">
                <p>highest</p>
                <div id="temp_high"><?=$high_temp?>℃</div>
            </div>
            <div class="low">
                <p>lowest</p>
                <div id="temp_low"><?=$low_temp?>℃</div>
            </div>
        </div>
    </div>
    <div class="chart_box">
        <div id="hum_chart" class="home_chart"></div>
        <div class="history" id="hum_hist">
            <button id="hum_day">Past Day</button>
            <button id="hum_week">Past Week</button>
            <button id="hum_month">Past Month</button>
            <button id="hum_year">Past Year</button>
        </div>
    </div>
    <div class="chart_box">
        <div id="temp_chart" class="home_chart"></div>
        <div class="history" id="temp_hist">
            <button id="temp_day">Past Day</button>
            <button id="temp_week">Past Week</button>
            <button id="temp_month">Past Month</button>
            <button id="temp_year">Past Year</button>
        </div>
    </div>
</body>
</html>

