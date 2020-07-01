<?php
	require 'db.php';
	
	if (isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
		header('location: account.php');
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
	<script type="text/javascript" src="scripts/login_buttons.js"></script>
	<script type="text/javascript" src="scripts/loading_screen.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</head>

<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		if (isset($_POST['login'])) {
			require 'login_process.php';
		}
		elseif (isset($_POST['register'])) {
			require 'register.php';
		}
	}
?>

<body>
	<div class="load-screen" id="screen-loading">
		<div class="loading">
			<span>Loading...</span>
		</div>
	</div>

	<div class="header">
		<h1>Login</h1>
		<p>Conturi</p>
	</div>

	<div id="navbarHTML"></div>

	<div class="form-user">
		<div class="button-box">
			<div id="button-background"></div>
			<button type="button" class="toggle-button" onclick="login()">Login</button>
			<button type="button" class="toggle-button" onclick="register()">Register</button>
		</div>

		<div class="form-box-group">
				<form action="login.php" method="POST" id="login-box" class="form-box">
					<h1>Login</h1>
					<input type="text" name="email" placeholder="Email" required>
					<input type="password" name="password" placeholder="Password" required>
					<input type="checkbox" name="remember-password"><span class="checkbox-text">Remember Password</span>
					<input type="submit" name="login" value="Login">
				</form>

				<form action="login.php" method="POST" id="register-box" class="form-box">
					<h1>Register</h1>
					<input type="text" name="email" placeholder="Email" required>
					<input type="text" name="firstName" placeholder="First Name" required>
					<input type="text" name="lastName" placeholder="Last Name" required>
					<input type="password" name="password" placeholder="Password" required>
					<input type="password" name="password-repeat" placeholder="Reenter password" required>
					<input type="checkbox" name="tos" required><span class="checkbox-text">I agree to the Terms and Conditions.</span>
					<br/><br/><div style="display: inline-block;" data-callback="checkCaptcha" class="g-recaptcha" data-sitekey="6Lc-NMAUAAAAAIqvXWHgawTpcML5eERSHMmgjLu4" data-theme="dark"></div><br/>
					<input type="submit" name="register" value="Register" id="register-button" disabled>
				</form>
			
		</div>
	</div>
</body>
</html>