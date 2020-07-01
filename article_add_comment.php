<?php
    require 'db.php';

    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true && isset($_SESSION['active']) && $_SESSION['active'] == true) {
        $obj = $_POST['data'];
        $id = $mysqli->escape_string($obj['id']);
        $user = $mysqli->escape_string($_SESSION['id']);
        $date = $mysqli->escape_string(date('Y-m-d'));
        $comment = $mysqli->escape_string(htmlspecialchars_decode($obj['comment']));
        $rating = $mysqli->escape_string($obj['rating']);
    
        $mysqli->query("INSERT INTO Comments (articleId, accountId, date, comment, rating) VALUES('$id', '$user', '$date', '$comment', '$rating')");        
    } else {
        echo 'ACC_VERIFY';
    }
?>