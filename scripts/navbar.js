var loggedIn = false;
var admin = false;

$(document).ready(function() {
    $("#navbarHTML").load("navbar.html", (function() {
        $.ajax({
            url: 'login_status.php',
            type: 'POST',
            data: { 'logged': false, 'admin': false },
            dataType: 'json',
            success: function(status) {
                if (status[0]) {
                    loggedIn = true;
                }

                if (status[1]) {
                    admin = true;
                    var a = document.createElement('a');
                    var li = document.createElement('li');
                    
                    a.href = 'article_editor.php';
                    li.className = 'drop-menu-2';
                    li.innerHTML = 'Editor';
                    a.appendChild(li);

                    document.getElementById("accountList").appendChild(a);
                }

                var a = document.createElement('a');
                var li = document.createElement('li');

                if (admin) {
                    li.className = 'drop-menu-3';
                }
                else {
                    li.className = 'drop-menu-2';
                }
                
                a.appendChild(li);
            
                if (loggedIn) {
                    a.href = 'logout.php';
                    li.innerHTML = 'Logout';
                } else {
                    a.href = 'login.php';
                    li.innerHTML = 'Login';
                }
                
                document.getElementById("accountList").appendChild(a);

                a = document.createElement('a');
                li = document.createElement('li');
                
                li.innerHTML = 'Cos';
                li.className = 'right';
                a.appendChild(li);
                a.href = 'cos.php';

                document.getElementsByClassName("navbar")[0].firstElementChild.appendChild(a);

                var footer = document.getElementsByClassName('footer')[0];
                footer.firstElementChild.innerHTML = 'Copyright 2020 © Orzan Alexandru';

                var search = document.getElementById("searchHTML");
                if (search) {
                    var search_box = document.createElement('div');
                    search_box.className = 'search-box';

                    var input = document.createElement('input');
                    input.type = 'text';
                    input.placeholder = 'Scrieti si cautati...';
                    input.id = 'search-text';

                    var a = document.createElement('button');
                    a.onclick = 'search()';
                    a.className = 'search-button';

                    var img = document.createElement('img');
                    img.src = 'images/icons/search.png';
                    img.className = 'search-icon';

                    a.appendChild(img);
                    search_box.appendChild(input);
                    search_box.appendChild(a);

                    search.appendChild(search_box);

                    var search_func = function() {
                        var search_text = document.getElementById('search-text').value;
                        window.location.href = 'cautare.php?caut=' + search_text + '&p=1';
                    };

                    a.onclick = search_func;
                    input.addEventListener('keypress', function(e) {
                        if (e.key === 'Enter') {
                            search_func();
                        }
                    })
                }
            }
        });
    }));
});