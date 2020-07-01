function articlesLoad(begin, end, type="") {
    var urlString = 'items_load.php?begin=' + begin + '&end=' + end;
    if (type != "") urlString += '&type=' + type;
    
    return new Promise(resolve => $.ajax({
        url: urlString,
        type: 'POST',
        data: { 'id': 0, 'nume': 'nume', 'pret': 0.0, 'poza': 'poza', 'descriere': 'descriere', 'specificatii': 'specificatii', 'total': 0, 'count': 0, 'reducere': 0.0 },
        dataType: 'json',
        success: function(data) {
            resolve(data);
        }
    }));
}

function articlesLoadSearch(begin, end, search) {
    var urlString = 'items_load.php?begin=' + begin + '&end=' + end + '&search=' + search;

    return new Promise(resolve => $.ajax({
        url: urlString,
        type: 'POST',
        data: { 'id': 0, 'nume': 'nume', 'pret': 0.0, 'poza': 'poza', 'descriere': 'descriere', 'specificatii': 'specificatii', 'total': 0, 'count': 0 },
        dataType: 'json',
        success: function(data) {
            resolve(data);
        }
    }));
}