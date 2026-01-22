$(document).ready(function () {

	$('.logoutBtn').on('click', function (e) {
        e.preventDefault();

        console.log('ok');

        confirmAction('Confirmation', 'Êtes-vous sûr de vouloir vous deconnectez ?').then((result) => {
            if (result.isConfirmed) {

                const ModalDeco = `
                    <div id="preloaderLogout" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%;
                        background: rgba(255,255,255,0.8); z-index: 9999; display: flex; align-items: center; justify-content: center;">
                        <div style="text-align: center;">
                            <div class="spinner-border text-danger" role="status"></div>
                            <p style="margin-top: 10px; font-weight: bold;">Déconnexion en cours...</p>
                        </div>
                    </div>`;

                // Ajoute le préloader
                $('body').append(ModalDeco);

                // Optionnel : petit délai pour voir le préloader
                setTimeout(function () {
                    window.location.href = $('.logoutBtn').attr('href');
                }, 1000);
            }
        });
    });  

});