function shop_add_item(itemsPerPage, data, blogMaxTitle) {
    var i = 0;
    var n = data[0].total > itemsPerPage ? itemsPerPage : data[0].total;

    for (i = 0; i < n; ++i) {
        var article = document.createElement('div');
        var title = document.createElement('div');
        var titleString = '';
        var date = document.createElement('div');
        var body = document.createElement('div');
        var price = document.createElement('div');
        var button = document.createElement('input');

        title.className = 'article-title';
        date.className = 'article-date';
        body.className = 'article-body';
        price.className = 'article-price';
        article.className = 'card-product';

        date.innerHTML = "<h5><img src='" + data[i].poza + "'>" + (data[i].reducere > 0.0 ? "" : '') + "</h5>";

        var inflated = data[i].pret * data[i].reducere;
        if (data[i].pret.split('.').length == 1) {
            price.innerHTML = '<center><h3>' + (inflated > data[i].pret ? "<strike>" + inflated.toFixed(2) + "</strike> " : '') + data[i].pret + '.00</h3></center>';
        } else {
            price.innerHTML = '<center><h3>' + (inflated > data[i].pret ? "<strike>" + inflated.toFixed(2) + "</strike> " : '') + data[i].pret + '</h3></center>';
        }

        title.innerHTML = "<a href='item_page.php?id=" + data[i].id + "'>";
        if (data[i].nume.length < blogMaxTitle) {
            titleString = data[i].nume;
        } else {
            titleString = data[i].nume.substr(0, blogMaxTitle) + '... ';
        }
        title.innerHTML = "<a href='item_page.php?id=" + data[i].id + "'>" + titleString + '</a>';

        body.innerHTML = data[i].specificatii + '</br>';

        button.type = 'submit';
        button.value = 'Adauga in cos';

        button.setAttribute('data', JSON.stringify(data[i].id));
        button.onclick = function() {
            var send = JSON.parse(event.target.getAttribute('data'));
            $.ajax({
                url: 'item_add_cart.php',
                type: 'POST',
                data: { data: send },
                success: function(response) {
                    window.location.reload();
                }
            });
        }

        price.appendChild(button);

        article.appendChild(date);
        article.appendChild(title);
        article.appendChild(body);
        article.appendChild(price);

        document.getElementById("articles").appendChild(article);
    }
}

function cart_add_item(data, blogMaxTitle) {
    var i = 0;

    for (i = 0; i < data[0].total; ++i) {
        var article = document.createElement('div');
        var title = document.createElement('div');
        var titleString = '';
        var date = document.createElement('div');
        var body = document.createElement('div');
        var price = document.createElement('div');
        var button = document.createElement('input');

        title.className = 'article-title';
        date.className = 'article-date';
        body.className = 'article-body';
        price.className = 'article-price';
        article.className = 'card-product';

        date.innerHTML = "<h5><img src='" + data[i].poza + "'></h5>";

        var inflated = data[i].pret * data[i].reducere;
        if (data[i].pret.split('.').length == 1) {
            price.innerHTML = '<center><h3>' + (inflated > data[i].pret ? "<strike>" + inflated.toFixed(2) + "</strike> " : '') + data[i].pret + '.00</h3></center>';
        } else {
            price.innerHTML = '<center><h3>' + (inflated > data[i].pret ? "<strike>" + inflated.toFixed(2) + "</strike> " : '') + data[i].pret + '</h3></center>';
        }

        title.innerHTML = "<a href='item_page.php?id=" + data[i].id + "'>";
        if (data[i].nume.length < blogMaxTitle) {
            titleString = data[i].nume;
        } else {
            titleString = data[i].nume.substr(0, blogMaxTitle) + '... ';
        }
        title.innerHTML = "<a href='item_page.php?id=" + data[i].id + "'>" + titleString + '</a>';

        body.innerHTML = data[i].specificatii + '</br>';

        button.type = 'submit';
        button.value = 'Stergeti din cos';

        button.setAttribute('data', JSON.stringify(i));
        button.onclick = function() {
            var send = JSON.parse(event.target.getAttribute('data'));
            $.ajax({
                url: 'item_remove_cart.php',
                type: 'POST',
                data: { data: send },
                success: function(response) {
                    window.location.reload();
                }
            });
        }

        price.appendChild(button);

        article.appendChild(date);
        article.appendChild(title);
        article.appendChild(body);
        article.appendChild(price);

        document.getElementById("articles").appendChild(article);
    }
}

function shop_reset_cart() {
    var data = '';

    $.ajax({
        url: 'item_reset_cart.php',
        type: 'POST',
        data: { data: data },
        success: function(response) {
            window.location.reload();
        }
    });
}