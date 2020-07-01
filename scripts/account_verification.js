$(document).ready(function() {
    $.ajax({
        url: 'login_status.php',
        type: 'POST',
        data: {'logged': 0, 'admin': 0, 'active': 0 },
        dataType: 'json',
        success: function(data) {
            if (data[2]) {
                document.getElementById('account-verify').innerHTML = 'Your account has been verified.';
            } else {
                document.getElementById('account-verify').innerHTML = 'Your account has not been verified.';
            }
        }
    });
});