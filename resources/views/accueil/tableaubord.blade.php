@extends('app')

@section('titre', 'Acceuil')

@section('info_page')
<div class="app-hero-header d-flex align-items-center">
    <!-- Breadcrumb starts -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="ri-bar-chart-line lh-1 pe-3 me-3 border-end"></i>
            <a href="{{route('index_accueil')}}">Espace Santé</a>
        </li>
        <li class="breadcrumb-item d-md-block d-none">
            Tableau de bord
        </li>
    </ol>
    <div class="ms-auto d-flex flex-row justify-content-center align-items-center">
        <div class="d-md-block d-none" >
            <li class="me-2" style="display: block;" id="div_btn_affiche_stat">
                <a class="btn btn-sm btn-warning" id="btn_affiche_stat">
                    Afficher les Statstiques
                    <i class="ri-eye-line" ></i>
                </a>
            </li>
            <li class="me-2" style="display: none;" id="div_btn_cache_stat">
                <a class="btn btn-sm btn-danger" id="btn_cache_stat">
                    Cacher les Statstiques
                    <i class="ri-eye-off-line" ></i>
                </a>
            </li>
        </div>
        <div class="d-flex flex-row gap-1 day-sorting">
            <input type="date" class="form-control" id="stat_bord_date" value="{{ \Carbon\Carbon::now()->toDateString() }}" max="{{ \Carbon\Carbon::now()->toDateString() }}">
        </div>
    </div>

</div>
@endsection

@section('content')

<div class="app-body">
    <div class="row gx-3 mb-5" id="stat_consultation_date" style="display: none;">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="w-100">
                        <div class="input-group">
                            <span class="input-group-text">Du</span>
                            <input type="date" id="searchDate1" placeholder="Recherche" class="form-control me-1" value="{{ date('Y-m-d', strtotime('-1 months')) }}" max="{{ date('Y-m-d') }}">
                            <span class="input-group-text">au</span>
                            <input type="date" id="searchDate2" placeholder="Recherche" class="form-control me-1" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}">
                            <a id="btn_search_stat_const_date" class="btn btn-outline-success ms-auto">
                                <i class="ri-search-2-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-3 mt-0 mb-5" id="stat_consultation" style="display: none;"></div>
    <div class="row gx-3">
        <div class="col-xxl-9 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card mb-3 " style="background: #0f1115 url(assets/images/bg3.jpg) no-repeat;">
                <div class="card-body rounded-2" style="background: rgba(0, 0, 0, 0.2);">
                    <div class="mh-230">
                        <div class="text-white">
                            <h6>Bienvenue,</h6>
                            {{-- <h2>Mr/Mme {{Auth::user()->login}}</h2> --}}
                            <h3>{{ Auth::user()->user_first_name }} {{ Auth::user()->user_last_name }}</h3>
                            <h5>Les statistiques du <strong id="date_bord_text" >{{ \Carbon\Carbon::now()->format('d/m/Y') }}</strong>. (les montants affichés sont ceux des tickets modérateurs)</h5>
                            <div class="mt-3 row gx-3">
                                <div class="d-flex align-items-center col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-3 ">
                                    <div class="icon-box md bg-info rounded-5 me-3">
                                        <i class="ri-archive-fill fs-4"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 id="nbre_fac" class="m-0 lh-1">0</h5>
                                        <p class="m-0">Factures</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="icon-box md bg-success rounded-5 me-3">
                                        <i class="ri-cash-line fs-4"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 id="montant_fac_r" class="m-0 lh-1">0 Fcfa</h5>
                                        <p class="m-0">Montant réglé</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="icon-box md bg-danger rounded-5 me-3">
                                        <i class="ri-cash-line fs-4"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 id="montant_fac_nr" class="m-0 lh-1">0 Fcfa</h5>
                                        <p class="m-0">Montant non-réglé</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="icon-box md bg-warning rounded-5 me-3">
                                        <i class="ri-cash-line fs-4"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 id="total_fac" class="m-0 lh-1">0 Fcfa</h5>
                                        <p class="m-0">Montant Total</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="icon-box md bg-secondary rounded-5 me-3">
                                        <i class="ri-survey-line fs-4 text-primary"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 id="stat_cons" class="m-0 lh-1">0</h5>
                                        <p class="m-0">Consultations</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="icon-box md bg-secondary rounded-5 me-3">
                                        <i class="ri-survey-line fs-4 text-primary"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 id="stat_exam" class="m-0 lh-1">0</h5>
                                        <p class="m-0">Examens</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="icon-box md bg-secondary rounded-5 me-3">
                                        <i class="ri-survey-line fs-4 text-primary"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 id="stat_soins" class="m-0 lh-1">0</h5>
                                        <p class="m-0">Soins Ambulatoires</p>
                                    </div>
                                </div>
                                <div class="d-flex align-items-center col-xxl-3 col-lg-3 col-md-6 col-sm-6 col-12 mb-3">
                                    <div class="icon-box md bg-secondary rounded-5 me-3">
                                        <i class="ri-survey-line fs-4 text-primary"></i>
                                    </div>
                                    <div class="d-flex flex-column">
                                        <h5 id="stat_hosp" class="m-0 lh-1">0</h5>
                                        <p class="m-0">Hospitalisations</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xxl-3 col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card mb-3" style="background: #0f1115 url(assets/images/bg2.jpg) no-repeat;">
                <div class="card-body" style="background: rgba(0, 0, 0, 0.1);">
                    <div class="mh-230 text-white">
                        <h6>Statistiques des consultations de cette semaine</h6>
                        <div class="text-body chart-height-md" id="docActivity" style="margin-top: -30px;">
                        </div>
                        <div id="consultationComparison" style="margin-top: -10px;" ></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="card mb-3" >
                <div class="rounded-2">
                    <div class="card-body d-flex align-items-center justify-content-between" style="background: #f8b61b">
                        <h5 class="card-title text-center text-white fw-bold">
                            Solde des actes d'aujourd'hui.
                        </h5>
                        <div class="d-flex" >
                            <a id="btn_refresh_stat_fac" class="btn btn-danger ms-auto">
                                <i class="ri-loop-left-line"></i>
                            </a>
                        </div>
                    </div>
                    <div class="card-body" id="content_stat_fac"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-3" style="margin-top: 20px;">
        <div class="col-sm-12">
            <div class="card mb-3">
                <div class="card-body" style="margin-top: -32px;">
                    <div class="custom-tabs-container">
                        <ul class="nav nav-tabs justify-content-left" id="customTab4" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="tab-twoAAA" data-bs-toggle="tab" href="#twoAAA" role="tab" aria-controls="twoAAA" aria-selected="false" tabindex="-1">
                                    <i class="ri-file-user-line me-2"></i>
                                    Nouveau patient
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="tab-oneAAA" data-bs-toggle="tab" href="#oneAAA" role="tab" aria-controls="oneAAA" aria-selected="false" tabindex="-1">
                                    <i class="ri-first-aid-kit-line me-2"></i>
                                    Nouvelle consultation
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="tab-threeAAAL" data-bs-toggle="tab" href="#threeAAAL" role="tab" aria-controls="threeAAAL" aria-selected="true">
                                    <i class="ri-calendar-check-line me-2"></i>
                                    Rendez-Vous
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="tab-threeAAA" data-bs-toggle="tab" href="#threeAAA" role="tab" aria-controls="threeAAA" aria-selected="true">
                                    <i class="ri-sticky-note-add-line me-2"></i>
                                    Nouvelle societe
                                </a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="tab-frewAAA" data-bs-toggle="tab" href="#frewAAA" role="tab" aria-controls="frewAAA" aria-selected="true">
                                    <i class="ri-folder-add-line me-2"></i>
                                    Nouvelle Assurance
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content" id="customTabContent">
                            <div class="tab-pane fade active show" id="oneAAA" role="tabpanel" aria-labelledby="tab-oneAAA">
                                <div class="card-header">
                                    <h5 class="card-title text-center">Recherche du Patient</h5>
                                </div>
                                <div class="row gx-3">
                                    <div class="row gx-3 justify-content-center align-items-center" >
                                        <div class="col-12">
                                            <div class=" mb-0">
                                                <div class="card-body">
                                                    <div class="text-center">
                                                        <a class="d-flex align-items-center flex-column">
                                                            <img src="{{asset('assets/images/user8.png')}}" class="img-7x rounded-circle border border-3">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xxl-5 col-lg-6 col-sm-6 col-12">
                                            <div class="mb-3 text-center">
                                                <label class="form-label">
                                                    Nom du patient
                                                </label>
                                                <select class="form-select select2" id="id_patient"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12" id="div_info_patient">
                                    </div>
                                    <div class="col-sm-12" id="div_info_consul" style="display: none;">
                                        <div class="card-header">
                                            <h5 class="card-title text-center">
                                                ACTE A EFFECTUER
                                            </h5>
                                        </div>
                                        <div class="row gx-3">
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Période</label>
                                                    <select class="form-select select2" id="periode">
                                                        <option value=""></option>
                                                        <option value="0">Jour</option>
                                                        <option value="1">Nuit</option>
                                                        <option value="2">Férier</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6" id="div_typeacteS" style="display: block;">
                                                <div class="mb-3">
                                                    <label class="form-label">Acte</label>
                                                    <select class="form-select select2" id="typeacte_idS">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6" id="div_medecin" style="display: none;">
                                                <div class="mb-3">
                                                    <label class="form-label">Medecin</label>
                                                    <select class="form-select select2" id="medecin_id">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6" id="div_numcode" style="display: none;">
                                                <div class="mb-3">
                                                    <label class="form-label">Numéro de bon</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">
                                                            N°
                                                        </span>
                                                        <input type="tel" class="form-control" id="mumcode" placeholder="Facultatif">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6" id="div_assurance_utiliser" style="display: none;">
                                                <div class="mb-3">
                                                    <label class="form-label">Utilisé l'assurance</label>
                                                    <select class="form-select" id="assurance_utiliser">
                                                        <option selected value="oui">Oui</option>
                                                        <option value="non">Non</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Montant Total</label>
                                                    <div class="input-group">
                                                        <input type="tel" class="form-control" id="montant_total">
                                                        <span class="input-group-text">Fcfa</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-header text-center">
                                                <h5 class="card-title">Information Caisse</h5>
                                            </div>
                                            <div class="row gx-3">
                                                <div class="col-xxl-3 col-lg-4 col-sm-6" id="input_part_assurance" style="display: none;">
                                                    <div class="mb-3">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Part Assurance</span>
                                                            <input type="tel" class="form-control" id="montant_assurance">
                                                            <input type="hidden" class="form-control" id="montant_assurance_hidden">
                                                            <span class="input-group-text">Fcfa</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                    <div class="mb-3">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Part Patient</span>
                                                            <input type="tel" class="form-control" id="montant_patient">
                                                            <input type="hidden" class="form-control" id="montant_patient_hidden">
                                                            <span class="input-group-text">Fcfa</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                    <div class="mb-3">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Montant Total</span>
                                                            <input readonly="" type="tel" class="form-control" id="montant_total_acte">
                                                            <span class="input-group-text">Fcfa</span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xxl-3 col-lg-4 col-sm-6" id="div_remise" style="display: block;">
                                                    <div class="mb-3">
                                                        <div class="input-group">
                                                            <span class="input-group-text">Remise</span>
                                                            <input type="tel" class="form-control" id="taux_remise" value="0">
                                                            <span class="input-group-text">Fcfa</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6" id="div_remise_appliq" style="display: none;">
                                                <div class="mb-3">
                                                    <label class="form-label">Application de la remise</label>
                                                    <select class="form-select" id="appliq_remise">
                                                        <option selected value="patient">Patient</option>
                                                        {{-- <option value="assurance">Assurance</option> --}}
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-sm-12 mb-3">
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <a id="btn_remiseForm" class="btn btn-outline-danger">
                                                        Rémise à zéro
                                                    </a>
                                                    <button id="btn_eng_consultation" class="btn btn-success">
                                                        Enregistrer
                                                    </button>
                                                </div>
                                            </div>
                                            <div id="div_alert_consultation" class="mb-3"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="twoAAA" role="tabpanel" aria-labelledby="tab-twoAAA">
                                <div class="card-header">
                                    <h5 class="card-title text-center">Formulaire Nouveau Patient</h5>
                                </div>
                                <div class="card-header">
                                    <div class="text-center">
                                        <a class="d-flex align-items-center flex-column">
                                            <img src="{{asset('assets/images/user8.png')}}" class="img-7x rounded-circle border border-3">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body border border-1 rounded-2 mb-3">
                                    <div class="row gx-3">
                                        <div class="card-header">
                                            <h5 class="card-title text-center">Informations personnelles</h5>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Sexe</label>
                                                <select class="form-select select2" id="patient_sexe_new">
                                                    <option value=""></option>
                                                    <option value="M">Masculin</option>
                                                    <option value="F">Féminin</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nom</label>
                                                <input type="text" class="form-control" id="patient_nom_new" placeholder="Saisie Obligatoire" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Prénoms</label>
                                                <input type="text" class="form-control" id="patient_prenom_new" placeholder="Saisie Obligatoire" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">
                                                    Date de naissance
                                                </label>
                                                <input type="date" class="form-control" placeholder="Selectionner une date" id="patient_datenaiss_new" max="{{ date('Y-m-d') }}">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Contact 1</label>
                                                <input type="tel" class="form-control" id="patient_tel_new" placeholder="Saisie Obligatoire" maxlength="10">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Contact 2</label>
                                                <input type="tel" class="form-control" id="patient_tel2_new" placeholder="facultatif" maxlength="10">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Résidence</label>
                                                <input type="text" class="form-control" id="patient_residence_new" placeholder="Saisie obligatoire">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border border-1 rounded-2 mb-3">
                                    <div class="row gx-3 align-items-center justify-content-center">
                                        <div class="card-header">
                                            <h5 class="card-title text-center">Informations Assurance</h5>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Assurer</label>
                                                <select class="form-select" id="assure">
                                                    <option value="">Selectionner</option>
                                                    <option value="0">Non</option>
                                                    <option value="1">Oui</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="row gx-3" id="div_assurer" style="display: none;">
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Filiation</label>
                                                    <select class="form-select select2" id="patient_codefiliation_new">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Assurance</label>
                                                    <select class="form-select select2" id="patient_codeassurance_new">
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Matricule assurance</label>
                                                    <input type="text" class="form-control" id="patient_matriculeA_new" placeholder="Saisie Obligatoire">
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Taux</label>
                                                    <select class="form-select select2" id="patient_idtauxcouv_new">
                                                        <option value="">Sélectionner un taux</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-xxl-3 col-lg-4 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Société</label>
                                                    <select class="form-select select2" id="patient_codesocieteassure_new">
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body border border-1 rounded-2 mb-3">
                                    <div class="row gx-3">
                                        <div class="card-header">
                                            <h5 class="card-title text-center">En Cas d'urgence</h5>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nom</label>
                                                <input type="text" class="form-control" id="patient_nomu_new" placeholder="facultatif" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Contact 1</label>
                                                <input type="tel" class="form-control" id="patient_telu_new" placeholder="facultatif" maxlength="10">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Contact 2</label>
                                                <input type="tel" class="form-control" id="patient_telu2_new" placeholder="facultatif" maxlength="10">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body mb-3">
                                    <div class="row gx-3">
                                        <div class="col-sm-12 mb-3">
                                            <div class="d-flex gap-2 justify-content-center">
                                                <button id="btn_eng_patient" class="btn btn-success">
                                                    Enregistrer
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="threeAAAL" role="tabpanel" aria-labelledby="tab-threeAAAL">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="card-title">Listes de Rendez-Vous du jour</h5>
                                    <div class="d-flex">
                                        <a id="btn_refresh_table_rdv" class="btn btn-outline-info ms-auto">
                                            <i class="ri-loop-left-line"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <div class="table-responsive">
                                            <table id="Table_day" class="table align-middle table-hover m-0 truncate Table_day_rdv">
                                                <thead>
                                                    <tr>
                                                        <th>N°</th>
                                                        <th>Patient</th>
                                                        <th>Contact</th>
                                                        <th>Médecin</th>
                                                        <th>Spécialité</th>
                                                        <th>Rdv prévu</th>
                                                        <th>Statut</th>
                                                        <th>Date de création</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="threeAAA" role="tabpanel" aria-labelledby="tab-threeAAA">
                                <div class="card-header">
                                    <h5 class="card-title text-center">Formulaire Nouvelle Societe</h5>
                                </div>
                                <div class="card-header">
                                    <div class="text-center">
                                        <a class="d-flex align-items-center flex-column">
                                            <img src="{{asset('assets/images/batiment.avif')}}" class="img-7x rounded-circle border border-3">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body" >
                                    <div class="row gx-3 alig-items-center justify-content-center">
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nom de la société</label>
                                                <input type="text" class="form-control" id="nom_societe" placeholder="Saisie Obligatoire" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Assurance</label>
                                                <select class="form-select select2" id="codeassurance_societe">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Assureur</label>
                                                <select class="form-select select2" id="assureur_id_societe">
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-sm-12 mb-3 ">
                                            <div class="d-flex gap-2 justify-content-center">
                                                <button id="btn_eng_societe" class="btn btn-outline-success">
                                                    Enregistrer
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="frewAAA" role="tabpanel" aria-labelledby="tab-frewAAA">
                                <div class="card-header">
                                    <h5 class="card-title text-center">
                                        Formulaire Nouvelle Assurance
                                    </h5>
                                </div>
                                <div class="card-header">
                                    <div class="text-center">
                                        <a class="d-flex align-items-center flex-column">
                                            <img src="{{asset('assets/images/assurance3.jpg')}}" class="img-7x rounded-circle border border-3">
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body" >
                                    <div class="row gx-3">
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Nom</label>
                                                <input type="text" class="form-control" id="nom_assurance_new" placeholder="Saisie Obligatoire" oninput="this.value = this.value.toUpperCase()">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Email</label>
                                                <input required type="email" class="form-control" id="email_assurance_new" placeholder="Saisie Obligatoire">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Contact</label>
                                                <input type="tel" class="form-control" id="tel_assurance_new" placeholder="Saisie Obligatoire" maxlength="10">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label" >Fax</label>
                                                <input type="text" class="form-control" id="fax_assurance_new" placeholder="Facultatif">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Adresse</label>
                                                <input type="text" class="form-control" id="adresse_assurance_new" placeholder="Saisie Obligatoire">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Localisation</label>
                                                <input type="text" class="form-control" id="carte_assurance_new" placeholder="Saisie Obligatoire">
                                            </div>
                                        </div>
                                        <div class="col-xxl-3 col-lg-4 col-sm-6">
                                            <div class="mb-3">
                                                <label class="form-label">Description</label>
                                                <input type="text" class="form-control" id="desc_assurance_new" placeholder="Facultatif">
                                            </div>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="d-flex gap-2 justify-content-center">
                                                <button id="btn_eng_assurance" class="btn btn-success">
                                                    Enregistrer
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-3" >
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title text-center">
                        Patient recu Aujourd'hui
                    </h5>
                    <div class="d-flex" >
                        <a id="btn_refresh_table" class="btn btn-outline-info ms-auto">
                            <i class="ri-loop-left-line"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="table-responsive">
                            <table id="Table_day" class="table Table_day_cons ">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        {{-- <th scope="col">N° Consultation</th> --}}
                                        <th scope="col">N° dossier</th>
                                        <th scope="col">Nom et Prénoms</th>
                                        {{-- <th scope="col">Contact</th> --}}
                                        <th scope="col">Médecin Consultant</th>
                                        <th scope="col">Motif</th>
                                        <th scope="col">Prix</th>
                                        <th scope="col">N° Facture</th>
                                        <th scope="col">Date</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Detail_motif" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-body" id="modal_Detail_motif"></div>
    </div>
</div>

<div class="modal fade" id="MdeleteCons" tabindex="-1" aria-labelledby="delRowLabel" aria-modal="true" role="dialog">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="delRowLabel">
                    Confirmation
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Voulez-vous vraiment supprimé cette consultation ?
                <input type="hidden" id="IddeleteCons">
            </div>
            <div class="modal-footer">
                <div class="d-flex justify-content-end gap-2">
                    <a class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Non</a>
                    <button id="deleteBtnCons" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close">Oui</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('assets/vendor/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('jsPDF-master/dist/jspdf.umd.js')}}"></script>
<script src="{{asset('assets/app/js/pdf/para.js')}}"></script>
<script src="{{asset('assets/app/js/pdf/consultation.js')}}"></script>
<script src="{{asset('assets/app/js/module/reception/tableauBord.js')}}"></script>

@include('select2')

@endsection
