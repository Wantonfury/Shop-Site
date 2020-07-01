$(document).ready(function() {
    updateArticles();
});

function updateArticles() {
    articlesLoad(0, 10).then(function(data) {
        var i = 0;
        
        var browser = document.getElementById('article-browser');
        while (browser.childElementCount > 0) {
            browser.removeChild(browser.lastChild);
        }

        var n = data[0].count;
        for (i = n - 1; i >= 0; --i) {
            var article = document.createElement('div');
            var title = document.createElement('div');
            var button = document.createElement('input');
            var buttonDelete = document.createElement('input');

            title.className = 'article-title';
            article.className = 'browser-card';

            button.type = "submit";
            button.name = "edit";
            button.setAttribute("onclick", "javascript: articleEditItem(" + data[i].id + ");");
            button.value = "Edit";

            buttonDelete.type = "submit";
            buttonDelete.name = "delete";
            buttonDelete.setAttribute("onclick", "javascript: articleDeleteItem(" + data[i].id + ");");
            buttonDelete.value = "Delete";

            title.innerHTML = data[i].title + ' <h5>' + data[i].date + '</h5>';

            article.appendChild(title);
            article.appendChild(button);
            article.appendChild(buttonDelete);

            document.getElementById("article-browser").appendChild(article);
        }
    });
}

function articleEdit() {
    document.getElementById('article-editor').hidden = true;
    document.getElementById('article-browser').hidden = false;
    document.getElementById('article-modify').hidden = true;
    document.getElementById('button-background').style.left = '0px';
}

function articleAdd() {
    document.getElementById('article-editor').hidden = false;
    document.getElementById('article-browser').hidden = true;
    document.getElementById('article-modify').hidden = true;
    document.getElementById('button-background').style.left = '110px';
}

function articleAddItem() {
    var article = {
        'title': document.getElementById('editor-title').value,
        'date': document.getElementById('editor-date').value,
        'body': document.getElementById('editor-body').value
    }

    $.ajax({
        url: 'article_add.php',
        type: 'POST',
        data: { data: article },
        success: function(response) {
            document.getElementById('editor-title').value = '';
            document.getElementById('editor-date').value = '';
            document.getElementById('editor-body').value = '';
            articleAdd();
            updateArticles();
        }
    });
}

function articleEditItem(id) {
    $.ajax({
        url: 'article_load_id.php?id=' + id,
        type: 'POST',
        data: { 'id': 0, 'title': 'title', 'date': 'date', 'body': 'body' },
        dataType: 'json',
        success: function(data) {
            document.getElementById('modify-title').value = data.title;
            document.getElementById('modify-body').value = data.body;
            document.getElementById('modify-date').value = data.date;
            document.getElementById('modify-button').setAttribute("onclick", "javascript: articleEditItemSubmit(" + id + ");");
            document.getElementById('article-browser').hidden = true;
            document.getElementById('article-modify').hidden = false;
        }
    });
}

function articleEditItemSubmit(id) {
    var articleData = {
        'id': id,
        'title': document.getElementById('modify-title').value,
        'date': document.getElementById('modify-date').value,
        'body': document.getElementById('modify-body').value
    };

    $.ajax({
        url: 'article_edit.php',
        type: 'POST',
        data: { data: articleData },
        success: function(response) {
            articleEdit();
            updateArticles();
        }
    });
}

function articleDeleteItem(id) {
    if (confirm('Are you sure you want to delete this article?')) {
        $.ajax({
            url: 'article_delete.php?id=' + id,
            type: 'POST',
            success: function() {
                updateArticles();
            }
        })
    }
}