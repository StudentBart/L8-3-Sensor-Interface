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
    } else {
        return 24;
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

switch ($_GET['view']) {
    case 'hour':
        foreach ($recent_data as $item) {
            array_push($out[0], [substr($item['id'], 11, 5), $item['humidity']]);
            array_push($out[1], [substr($item['id'], 11, 5), $item['temperature']]);
        }
        break;
    case 'day':
        $bank = [];
        foreach ($recent_data as $item) {
            $d = substr($item['id'], 5, 5);
            if (substr(end($bank)['id'], 5, 5) === $d || count($bank) === 0) {
                array_push($bank, $item);
            } else {
                $avg_hum = (int) array_sum(array_column($bank, 'humidity')) / count($bank);
                $avg_temp = (int) array_sum(array_column($bank, 'temperature')) / count($bank);

                array_push($out[0], [substr($bank[0]['id'], 0, 10), $avg_hum]);
                array_push($out[1], [substr($bank[0]['id'], 0, 10), $avg_temp]);

                $bank = [$item];
            }
        }
        break;
}



echo json_encode($out);