<?php
	require 'db.php';
	
	if ((isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == false) || (isset($_SESSION['admin']) && $_SESSION['admin'] == false)) {
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
	<script type="text/javascript" src="scripts/articles_load.js"></script>
	<script type="text/javascript" src="scripts/login_buttons.js"></script>
	<script type="text/javascript" src="scripts/article_editor.js"></script>
</head>

<body>
	<div class="header">
		<h1>Article Editor</h1>
		<p>Edit articles from across space and time</p>
	</div>

	<div id="navbarHTML"></div>

	<div class="form-editor">
		<div class="button-box">
			<div id="button-background"></div>
			<button type="button" class="toggle-button" onclick="articleEdit()">Edit</button>
			<button type="button" class="toggle-button" onclick="articleAdd()">Add</button>
		</div>

		<div class="card-editor" id="article-editor" hidden="true">
			<input type="date" class="editor-date" id="editor-date" required><br/><br/>
			<textarea rows="3" cols="100" placeholder="Title" class="editor-title" id="editor-title" required></textarea>
			<textarea rows="30" cols="100" placeholder="Article" class="editor-body" id="editor-body" required></textarea><br/><br/>
			<input type="submit" name="submit_article" onclick="articleAddItem();" value="Submit Article">
		</div>

		<div class="card-editor" id="article-modify" hidden="true">
			<input type="date" class="editor-date" id="modify-date" required><br/><br/>
			<textarea rows="3" cols="100" placeholder="Title" class="editor-title" id="modify-title" required></textarea>
			<textarea rows="30" cols="100" placeholder="Article" class="editor-body" id="modify-body" required></textarea><br/><br/>
			<input type="submit" name="edit_article" id="modify-button" value="Submit Article">
		</div>

		<div class="card-browser" id="article-browser"></div>
	</div>

</body>
</html>