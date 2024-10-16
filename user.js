setTimeout(function() {
    var alertElement = document.querySelector('.alert');
    if (alertElement) {
        alertElement.style.display = 'none';
    }
}, 5000);

const token = localStorage.getItem('user_token');

if (token) {
    console.log('Usuario autenticado, el token es:', token);
} else {
    console.log('No hay token, nunca se ha iniciado sesion');
}