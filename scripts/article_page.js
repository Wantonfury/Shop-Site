$(document).ready(function() {
    var id = findGetParameter("id");

    articlesLoad(id - 1, id).then(function(data) {
        var article = document.createElement('div');
        var title = document.createElement('div');
        var date = document.createElement('div');
        var body = document.createElement('div');

        title.className = 'article-title';
        date.className = 'article-date';
        body.className = 'article-body';
        article.className = 'card';

        var inflated = data[0].pret * data[0].reducere;
        title.innerHTML = "<a href='article_page.php?id=" + data[0].id + "'>" + data[0].nume + '</a>';
        date.innerHTML = "<h5><img src='" + data[0].poza + "'></h5>";
		date.innerHTML += '<h5>' + (inflated > data[0].pret ? "<strike>" + inflated.toFixed(2) + "</strike> " : '') + data[0].pret + '</h5>';
        body.innerHTML = data[0].descriere;
        

        article.appendChild(title);
        article.appendChild(date);
        article.appendChild(body);

        document.getElementById("article-content").appendChild(article);
    });

    $.ajax({
        url: 'article_comments.php?id=' + id,
        type: 'POST',
        data: { 'firstName': '', 'lastName': '', 'date': '', 'body':'', 'rating': 0, 'count': 0 },
        dataType: 'json',
        success: function(data) {
            var i = 0;
            for (i = data[0].count - 1; i >= 0; --i) {
                var comment = document.createElement('div');
                var title = document.createElement('div');
                var date = document.createElement('div');
                var body = document.createElement('div');

                title.className = 'comment-title';
                date.className = 'comment-date';
                body.className = 'comment-body';
                comment.className = 'card';

                title.innerHTML = "<h4 id='comment-title'>" + data[i].firstName + ' ' + data[i].lastName + '</h4>';
                date.innerHTML = '<h5>' + data[i].date + '</h5>';
                body.innerHTML = data[i].body;

                if (data[i].rating != 0) {
                    var rating = document.createElement('div');
                    rating.className = 'rate-comment';

                    for (var k = 0; k < 5; ++k) {
                        var label = document.createElement('label');

                        if (data[i].rating >= k + 1) {
                            label.className = 'rate-active';
                        }

                        rating.appendChild(label);
                    }

                    comment.appendChild(rating);
                }

                comment.appendChild(title);
                comment.appendChild(date);
                comment.appendChild(body);

                var article = document.getElementById("article-comments");
                article.appendChild(comment);
            }
        }
    })
});

function addComment() {

    var rating = 0;
    var stars = document.getElementsByName("rate");

    for (var i = 0; i < stars.length; ++i) {
        if (stars[i].checked) {
            rating = parseInt(stars[i].value);
        }
    }

    var comment = {
        'comment': document.getElementById('article-comment').value,
        'id': findGetParameter('id'),
        'rating': rating
    }

    $.ajax({
        url: 'article_add_comment.php?id=' + findGetParameter('id'),
        type: 'POST',
        data: { data: comment },
        success: function(response) {
            if (response == "ACC_VERIFY") alert('Please verify your account before posting a comment.');
            location.reload();
        }
    });
}