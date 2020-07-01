$(document).ready(function() {
    var blogMaxTitle = 140;
	$.ajax({
        url: 'item_get_cart.php',
        type: 'POST',
        dataType: 'json',
        success: function(data) {
            if (data[0].total != 0 && document.getElementById('defaultArticle')) {
                var defaultArticle = document.getElementById("defaultArticle");
                defaultArticle.parentElement.removeChild(defaultArticle);
            }

            var total = 0.0;
            for (var i = 0; i < data[0].total; ++i) {
                total += parseFloat(data[i].pret);
            }

            var cart = document.getElementById('cart-total');
            cart.innerHTML = '<center>' + cart.innerHTML + ' <b>' + total.toFixed(2) + '</b> RON</center>';

            if (total != 0) cart.setAttribute('empty', 'false');
            else cart.setAttribute('empty', 'true');
            
            if (document.getElementsByClassName('leftcolumn')[0]) cart_add_item(data, blogMaxTitle);
        }
    });
});

function checkout() {
    window.location.href = 'checkout.php';
}

function checkout_payment() {
    if (document.getElementById('cart-total').getAttribute('empty') == 'true') {
        alert('Cosul este gol.');
    } else {
        alert('Multumim pentru incredere!');
        $.ajax({
            url: 'item_reset_cart.php',
            type: 'POST',
            success: function(data) {
                window.location.href = 'index.php';
            }
        });
    }
}