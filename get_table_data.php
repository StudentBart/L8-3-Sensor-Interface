<?php
spl_autoload_register(function ($class_name) {
    include $class_name . '.php';
});
$crud  = new crud();

// read_all() is
//
// array (size=288)
//  0 =>
//    array (size=3)
//      'id' => string '2020-08-15 10:00:02' (length=19)
//      'humidity' => float 70
//      'temperature' => float 24
function t()
{
    if (isset($_GET['timespan'])) {
        return $_GET['timespan'];
    }
}

$recent_data = $crud->read_all(t());

// that should be converted to
//
// array (size=2)
//  0 =>
//    array (size=1)
//      0 =>
//      array (size=2)
//        0 => '10:00' (length=5)
//        1 => float 70
//    array (size=1)
//      0 =>
//      array (size=2)
//        0 => '10:00' (length=5)
//        1 => float 24

$out = [[], []];

foreach ($recent_data as $item) {
    array_push($out[0], [substr($item['id'], 11, 5), $item['humidity']]);
    array_push($out[1], [substr($item['id'], 11, 5), $item['temperature']]);
}

echo json_encode($out);