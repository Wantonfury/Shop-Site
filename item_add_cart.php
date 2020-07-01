<?php
    require 'db.php';

    if (!isset($_SESSION['cartTotal'])) $_SESSION['cartTotal'] = 0;
    $data = $_POST['data'] or $_REQUEST['data'];

    $sql = "SELECT * FROM Items WHERE id='$data'";
    $result = $mysqli->query($sql) or die(mysqli_error($mysqli));

    $item = array();
    $row = $result->fetch_row();

    $item['id'] = $row[0];
    $item['nume'] = $row[1];
    $item['pret'] = $row[2];
    $item['poza'] = $row[3];
    $item['descriere'] = $row[4];
    $item['specificatii'] = $row[6];
    $item['reducere'] = $row[7];

    $_SESSION['cart'][$_SESSION['cartTotal']] = $item;
    $_SESSION['cartTotal'] = $_SESSION['cartTotal'] + 1;
?>