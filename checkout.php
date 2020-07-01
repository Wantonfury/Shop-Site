<?php
    require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Magazin</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/main.css">
  
  <script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="scripts/navbar.js"></script>
  <script type="text/javascript" src="scripts/articles_load.js"></script>
  <script type="text/javascript" src="scripts/cart_display.js"></script>
  <script type="text/javascript" src="scripts/get_parameters.js"></script>
  <script type="text/javascript" src="scripts/loading_screen.js"></script>
  <script type="text/javascript" src="scripts/pagination.js"></script>
  <script type="text/javascript" src="scripts/shop_add_item.js"></script>
</head>

<body>
  <div class="load-screen" id="screen-loading">
    <div class="loading">
      <span>Loading...</span>
    </div>
  </div>

  <div class="header">
    <h1>Magazin</h1>
    <p id="banner-text">Finalizare cumparaturi</p>
  </div>

  <div id="navbarHTML"></div>

  <div class="row">
      <div class="card">
            <input type="text" name="firstName" placeholder="First Name" required>
            <input type="text" name="lastName" placeholder="Last Name" required>
            <input type="text" name="address" placeholder="Address" required>
            <center><input type="checkbox" name="tos" required><span class="checkbox-text">I agree to the Terms and Conditions.</span></center>
            <br/><br/><div style="display: inline-block;" data-callback="checkCaptcha" class="g-recaptcha" data-sitekey="6Lc-NMAUAAAAAIqvXWHgawTpcML5eERSHMmgjLu4" data-theme="dark"></div><br/>
            <span id="cart-total">Totalul este: </span>
            <input type="submit" name="register" value="Checkout" id="register-button" onclick="checkout_payment()">
        </div>
    </div>

  <div class="footer">
    <h2>Footer</h2>
  </div>
</body>
</html>