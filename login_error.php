<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/main.css">

	<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="scripts/navbar.js"></script>
</head>

<body>
    <div class="header">
        <h1>Error</h1>
        <p>Sign in from across space and time</p>
    </div>

    <div id="navbarHTML"></div>

    <div class="form">
        <h1>Error</h1>
        <p><?php
            if (isset($_SESSION['message']) AND !empty($_SESSION['message'])):
                echo $_SESSION['message'];
            else:
                header('location: index.php');
            endif;
        ?></p>
    </div>
</body>