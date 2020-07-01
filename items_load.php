<?php
    require 'db.php';

    $begin = $_GET['begin'];
    $end = $_GET['end'];

    $item = array();
    $json = array();

    $sql = "SELECT * FROM Items";
    if (isset($_GET['type'])) {
        $category = $_GET['type'];
        $sql = $sql . " WHERE categorie = '$category'";
    } elseif (isset($_GET['search'])) {
        $search = $_GET['search'];
        $sql = $sql . " WHERE MATCH(nume, descriere, specificatii) AGAINST ('$search' IN BOOLEAN MODE)";
    }

    $result = $mysqli->query($sql) or die(mysqli_error($mysqli));
    $total = $result->num_rows;

    if (!isset($_GET['search'])) {
        $sql = $sql .  " LIMIT " . $begin . ", " . $end;
        $result = $mysqli->query($sql) or die(mysqli_error($mysqli));
    }

    $item['id'] = '';
    $item['nume'] = '';
    $item['pret'] = 0.0;
    $item['poza'] = '';
    $item['descriere'] = '';
    $item['specificatii'] = '';
    $item['reducere'] = 0.0;
    $item['count'] = 0;

    $count = 0;
    while ($row = mysqli_fetch_array($result)) {
        $item['id'] = $row[0];
        $item['nume'] = $row[1];
        $item['pret'] = $row[2];
        $item['poza'] = $row[3];
        $item['descriere'] = $row[4];
        $item['specificatii'] = $row[6];
        $item['reducere'] = $row[7];
        $item['count'] = 0;
        $item['total'] = 0;

        array_push($json, $item);
        $count = $count + 1;
    }

    $json[0]['count'] = $count;
    $json[0]['total'] = $total;
    echo json_encode($json);
?>