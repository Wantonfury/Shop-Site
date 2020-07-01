$(document).ready(function() {
	var blogMaxChar = 250;
	var blogMaxTitle = 140;
	var itemsPerPage = 6;
	
	var pageVerify = findGetParameter('p');
	if (pageVerify) var page = parseInt(pageVerify);
	else var page = 1;
	var category = findGetParameter('type');

	document.getElementById("banner-text").innerHTML = category.charAt(0).toUpperCase() + category.slice(1);

	articlesLoad((page - 1) * itemsPerPage, itemsPerPage, category).then(function(data) {
		var defaultArticle = document.getElementById("defaultArticle");
		defaultArticle.parentElement.removeChild(defaultArticle);

		pagination(page, data[0].total, itemsPerPage, 'produse.php', 'type', category);
		shop_add_item(itemsPerPage, data, blogMaxTitle);

		if (data[0].total == 0) {
			var empty = document.createElement('div');
			empty.className = 'card';
			empty.innerHTML = 'Nu exista produse disponibile.';
			document.getElementsByClassName('rightcolumn')[0].appendChild(empty);
		}
	});
});