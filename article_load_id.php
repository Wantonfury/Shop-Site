<?php
    require 'db.php';

    if ((isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == false) || (isset($_SESSION['admin']) && $_SESSION['admin'] == false)) {
		header('location: account.php');
    }
    
    $id = $_GET['id'];

    $result = $mysqli->query("SELECT * FROM Articles WHERE id='$id'");
    $row = $result->fetch_assoc();

    $article = array();
    $article['id'] = $row['id'];
    $article['title'] = $row['title'];
    $article['date'] = $row['date'];
    $article['body'] = $row['body'];

    echo json_encode($article);
?>