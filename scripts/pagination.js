function pagination(page, total, itemsPerPage, url, type = '', category = '') {
    var i = 0;
    var itemsTotal = total + 1;

    var pagination = document.getElementsByClassName("pagination")[0];
    var pageNum = Math.ceil(itemsTotal / itemsPerPage);
    var urlHref = url + '?';

    if (type != '') urlHref += type + '=' + category + '&';
    urlHref += 'p=';
    
    while (pagination.hasChildNodes()) {
        pagination.removeChild(pagination.firstChild);
    }

    var num = document.createElement('a');
    num.href = urlHref + 1;
    num.className = 'prev';
    num.innerHTML = '<<';
    pagination.appendChild(num);

    num = document.createElement('a');
    num.href = urlHref + ((page - 1) > 0 ? (page - 1) : (page));
    num.className = 'num';
    num.innerHTML = '<';
    pagination.appendChild(num);

    for (i = page - 1; i > 0 && i >= page - 4; --i) {
        num = document.createElement('a');
        num.href = urlHref + i;
        num.className = 'num';
        num.innerHTML = i;
        pagination.appendChild(num);
    }

    num = document.createElement('a');
    num.href = urlHref + page;
    num.classList.add('num');
    num.classList.add('active');
    num.innerHTML = page;
    pagination.appendChild(num);
    
    for (i = page + 1; i <= pageNum && i <= page + 4; ++i) {
        num = document.createElement('a');
        num.href = urlHref + i;
        num.className = 'num';
        num.innerHTML = i;
        pagination.appendChild(num);
    }

    num = document.createElement('a');
    num.href = urlHref + ((page + 1) > pageNum ? (page) : (page + 1));
    num.className = 'num';
    num.innerHTML = '>';
    pagination.appendChild(num);

    num = document.createElement('a');
    num.href = urlHref + pageNum;
    num.className = 'next';
    num.innerHTML = '>>';
    pagination.appendChild(num);
}