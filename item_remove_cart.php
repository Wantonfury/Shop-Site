<?php
    require 'db.php';

    if (!isset($_SESSION['cartTotal'])) $_SESSION['cartTotal'] = 0;
    $data = $_POST['data'];

    for ($i = $data; $i < $_SESSION['cartTotal'] - 1; ++$i) {
        $_SESSION['cart'][$i] = $_SESSION['cart'][$i + 1];
    }
    $_SESSION['cartTotal'] = $_SESSION['cartTotal'] - 1;
?>