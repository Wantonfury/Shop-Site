<?php
    require 'db.php';

    $begin = $_GET['begin'];
    $end = $_GET['end'];

    $sql = "SELECT * FROM Articles LIMIT " . $begin . ", " . $end;
    $result = $mysqli->query($sql);

    $article = array();
    $json = array();

    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        $article['id'] = $row['id'];
        $article['title'] = $row['title'];
        $article['date'] = $row['date'];
        $article['body'] = $row['body'];
        $article['count'] = 0;

        array_push($json, $article);
        $count = $count + 1;
    }

    $json[0]['count'] = $count;
    echo json_encode($json);
?>