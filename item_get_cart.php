<?php
    require 'db.php';

    if (!isset($_SESSION['cartTotal'])) $_SESSION['cartTotal'] = 0;

    $item = array();
    $json = array();
    $i = 0;

    for ($i = 0; $i < $_SESSION['cartTotal']; ++$i) {
        $item = $_SESSION['cart'][$i];
        array_push($json, $item);
    }

    $json[0]['total'] = $i;
    echo json_encode($json);
?>