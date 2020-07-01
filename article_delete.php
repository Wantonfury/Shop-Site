<?php
    require 'db.php';

    $id = $_GET['id'];
    $mysqli->query("DELETE FROM Articles WHERE id=$id");
?>