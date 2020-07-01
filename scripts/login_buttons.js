function login() {
    document.getElementById('login-box').style.left = '-40px';
    document.getElementById('register-box').style.left = '640px';
    document.getElementById('button-background').style.left = '0px';
}

function register() {
    document.getElementById('login-box').style.left = '-640px';
    document.getElementById('register-box').style.left = '-40px';
    document.getElementById('button-background').style.left = '110px';
}

function checkCaptcha() {
    var response = grecaptcha.getResponse();
    if (response.length != 0) {
        document.getElementById('register-button').disabled = false;
    }
}