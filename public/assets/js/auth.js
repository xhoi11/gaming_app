// alert('hello from auth');

window.isNotTokenPresent = function () {
    let token = sessionStorage.getItem('token');

    if(! token) {
        alert('Please Login!')
        window.location = base_url + '/login';
    }
}

window.isTokenPresent = function () {
    let token = sessionStorage.getItem('token');

    if(token) {
        window.location = base_url + '/dashboard';
    }
}

window.redirectToLogin = function () {
    sessionStorage.removeItem('token');

    window.location = base_url + '/login';
}


