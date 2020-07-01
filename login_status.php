<?php
    require 'db.php';
    $logged = false;
    $admin = false;
    $active = false;

    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn']) {
        $logged = true;
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) {
            $admin = true;
        }
        if (isset($_SESSION['active']) && $_SESSION['active'] == true) {
            $active = true;
        }
    }

    $data = array();
    array_push($data, $logged);
    array_push($data, $admin);
    array_push($data, $active);

    echo json_encode($data);
?>