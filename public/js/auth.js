// alert('hello from auth');
window.isNotTokenPresent = function() {
    let token = sessionStorage.getItem('token');
    if (!token) {
        alert('Please Login!')
        window.location = base_url + '/login';
    }
}
window.isTokenPresent = function() {
    let token = sessionStorage.getItem('token');
    if (token) {
        window.location = base_url + '/dashboard';
    }
}
window.redirectToLogin = function() {
    sessionStorage.removeItem('token');
    window.location = base_url + '/login';
}

window.logout = function () {
    $.ajax({
        type: "POST",
        url: base_api_url + "/logout",
        beforeSend: function(request) {
            request.setRequestHeader("Accept", 'application/json');
            request.setRequestHeader("'Content-Type'", 'application/json');
            request.setRequestHeader("Authorization", `Bearer ${sessionStorage.getItem('token')}`);
        },
        dataType: "json",
        encode: true,
        success: function (data) {
            console.log(data);
            alert('You have been successfully logged out!');
        },
        error: function (xhr) {

            alert(xhr.responseJSON.message);
        }
    }).done(function (data) {
        console.log(data);

        sessionStorage.removeItem('token');
        sessionStorage.removeItem('user');
        window.location = base_url + '/login';
    });
}
