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
    <p id="banner-text">Cosul de cumparaturi</p>
  </div>

  <div id="navbarHTML"></div>

  <div class="row" id="screen-menu">

    <div class="leftcolumn">
      <div class="card" id="searchHTML">
      </div>
      <div class="card">
          <input type="submit" value="Goliti cosul" onclick="shop_reset_cart()">
          <span id="cart-total">Totalul este: </span>
          <input type="submit" value="Checkout" onclick="checkout()">
      </div>
    </div>

    <div class="rightcolumn" id="articles">
      <div class="card-product" id="defaultArticle">
          <span>Cosul este gol.</span>
      </div>
    </div>

    
  </div>

  <div class="footer">
    <h2>Footer</h2>
  </div>
</body>
</html>