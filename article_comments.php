<?php
    require 'db.php';

    $id = $_GET['id'];

    $result = $mysqli->query("SELECT * FROM Comments WHERE articleId='$id'");
    $comment = array();
    $json = array();

    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        $accountId = $row['accountId'];
        $sql = $mysqli->query("SELECT * FROM Users WHERE id='$accountId'");
        if ($sql == false) continue;
        $user = $sql->fetch_assoc();

        $comment['firstName'] = $user['firstName'];
        $comment['lastName'] = $user['lastName'];
        $comment['date'] = $row['date'];
        $comment['body'] = $row['comment'];
        $comment['rating'] = $row['rating'];
        $comment['count'] = 0;

        array_push($json, $comment);
        $count = $count + 1;
    }

    $json[0]['count'] = $count;
    if ($count > 0) echo json_encode($json);
?>