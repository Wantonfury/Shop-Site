<?php
    require 'db.php';

    if (!isset($_SESSION['cartTotal'])) $_SESSION['cartTotal'] = 0;
    $data = $_POST['data'];

    for ($i = 0; $i < $_SESSION['cartTotal']; ++$i) {
        $_SESSION['cart'][$i] = $_SESSION['cart'][$i + 1];
    }
    $_SESSION['cartTotal'] = 0;
?>