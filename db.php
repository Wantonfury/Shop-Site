<?php
    $host = 'sql108.byethost.com';
    $user = 'b32_26152304';
    $pass = 'parola';
    $db = 'b32_26152304_Blogs';
    
    $mysqli = new mysqli($host, $user, $pass, $db) or die($mysqli->error);
    
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    session_start();
?>