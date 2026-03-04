//Swal toast

window.showToast = function(type, message, duration = 3000) {
    Swal.fire({
        icon: type, // 'success', 'error', 'warning', 'info'
        title: type.charAt(0).toUpperCase() + type.slice(1),
        text: message,
        toast: true,
        position: 'top-end',
        showConfirmButton: false,
        timer: duration,
        timerProgressBar: true,
    });
};
