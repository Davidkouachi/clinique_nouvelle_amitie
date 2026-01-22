<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:title" content="Admin Templates - Dashboard Templates">
    <meta property="og:description" content="Marketplace for Bootstrap Admin Dashboards">
    <meta property="og:type" content="Website">
    <link rel="shortcut icon" href="{{asset('assets/images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/remix/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <script src="{{asset('jquery.min.js')}}"></script>

    <script src="{{asset('sweetalert.js')}}"></script>

    <script src="{{asset('assets/app/js/loader.js')}}"></script>
</head>

<body class="login-bg" style="font-family: sans-serif; font-weight: bold;">
    <div style="background: rgba(0, 0, 0, 0.5);" >
        <div class="container">
            <div class="auth-wrapper">
                <form id="formulaire">
                    <div class="auth-box" style="max-width: 600px;" >
                        <div class="text-center mb-4" >
                            <a class="mb-4" >
                                <img height="120" width="120" src="{{asset('assets/images/logo.jpg')}}" alt="Bootstrap Gallery">
                            </a>
                            {{-- <h4 class="mt-4 text-primary ">Se connecter</h4> --}}
                        </div>
                        <div class="nk-block-head mb-3">
                            <div class="nk-block-head-content text-center">
                                <div class="nk-block-des">
                                    <p>Plateforme de gestion santé</p>
                                </div>
                            </div>
                        </div>
                        <div class="div_form">
                            <div class="mb-3">
                                <label class="form-label">login</label>
                                <input type="text" id="login" class="form-control" placeholder="Entrer votre Login">
                            </div>
                            <div class="mb-4">
                                <label class="form-label" for="pwd">Mot de passe</label>
                                <div class="input-group">
                                    <input type="password" id="pwd" class="form-control" placeholder="Entrer votre mot de passe">
                                    <a class="btn btn-white" id="btn_hidden_mpd">
                                        <i id="toggleIcon" class="ri-eye-line text-primary"></i>
                                    </a>
                                </div>
                            </div>
                            <p id="alert" class="text-danger" style="width: 300px;" ></p>
                            <div class="mb-3 d-grid gap-2">
                                <button type="submit" class="btn btn-success btnConnexion d-flex align-items-center justify-content-center">
                                    <span>Connexion</span>
                                </button>
                            </div>
                        </div>
                        <div class="div_form2 d-flex align-items-center justify-content-center d-none">
                            <span class="badge bg-warning pt-2 px-3">
                                <h6>Compte connecté</h6>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/moment.min.js')}}"></script>

    {{-- <script>
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        console.log("Token CSRF:", csrfToken);
    </script> --}}

    <script>
        $(document).ready(function () {

            function showAlert(title, message, type) {
                Swal.fire({
                    title: title,
                    text: message,
                    icon: type,
                });
            }

            document.getElementById("btn_hidden_mpd").addEventListener("click", function(event) {
                event.preventDefault();
                const passwordField = document.getElementById('pwd');
                const toggleIcon = document.getElementById('toggleIcon');
                
                // Toggle the type attribute
                if (passwordField.type === 'password') {
                    passwordField.type = 'text';
                    toggleIcon.classList.remove('ri-eye-line');
                    toggleIcon.classList.add('ri-eye-off-line');
                } else {
                    passwordField.type = 'password';
                    toggleIcon.classList.remove('ri-eye-off-line');
                    toggleIcon.classList.add('ri-eye-line');
                }
            });

            document.getElementById("formulaire").addEventListener("submit", function(event) {

                event.preventDefault();

                var login = document.getElementById("login");
                var password = document.getElementById("pwd");
                const alert = document.getElementById("alert");

                if (!login.value.trim() || !password.value.trim()) {
                    alert.innerHTML = 'Veuillez remplir tous les champs';
                    return false;
                }

                // var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                // var phoneRegex = /^[0-9]{10}$/;
                // if (!emailRegex.test(login.value) && !phoneRegex.test(login.value)) {
                //     alert.innerHTML = 'Veuillez saisir une adresse e-mail valide.';
                //     return false;
                // }

                spinerButton(0, '.btnConnexion', 'Vérification');

                {{-- console.log('spinerButton'); --}}

                let userPages = localStorage.getItem('userPages');

                let userPagesString = null;

                if (userPages) {

                    userPages = JSON.parse(userPages);

                    userPagesString = JSON.stringify({ userPages: userPages });

                }

                $.ajax({
                    url: '/refresh-csrf',
                    method: 'GET',
                    dataType: 'json', // 👈 Important
                    success: function(response_crsf) {

                        if (!response_crsf.csrf_token) {
                            spinerButton(1, '.btnConnexion', 'Connexion');
                            showAlert('Alerte', 'Impossible de rafraichir le formulaire','warning');
                            return;
                        }

                        document.querySelector('meta[name="csrf-token"]').setAttribute('content', response_crsf.csrf_token);
                        {{-- console.log("Nouveau token CSRF:", response_crsf.csrf_token); --}}

                        $.ajax({
                            url: '/api/trait_login',
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': response_crsf.csrf_token,
                            },
                            data: {
                                login: login.value, 
                                password: password.value,
                                userPage: userPagesString,
                            },
                            xhrFields: {
                                withCredentials: true
                            },
                            success: function(response) {

                                if (response.success) {

                                    {{-- Swal.fire({
                                        title: "Rédirection en cours...",
                                        html: "Veuillez patienter.",
                                        allowOutsideClick: false, // Empêche de fermer en cliquant à l'extérieur
                                        showConfirmButton: false, // Supprime le bouton de confirmation
                                        willOpen: () => {
                                            Swal.showLoading(); // Affiche l'animation du spinner
                                        }
                                    }); --}}

                                    {{-- console.log('spinerButton fin'); --}}

                                    spinerButton(0, '.btnConnexion', 'Rédirection en cours');
                                    
                                    window.location.href = '/';
                                    {{-- redirectTo(response.login); --}}


                                }else if (response.error) {
                                    spinerButton(1, '.btnConnexion', 'Connexion');
                                    showAlert('Alerte', 'Login ou Mot de passe incorrecte' ,'info');

                                }
                            },
                            error: function() {
                                spinerButton(1, '.btnConnexion', 'Connexion');
                                showAlert('Erreur', 'Erreur lors de l\' authentification. veuillez réessayer','warning');
                            }
                        });

                    },
                    error: function() {
                        // console.log("Erreur lors du rafraîchissement du token CSRF");
                        
                        spinerButton(1, '.btnConnexion', 'Connexion');
                        showAlert('Erreur', 'Erreur est survenue lors du rafraîchissement du token.', 'error');
                    }
                });
            });

            {{-- function redirectTo(login)
            {

                let userLogin = login; // Remplacez ceci par la méthode appropriée pour obtenir le login

                // Récupérer le tableau stocké dans le localStorage, ou initialiser un nouveau tableau s'il n'existe pas
                let userPages = JSON.parse(localStorage.getItem('userPages')) || [];

                // Vérifier si l'utilisateur est déjà présent dans le tableau
                let userIndex = userPages.findIndex(user => user.login === userLogin);

                if (userIndex !== -1) {

                    window.location.href = userPages[userIndex].lastUrl;
                } else {

                    window.location.href = '/';
                }
            } --}}

        });
    </script>   

</body>

</html>
