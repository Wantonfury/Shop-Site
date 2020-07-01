<?php
    require 'db.php';

    $obj = $_POST['data'];
    $id = $obj['id'];
    $title = $mysqli->escape_string(htmlspecialchars_decode($obj['title']));
    $date = $mysqli->escape_string($obj['date']);
    $body = $mysqli->escape_string(htmlspecialchars_decode($obj['body']));

    $mysqli->query("UPDATE Articles SET title='$title', date='$date', body='$body' WHERE id=$id");
?>