$(document).ready(function() {
	var blogMaxChar = 250;
	var blogMaxTitle = 140;
	var itemsPerPage = 6;
	
	var page = parseInt(findGetParameter('p'));
	var cautare = findGetParameter('caut');

	articlesLoadSearch((page - 1) * itemsPerPage, itemsPerPage, cautare).then(function(data) {
		var defaultArticle = document.getElementById("defaultArticle");
		defaultArticle.parentElement.removeChild(defaultArticle);

		pagination(page, data[0].total, itemsPerPage, 'cautare.php', 'caut', cautare);
        shop_add_item(itemsPerPage, data, blogMaxTitle);

        if (data[0].total == 0) {
            var empty = document.createElement('div');
            empty.className = 'card';
            empty.innerHTML = 'Nu s-a gasit niciun rezultat.';
            document.getElementsByClassName("rightcolumn")[0].appendChild(empty);
        }
	});
});