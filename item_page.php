<?php
    require 'db.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>articles</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/main.css">

	<script type="text/javascript" src="scripts/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="scripts/navbar.js"></script>
    <script type="text/javascript" src="scripts/articles_load.js"></script>
    <script type="text/javascript" src="scripts/get_parameters.js"></script>
    <script type="text/javascript" src="scripts/article_page.js"></script>
    <script type="text/javascript" src="scripts/loading_screen.js"></script>
</head>

<body>
    <div class="load-screen" id="screen-loading">
        <div class="loading">
            <span>Loading...</span>
        </div>
    </div>

	<div class="header">
		<h1>Produs</h1>
		<p></p>
	</div>

	<div id="navbarHTML"></div>

    <div id="article-content"></div>
    <div class="card" id="article-add-comment">
        <textarea id="article-comment" rows="4" cols="100" placeholder="Add a comment..." required></textarea>
        <div class="rate">
            <input type="radio" id="star5" name="rate" value="5" />
            <label for="star5" title="5 stele">5 stars</label>
            <input type="radio" id="star4" name="rate" value="4" />
            <label for="star4" title="4 stele">4 stars</label>
            <input type="radio" id="star3" name="rate" value="3" />
            <label for="star3" title="3 stele">3 stars</label>
            <input type="radio" id="star2" name="rate" value="2" />
            <label for="star2" title="2 stele">2 stars</label>
            <input type="radio" id="star1" name="rate" value="1" />
            <label for="star1" title="1 stea">1 star</label>
        </div>
        <input type="submit" name="comment" value="Comment" onclick="addComment()">
    </div>
    <div id="article-comments"></div>
	
</body>
</html>