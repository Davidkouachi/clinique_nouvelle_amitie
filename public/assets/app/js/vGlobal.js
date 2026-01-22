$(document).ready(function () {

    window.sessionData = atob(window.dataTheme);
    window.session = JSON.parse(sessionData);

    window.user = session.user;

});