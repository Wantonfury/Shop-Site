$(document).ready(function() {
	var blogMaxChar = 250;
	var blogMaxTitle = 140;
	var itemsPerPage = 6;

	var pageVerify = findGetParameter('p');
	if (pageVerify) var page = parseInt(pageVerify);
	else var page = 1;

	articlesLoad((page - 1) * itemsPerPage, itemsPerPage).then(function(data) {
		var defaultArticle = document.getElementById("defaultArticle");
		defaultArticle.parentElement.removeChild(defaultArticle);

		pagination(page, data[0].total, itemsPerPage, 'index.php');
		shop_add_item(itemsPerPage, data, blogMaxTitle);
	});
});