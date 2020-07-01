<?php
    require 'db.php';

    if ($_SESSION['loggedIn'] == false) {
        header('location: login.php');
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['logout'])) {
            $_SESSION['email'] = '';
            $_SESSION['firstName'] = '';
            $_SESSION['lastName'] = '';
            $_SESSION['active'] = '';
            $_SESSION['message'] = 'Successfully logged out.';

            $_SESSION['loggedIn'] = false;
            header('location: login.php');
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Logout</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/main.css">

	<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="scripts/navbar.js"></script>
</head>

<body>
    <div class="header">
		<h1>Logout</h1>
		<p>Sign out from across space and time</p>
	</div>

	<div id="navbarHTML"></div>

    <div class="card">
        <form action="logout.php" method="POST">
            <button class="button button-block" name="logout">Logout</button>
        </form>
    </div>
</body>
</html>