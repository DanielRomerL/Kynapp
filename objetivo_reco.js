async function getRecommendationsFromPanel(panelType) {
    const userData = document.getElementById('userData');
    const objetivo = userData.getAttribute('data-objetivo');
    const actividad = userData.getAttribute('data-actividad');
    const agua = userData.getAttribute('data-agua');
    const peso = userData.getAttribute('data-peso');
    const altura = userData.getAttribute('data-altura');

    Swal.fire({
        title: 'Cargando...',
        text: 'Kynap está preparando una recomendación para ti 😉',
        showConfirmButton: false,
        didOpen: () => {
            Swal.showLoading();
        }
    });

    const response = await fetch('kynap_ai.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ message: prompt })
    });

    const data = await response.json();

    if (data.response) {
        Swal.fire({
            title: 'Redirigiendo...',
            text: 'Te estamos enviando con Kynap AI...',
            showConfirmButton: false,
            timer: 5000,
            icon: 'info'
        }).then(() => {
            sessionStorage.setItem('kynap_mensaje', data.response);
            window.location.href = 'chat.php';
        });
    } else {
        Swal.fire({
            title: 'Error',
            text: 'Ha ocurrido un inconveniente con Kynap AI, lo solucionaremos en breve!',
            icon: 'error',
            confirmButtonText: 'Cerrar'
        });
    }
}
