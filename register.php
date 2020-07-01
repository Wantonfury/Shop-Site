<?php
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['firstName'] = $_POST['firstName'];
    $_SESSION['lastName'] = $_POST['lastName'];

    $email = $mysqli->escape_string($_POST['email']);
    $firstName = $mysqli->escape_string($_POST['firstName']);
    $lastName = $mysqli->escape_string($_POST['lastName']);
    $password = $mysqli->escape_string(password_hash($_POST['password'], PASSWORD_BCRYPT));
    $hash = $mysqli->escape_string(md5(rand(0, 1000)));

    $result = $mysqli->query("SELECT * FROM Users WHERE email='$email'") or die($mysqli->error);

    if ($result->num_rows > 0) {
        $_SESSION['message'] = 'A user with this email already exists.';
        header('location: error.php');
    } else {
        $sql = "INSERT INTO Users (firstName, lastName, email, password, hash, active)" . " VALUES ('$firstName', '$lastName', '$email', '$password', '$hash', '0')";

        if ($mysqli->query($sql)) {
            $_SESSION['active'] = 0;
            $_SESSION['loggedIn'] = true;
            $_SESSION['message'] = "Confirmation link has been sent to $email, please verify your account by clicking on the link in the email.";

            $subject = 'Account Verification';
            $message =
            "Hello " . $firstName . ",
            Thank you for signing up!
            
            Please click on the following link in order to activate your account:
            http://blogtechsite.byethost4.com/verify.php?email=" . $email . "&hash=" . $hash;
            $headers = 'FROM: John Doe <24675464@hostingaccount.com>\r\n';

            mail($email, $subject, $message, $headers);
            header('location: account.php');
        } else {
            $_SESSION['message'] = 'Registration failed!';
            header('location: login_error.php');
        }
    }
?>