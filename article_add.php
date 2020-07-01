<?php
    require 'db.php';

    $obj = $_POST['data'];
    $title = $mysqli->escape_string(htmlspecialchars_decode($obj['title']));
    $date = $mysqli->escape_string($obj['date']);
    $body = $mysqli->escape_string(htmlspecialchars_decode($obj['body']));

    $mysqli->query("INSERT INTO Articles (title, date, body) VALUES ('$title', '$date', '$body')");
?>