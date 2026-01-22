<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta property="og:title" content="Espace Santé">
    <meta property="og:description" content="Site web de la Clinique Medico-Social la Pyramide de yopougon complexe (CMSP).">
    <meta property="og:image" content="{{ asset('assets/images/logo.jpg') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Espace Santé">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="base-url" content="{{ url('/') }}" id="url">

    <title>Espace Santé</title>
    <link rel="shortcut icon" href="{{asset('assets/images/logo.jpg')}}">
    <link rel="stylesheet" href="{{asset('assets/fonts/remix/remixicon.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/main.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/overlay-scroll/OverlayScrollbars.min.css')}}">

    <script src="{{asset('jquery.min.js')}}"></script>
    <script src="{{asset('sweetalert.js')}}"></script>
    <script src="{{asset('assets/app/js/vGlobal.js')}}"></script>
    <script src="{{asset('assets/app/js/messageLoader.js') }}"></script>
    <script src="{{asset('assets/app/js/alert.js')}}"></script>
    <script src="{{asset('assets/app/js/format.js')}}"></script>
    <script src="{{ asset('assets/app/js/select.js') }}"></script>
    <script src="{{ asset('assets/app/js/script.js') }}"></script>
    <script src="{{ asset('assets/app/js/password.js') }}"></script>

    <link href="{{asset('assets/vendor/select2/dist/css/select2.min.css')}}" rel="stylesheet" />
    <script src="{{asset('assets/vendor/select2/dist/js/select2.min.js')}}"></script>

    <link rel="stylesheet" href="{{asset('assets/vendor/dataTable2/datatables.css')}}" />
    <script src="{{asset('assets/vendor/dataTable2/datatables.js')}}"></script>
    <script src="{{asset('assets/vendor/dataTable2/datatables_lang_config.js')}}"></script>
    <script src="{{asset('assets/vendor/dataTable2/datatables_lang_config_init.js')}}"></script>

    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bs5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/dataTables.bs5-custom.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/datatables/buttons/dataTables.bs5-custom.css') }}">

</head>

<body>
    <!-- Loading starts -->
    <div id="loading-wrapper" class="bg-white">
        <div class='spin-wrapper'>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
            <div class='spin'>
                <div class='inner'></div>
            </div>
        </div>
        {{-- <img src="{{asset('assets/images/logo.png')}}" height="100" width="150" class="mb-3">
        <div class="d-flex justify-content-center align-items-center">
            <div class="spinner-border text-primary me-3" role="status" aria-hidden="true"></div>
            <strong class="text-success" >Un instant, s'il vous plaît...</strong>
        </div> --}}
    </div>
    <div class="page-wrapper">
        <div class="app-header d-flex align-items-center">
            <div class="d-flex" >
                <button class="toggle-sidebar">
                    <i class="ri-menu-line"></i>
                </button>
                <button class="pin-sidebar">
                    <i class="ri-menu-line"></i>
                </button>
            </div>
            <div class="app-brand ms-3 me-2">
                <a href="" class="d-lg-block d-none">
                    <img src="{{asset('assets/images/logo.jpg')}}" height="40" width="40" class="" style="border-radius: 50%;">
                </a>
                <a href="" class="d-lg-none d-md-block">
                    <img src="{{asset('assets/images/logo.jpg')}}" height="40" width="40" class="" style="border-radius: 50%;">
                </a>
                {{-- <a href="" class="">
                    <img src="{{asset('assets/images/logo.png')}}" height="40" width="40" class="" style="border-radius: 5%; object-fit: cover;">
                </a> --}}
            </div>
            {{-- <marquee>
                Liste des Rendez-Vous : 
            </marquee> --}}
            <div class="d-flex justify-content-center align-items-center text-center w-100 d-sm-block d-none" >
                {{-- <marquee> --}}
                    <h4 class="text-white" >
                        CENTRE MEDICAL LA NOUVELLE AMITIE DE YAMOUSSOUKRO
                    </h4>
                {{-- </marquee> --}}
            </div>
            <div class="header-actions">
                <div class="dropdown ms-2">
                    <a id="userSettings" class="dropdown-toggle d-flex align-items-center" href="#!" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="avatar-box bg-white text-warning">
                            <i class="ri-user-3-line"></i>
                        </div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end shadow-lg">
                        {{-- <div class="px-3 py-2">
                            <span class="small">{{Auth::user()->role}}</span>
                        </div> --}}
                        <div class="px-3 py-2 text-center" >
                            <img src="{{asset('assets/images/user8.png')}}" class="img-shadow img-3x rounded-5 mb-3">
                            <h6 class="mb-1 profile-name text-nowrap text-truncate ">
                                {{session('user_role')}}
                            </h6>
                            <p class="m-0 small profile-name text-nowrap text-truncate">
                                {{-- {{ explode(' ', Auth::user()->user_last_name)[0] }}
                                {{ isset(explode(' ', Auth::user()->name)[1]) ? 
                                explode(' ', Auth::user()->name)[1] : '' }} --}}
                                {{-- {{ Auth::user()->user_first_name }} --}}
                            </p>
                        </div>
                        {{-- <div class="mx-3 my-2 d-grid">
                            <a class="btn btn-primary d-flex align-items-center justify-content-between" data-bs-toggle="modal" data-bs-target="#DetailProfil" id="detailprofil">
                                <span class="me-3" >Mon Profil</span>
                                <i class="ri-user-3-line"></i>
                            </a>
                        </div> --}}
                        <div class="mx-3 my-2 d-grid">
                            <a class="btn btn-warning d-flex align-items-center justify-content-between" data-bs-toggle="modal" data-bs-target="#Parametrage" id="parametrage">
                                <span class="me-3" >Sécurité</span>
                                <i class="ri-settings-4-line"></i>
                            </a>
                        </div>
                        <div class="mx-3 my-2 d-grid">
                            <a href="{{route('deconnecter')}}" class="btn btn-danger d-flex align-items-center justify-content-between">
                                <span class="me-3" >Déconnexion</span>
                                <i class="ri-contract-right-fill"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="infoTB justify-content-center align-items-center">
            <marquee>
                <h6 class="mt-2" style="color: white;">
                    Il est essentiel que la caisse soit fermée en fin de journée pour garantir un suivi précis des opérations de caisse. Merci de votre compréhension.
                </h6>
            </marquee>
        </div>
        <div class="main-container">
            <nav id="sidebar" class="sidebar-wrapper">
                <a class="sidebar-profile" >
                    <img src="{{asset('assets/images/user8.png')}}" class="img-shadow img-3x me-3 rounded-5">
                    <div class="m-0">
                        <h6 class="mb-1 profile-name text-nowrap text-truncate ">
                            {{session('user_role')}}
                        </h6>
                        <p class="m-0 small profile-name text-nowrap text-truncate">
                            {{ explode(' ', Auth::user()->user_last_name)[0] }}
                            {{ isset(explode(' ', Auth::user()->name)[1]) ? 
                            explode(' ', Auth::user()->name)[1] : '' }}
                            {{ Auth::user()->user_first_name }}
                        </p>
                    </div>
                </a>
                <div class="sidebarMenuScroll">
                    <ul class="sidebar-menu">
                        <li @if(request()->routeIs('index_accueil','patient_liste','societe_liste','horaire_medecin','assurance_liste','assureur_liste')) class="active current-page treeview" @else class="treeview" @endif >
                            <a href="#!">
                                <i class="ri-computer-line"></i>
                                <span class="menu-text">
                                    <b>Réception</b>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a @if(request()->routeIs('index_accueil')) style="color: #eb6325" @endif href="{{route('index_accueil')}}">
                                        <b>Tableau de bord</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('assureur_liste')) style="color: #eb6325" @endif href="{{route('assureur_liste')}}">
                                        <b>Assureur</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('assurance_liste')) style="color: #eb6325" @endif href="{{route('assurance_liste')}}">
                                        <b>Assurances</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('patient_liste')) style="color: #eb6325" @endif href="{{route('patient_liste')}}">
                                        <b>Patients</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('societe_liste')) style="color: #eb6325" @endif href="{{route('societe_liste')}}">
                                        <b>Sociétés</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('horaire_medecin')) style="color: #eb6325" @endif href="{{route('horaire_medecin')}}">
                                        <b>Horaires Médecins</b>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li @if(request()->routeIs('hospitalisation','examen','soinsam','consultation_liste')) class="active current-page treeview" @else class="treeview" @endif>
                            <a href="#!">
                                <i class="ri-first-aid-kit-fill"></i>
                                <span class="menu-text">
                                    <b>Services</b>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a @if(request()->routeIs('consultation_liste')) style="color: #eb6325" @endif href="{{route('consultation_liste')}}">
                                        <b>Consultations</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('examen')) style="color: #eb6325" @endif href="{{route('examen')}}">
                                        <b>Examens</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('soinsam')) style="color: #eb6325" @endif href="{{route('soinsam')}}">
                                        <b>Soins Ambulantoires</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('hospitalisation')) style="color: #eb6325" @endif href="{{route('hospitalisation')}}">
                                        <b>Hospitalisations</b>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li @if(request()->routeIs('facture_impayer', 'facture_liste')) class="active current-page treeview" @else class="treeview" @endif >
                            <a href="#!">
                                <i class="ri-safe-2-line"></i>
                                <span class="menu-text">
                                    <b>Caisse</b>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a @if(request()->routeIs('facture_impayer')) style="color: #eb6325" @endif href="{{route('facture_impayer')}}">
                                        <b>Encaissements</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('facture_liste')) style="color: #eb6325" @endif href="{{route('facture_liste')}}">
                                        <b>Liste des Factures</b>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        {{-- @if(Auth::user()->user_profil_id === '1' || Auth::user()->user_profil_id === '10') --}}
                        @if(in_array(Auth::user()->user_profil_id, ['1', '10']))
                        <li @if(request()->routeIs('comptable','operation_caisse')) class="active current-page treeview" @else class="treeview" @endif >
                            <a href="#!">
                                <i class="ri-line-chart-fill"></i>
                                <span class="menu-text">
                                    <b>Comptabilité</b>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a @if(request()->routeIs('comptable')) style="color: #eb6325" @endif href="{{route('comptable')}}">
                                        <b>Tableau de Bord</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('operation_caisse')) style="color: #eb6325" @endif href="{{route('operation_caisse')}}">
                                        <b>Opération de caisse</b>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @endif

                        <li @if(request()->routeIs('facture_emise','facture_depot','facture_deposer')) class="active current-page treeview" @else class="treeview" @endif >
                            <a href="#!">
                                <i class="ri-archive-fill"></i>
                                <span class="menu-text">
                                    <b>Gestions Factures</b>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a @if(request()->routeIs('facture_emise')) style="color: #eb6325" @endif href="{{route('facture_emise')}}">
                                        <b>Emissions Factures</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('facture_depot')) style="color: #eb6325" @endif href="{{route('facture_depot')}}">
                                        <b>Depôts de factures</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('facture_deposer')) style="color: #eb6325" @endif href="{{route('facture_deposer')}}">
                                        <b>Liste des dépôts</b>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li @if(request()->routeIs('medecin_new','assurance_new','taux_new','societe_new','acte_new','typeacte_new','chambre_new','lit_new','typeadmission_new','natureadmission_new','produit_new','typesoins_new','soinsinfirmier_new','specialite','utilisateur','garantie_tarif','user_login')) class="active current-page treeview" @else class="treeview" @endif>
                            <a href="#!">
                                <i class="ri-settings-5-line"></i>
                                <span class="menu-text">
                                    <b>Configuration</b>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a @if(request()->routeIs('garantie_tarif')) style="color: #eb6325" @endif href="{{route('garantie_tarif')}}">
                                        <b>Garanties & Tarifs</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('produit_new')) style="color: #eb6325" @endif href="{{route('produit_new')}}">
                                        <b>Produit Pharmacie</b>
                                    </a>
                                </li>
                                <li @if(request()->routeIs('chambre_new','lit_new','typeadmission_new','natureadmission_new')) class="active" @endif >
                                    <a href="#!">
                                        <b>Hospitalisations</b>
                                        <i class="ri-arrow-right-s-line"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a @if(request()->routeIs('chambre_new')) style="color: #eb6325" @endif href="{{route('chambre_new')}}">Chambre</a>
                                        </li>
                                        <li>
                                            <a @if(request()->routeIs('lit_new')) style="color: #eb6325" @endif href="{{route('lit_new')}}">lit</a>
                                        </li>
                                        <li>
                                            <a @if(request()->routeIs('typeadmission_new')) style="color: #eb6325" @endif href="{{route('typeadmission_new')}}">Type admission</a>
                                        </li>
                                        <li>
                                            <a @if(request()->routeIs('natureadmission_new')) style="color: #eb6325" @endif href="{{route('natureadmission_new')}}">Nature admission</a>
                                        </li>
                                    </ul>
                                </li>
                                <li @if(request()->routeIs('typesoins_new','soinsinfirmier_new')) class="active" @endif >
                                    <a href="#!">
                                        <b>Infirmerie</b>
                                        <i class="ri-arrow-right-s-line"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a @if(request()->routeIs('typesoins_new')) style="color: #eb6325" @endif href="{{route('typesoins_new')}}">
                                                Type Soins
                                            </a>
                                        </li>
                                        <li>
                                            <a @if(request()->routeIs('soinsinfirmier_new')) style="color: #eb6325" @endif href="{{route('soinsinfirmier_new')}}">
                                                Soins Infirmier
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li @if(request()->routeIs('medecin_new','acte_new','typeacte_new','specialite')) class="active" @endif >
                                    <a href="#!">
                                        <b>Médecin & Spécialité</b>
                                        <i class="ri-arrow-right-s-line"></i>
                                    </a>
                                    <ul class="treeview-menu">
                                        <li>
                                            <a @if(request()->routeIs('medecin_new')) style="color: #eb6325" @endif href="{{route('medecin_new')}}">Nouveau</a>
                                        </li>
                                        <li>
                                            <a @if(request()->routeIs('specialite')) style="color: #eb6325" @endif href="{{route('specialite')}}">
                                                Spécialité
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('utilisateur')) style="color: #eb6325" @endif href="{{route('utilisateur')}}">
                                        <b>Employés</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('user_login')) style="color: #eb6325" @endif href="{{route('user_login')}}">
                                        <b>Utilisateur</b>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li @if(request()->routeIs('etat_facture','etat_caisse','etat_acte','etat_prod_pharmacie')) class="active current-page treeview" @else class="treeview" @endif >
                            <a href="#!">
                                <i class="ri-file-pdf-2-line"></i>
                                <span class="menu-text">
                                    <b>Etats</b>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li>
                                    <a @if(request()->routeIs('etat_acte')) style="color: #eb6325" @endif href="{{route('etat_acte')}}">
                                        <b>Actes</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('etat_caisse')) style="color: #eb6325" @endif href="{{route('etat_caisse')}}">
                                        <b>Caisse</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('etat_facture')) style="color: #eb6325" @endif href="{{route('etat_facture')}}">
                                        <b>Factures</b>
                                    </a>
                                </li>
                                <li>
                                    <a @if(request()->routeIs('etat_prod_pharmacie')) style="color: #eb6325" @endif href="{{route('etat_prod_pharmacie')}}">
                                        <b>Produits Utilisés</b>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        @if(in_array(Auth::user()->user_profil_id, ['1','10']))
                        <li @if(request()->routeIs('ud_facture')) class="active current-page" @endif>
                            <a href="{{route('ud_facture')}}">
                                <i class="ri-archive-fill"></i>
                                <span class="menu-text">
                                    <b>Facture UD</b>
                                </span>
                            </a>
                        </li>
                        @endif
                        <li @if(request()->routeIs('index_propos')) class="active current-page" @endif>
                            <a href="{{route('index_propos')}}">
                                <i class="ri-question-fill"></i>
                                <span class="menu-text">
                                    <b>A propos</b>
                                </span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="sidebar-contact">
                    <p class="fw-light mb-1 text-nowrap text-truncate">Emergency Contact</p>
                    <h5 class="m-0 lh-1 text-nowrap text-truncate">0987654321</h5>
                    <i class="ri-phone-line"></i>
                </div>
            </nav>
            <div class="app-container">
                @yield('info_page')
                @yield('content')
                <div class="app-footer text-white text-center">
                    <span class="fs-6" >
                        Copyright © Espace Santé 2024 – Tous droits réservés. Développé par David Kouachi
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="Parametrage" tabindex="-1" aria-modal="true" role="dialog">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title">
                        Mise à jour du Mote de passe
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="modal_parametrage">
                    
                </div>
            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/js/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendor/overlay-scroll/jquery.overlayScrollbars.min.js')}}"></script>
    <script src="{{asset('assets/vendor/overlay-scroll/custom-scrollbar.js')}}"></script>
    <script src="{{asset('assets/vendor/apex/apexcharts.min.js')}}"></script>
    <script src="{{asset('assets/js/custom.js')}}"></script>

    <script src="{{ asset('assets/vendor/datatables/dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/custom/custom-datatables.js') }}"></script>

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {

            // Supposons que vous ayez le login de l'utilisateur connecté
            let userLogin = @json(Auth::user()->login); // Remplacez ceci par la méthode appropriée pour obtenir le login

            // Récupérer l'URL de la page actuelle
            let currentUrl = window.location.href;

            // Récupérer le tableau stocké dans le localStorage, ou initialiser un nouveau tableau s'il n'existe pas
            let userPages = JSON.parse(localStorage.getItem('userPages')) || [];

            // Vérifier si l'utilisateur est déjà présent dans le tableau
            let userIndex = userPages.findIndex(user => user.login === userLogin);

            if (userIndex !== -1) {
                // Mettre à jour l'URL de la dernière page visitée pour cet utilisateur
                userPages[userIndex].lastUrl = currentUrl;
            } else {
                // Ajouter une nouvelle entrée pour le nouvel utilisateur
                userPages.push({ login: userLogin, lastUrl: currentUrl });
            }

            // Stocker le tableau mis à jour dans le localStorage
            localStorage.setItem('userPages', JSON.stringify(userPages));

            // afficher les données de localStorage de la console
            // const storageObject = { ...localStorage };
            // console.log(JSON.stringify(storageObject, null, 2));

        });
    </script> --}}

    {{-- <script>
        document.addEventListener("DOMContentLoaded", function() {

            count_rdv_two_day();

            function count_rdv_two_day() 
            {

                fetch('/api/count_rdv_two_day')
                    .then(response => response.json())
                    .then(data => {
                        const nbre = data.nbre || 0;

                        // console.log(nbre);

                        document.getElementById('div_two_rdv').innerHTML = '';

                        if (nbre > 0) {

                            const div = `
                                <div class="sidebar-contact" style="background-color: red;">
                                    <a class="text-white" href="{{route('rdv_two_day')}}">
                                        <p class="fw-light mb-1 text-nowrap text-truncate">Rendez-Vous dans 2 jours</p>
                                        <h5 class="m-0 lh-1 text-nowrap text-truncate">${nbre}</h5>
                                        <i class="ri-calendar-schedule-line"></i>
                                    </a>
                                </div>
                            `;

                            document.getElementById('div_two_rdv').innerHTML = div;
                        }
                    })
                    .catch(error => console.error('Error fetching data:', error));
            }

            function showAlert(title, message, type) 
            {
                Swal.fire({
                    title: title,
                    text: message,
                    icon: type,
                });
            }

            function formatDate(dateString) 
            {

                const date = new Date(dateString);
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
                const year = date.getFullYear();

                return `${day}/${month}/${year}`; // Format as dd/mm/yyyy
            }

            function formatDateHeure(dateString) 
            {

                const date = new Date(dateString);
                    
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0');
                const year = date.getFullYear();

                const hours = String(date.getHours()).padStart(2, '0');
                const minutes = String(date.getMinutes()).padStart(2, '0');
                const seconds = String(date.getSeconds()).padStart(2, '0');

                return `${day}/${month}/${year} à ${hours}:${minutes}:${seconds}`;
            }

            document.getElementById(`parametrage`).addEventListener('click', () =>
            {
                const modal = document.getElementById('modal_parametrage');
                modal.innerHTML = '';

                const div2 = document.createElement('div');
                div2.className = 'border rounded-2 p-2 mb-3 justify-content-center';
                div2.innerHTML = `
                    <div class="card-body mt-2">
                        <div class="text-center">
                            <a class="d-flex align-items-center flex-column">
                                <img src="{{asset('assets/images/password.png')}}" class="img-7x">
                            </a>
                        </div>
                    </div>
                    <div class="card-header mb-4 text-center mt-3">
                        <h5 class="card-title">Modification du mot de passe</h5>
                    </div>
                    <div class="card-body">
                        <div class="row gx-3">
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Nouveau mot de passe</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password1_para" placeholder="Saisie Obligatoire" autocomplete="off">
                                        <a class="btn btn-white" id="btn_hidden_mpd1">
                                            <i id="toggleIcon1" class="ri-eye-line text-primary"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12">
                                <div class="mb-3">
                                    <label class="form-label">Confirmer le mot de passe</label>
                                    <div class="input-group">
                                        <input type="password" class="form-control" id="password2_para" placeholder="Saisie Obligatoire" autocomplete="off">
                                        <a class="btn btn-white" id="btn_hidden_mpd2">
                                            <i id="toggleIcon2" class="ri-eye-line text-primary"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 mt-3">
                                <div class="mb-3 d-flex gap-2 justify-content-center">
                                    <button id="btn_update_mdp" class="btn btn-outline-primary">
                                        <i class="ri-edit-line me-2"></i>
                                        Mise à jour
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                `;

                // modal.appendChild(div);
                modal.appendChild(div2);

                const btn_mdp = document.getElementById("btn_update_mdp");
                if (btn_mdp) {
                    btn_mdp.addEventListener("click", update_mdp);
                }

                const btn_hidden_mdp1 = document.getElementById("btn_hidden_mpd1");
                if (btn_hidden_mdp1) {

                    btn_hidden_mdp1.addEventListener("click", function(event) {
                        event.preventDefault();
                        const passwordField = document.getElementById('password1_para');
                        const toggleIcon = document.getElementById('toggleIcon1');
                        
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
                }

                const btn_hidden_mdp2 = document.getElementById("btn_hidden_mpd2");
                if (btn_hidden_mdp2) {

                    btn_hidden_mdp2.addEventListener("click", function(event) {
                        event.preventDefault();
                        const passwordField = document.getElementById('password2_para');
                        const toggleIcon = document.getElementById('toggleIcon2');
                        
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
                }
            });

            function update_mdp() 
            {

                const login = @json(Auth::user()->login);
                const mdp1 = document.getElementById("password1_para");
                const mdp2 = document.getElementById("password2_para");

                // Field validation
                if (!mdp1.value.trim() || !mdp2.value.trim()) {
                    showAlert('Alert', 'Veuillez remplir tous les champs SVP.','warning');
                    return false;
                }

                // Phone validation
                if (mdp1.value !== mdp2.value) {
                    showAlert('Alert', 'Mot de passe incorrecte.','warning');
                    return false;
                }

                if (mdp1.value.length < 5 || mdp2.value.length < 5) {
                    showAlert('Alerte', 'Le mot de passe doit contenir au moins 5 caractères.', 'warning');
                    return false;
                }

                var modal = bootstrap.Modal.getInstance(document.getElementById('Parametrage'));
                modal.hide();

                var preloader_ch = `
                    <div id="preloader_ch">
                        <div class="spinner_preloader_ch"></div>
                    </div>
                `;
                document.body.insertAdjacentHTML('beforeend', preloader_ch);

                $.ajax({
                    url: '/refresh-csrf',
                    method: 'GET',
                    success: function(response_crsf) {
                        // Met à jour la balise <meta> avec le nouveau token
                        document.querySelector('meta[name="csrf-token"]').setAttribute('content', response_crsf.csrf_token);

                        $.ajax({
                            url: '/api/update_mdp/' + login,
                            method: 'PUT',
                            headers: {
                                'X-CSRF-TOKEN': response_crsf.csrf_token,
                            },
                            data: {
                                mdp1: mdp1.value,
                            },
                            success: function(response) {

                                document.getElementById('preloader_ch').remove();

                                if (response.success) {

                                    let timerInterval;
                                    Swal.fire({
                                        title: "Opération éffectuée, Veuillez patienter un instant s'il vous plaît",
                                        timer: 2000,
                                        timerProgressBar: true,
                                        didOpen: () => {
                                            Swal.showLoading();
                                            const timer = Swal.getPopup().querySelector("b");
                                            timerInterval = setInterval(() => {
                                                timer.textContent = `${Swal.getTimerLeft()}`;
                                            }, 100);
                                        },
                                        willClose: () => {
                                            clearInterval(timerInterval);
                                        }
                                    }).then((result) => {
                                        if (result.dismiss === Swal.DismissReason.timer) {
                                            location.reload(); // Rafraîchir la page après le timer
                                        }
                                    });


                                } else if (response.error) {

                                    showAlert('Erreur', 'Echec de l\'opération.','error');

                                }
                            },
                            error: function() {
                                document.getElementById('preloader_ch').remove();
                                showAlert('Erreur', 'Erreur lors de la mise à jour.','error');
                            }
                        });
                    },
                    error: function() {
                        console.log("Erreur lors du rafraîchissement du token CSRF");
                        document.getElementById('preloader_ch').remove();
                        showAlert('Erreur', 'Erreur lors de la mise à jour.','error');
                    }
                });
            }

        });
    </script> --}}

    <script>
        window.dataTheme = "{{ base64_encode(json_encode([
            'user' => Auth::user(),
            ])) 
        }}";
    </script>

</body>
</html>