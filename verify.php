<?php
    require 'db.php';

    if (isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])) {
        $email = $mysqli->escape_string($_GET['email']);
        $hash = $mysqli->escape_string($_GET['hash']);

        $result = $mysqli->query("SELECT * FROM Users WHERE email='$email' AND hash='$hash' AND active='0'");

        if ($result->num_rows != 0) {
            $_SESSION['message'] = 'Your account has been activated!';

            $mysqli->query("UPDATE Users SET active='1' WHERE email='$email'") or die($mysqli->error);
            $_SESSION['active'] = 1;
            header('location: account.php');
        } else {
            $_SESSION['message'] = 'Your account has already been activated or the URL is invalid.';
            header('location: login_error.php');
        }
    } else {
        $_SESSION['message'] = 'Invalid link provided for account verification!';
        header('location: login_error.php');
    }
?>