$(document).ready(function() {
    var exchange = document.getElementById('exchange');
    var tempB = document.getElementById('tempB');
    var tempNY = document.getElementById('tempNY');
    var tempP = document.getElementById('tempP');

    if (exchange) {
        $.get("https://openexchangerates.org/api/latest.json", {app_id: "68d98e7427754e828c2f4cc877f516b5"}, function(data) {
            exchange.innerHTML = 'EUR-RON: ' + (data.rates.RON + data.rates.EUR - 0.42).toFixed(2) + '</br>USD-RON: ' + data.rates.RON.toFixed(2);
        });
    }

    if (tempB) {
        $.get("http://api.openweathermap.org/data/2.5/weather", {id: '683506', appid: "5ad109dad55c2a21d1c37952575664ae"}, function(data) {
            tempB.innerHTML = 'Bucuresti: ' + (data.main.temp - 273.15).toFixed(2);
        });
    }

    if (tempNY) {
        $.get("http://api.openweathermap.org/data/2.5/weather", {id: '5106292', appid: "5ad109dad55c2a21d1c37952575664ae"}, function(data) {
            tempNY.innerHTML = 'New York: ' + (data.main.temp - 273.15).toFixed(2);
        });
    }

    if (tempP) {
        $.get("http://api.openweathermap.org/data/2.5/weather", {id: '4303602', appid: "5ad109dad55c2a21d1c37952575664ae"}, function(data) {
            tempP.innerHTML = 'Paris: ' + (data.main.temp - 273.15).toFixed(2);
        });
    }
});