<?php
	require 'db.php';

    if ($_SESSION['loggedIn'] == false) {
       header('location: login.php');
	}

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
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/main.css">

	<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>
	<script type="text/javascript" src="scripts/navbar.js"></script>
	<script type="text/javascript" src="scripts/account_verification.js"></script>
	<script type="text/javascript" src="scripts/loading_screen.js"></script>
</head>

<body>
	<div class="load-screen" id="screen-loading">
		<div class="loading">
			<span>Loading...</span>
		</div>
	</div>

	<div class="header">
		<h1>Account</h1>
		<p>Contul dumneavoastra</p>
	</div>

	<div id="navbarHTML"></div>

	<div class="card">
		<h1 style="text-align: center" id="account-verify"></h1>
		<form action="account.php" method="POST">
			<input type="submit" name="logout" value="Logout">
		</form>
	</div>
	
</body>
</html>