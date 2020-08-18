<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
$crud  = new crud();

$cur_hum = $crud->custom_query('SELECT humidity FROM `hum_temp` ORDER BY id DESC LIMIT 1');
$cur_temp = $crud->custom_query('SELECT temperature FROM `hum_temp` ORDER BY id DESC LIMIT 1');

//max SELECT MAX(temperature) FROM `hum_temp`
?>

<html lang="en-en">
<head>
    <title><?=$cur_hum?>% | <?=$cur_temp?>°C</title>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="functions.js"></script>
    <script type="text/javascript" src="core.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div id="hum_chart" class="home_chart"></div>
    <div id="temp_chart" class="home_chart"></div>
</body>
</html>

