document.addEventListener('DOMContentLoaded', function () {
    const btnReset = document.querySelector('.btn-secondary');
    if (btnReset) {
        btnReset.addEventListener('click', function () {
            console.log('Resetting filter...');
        });
    }

    if (window.matchMedia('(display-mode: standalone)').matches) {
        console.log('Aplikasi berjalan dalam mode Full Screen (PWA)');
    }
});