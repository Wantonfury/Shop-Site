<?php
    if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
        header('location: account.php');
    } else {
        $email = $mysqli->escape_string($_POST['email']);
        $result = $mysqli->query("SELECT * FROM Users WHERE email='$email'");

        if ($result->num_rows != 0) {
            $user = $result->fetch_assoc();

            if (password_verify($_POST['password'], $user['password'])) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['firstName'] = $user['firstName'];
                $_SESSION['lastName'] = $user['lastName'];
                $_SESSION['active'] = $user['active'];
                $_SESSION['admin'] = $user['admin'];
                $_SESSION['message'] = 'Successfully logged in.';

                $_SESSION['loggedIn'] = true;
                header('location: account.php');
            } else {
                $_SESSION['message'] = 'Wrong password. Please try again.';
                header('location: login_error.php');
            }
        } else {
            $_SESSION['message'] = 'A user with that email does not exist.';
            header('location: login_error.php');
        }
    }
?>