@extends('app')

@section('titre', 'Nouveau Produit')

@section('info_page')
<div class="app-hero-header d-flex align-items-center">
    <!-- Breadcrumb starts -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="ri-bar-chart-line lh-1 pe-3 me-3 border-end"></i>
            <a href="{{route('index_accueil')}}">Espace Santé</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
            Encaissement
        </li>
    </ol>
</div>
@endsection

@section('content')

<div class="app-body">

    <div class="row justify-content-center" id="div_caisse_verf" style="display: none;">
        <div class="col-12">
            <div class="card mb-3 cadreTitle">
                <div class="rounded-2">
                    <div class="card-body row gx-3 d-flex align-items-center justify-content-between">
                        <div class="col-12">
                            <div class="mb-3 text-center">
                                <a class="d-flex align-items-center flex-column">
                                    <img src="{{asset('assets/images/caisse.jpg')}}" class="img-7x rounded-circle border border-3">
                                </a>
                            </div>
                        </div>
                        <div class="col-12" id="btn_ouvert">
                            <div class="mb-1 text-center">
                                <button id="btn_ouvert_C" type="button" class="btn btn-success">
                                    Ouverture de Caisse
                                    <i class="ri-door-open-line"></i>
                                </button>
                            </div>
                        </div>
                        <div class="col-12" id="btn_fermer">
                            <div class="mb-1 text-center">
                                <button id="btn_fermer_C" type="button" class="btn btn-danger">
                                    Fermeture de Caisse
                                    <i class="ri-door-close-line"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="div_caisse" style="display: none;" >
        
        <div class="row gx-3" >
            <div class="col-sm-12">
                <div class="card mb-3 mt-3">
                    <div class="card-body" style="margin-top: -30px;">
                        <div class="custom-tabs-container">
                            <ul class="nav nav-tabs justify-content-left" id="customTab4" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link active" id="tab-twoA1" data-bs-toggle="tab" href="#twoA1" role="tab" aria-controls="twoA1" aria-selected="false" tabindex="-1">
                                        <i class="ri-article-line me-2"></i>
                                        Consulation(s)
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tab-twoA2" data-bs-toggle="tab" href="#twoA2" role="tab" aria-controls="twoA2" aria-selected="false" tabindex="-1">
                                        <i class="ri-article-line me-2"></i>
                                        Examen(s)
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tab-twoA3" data-bs-toggle="tab" href="#twoA3" role="tab" aria-controls="twoA3" aria-selected="false" tabindex="-1">
                                        <i class="ri-article-line me-2"></i>
                                        Hospitalisation(s)
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tab-twoA4" data-bs-toggle="tab" href="#twoA4" role="tab" aria-controls="twoA4" aria-selected="false" tabindex="-1">
                                        <i class="ri-article-line me-2"></i>
                                        Soins Ambulatoire(s)
                                    </a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="tab-twoA5" data-bs-toggle="tab" href="#twoA5" role="tab" aria-controls="twoA5" aria-selected="false" tabindex="-1">
                                        <i class="ri-article-line me-2"></i>
                                        Attribution Remise
                                    </a>
                                </li>
                            </ul>
                            <div class="tab-content" id="customTabContent">
                                <div class="tab-pane active show fade" id="twoA1" role="tabpanel" aria-labelledby="tab-twoA1">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="card-title">
                                            Consultation(s)
                                        </h5>
                                        <div class="d-flex" >
                                            <input type="text" id="facture_num_cons" placeholder="N° Facture" class="form-control me-2">
                                            <a id="btn_refresh_table_Cons" class="btn btn-outline-success ms-auto">
                                                <i class="ri-search-2-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <div class="table-responsive">
                                                <table id="Table_day" class="table align-middle table-hover m-0 truncate Table_Cons">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">N°</th>
                                                            <th scope="col">N° facture</th>
                                                            <th scope="col">Part Assurance</th>
                                                            <th scope="col">Part Patient</th>
                                                            <th scope="col">Remise</th>
                                                            <th scope="col">Total</th>
                                                            <th scope="col">Reste à payer</th>
                                                            <th scope="col">Date de création</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="twoA2" role="tabpanel" aria-labelledby="tab-twoA2"> 
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="card-title">
                                            Examen(s)
                                        </h5>
                                        <div class="d-flex" >
                                            <input type="text" id="facture_num_exam" placeholder="N° Facture" class="form-control me-2">
                                            <a id="btn_refresh_table_Exam" class="btn btn-outline-success ms-auto">
                                                <i class="ri-search-2-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <div class="table-responsive">
                                                <table id="Table_day" class="table align-middle table-hover m-0 truncate Table_Exam">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">N°</th>
                                                            <th scope="col">N° facture</th>
                                                            <th scope="col">Type d'examen</th>
                                                            <th scope="col">Prélevement</th>
                                                            <th scope="col">Montant Examen</th>
                                                            <th scope="col">Montant Total</th>
                                                            <th scope="col">Part Assurance</th>
                                                            <th scope="col">Montant a payer</th>
                                                            <th scope="col">Reste à payer</th>
                                                            <th scope="col">Date de création</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="twoA3" role="tabpanel" aria-labelledby="tab-twoA3">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="card-title">
                                            Hospitalisation(s)
                                        </h5>
                                        <div class="d-flex" >
                                            <input type="text" id="facture_num_hos" placeholder="N° Facture" class="form-control me-2">
                                            <a id="btn_refresh_table_Hos" class="btn btn-outline-success ms-auto">
                                                <i class="ri-search-2-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <div class="table-responsive">
                                                <table id="Table_day" class="table align-middle table-hover m-0 truncate Table_Hos">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">N°</th>
                                                            <th scope="col">Id facture</th>
                                                            <th scope="col">Montant Total</th>
                                                            <th scope="col">Part Assurance</th>
                                                            <th scope="col">Montant à payer</th>
                                                            <th scope="col">Remise</th>
                                                            <th scope="col">Reste à payer</th>
                                                            <th scope="col">Date de création</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="twoA4" role="tabpanel" aria-labelledby="tab-twoA4">
                                    <div class="card-header d-flex align-items-center justify-content-between">
                                        <h5 class="card-title">
                                            Soins Amulatoire(s)
                                        </h5>
                                        <div class="d-flex" >
                                            <input type="text" id="facture_num_soinsam" placeholder="N° Facture" class="form-control me-2">
                                            <a id="btn_refresh_table_Soinsam" class="btn btn-outline-success ms-auto">
                                                <i class="ri-search-2-line"></i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <div class="">
                                            <div class="table-responsive">
                                                <table id="Table_day" class="table align-middle table-hover m-0 truncate Table_Soinsam">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">N°</th>
                                                            <th scope="col">N° facture</th>
                                                            <th scope="col">Montant Total</th>
                                                            <th scope="col">Montant Produit</th>
                                                            <th scope="col">Montant Soins</th>
                                                            <th scope="col">Remise</th>
                                                            <th scope="col">Montant a payer</th>
                                                            <th scope="col">Part Assurance</th>
                                                            <th scope="col">Reste à payer</th>
                                                            <th scope="col">Date de création</th>
                                                            <th scope="col">Actions</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="twoA5" role="tabpanel" aria-labelledby="tab-twoA5">
                                    <div class="card-header d-flex align-items-center justify-content-center">
                                        <h5 class="card-title">
                                            Attribution Remise
                                        </h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="row gx-3 justify-content-center align-items-center">
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Acte</label>
                                                    <select class="form-select select2" id="acte_remise">
                                                        <option value="">Selectionner</option>
                                                        <option value="cons">Consultations</option>
                                                        <option value="exam">Examens</option>
                                                        <option value="soins">Soins Ambulatoires</option>
                                                        <option value="hosp">Hospitalisations</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">N° Facture</label>
                                                    <div class="input-group">
                                                        <span class="input-group-text">N°</span>
                                                        <input type="text" class="form-control" id="numfac_remise" autocomplete="off" placeholder="Saisie Obligatoire">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-sm-6">
                                                <div class="mb-3">
                                                    <label class="form-label">Remise</label>
                                                    <div class="input-group">
                                                        <input type="tel" class="form-control" id="montant_remise" value="0">
                                                        <span class="input-group-text">Fcfa</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 mb-5 text-center">
                                                <button type="button" id="btn_eng_remise" class="btn btn-success">
                                                    Enregistrer
                                                    <i class="ri-send-plane-fill"></i>
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
</div>

<div class="modal fade" id="Caisse_Cons" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Caisse
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gx-3">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">A payer</label>
                            <div class="input-group">
                                <input readonly class="form-control" id="input_montant_payer_Cons">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Montant versé</label>
                            <div class="input-group">
                                <input type="tel" class="form-control" id="input_montant_verser_Cons" placeholder="Saisie Obligatoire">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Montant Remis</label>
                            <div class="input-group">
                                <input readonly type="tel" class="form-control" id="input_montant_remis_Cons" placeholder="Saisie Obligatoire">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Reste à payer</label>
                            <div class="input-group">
                                <input readonly type="tel" class="form-control" id="input_montant_restant_Cons" placeholder="Saisie Obligatoire">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="div_btn_valider_Cons">
                <input type="hidden" id="id_code_fac_Cons">
                <input type="hidden" id="id_Cons">
                <input type="hidden" id="matricule_Cons">
                <button data-bs-dismiss="modal" class="btn btn-success" id="btn_valider_Cons" >
                    Validé
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Caisse_Exam" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Caisse
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gx-3">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">A payer</label>
                            <div class="input-group">
                                <input readonly class="form-control" id="input_montant_payer_Exam">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Montant versé</label>
                            <div class="input-group">
                                <input type="tel" class="form-control" id="input_montant_verser_Exam" placeholder="Saisie Obligatoire">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Montant Remis</label>
                            <div class="input-group">
                                <input readonly type="tel" class="form-control" id="input_montant_remis_Exam" placeholder="Saisie Obligatoire">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Reste à payer</label>
                            <div class="input-group">
                                <input readonly type="tel" class="form-control" id="input_montant_restant_Exam" placeholder="Saisie Obligatoire">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="div_btn_valider_Exam">
                <input type="hidden" id="id_code_fac_Exam">
                <input type="hidden" id="id_Exam">
                <input type="hidden" id="matricule_Exam">
                <button data-bs-dismiss="modal" class="btn btn-success" id="btn_valider_Exam" >
                    Validé
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Caisse_Hos" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Caisse
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gx-3">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">A payer</label>
                            <div class="input-group">
                                <input readonly class="form-control" id="input_montant_payer_Hos">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Montant versé</label>
                            <div class="input-group">
                                <input type="tel" class="form-control" id="input_montant_verser_Hos" placeholder="Saisie Obligatoire">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Montant Remis</label>
                            <div class="input-group">
                                <input readonly type="tel" class="form-control" id="input_montant_remis_Hos" placeholder="Saisie Obligatoire">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Reste à payer</label>
                            <div class="input-group">
                                <input readonly type="tel" class="form-control" id="input_montant_restant_Hos" placeholder="Saisie Obligatoire">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="div_btn_valider_Hos">
                <input type="hidden" id="id_code_fac_Hos">
                <input type="hidden" id="id_Hos">
                <input type="hidden" id="matricule_Hos">
                <button data-bs-dismiss="modal" class="btn btn-success" id="btn_valider_Hos" >
                    Validé
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="Caisse_Soinsam" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-dialog-centered modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Caisse
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row gx-3">
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">A payer</label>
                            <div class="input-group">
                                <input readonly class="form-control" id="input_montant_payer_Soinsam">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Montant versé</label>
                            <div class="input-group">
                                <input type="tel" class="form-control" id="input_montant_verser_Soinsam" placeholder="Saisie Obligatoire">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Montant Remis</label>
                            <div class="input-group">
                                <input readonly type="tel" class="form-control" id="input_montant_remis_Soinsam" placeholder="Saisie Obligatoire">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="mb-3">
                            <label class="form-label">Reste à payer</label>
                            <div class="input-group">
                                <input readonly type="tel" class="form-control" id="input_montant_restant_Soinsam" placeholder="Saisie Obligatoire">
                                <span class="input-group-text">Fcfa</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" id="div_btn_valider_Soinsam">
                <input type="hidden" id="id_code_fac_Soinsam">
                <input type="hidden" id="id_Soinsam">
                <input type="hidden" id="matricule_Soinsam">
                <button data-bs-dismiss="modal" class="btn btn-success" id="btn_valider_Soinsam" >
                    Validé
                </button>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('jsPDF-master/dist/jspdf.umd.js')}}"></script>
<script src="{{asset('jsPDF-AutoTable/dist/jspdf.plugin.autotable.min.js')}}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        caisse_verf();

        document.getElementById("btn_valider_Cons").addEventListener("click", payer_Cons);
        document.getElementById("btn_valider_Exam").addEventListener("click", payer_Exam);
        document.getElementById("btn_valider_Hos").addEventListener("click", payer_Hos);
        document.getElementById("btn_valider_Soinsam").addEventListener("click", payer_Soinsam);

        document.getElementById('input_montant_payer_Cons').addEventListener('input', function() 
        {

            let rawValue = this.value.replace(/[^0-9]/g, '');

            if (rawValue == null || rawValue == '')
            {
                rawValue = 0;
            }
            
            // Ajouter des points pour les milliers
            let formattedValue = formatPrice(rawValue);
            
            // Mettre à jour la valeur du champ avec la valeur formatée
            this.value = formattedValue;

            document.getElementById('input_montant_verser_Cons').value = 0;
            document.getElementById('input_montant_remis_Cons').value = 0;
            document.getElementById('input_montant_restant_Cons').value = formattedValue;
        });
        document.getElementById('input_montant_verser_Cons').addEventListener('input', function() 
        {
            let rawValue = this.value.replace(/[^0-9]/g, ''); // Supprimer tous les caractères non numériques
            
            // Ajouter des points pour les milliers
            let formattedValue = formatPrice(rawValue);
            
            // Mettre à jour la valeur du champ avec la valeur formatée
            this.value = formattedValue;

            // Convertir la valeur formatée en nombre pour les calculs
            let montantPayer = parseFloat(document.getElementById('input_montant_payer_Cons').value.replace(/\./g, '')) || 0;
            let montantVerser = parseFloat(rawValue) || 0;

            // Calculer le montant remis
            let montantRemis = montantVerser - montantPayer;
            if (montantRemis < 0) {
                montantRemis = 0;
            }
            document.getElementById('input_montant_remis_Cons').value = `${formatPrice(montantRemis)}`;

            // Calculer le montant restant
            let montantRestant = montantPayer - montantVerser ;
            if (montantRestant < 0) {
                montantRestant = 0 ;
            }
            document.getElementById('input_montant_restant_Cons').value = `${formatPrice(montantRestant)}`;
        });
        document.getElementById('input_montant_verser_Cons').addEventListener('keypress', function(event) 
        {
            // Permettre uniquement les chiffres et le point
            let  key = event.key;
            if (isNaN(key)) {
                event.preventDefault();
            }
        });
        document.getElementById('input_montant_verser_Cons').addEventListener('input', function(event) 
        {
            let  inputField = event.target;

            if (inputField.value === '') {
                inputField.value = '0';
            }
        });

        document.getElementById('input_montant_payer_Exam').addEventListener('input', function() 
        {

            let rawValue = this.value.replace(/[^0-9]/g, '');

            if (rawValue == null || rawValue == '')
            {
                rawValue = 0;
            }
            
            // Ajouter des points pour les milliers
            let formattedValue = formatPrice(rawValue);
            
            // Mettre à jour la valeur du champ avec la valeur formatée
            this.value = formattedValue;

            document.getElementById('input_montant_verser_Exam').value = 0;
            document.getElementById('input_montant_remis_Exam').value = 0;
            document.getElementById('input_montant_restant_Exam').value = formattedValue;
        });
        document.getElementById('input_montant_verser_Exam').addEventListener('input', function() 
        {
            let rawValue = this.value.replace(/[^0-9]/g, ''); // Supprimer tous les caractères non numériques
            
            // Ajouter des points pour les milliers
            let formattedValue = formatPrice(rawValue);
            
            // Mettre à jour la valeur du champ avec la valeur formatée
            this.value = formattedValue;

            // Convertir la valeur formatée en nombre pour les calculs
            let montantPayer = parseFloat(document.getElementById('input_montant_payer_Exam').value.replace(/\./g, '')) || 0;
            let montantVerser = parseFloat(rawValue) || 0;

            // Calculer le montant remis
            let montantRemis = montantVerser - montantPayer;
            if (montantRemis < 0) {
                montantRemis = 0;
            }
            document.getElementById('input_montant_remis_Exam').value = `${formatPrice(montantRemis)}`;

            // Calculer le montant restant
            let montantRestant = montantPayer - montantVerser ;
            if (montantRestant < 0) {
                montantRestant = 0 ;
            }
            document.getElementById('input_montant_restant_Exam').value = `${formatPrice(montantRestant)}`;
        });
        document.getElementById('input_montant_verser_Exam').addEventListener('keypress', function(event) 
        {
            // Permettre uniquement les chiffres et le point
            let  key = event.key;
            if (isNaN(key)) {
                event.preventDefault();
            }
        });
        document.getElementById('input_montant_verser_Exam').addEventListener('input', function(event) 
        {
            let  inputField = event.target;

            if (inputField.value === '') {
                inputField.value = '0';
            }
        });

        document.getElementById('input_montant_payer_Soinsam').addEventListener('input', function() 
        {

            let rawValue = this.value.replace(/[^0-9]/g, '');

            if (rawValue == null || rawValue == '')
            {
                rawValue = 0;
            }
            
            // Ajouter des points pour les milliers
            let formattedValue = formatPrice(rawValue);
            
            // Mettre à jour la valeur du champ avec la valeur formatée
            this.value = formattedValue;

            document.getElementById('input_montant_verser_Soinsam').value = 0;
            document.getElementById('input_montant_remis_Soinsam').value = 0;
            document.getElementById('input_montant_restant_Soinsam').value = formattedValue;
        });
        document.getElementById('input_montant_verser_Soinsam').addEventListener('input', function() 
        {
            let rawValue = this.value.replace(/[^0-9]/g, ''); // Supprimer tous les caractères non numériques
            
            // Ajouter des points pour les milliers
            let formattedValue = formatPrice(rawValue);
            
            // Mettre à jour la valeur du champ avec la valeur formatée
            this.value = formattedValue;

            // Convertir la valeur formatée en nombre pour les calculs
            let montantPayer = parseFloat(document.getElementById('input_montant_payer_Soinsam').value.replace(/\./g, '')) || 0;
            let montantVerser = parseFloat(rawValue) || 0;

            // Calculer le montant remis
            let montantRemis = montantVerser - montantPayer;
            if (montantRemis < 0) {
                montantRemis = 0;
            }
            document.getElementById('input_montant_remis_Soinsam').value = `${formatPrice(montantRemis)}`;

            // Calculer le montant restant
            let montantRestant = montantPayer - montantVerser ;
            if (montantRestant < 0) {
                montantRestant = 0 ;
            }
            document.getElementById('input_montant_restant_Soinsam').value = `${formatPrice(montantRestant)}`;
        });
        document.getElementById('input_montant_verser_Soinsam').addEventListener('keypress', function(event) 
        {
            // Permettre uniquement les chiffres et le point
            let  key = event.key;
            if (isNaN(key)) {
                event.preventDefault();
            }
        });
        document.getElementById('input_montant_verser_Soinsam').addEventListener('input', function(event) 
        {
            let  inputField = event.target;

            if (inputField.value === '') {
                inputField.value = '0';
            }
        });

        document.getElementById('input_montant_payer_Hos').addEventListener('input', function() 
        {

            let rawValue = this.value.replace(/[^0-9]/g, '');

            if (rawValue == null || rawValue == '')
            {
                rawValue = 0;
            }
            
            // Ajouter des points pour les milliers
            let formattedValue = formatPrice(rawValue);
            
            // Mettre à jour la valeur du champ avec la valeur formatée
            this.value = formattedValue;

            document.getElementById('input_montant_verser_Hos').value = 0;
            document.getElementById('input_montant_remis_Hos').value = 0;
            document.getElementById('input_montant_restant_Hos').value = formattedValue;
        });
        document.getElementById('input_montant_verser_Hos').addEventListener('input', function() 
        {
            let rawValue = this.value.replace(/[^0-9]/g, ''); // Supprimer tous les caractères non numériques
            
            // Ajouter des points pour les milliers
            let formattedValue = formatPrice(rawValue);
            
            // Mettre à jour la valeur du champ avec la valeur formatée
            this.value = formattedValue;

            // Convertir la valeur formatée en nombre pour les calculs
            let montantPayer = parseFloat(document.getElementById('input_montant_payer_Hos').value.replace(/\./g, '')) || 0;
            let montantVerser = parseFloat(rawValue) || 0;

            // Calculer le montant remis
            let montantRemis = montantVerser - montantPayer;
            if (montantRemis < 0) {
                montantRemis = 0;
            }
            document.getElementById('input_montant_remis_Hos').value = `${formatPrice(montantRemis)}`;

            // Calculer le montant restant
            let montantRestant = montantPayer - montantVerser ;
            if (montantRestant < 0) {
                montantRestant = 0 ;
            }
            document.getElementById('input_montant_restant_Hos').value = `${formatPrice(montantRestant)}`;
        });
        document.getElementById('input_montant_verser_Hos').addEventListener('keypress', function(event) 
        {
            // Permettre uniquement les chiffres et le point
            let  key = event.key;
            if (isNaN(key)) {
                event.preventDefault();
            }
        });
        document.getElementById('input_montant_verser_Hos').addEventListener('input', function(event) 
        {
            let  inputField = event.target;

            if (inputField.value === '') {
                inputField.value = '0';
            }
        });

        document.getElementById('montant_remise').addEventListener('input', function() 
        {

            let rawValue = this.value.replace(/[^0-9]/g, '');

            if (rawValue == null || rawValue == '')
            {
                rawValue = 0;
            }
            
            // Ajouter des points pour les milliers
            let formattedValue = formatPrice(rawValue);
            
            // Mettre à jour la valeur du champ avec la valeur formatée
            this.value = formattedValue;
        });

        //----------------------------------------------------------------------

        document.getElementById("btn_ouvert_C").addEventListener("click", caisse_ouvert);
        document.getElementById("btn_fermer_C").addEventListener("click", caisse_fermer);
        document.getElementById("btn_eng_remise").addEventListener("click", att_Remise);

        function caisse_verf()
        {
            fetch('/api/verf_caisse')
                .then(response => response.json())
                .then(data => {
                    
                    if (data.caisse.statut == 'ouvert') {
                        document.getElementById('div_caisse').style.display = 'block';
                        document.getElementById('div_caisse_verf').style.display = 'block';
                        document.getElementById('btn_ouvert').style.display = 'none';
                        document.getElementById('btn_fermer').style.display = 'block';

                    }else{
                        document.getElementById('div_caisse').style.display = 'none';
                        document.getElementById('div_caisse_verf').style.display = 'block';
                        document.getElementById('btn_ouvert').style.display = 'block';
                        document.getElementById('btn_fermer').style.display = 'none';
                    }

                })
                .catch(error => console.error('Erreur lors du chargement des donnée caisse:', error));
        }

        function caisse_ouvert()
        {
            const login = @json(Auth::user()->login);

            var preloader_ch = `
                <div id="preloader_ch">
                    <div class="spinner_preloader_ch"></div>
                </div>
            `;
            // Add the preloader to the body
            document.body.insertAdjacentHTML('beforeend', preloader_ch);

            $.ajax({
                url: '/api/caisse_ouvert',
                method: 'GET',
                data: { 
                    login: login,
                },
                success: function(response) {

                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }

                    if (response.success) {

                        document.getElementById('div_caisse').style.display = 'block';
                        document.getElementById('div_caisse_verf').style.display = 'block';
                        document.getElementById('btn_ouvert').style.display = 'none';
                        document.getElementById('btn_fermer').style.display = 'block';

                    } else if (response.error) {
                        showAlert('Alert', 'Une erreur est survenue lors de l\'ouverture de la caisse.','error');
                    }

                },
                error: function(xhr, status, error) {
                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }
                    showAlert('Alert', 'Une erreur est survenue.','error');
                }
            });
        }

        function caisse_fermer()
        {
            const login = @json(Auth::user()->login);

            var preloader_ch = `
                <div id="preloader_ch">
                    <div class="spinner_preloader_ch"></div>
                </div>
            `;
            // Add the preloader to the body
            document.body.insertAdjacentHTML('beforeend', preloader_ch);

            $.ajax({
                url: '/api/caisse_fermer',
                method: 'GET',
                data: { 
                    login: login,
                },
                success: function(response) {

                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }

                    if (response.success) {

                        document.getElementById('div_caisse').style.display = 'none';
                        document.getElementById('div_caisse_verf').style.display = 'block';
                        document.getElementById('btn_ouvert').style.display = 'block';
                        document.getElementById('btn_fermer').style.display = 'none';

                    } else if (response.error) {
                        showAlert('Alert', 'Une erreur est survenue lors de la fermeture de la caisse.','error');
                    }

                },
                error: function(xhr, status, error) {
                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }
                    showAlert('Alert', 'Une erreur est survenue.','error');
                }
            });
        }

        function formatPrice(price) 
        {

            // Convert to float and round to the nearest whole number
            let number = Math.round(parseFloat(price));
            if (isNaN(number)) {
                return '';
            }

            // Format the number with dot as thousands separator
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function formatPriceT(price) 
        {

            // Convert to float and round to the nearest whole number
            let number = Math.round(parseInt(price));
            if (isNaN(number)) {
                return '';
            }

            // Format the number with dot as thousands separator
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
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

        function calculateDaysBetween(startDate, endDate) 
        {
            const start = new Date(startDate);
            const end = new Date(endDate);
            
            // Calcul de la différence en millisecondes
            const diffInMilliseconds = end - start;

            // Conversion en jours (millisecondes en secondes, minutes, heures, jours)
            let diffInDays = diffInMilliseconds / (1000 * 60 * 60 * 24);

            // Si la différence est inférieure ou égale à 0, on retourne 1 jour minimum
            return diffInDays <= 0 ? 1 : Math.round(diffInDays); 
        }

        function calculateAge(dateString) 
        {
            const birthDate = new Date(dateString);
            const today = new Date();

            let age = today.getFullYear() - birthDate.getFullYear();

            // Vérifie si l'anniversaire n'est pas encore passé cette année
            const monthDiff = today.getMonth() - birthDate.getMonth();
            const dayDiff = today.getDate() - birthDate.getDate();
            if (monthDiff < 0 || (monthDiff === 0 && dayDiff < 0)) {
                age--;
            }

            return age;
        }

        function formatDateImp(dateString) {
            const date = new Date(dateString);
            
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const year = date.getFullYear();
            
            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            const seconds = String(date.getSeconds()).padStart(2, '0');
            
            return `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`; // Format as dd/mm/yyyy hh:mm:ss
        }

        // $('a[data-bs-toggle="tab"]').on('shown.bs.tab', function (e) {
        //     // Optionnel : Recharger les données associées à l'onglet sélectionné
        //     const activeTab = $(e.target).attr('href'); // ID de l'onglet actif
        //     if (activeTab === '#twoA1') {
        //         // Charger les consultations
        //         table_cons.ajax.reload(null, false);
        //     } else if (activeTab === '#twoA2') {
        //         // Charger les examens
        //         table_exam.ajax.reload(null, false);
        //     } else if (activeTab === '#twoA3') {
        //         // Charger les hospitalisations
        //         table_hos.ajax.reload(null, false);
        //     } else if (activeTab === '#twoA4') {
        //         // Charger les soins ambulatoires
        //         table_soinsam.ajax.reload(null, false);
        //     }
        // });

        //-----------------------------------------------------------------------

        function att_Remise()
        {
            const login = @json(Auth::user()->login);
            const acte = $("#acte_remise").val().trim();
            const numfac = $("#numfac_remise").val().trim();
            const montant = $("#montant_remise").val().replace(/[^0-9]/g, '');

            if(!acte || !numfac){
                showAlert('Alert', 'Veuillez remplir tous les champs','warning');
                return false;
            }

            if (numfac.startsWith("FCE")) {
                if (acte !== 'cons') {
                    showAlert('Alert', 'Ce numéro de facture ne correspond pas à l\'acte sélectionné', 'warning');
                    return false;
                }
            } else if (numfac.startsWith("FCS")) {
                if (acte !== 'soins') {
                    showAlert('Alert', 'Ce numéro de facture ne correspond pas à l\'acte sélectionné', 'warning');
                    return false;
                }
            } else if (numfac.startsWith("FCB")) {
                if (acte !== 'exam') {
                    showAlert('Alert', 'Ce numéro de facture ne correspond pas à l\'acte sélectionné', 'warning');
                    return false;
                }
            } else if (numfac.startsWith("FCH")) {
                if (acte !== 'hosp') {
                    showAlert('Alert', 'Ce numéro de facture ne correspond pas à l\'acte sélectionné', 'warning');
                    return false;
                }
            }else {
                showAlert('Alert', 'Veuillez vérifier le numéro de facture et l\'acte.', 'warning');
                return false;
            }


            if(montant <= 0){
                showAlert('Alert', 'Veuillez saisir le montant de la remise s\'il vous plaît !!!','warning');
                return false;
            }

            var preloader_ch = `
                <div id="preloader_ch">
                    <div class="spinner_preloader_ch"></div>
                </div>
            `;
            // Add the preloader to the body
            document.body.insertAdjacentHTML('beforeend', preloader_ch);

            $.ajax({
                url: '/api/attribution_remise/' + numfac,
                method: 'GET',
                data: { 
                    montant: montant, 
                    acte: acte,
                    login: login,
                },
                success: function(response) {

                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }

                    if (response.success) {

                        $("#acte_remise").val(null);
                        $("#numfac_remise").val(null);
                        $("#montant_remise").val(0);

                        showAlert('Succès', 'Remise éffectuée.','success');
                    } else if (response.introuvable) {
                        showAlert('Alert', response.message,'info');
                    } else if (response.impossible) {
                        showAlert('Alert', response.message,'info');
                    } else if (response.error) {
                        showAlert('Alert', response.message,'warning');
                    }

                },
                error: function(xhr, status, error) {
                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }
                    showAlert('Alert', 'Une erreur est survenue lors de l\'attribution.','error');
                }
            });
        }

        //-----------------------------------------------------------------------

        function payer_Cons()
        {
            const login = @json(Auth::user()->login);
            const id = $("#id_Cons").val();
            const numfac = $("#id_code_fac_Cons").val();
            const matricule = $("#matricule_Cons").val();
            const montant_verser = $("#input_montant_verser_Cons");
            const montant_remis = $("#input_montant_remis_Cons");
            const montant_restant = $("#input_montant_restant_Cons");
            const montant = $("#input_montant_payer_Cons");

            if(!montant_verser.val().trim() || !montant_remis.val().trim() || !montant_restant.val().trim() || !montant.val().trim()){
                showAlert('Alert', 'Impossible d\'éffectuée le paiement.','error');
                return false;
            }

            if(montant_verser.val() <= 0){
                showAlert('Alert', 'Veuillez saisir un montant verser s\'il vous plaît !!!','warning');
                return false;
            }

            var preloader_ch = `
                <div id="preloader_ch">
                    <div class="spinner_preloader_ch"></div>
                </div>
            `;
            // Add the preloader to the body
            document.body.insertAdjacentHTML('beforeend', preloader_ch);

            $.ajax({
                url: '/api/facture_payer/' + numfac,
                method: 'GET',
                data: { 
                    id: id, 
                    matricule: matricule, 
                    montant: montant.val(), 
                    montant_verser: montant_verser.val(), 
                    montant_remis: montant_remis.val(),
                    montant_restant: montant_restant.val(),
                    login: login,
                },
                success: function(response) {

                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }

                    if (response.success) {

                        document.getElementById("facture_num_cons").value = '';
                        table_cons.clear().draw();

                        const facture = response.facture;

                        generatePDFInvoice_Cons(facture);

                        showAlert('Succès', 'Paiement éffectuée.','success');

                    } else if (response.error) {
                        showAlert('Alert', 'Une erreur est survenue lors du paiement.','error');
                    } else if (response.caisse_fermer) {
                        showAlert('Alert', 'La caisse est actuellement fermer, Veuillez ouvrir la caisse avant d\'éffectuer un encaissement.','info');
                    }

                    caisse_verf();

                },
                error: function(xhr, status, error) {
                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }
                    showAlert('Alert', 'Une erreur est survenue lors du paiement.','error');
                }
            });
        }

        const table_cons = $('.Table_Cons').DataTable({

            processing: false,
            serverSide: false,
            deferLoading: true,
            ajax: function(data, callback) {

                const numfac = $('#facture_num_cons').val();

                if (!numfac) {
                    return;
                }

                if (numfac.length < 4 || numfac.substring(0, 3) !== 'FCE') {
                    $('#facture_num_cons').val(null);
                    showAlert('Alert', 'Numéro de facture incorrecte.', 'warning');
                    return;
                }
                var preloader_ch = `
                    <div id="preloader_ch">
                        <div class="spinner_preloader_ch"></div>
                    </div>
                `;
                // Add the preloader to the body
                document.body.insertAdjacentHTML('beforeend', preloader_ch);
                
                $.ajax({
                    url: `/api/list_facture_inpayer/${numfac}`,
                    type: 'GET',

                    success: function(response) {
                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }
                        // Supprimez ou cachez les données de la DataTable en cas d'erreur
                        table_cons.clear().draw();
                        // Supprimer ou cacher les données de la DataTable au besoin
                        if (response.status === 'success') {
                            // Vérifier si la facture est totalement payée ou non
                            if (response.data.part_patient_reste === 0) {
                                showAlert('Information', 'La facture est déjà totalement réglée.', 'success');
                            } else {
                                callback({ data: [response.data] });
                                showAlert('Information', `Facture trouvée. Montant restant à régler : ${formatPriceT(response.data.part_patient_reste)} Fcfa.`, 'info');
                            }
                            // Ajouter les données à la DataTable
                        } else if (response.status === 'error') {
                            // Gérer les messages d'erreur dans le cas d'un succès avec message d'erreur
                            showAlert('Attention', response.message, 'warning');
                            // callback({ data: [] });
                        }
                    },
                    error: function(xhr, status, error) {
                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }
                        // Supprimez ou cachez les données de la DataTable en cas d'erreur
                        callback({ data: [] });
                        // Gestion des erreurs avec messages
                        let errorMessage = 'Une erreur est survenue.';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage = xhr.responseJSON.error; // Message d'erreur spécifique
                        } else if (xhr.status === 404) {
                            errorMessage = 'Facture introuvable.';
                        } else if (xhr.status === 500) {
                            errorMessage = 'Erreur interne du serveur. Veuillez réessayer plus tard.';
                        }

                        // Afficher le message d'erreur à l'utilisateur
                        showAlert('Alert', errorMessage ,'info');

                        // Log pour le développeur
                        // console.error(`Erreur: ${error}`);
                        // console.error(`Status: ${status}`);
                        // console.error(`Response:`, xhr.responseJSON);
                    }
                });
            },
            columns: [
                { 
                    data: null, 
                    render: (data, type, row, meta) => meta.row + 1,
                    searchable: false,
                    orderable: false,
                },
                { 
                    data: 'numfac', 
                    render: (data, type, row) => `
                    <div class="d-flex align-items-center">
                        <a class="d-flex align-items-center flex-column me-2">
                            <img src="{{asset('assets/images/facture.webp')}}" class="img-2x rounded-circle border border-1">
                        </a>
                        ${data}
                    </div>`,
                    searchable: true, 
                },
                {
                    data: 'part_assurance',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-warning';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-success';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'remise',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-danger';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'montant',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-primary';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient_reste',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                { 
                    data: 'date',
                    render: (data, type, row) => {
                        return data ? `${formatDateHeure(data)}` : 'Néant';
                    },
                    searchable: true,
                },
                {
                    data: null,
                    render: (data, type, row) => `
                        <div class="d-inline-flex gap-1" style="font-size:10px;">
                            <a class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#Caisse_Cons" id="paye_Cons"
                                data-id="${row.idconsexterne}"
                                data-numfac="${row.numfac}"
                                data-matricule="${row.matricule_patient}"
                                data-reste="${row.part_patient_reste}"
                            >
                                <i class="ri-hand-coin-line"></i>
                            </a>
                        </div>
                    `,
                    searchable: false,
                    orderable: false,
                },
            ],
            searching: false,
            ...dataTableConfig,
            initComplete: function(settings, json) {
                initCons();
            },
        });

        $('.Table_Cons').on('draw.dt', function() {
            initCons();
        });

        function initCons() {

            $('.Table_Cons').on('click', '#paye_Cons', function() {
                const id = $(this).data('id');
                const matricule = $(this).data('matricule');
                const numfac = $(this).data('numfac');
                const reste = $(this).data('reste');
                
                document.getElementById('input_montant_payer_Cons').value = `${formatPrice(reste) || 0}`;
                document.getElementById('input_montant_verser_Cons').value = '0';
                document.getElementById('input_montant_remis_Cons').value = '0';
                document.getElementById('id_code_fac_Cons').value = `${numfac}`;
                document.getElementById('id_Cons').value = `${id}`;
                document.getElementById('matricule_Cons').value = `${matricule}`;
                document.getElementById('input_montant_restant_Cons').value = `${formatPrice(reste) || 0}`;
            });
        }

        $('#btn_refresh_table_Cons').on('click', function () {
            table_cons.ajax.reload(); 
        });

        function generatePDFInvoice_Cons(facture) 
        {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({ orientation: 'p', unit: 'mm', format: 'a4' });

            const pdfFilename = "CONSULTATION Facture N°" + facture.numfac + " du " + formatDateHeure(facture.date);
            doc.setProperties({
                title: pdfFilename,
            });

            yPos = 10;

            function drawConsultationSection(yPos) {
                rightMargin = 15;
                leftMargin = 15;
                pdfWidth = doc.internal.pageSize.getWidth();

                const titlea = "RECU";
                doc.setFontSize(100);
                doc.setTextColor(242, 237, 237);
                doc.setFont("Helvetica", "bold");
                doc.text(titlea, 120, yPos + 120, { align: 'center', angle: 40 });

                const logoSrc = "{{asset('assets/images/logo.png')}}";
                const logoWidth = 22;
                const logoHeight = 22;
                doc.addImage(logoSrc, 'PNG', leftMargin, yPos - 7, logoWidth, logoHeight);

                // Informations de l'entreprise
                doc.setFontSize(10);
                doc.setTextColor(0, 0, 0);
                doc.setFont("Helvetica", "bold");
                // Texte de l'entreprise
                const title = "ESPACE MEDICO SOCIAL LA PYRAMIDE DU COMPLEXE";
                const titleWidth = doc.getTextWidth(title);
                const titleX = (doc.internal.pageSize.getWidth() - titleWidth) / 2;
                doc.text(title, titleX, yPos);
                // Texte de l'adresse
                doc.setFont("Helvetica", "normal");
                const address = "Abidjan Yopougon Selmer, Non loin du complexe sportif Jesse-Jackson - 04 BP 1523";
                const addressWidth = doc.getTextWidth(address);
                const addressX = (doc.internal.pageSize.getWidth() - addressWidth) / 2;
                doc.text(address, addressX, (yPos + 5));
                // Texte du téléphone
                const phone = "Tél.: 20 24 44 70 / 20 21 71 92 - Cel.: 01 01 01 63 43";
                const phoneWidth = doc.getTextWidth(phone);
                const phoneX = (doc.internal.pageSize.getWidth() - phoneWidth) / 2;
                doc.text(phone, phoneX, (yPos + 10));
                doc.setFontSize(10);
                doc.setFont("Helvetica", "normal");
                const consultationDate = new Date(facture.date);
                // Formatter la date et l'heure séparément
                const formattedDate = consultationDate.toLocaleDateString(); // Formater la date
                const formattedTime = consultationDate.toLocaleTimeString();
                doc.text("Date: " + formattedDate, 15, (yPos + 25));
                doc.text("Heure: " + formattedTime, 15, (yPos + 30));

                //Ligne de séparation
                doc.setFontSize(15);
                doc.setFont("Helvetica", "bold");
                doc.setLineWidth(0.5);
                doc.setTextColor(0, 0, 0);
                // doc.line(10, 35, 200, 35);

                const titleR = "RECU DE PAIEMENT";
                const titleRWidth = doc.getTextWidth(titleR);
                const titleRX = (doc.internal.pageSize.getWidth() - titleRWidth) / 2;
                // Définir le padding
                const paddingh = 0; // Padding vertical
                const paddingw = 15; // Padding horizontal
                // Calculer les dimensions du rectangle
                const rectX = titleRX - paddingw; // X du rectangle
                const rectY = (yPos + 18) - paddingh; // Y du rectangle
                const rectWidth = titleRWidth + (paddingw * 2); // Largeur du rectangle
                const rectHeight = 15 + (paddingh * 2); // Hauteur du rectangle
                // Définir la couleur pour le cadre (noir)
                doc.setDrawColor(0, 0, 0);
                doc.rect(rectX, rectY, rectWidth, rectHeight); // Dessiner le rectangle
                // Ajouter le texte centré en gras
                doc.setFontSize(15);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0); // Couleur du texte rouge
                doc.text(titleR, titleRX, (yPos + 25)); // Positionner le texte
                const titleN = "N° "+ facture.numrecu;
                doc.text(titleN, (doc.internal.pageSize.getWidth() - doc.getTextWidth(titleN)) / 2, (yPos + 31));

                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0);
                const numDossier = facture.numdossier ? " N° Dossier : " + facture.numdossier : " N° Dossier : Aucun";
                const numDossierWidth = doc.getTextWidth(numDossier);
                doc.text(numDossier, (pdfWidth - rightMargin - numDossierWidth) + 5, yPos + 25);

                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0);
                const numDossier2 = facture.idenregistremetpatient ? " N° matricule : " + facture.idenregistremetpatient  : " N° matricule : Aucun";
                const numDossierWidth2 = doc.getTextWidth(numDossier);
                doc.text(numDossier2, (pdfWidth - rightMargin - numDossierWidth2) + 5, yPos + 30);

                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0);
                const numDate = "Date de paiement : "+ formatDateImp(facture.datereglt_pat) ;
                const numDateWidth = doc.getTextWidth(numDate);
                doc.text(numDate, (doc.internal.pageSize.getWidth() - numDateWidth) / 2, yPos + 40);                   

                yPoss = (yPos + 50);

                let assurer;

                if (facture.assure == 1) {
                    assurer = 'Oui';
                } else {
                    assurer = 'Non';
                }

                const patientInfo = [
                    { 
                        label: "Nom et Prénoms", 
                        value: facture.nom_patient.length > 25 
                            ? facture.nom_patient.substring(0, 25) + '...' 
                            : facture.nom_patient 
                    },
                    { label: "Assurer", value: assurer },
                    { label: "Age", value: calculateAge(facture.datenais)+" an(s)" },
                    { label: "Contact", value: facture.telpatient }
                ];

                if (facture.assure == 1) {
                    patientInfo.push(
                        { label: "Société", value: facture.societe},
                        { label: "Assurance", value: facture.assurance},
                        { label: "Matricule", value: facture.matriculeassure },
                        { label: "N° de Bon", value: facture.numbon || 'Aucun' },
                    );
                }

                patientInfo.forEach(info => {
                    doc.setFontSize(9);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 35, yPoss);
                    yPoss += 7;
                });

                yPoss = (yPos + 113);

                const payerInfo = [
                    { label: "Montant Verser", value: (formatPriceT(facture.montant_verser) || '0')+" Fcfa" },
                    { label: "Montant Remis", value: (formatPriceT(facture.montant_remis) || '0')+" Fcfa" },
                    { label: "Reste a payé", value: (formatPriceT(facture.montant_restant) || '0')+" Fcfa" },
                ];

                payerInfo.forEach(info => {
                    doc.setFontSize(9);
                    doc.setFont("Helvetica", "bold");
                    doc.setTextColor(0, 0, 0);
                    doc.text(info.label, leftMargin, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 35, yPoss);
                    yPoss += 7;
                });

                yPoss = (yPos + 50);

                const medecinInfo = [
                    { label: "N° Consultation", value: facture.idconsexterne},
                    { label: "N° Facture", value: facture.numfac},
                    { 
                        label: "Medecin", 
                        value: facture.nom_medecin.length > 20 
                            ? facture.nom_medecin.substring(0, 20) + '...' 
                            : facture.nom_medecin 
                    },
                    { label: "Spécialité", value: facture.specialite },
                    { label: "Prix Consultation", value: formatPriceT(facture.montant)+" Fcfa" },
                ];

                medecinInfo.forEach(info => {
                    doc.setFontSize(9);
                    doc.setFont("Helvetica", "bold");
                    doc.setTextColor(0, 0, 0);
                    doc.text(info.label, leftMargin + 100, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 135, yPoss);
                    yPoss += 7;
                });

                yPoss = (yPos + 90);

                const compteInfo = [
                    { label: "Montant Total", value: formatPriceT(facture.montant)+" Fcfa" },
                    ...(facture.assure == 1 
                        ? [
                            { label: "Part assurance", value: formatPriceT(facture.partassurance)+" Fcfa" },
                            { label: "Taux", value: facture.taux+" %" }
                          ] 
                        : []),
                    { label: "Remise", value: formatPriceT(facture.remise)+" Fcfa" },
                ];

                compteInfo.forEach(info => {
                    doc.setFontSize(9);
                    doc.setFont("Helvetica", "bold");
                    doc.setTextColor(0, 0, 0);
                    doc.text(info.label, leftMargin + 100, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 135, yPoss);
                    yPoss += 7;
                });

                yPoss += 1;

                doc.setFontSize(11);
                doc.setTextColor(0, 0, 0);
                doc.setFont("Helvetica", "bold");
                doc.text('Montant à payer', leftMargin + 100, yPoss);
                doc.setFont("Helvetica", "bold");
                doc.text(": "+formatPriceT(facture.part_patient)+" Fcfa", leftMargin + 135, yPoss);

                if (facture.assure == 1) {
                    doc.setFontSize(8);
                    doc.setFont("Helvetica", "bold");
                    doc.setTextColor(0, 0, 0);
                    doc.text("Imprimer le "+new Date().toLocaleDateString()+" à "+new Date().toLocaleTimeString() + " ( NB: recu valable pour 15 jours uniquement pour la même consultation de la même pathologie )" , 5, yPoss + 16);
                }else{
                    doc.setFontSize(8);
                    doc.setFont("Helvetica", "bold");
                    doc.setTextColor(0, 0, 0);
                    doc.text("Imprimer le "+new Date().toLocaleDateString()+" à "+new Date().toLocaleTimeString() + " ( NB: recu valable pour 15 jours uniquement pour la même consultation de la même pathologie )" , 5, yPoss + 28);
                }

                // doc.setFontSize(10);
                // doc.setFont("Helvetica", "bold");
                // doc.setTextColor(0, 0, 0);
                // doc.text("Imprimer le "+new Date().toLocaleDateString()+" à "+new Date().toLocaleTimeString() , 5, yPoss + 15);
            }

            drawConsultationSection(yPos);

            doc.setFontSize(30);
            doc.setLineWidth(0.5);
            doc.setLineDashPattern([3, 3], 0);
            doc.line(0, (yPos + 137), 300, (yPos + 137));
            doc.setLineDashPattern([], 0);

            drawConsultationSection(yPos + 150);


            doc.output('dataurlnewwindow');
        }

        //-----------------------------------------------------------------------

        function payer_Exam()
        {
            const login = @json(Auth::user()->login);
            const id = $("#id_Exam").val();
            const matricule = $("#matricule_Exam").val();
            const numfac = $("#id_code_fac_Exam").val();
            const montant_verser = $("#input_montant_verser_Exam");
            const montant_remis = $("#input_montant_remis_Exam");
            const montant_restant = $("#input_montant_restant_Exam");
            const montant = $("#input_montant_payer_Exam");

            if(!montant_verser.val().trim() || !montant_remis.val().trim() || !montant_restant.val().trim() || !montant.val().trim()){
                showAlert('Alert', 'Impossible d\'éffectuée le paiement.','error');
                return false;
            }

            if(montant_verser.val() <= 0){
                showAlert('Alert', 'Veuillez saisir un montant verser s\'il vous plaît !!!','warning');
                return false;
            }

            var preloader_ch = `
                <div id="preloader_ch">
                    <div class="spinner_preloader_ch"></div>
                </div>
            `;
            // Add the preloader to the body
            document.body.insertAdjacentHTML('beforeend', preloader_ch);

            $.ajax({
                url: '/api/facture_payer_examen/' + numfac,
                method: 'GET',
                data: { 
                    id: id, 
                    matricule: matricule, 
                    montant: montant.val(), 
                    montant_verser: montant_verser.val(), 
                    montant_remis: montant_remis.val(),
                    montant_restant: montant_restant.val(),
                    login: login,
                },
                success: function(response) {

                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }

                    caisse_verf();

                    if (response.success) {

                        document.getElementById("facture_num_exam").value = '';
                        table_exam.clear().draw();

                        const examen = response.examen;
                        const facture = response.facture;
                        const sumMontantEx = response.sumMontantEx;

                        generatePDFInvoice_Exam(examen, facture, sumMontantEx);

                        showAlert('Succès', 'Paiement éffectuée.','success');

                    } else if (response.error) {
                        showAlert('Alert', 'Une erreur est survenue lors du paiement, Veuillez ressayer.','error');
                    } else if (response.caisse_fermer) {
                        showAlert('Alert', 'La caisse est actuellement fermer, Veuillez ouvrir la caisse avant d\'éffectuer un encaissement.','info');
                    }

                },
                error: function(xhr, status, error) {
                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }
                    showAlert('Alert', 'Une erreur est survenue lors du paiement.','error');
                }
            });
        }

        const table_exam = $('.Table_Exam').DataTable({

            processing: false,
            serverSide: false,
            deferLoading: true,
            ajax: function(data, callback) {

                const numfac = $('#facture_num_exam').val();

                if (!numfac) {
                    return;
                }

                if (numfac.length < 4 || numfac.substring(0, 3) !== 'FCB') {
                    $('#facture_num_exam').val(null);
                    showAlert('Alert', 'Numéro de facture incorrecte.', 'warning');
                    return;
                }

                var preloader_ch = `
                    <div id="preloader_ch">
                        <div class="spinner_preloader_ch"></div>
                    </div>
                `;
                // Add the preloader to the body
                document.body.insertAdjacentHTML('beforeend', preloader_ch);
                
                $.ajax({
                    url: `/api/list_facture_examen/${numfac}`,
                    type: 'GET',

                    success: function(response) {
                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }
                        // Supprimez ou cachez les données de la DataTable en cas d'erreur
                        table_cons.clear().draw();
                        // Supprimer ou cacher les données de la DataTable au besoin
                        if (response.status === 'success') {
                            // Vérifier si la facture est totalement payée ou non
                            if (response.data.part_patient_reste === 0) {
                                showAlert('Information', 'La facture est déjà totalement réglée.', 'success');
                            } else {
                                callback({ data: [response.data] });
                                showAlert('Information', `Facture trouvée. Montant restant à régler : ${formatPriceT(response.data.part_patient_reste)} Fcfa.`, 'info');
                            }
                            // Ajouter les données à la DataTable
                        } else if (response.status === 'error') {
                            // Gérer les messages d'erreur dans le cas d'un succès avec message d'erreur
                            showAlert('Attention', response.message, 'warning');
                            // callback({ data: [] });
                        } else if (response.status === 'hospit') {
                            // Gérer les messages d'erreur dans le cas d'un succès avec message d'erreur
                            showAlert('Alert', response.message, 'info');
                            // callback({ data: [] });
                        }
                    },
                    error: function(xhr, status, error) {
                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }
                        // Supprimez ou cachez les données de la DataTable en cas d'erreur
                        callback({ data: [] });
                        // Gestion des erreurs avec messages
                        let errorMessage = 'Une erreur est survenue.';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage = xhr.responseJSON.error; // Message d'erreur spécifique
                        } else if (xhr.status === 404) {
                            errorMessage = 'Facture introuvable.';
                        } else if (xhr.status === 500) {
                            errorMessage = 'Erreur interne du serveur. Veuillez réessayer plus tard.';
                        }

                        // Afficher le message d'erreur à l'utilisateur
                        showAlert('Alert', errorMessage ,'info');

                        // Log pour le développeur
                        // console.error(`Erreur: ${error}`);
                        // console.error(`Status: ${status}`);
                        // console.error(`Response:`, xhr.responseJSON);
                    }
                });
            },
            columns: [
                { 
                    data: null, 
                    render: (data, type, row, meta) => meta.row + 1,
                    searchable: false,
                    orderable: false,
                },
                { 
                    data: 'numfac', 
                    render: (data, type, row) => `
                    <div class="d-flex align-items-center">
                        <a class="d-flex align-items-center flex-column me-2">
                            <img src="{{asset('assets/images/facture.webp')}}" class="img-2x rounded-circle border border-1">
                        </a>
                        ${data}
                    </div>`,
                    searchable: true, 
                },
                { 
                    data: 'typedemande',
                    render: (data, type, row) => `
                        <span class="badge ${data === 'analyse' ? 'bg-danger' : 'bg-primary'}">
                            ${data}
                        </span> `,
                    searchable: true,
                },
                {
                    data: 'prelevement',
                    render: (data, type, row) => {
                        const value = data ? data : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'montant_examen',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-primary';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'montant_total',
                    render: (data, type, row) => {
                        const value = data ? data : 0;
                        const color = 'text-primary';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_assurance',
                    render: (data, type, row) => {
                        const value = data ? data : 0;
                        const color = 'text-warning';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-success';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient_reste',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-danger';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                { 
                    data: 'date',
                    render: (data, type, row) => {
                        return data ? `${formatDate(data)} à ${row.heure}` : 'Néant';
                    },
                    searchable: true,
                },
                {
                    data: null,
                    render: (data, type, row) => `
                        <div class="d-inline-flex gap-1" style="font-size:10px;">
                            <a class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#Caisse_Exam" id="paye_Exam"
                                data-id="${row.id}"
                                data-numfac="${row.numfac}"
                                data-reste="${row.part_patient_reste}"
                                data-matricule="${row.matricule}"
                            >
                                <i class="ri-hand-coin-line"></i>
                            </a>
                        </div>
                    `,
                    searchable: false,
                    orderable: false,
                },
            ],
            searching: false,
            ...dataTableConfig,
            initComplete: function(settings, json) {
                initExam();
            },
        });

        $('.Table_Exam').on('draw.dt', function() {
            initExam();
        });

        function initExam() {

            $('.Table_Exam').on('click', '#paye_Exam', function() {
                const id = $(this).data('id');
                const numfac = $(this).data('numfac');
                const matricule = $(this).data('matricule');
                const reste = $(this).data('reste');
                
                document.getElementById('input_montant_payer_Exam').value = `${formatPrice(reste) || 0}`;
                document.getElementById('input_montant_verser_Exam').value = '0';
                document.getElementById('input_montant_remis_Exam').value = '0';
                document.getElementById('id_code_fac_Exam').value = `${numfac}`;
                document.getElementById('id_Exam').value = `${id}`;
                document.getElementById('matricule_Exam').value = `${matricule}`;
                document.getElementById('input_montant_restant_Exam').value = `${formatPrice(reste) || 0}`;
            });
        }

        $('#btn_refresh_table_Exam').on('click', function () {
            table_exam.ajax.reload(null, false); 
        });

        function generatePDFInvoice_Exam(examen, facture, sumMontantEx) 
        {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({ orientation: 'p', unit: 'mm', format: 'a4' });

            const pdfFilename = "Examen Facture N°" + facture.numfacbul + " du " + formatDate(facture.date);
            doc.setProperties({
                title: pdfFilename,
            });

            let yPos = 10;

            function drawConsultationSection(yPos) {
                rightMargin = 15;
                leftMargin = 15;
                pdfWidth = doc.internal.pageSize.getWidth();

                const titlea = "RECU";
                doc.setFontSize(100);
                doc.setTextColor(242, 242, 242); // Gray color for background effect
                doc.setFont("Helvetica", "bold");
                doc.text(titlea, 120, yPos + 120, { align: 'center', angle: 40 });

                const logoSrc = "{{asset('assets/images/logo.png')}}";
                const logoWidth = 22;
                const logoHeight = 22;
                doc.addImage(logoSrc, 'PNG', leftMargin, yPos - 7, logoWidth, logoHeight);

                // Informations de l'entreprise
                doc.setFontSize(10);
                doc.setTextColor(0, 0, 0);
                doc.setFont("Helvetica", "bold");
                // Texte de l'entreprise
                const title = "ESPACE MEDICO SOCIAL LA PYRAMIDE DU COMPLEXE";
                const titleWidth = doc.getTextWidth(title);
                const titleX = (doc.internal.pageSize.getWidth() - titleWidth) / 2;
                doc.text(title, titleX, yPos);
                // Texte de l'adresse
                doc.setFont("Helvetica", "normal");
                const address = "Abidjan Yopougon Selmer, Non loin du complexe sportif Jesse-Jackson - 04 BP 1523";
                const addressWidth = doc.getTextWidth(address);
                const addressX = (doc.internal.pageSize.getWidth() - addressWidth) / 2;
                doc.text(address, addressX, (yPos + 5));
                // Texte du téléphone
                const phone = "Tél.: 20 24 44 70 / 20 21 71 92 - Cel.: 01 01 01 63 43";
                const phoneWidth = doc.getTextWidth(phone);
                const phoneX = (doc.internal.pageSize.getWidth() - phoneWidth) / 2;
                doc.text(phone, phoneX, (yPos + 10));
                doc.setFontSize(10);
                doc.setFont("Helvetica", "normal");
                const examenDate = new Date(facture.date);
                // Formatter la date et l'heure séparément
                const formattedDate = examenDate.toLocaleDateString(); // Formater la date
                // const formattedTime = examenDate.toLocaleTimeString();
                doc.text("Date: " + formattedDate, 15, (yPos + 25));
                doc.text("Heure: " + facture.heure, 15, (yPos + 30));

                //Ligne de séparation
                doc.setFontSize(15);
                doc.setFont("Helvetica", "bold");
                doc.setLineWidth(0.5);
                doc.setTextColor(0, 0, 0);
                // doc.line(10, 35, 200, 35); 
                const titleR = "RECU DE PAIEMENT";
                const titleRWidth = doc.getTextWidth(titleR);
                const titleRX = (doc.internal.pageSize.getWidth() - titleRWidth) / 2;
                // Définir le padding
                const paddingh = 0; // Padding vertical
                const paddingw = 8; // Padding horizontal
                // Calculer les dimensions du rectangle
                const rectX = titleRX - paddingw; // X du rectangle
                const rectY = (yPos + 18) - paddingh; // Y du rectangle
                const rectWidth = titleRWidth + (paddingw * 2); // Largeur du rectangle
                const rectHeight = 15 + (paddingh * 2); // Hauteur du rectangle
                // Définir la couleur pour le cadre (noir)
                doc.setDrawColor(0, 0, 0);
                doc.rect(rectX, rectY, rectWidth, rectHeight); // Dessiner le rectangle
                // Ajouter le texte centré en gras
                doc.setFontSize(15);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0); // Couleur du texte rouge
                doc.text(titleR, titleRX, (yPos + 25)); // Positionner le texte
                const titleN = "N° "+facture.numrecu;
                doc.text(titleN, (doc.internal.pageSize.getWidth() - doc.getTextWidth(titleN)) / 2, (yPos + 31));

                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0);
                const numDossier = facture.numdossier ? " N° Dossier : " + facture.numdossier : " N° Dossier : Aucun";
                const numDossierWidth = doc.getTextWidth(numDossier);
                doc.text(numDossier, (pdfWidth - rightMargin - numDossierWidth) + 5, yPos + 25);

                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0);
                const numDossier2 = facture.idenregistremetpatient ? " N° matricule : " + facture.idenregistremetpatient  : " N° matricule : Aucun";
                const numDossierWidth2 = doc.getTextWidth(numDossier);
                doc.text(numDossier2, (pdfWidth - rightMargin - numDossierWidth2) + 5, yPos + 30);

                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0);
                const numDate = "Date de paiement : "+ formatDateImp(facture.datereglt_pat) ;
                const numDateWidth = doc.getTextWidth(numDate);
                doc.text(numDate, (doc.internal.pageSize.getWidth() - numDateWidth) / 2, yPos + 40);    

                yPoss = (yPos + 50);

                let assurer;

                if (facture.assure == 1) {
                    assurer = 'Oui';
                } else {
                    assurer = 'Non';
                }

                const patientInfo = [
                    { 
                        label: "Nom et Prénoms", 
                        value: facture.nom_patient.length > 25 
                            ? facture.nom_patient.substring(0, 25) + '...' 
                            : facture.nom_patient 
                    },
                    { label: "Assurer", value: assurer },
                    { label: "Age", value: calculateAge(facture.datenais)+" an(s)" },
                    { label: "Contact", value: facture.telpatient }
                ];

                if (facture.assure == 1) {
                    patientInfo.push(
                        { label: "Société", value: facture.societe },
                        { label: "Assurance", value: facture.assurance},
                        { label: "Matricule assurance", value: facture.matriculeassure },
                        { label: "N° de Bon", value: facture.numbon || 'Aucun' },
                    );
                }

                patientInfo.push(
                    { label: "libelle", value: facture.renseigclini || 'Aucun' },
                );

                patientInfo.forEach(info => {
                    doc.setFontSize(9);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 35, yPoss);
                    yPoss += 7;
                });

                yPoss = (yPos + 50);

                const typeInfo = [];

                if (facture.num_bon && facture.num_bon !== "" && facture.num_bon !== null ) {
                    typeInfo.push({ label: "N° prise en charge", value: facture.numbon == null ? 'Aucun' : facture.numbon });
                }

                let medecin; 

                if (facture.nom_medecin == null) {
                    medecin = 'Dr. '+facture.medicin_traitant;
                } else {
                    medecin = facture.nom_medecin;
                }

                typeInfo.push(
                    { label: "N° FACTURE", value: facture.numfacbul },
                    { label: "Id Examen", value: facture.idtestlaboimagerie },
                    { 
                        label: "Medecin", 
                        value: medecin.length > 20 
                            ? medecin.substring(0, 20) + '...' 
                            : medecin 
                    },
                    { label: "Type d'examen", value: facture.typedemande },
                );

                typeInfo.forEach(info => {
                    doc.setFontSize(9);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin + 100, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 135, yPoss);
                    yPoss += 7;
                });

                yPoss += 30;

                const donneeTables = examen;
                let yPossT = yPoss + 10; // Initialisation de la position Y pour le tableau des soins

                // Tableau dynamique pour les détails des soins infirmiers
                doc.autoTable({
                    startY: yPossT,
                    head: [['N°', 'Examen', 'Montant', 'Accepté ?']],
                    body: donneeTables.map((item, index) => [
                        index + 1,
                        item.examen,
                        formatPriceT(item.prix),
                        item.resultat == null || item.resultat == '' ? `Néant` : item.resultat,
                    ]),
                    theme: 'striped',
                    tableWidth: 'auto',
                    styles: {
                        fontSize: 7,
                        overflow: 'linebreak',
                    },
                    foot: [[
                        { content: 'Totals', colSpan: 2, styles: { halign: 'center', fontStyle: 'bold' } },
                        { content: formatPriceT(sumMontantEx) + " Fcfa", styles: { fontStyle: 'bold' } },
                    ]]
                });

                yPoss = doc.autoTable.previous.finalY || yPossT + 10;
                yPoss = yPoss + 5;

                const compteInfo = [
                    { label: "Prélevement", value: formatPriceT(facture.prelevement)+ " Fcfa" },
                    { label: "Montant Total", value: formatPriceT(facture.montant)+" Fcfa"},
                    ...(facture.assure == 1 ? 
                            [{ label: "Part assurance", value: formatPriceT(facture.part_assurance) + " Fcfa" }] 
                            : []),
                ];

                if (facture.assure == 1 ) {
                    compteInfo.push({ label: "Taux", value: facture.taux + "%" });
                }

                compteInfo.push({ label: "Remise", value: facture.remise + " Fcfa" });

                compteInfo.forEach(info => {
                    doc.setFontSize(9);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin + 110, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 142, yPoss);
                    yPoss += 7;
                });
                doc.setFontSize(11);
                doc.setFont("Helvetica", "bold");
                doc.text('Montant à payer', leftMargin + 110, yPoss);
                doc.setFont("Helvetica", "bold");
                doc.text(": "+formatPriceT(facture.part_patient)+" Fcfa", leftMargin + 142, yPoss);


                yPoss = doc.autoTable.previous.finalY || yPossT + 10;
                yPoss = yPoss + 5;

                const payerInfo = [
                    { label: "Montant Verser", value: (formatPriceT(facture.montant_verser) || '0')+" Fcfa" },
                    { label: "Montant Remis", value: (formatPriceT(facture.montant_remis) || '0')+" Fcfa" },
                    { label: "Reste a payé", value: (formatPriceT(facture.montant_restant) || '0')+" Fcfa" },
                ];

                payerInfo.forEach(info => {
                    doc.setFontSize(9);
                    doc.setFont("Helvetica", "bold");
                    doc.setTextColor(0, 0, 0);
                    doc.text(info.label, leftMargin, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 35, yPoss);
                    yPoss += 7;
                });

            }

            function addFooter() {
                // Add footer with current date and page number in X/Y format
                const pageCount = doc.internal.getNumberOfPages();
                const footerY = doc.internal.pageSize.getHeight() - 2; // 10 mm from the bottom

                for (let i = 1; i <= pageCount; i++) {
                    doc.setPage(i);
                    doc.setFontSize(8);
                    doc.setTextColor(0, 0, 0);
                    const pageText = `Page ${i} sur ${pageCount}`;
                    const pageTextWidth = doc.getTextWidth(pageText);
                    const centerX = (doc.internal.pageSize.getWidth() - pageTextWidth) / 2;
                    doc.text(pageText, centerX, footerY);
                    doc.text("Imprimé le : " + new Date().toLocaleDateString() + " à " + new Date().toLocaleTimeString(), 15, footerY); // Left-aligned
                }
            }

            drawConsultationSection(yPos);

            addFooter();

            doc.output('dataurlnewwindow');
        }

        //-----------------------------------------------------------------------

        function payer_Hos()
        {
            const login = @json(Auth::user()->login);
            const id = $("#id_Hos").val();
            const matricule = $("#matricule_Hos").val();
            const numfac = $("#id_code_fac_Hos").val();
            const montant_verser = $("#input_montant_verser_Hos");
            const montant_remis = $("#input_montant_remis_Hos");
            const montant_restant = $("#input_montant_restant_Hos");
            const montant = $("#input_montant_payer_Hos");

            if(!montant_verser.val().trim() || !montant_remis.val().trim() || !montant_restant.val().trim() || !montant.val().trim()){
                showAlert('Alert', 'Impossible d\'éffectuée le paiement.','error');
                return false;
            }

            if(montant_verser.val() <= 0){
                showAlert('Alert', 'Veuillez saisir un montant verser s\'il vous plaît !!!','warning');
                return false;
            }

            var preloader_ch = `
                <div id="preloader_ch">
                    <div class="spinner_preloader_ch"></div>
                </div>
            `;
            // Add the preloader to the body
            document.body.insertAdjacentHTML('beforeend', preloader_ch);

            $.ajax({
                url: '/api/facture_payer_hos/' + numfac,
                method: 'GET',
                data: { 
                    id: id, 
                    matricule: matricule, 
                    montant: montant.val(), 
                    montant_verser: montant_verser.val(), 
                    montant_remis: montant_remis.val(),
                    montant_restant: montant_restant.val(),
                    login: login,
                },
                success: function(response) {

                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }

                    caisse_verf();

                    if (response.success) {

                        document.getElementById("facture_num_hos").value = '';
                        table_hos.clear().draw();

                        const hopital = response.hopital;
                        const prestation = response.prestation;

                        generatePDFInvoice_Hos(hopital, prestation);

                        showAlert('Succès', 'Paiement éffectuée.','success');

                    } else if (response.error) {
                        showAlert('Alert', 'Une erreur est survenue lors du paiement, Veuillez ressayer.','error');
                    } else if (response.caisse_fermer) {
                        showAlert('Alert', 'La caisse est actuellement fermer, Veuillez ouvrir la caisse avant d\'éffectuer un encaissement.','info');
                    }

                },
                error: function(xhr, status, error) {
                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }
                    showAlert('Alert', 'Une erreur est survenue lors du paiement.','error');
                }
            });
        }

        const table_hos = $('.Table_Hos').DataTable({

            processing: false,
            serverSide: false,
            deferLoading: true,
            ajax: function(data, callback) {

                const numfac = $('#facture_num_hos').val();

                if (!numfac) {
                    return;
                }

                if (numfac.length < 4 || numfac.substring(0, 3) !== 'FCH') {
                    $('#facture_num_hos').val(null);
                    showAlert('Alert', 'Numéro de facture incorrecte.', 'warning');
                    return;
                }

                var preloader_ch = `
                    <div id="preloader_ch">
                        <div class="spinner_preloader_ch"></div>
                    </div>
                `;
                // Add the preloader to the body
                document.body.insertAdjacentHTML('beforeend', preloader_ch);
                
                $.ajax({
                    url: `/api/list_facture_hos/${numfac}`,
                    type: 'GET',

                    success: function(response) {
                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }
                        // Supprimez ou cachez les données de la DataTable en cas d'erreur
                        table_cons.clear().draw();
                        // Supprimer ou cacher les données de la DataTable au besoin
                        if (response.status === 'success') {
                            // Vérifier si la facture est totalement payée ou non
                            if (response.data.part_patient_reste === 0) {
                                showAlert('Information', 'La facture est déjà totalement réglée.', 'success');
                            } else {
                                callback({ data: [response.data] });
                                showAlert('Information', `Facture trouvée. Montant restant à régler : ${formatPriceT(response.data.part_patient_reste)} Fcfa.`, 'info');
                            }
                            // Ajouter les données à la DataTable
                        } else if (response.status === 'error') {
                            // Gérer les messages d'erreur dans le cas d'un succès avec message d'erreur
                            showAlert('Attention', response.message, 'warning');
                            // callback({ data: [] });
                        }
                    },
                    error: function(xhr, status, error) {
                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }
                        // Supprimez ou cachez les données de la DataTable en cas d'erreur
                        callback({ data: [] });
                        // Gestion des erreurs avec messages
                        let errorMessage = 'Une erreur est survenue.';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage = xhr.responseJSON.error; // Message d'erreur spécifique
                        } else if (xhr.status === 404) {
                            errorMessage = 'Facture introuvable.';
                        } else if (xhr.status === 500) {
                            errorMessage = 'Erreur interne du serveur. Veuillez réessayer plus tard.';
                        }

                        // Afficher le message d'erreur à l'utilisateur
                        showAlert('Alert', errorMessage ,'info');

                        // Log pour le développeur
                        // console.error(`Erreur: ${error}`);
                        // console.error(`Status: ${status}`);
                        // console.error(`Response:`, xhr.responseJSON);
                    }
                });
            },
            columns: [
                { 
                    data: null, 
                    render: (data, type, row, meta) => meta.row + 1,
                    searchable: false,
                    orderable: false,
                },
                { 
                    data: 'numfachospit', 
                    render: (data, type, row) => `
                    <div class="d-flex align-items-center">
                        <a class="d-flex align-items-center flex-column me-2">
                            <img src="{{asset('assets/images/facture.webp')}}" class="img-2x rounded-circle border border-1">
                        </a>
                        ${data}
                    </div>`,
                    searchable: true, 
                },
                {
                    data: 'montant',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-primary';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_assurance',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-warning';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-success';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'remise',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-danger';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient_reste',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-danger';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                { 
                    data: 'date',
                    render: (data, type, row) => {
                        return data ? `${formatDateHeure(data)}` : 'Néant';
                    },
                    searchable: true,
                },
                {
                    data: null,
                    render: (data, type, row) => `
                        <div class="d-inline-flex gap-1" style="font-size:10px;">
                            <a class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#Caisse_Hos" 
                                id="paye_Hos"
                                data-id="${row.numhospit}"
                                data-numfac="${row.numfachospit}"
                                data-matricule="${row.matricule_patient}"
                                data-reste="${row.part_patient_reste}"
                            >
                                <i class="ri-hand-coin-line"></i>
                            </a>
                        </div>
                    `,
                    searchable: false,
                    orderable: false,
                },
            ],
            searching: false,
            ...dataTableConfig,
            initComplete: function(settings, json) {
                initHos();
            },
        });

        $('.Table_Hos').on('draw.dt', function() {
            initHos();
        });

        function initHos() {

            $('.Table_Hos').on('click', '#paye_Hos', function() {
                const id = $(this).data('id');
                const matricule = $(this).data('matricule');
                const numfac = $(this).data('numfac');
                const reste = $(this).data('reste');
                
                document.getElementById('input_montant_payer_Hos').value = `${formatPrice(reste) || 0}`;
                document.getElementById('input_montant_verser_Hos').value = '0';
                document.getElementById('input_montant_remis_Hos').value = '0';
                document.getElementById('id_code_fac_Hos').value = `${numfac}`;
                document.getElementById('id_Hos').value = `${id}`;
                document.getElementById('matricule_Hos').value = `${matricule}`;
                document.getElementById('input_montant_restant_Hos').value = `${formatPrice(reste) || 0}`;
            });
        }

        $('#btn_refresh_table_Hos').on('click', function () {
            table_hos.ajax.reload(null, false); 
        });

        function generatePDFInvoice_Hos(hopital, prestation) 
        {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({ orientation: 'p', unit: 'mm', format: 'a4' });

            const pdfFilename = "HOSPITALISATION Facture N°" + hopital.numfachospit + " du " + formatDateHeure(hopital.created_at);
            doc.setProperties({
                title: pdfFilename,
            });

            let yPos = 10;

            function drawConsultationSection(yPos) {
                rightMargin = 15;
                leftMargin = 15;
                pdfWidth = doc.internal.pageSize.getWidth();

                const titlea = "RECU";
                doc.setFontSize(100);
                doc.setTextColor(242, 242, 242); // Gray color for background effect
                doc.setFont("Helvetica", "bold");
                doc.text(titlea, 120, yPos + 120, { align: 'center', angle: 40 });

                const logoSrc = "{{asset('assets/images/logo.png')}}";
                const logoWidth = 22;
                const logoHeight = 22;
                doc.addImage(logoSrc, 'PNG', leftMargin, yPos - 7, logoWidth, logoHeight);

                // Informations de l'entreprise
                doc.setFontSize(10);
                doc.setTextColor(0, 0, 0);
                doc.setFont("Helvetica", "bold");
                // Texte de l'entreprise
                const title = "ESPACE MEDICO SOCIAL LA PYRAMIDE DU COMPLEXE";
                const titleWidth = doc.getTextWidth(title);
                const titleX = (doc.internal.pageSize.getWidth() - titleWidth) / 2;
                doc.text(title, titleX, yPos);
                // Texte de l'adresse
                doc.setFont("Helvetica", "normal");
                const address = "Abidjan Yopougon Selmer, Non loin du complexe sportif Jesse-Jackson - 04 BP 1523";
                const addressWidth = doc.getTextWidth(address);
                const addressX = (doc.internal.pageSize.getWidth() - addressWidth) / 2;
                doc.text(address, addressX, (yPos + 5));
                // Texte du téléphone
                const phone = "Tél.: 20 24 44 70 / 20 21 71 92 - Cel.: 01 01 01 63 43";
                const phoneWidth = doc.getTextWidth(phone);
                const phoneX = (doc.internal.pageSize.getWidth() - phoneWidth) / 2;
                doc.text(phone, phoneX, (yPos + 10));
                doc.setFontSize(10);
                doc.setFont("Helvetica", "normal");
                const hopitalDate = new Date(hopital.created_at);
                // Formatter la date et l'heure séparément
                const formattedDate = hopitalDate.toLocaleDateString(); // Formater la date
                const formattedTime = hopitalDate.toLocaleTimeString();
                doc.text("Date: " + formattedDate, 15, (yPos + 25));
                doc.text("Heure: " + formattedTime, 15, (yPos + 30));

                //Ligne de séparation
                doc.setFontSize(15);
                doc.setFont("Helvetica", "bold");
                doc.setLineWidth(0.5);
                doc.setTextColor(0, 0, 0);
                // doc.line(10, 35, 200, 35); 
                const titleR = "RECU PAIEMENT";
                const titleRWidth = doc.getTextWidth(titleR);
                const titleRX = (doc.internal.pageSize.getWidth() - titleRWidth) / 2;
                // Définir le padding
                const paddingh = 0; // Padding vertical
                const paddingw = 15; // Padding horizontal
                // Calculer les dimensions du rectangle
                const rectX = titleRX - paddingw; // X du rectangle
                const rectY = (yPos + 18) - paddingh; // Y du rectangle
                const rectWidth = titleRWidth + (paddingw * 2); // Largeur du rectangle
                const rectHeight = 15 + (paddingh * 2); // Hauteur du rectangle
                // Définir la couleur pour le cadre (noir)
                doc.setDrawColor(0, 0, 0);
                doc.rect(rectX, rectY, rectWidth, rectHeight); // Dessiner le rectangle
                // Ajouter le texte centré en gras
                doc.setFontSize(15);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0); // Couleur du texte rouge
                doc.text(titleR, titleRX, (yPos + 25)); // Positionner le texte
                const titleN = "N° "+hopital.numrecu;
                doc.text(titleN, (doc.internal.pageSize.getWidth() - doc.getTextWidth(titleN)) / 2, (yPos + 31));

                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0);
                const numDossier = hopital.numdossier ? " N° Dossier : " + hopital.numdossier : " N° Dossier : Aucun";
                const numDossierWidth = doc.getTextWidth(numDossier);
                doc.text(numDossier, (pdfWidth - rightMargin - numDossierWidth) + 5, yPos + 25);

                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0);
                const numDossier2 = hopital.idenregistremetpatient ? " N° matricule : " + hopital.idenregistremetpatient  : " N° matricule : Aucun";
                const numDossierWidth2 = doc.getTextWidth(numDossier);
                doc.text(numDossier2, (pdfWidth - rightMargin - numDossierWidth2) + 5, yPos + 30);

                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0);
                const numDate = "Date de paiement : "+ formatDateImp(hopital.datereglt_pat) ;
                const numDateWidth = doc.getTextWidth(numDate);
                doc.text(numDate, (doc.internal.pageSize.getWidth() - numDateWidth) / 2, yPos + 40); 

                yPoss = (yPos + 50);

                let assurer;

                if (hopital.assure == 1) {
                    assurer = 'Oui';
                } else {
                    assurer = 'Non';
                }

                const patientInfo = [
                    { 
                        label: "Nom et Prénoms", 
                        value: hopital.patient.length > 25 
                            ? hopital.patient.substring(0, 25) + '...' 
                            : hopital.patient 
                    },
                    { label: "Assurer", value: assurer },
                    { label: "Age", value: calculateAge(hopital.datenais)+" an(s)" },
                    { label: "Contact", value: hopital.telpatient }
                ];

                if (hopital.assure == 1) {
                    patientInfo.push(
                        { label: "Société", value: hopital.societe },
                        { label: "Assurance", value: hopital.assurance },
                        { label: "Matricule", value: hopital.matriculeassure },
                        { label: "N° de Bon", value: hopital.numbon || 'Aucun' },
                    );
                }

                patientInfo.push(
                    { label: "Type d'admission", value: hopital.type_hospit },
                    { label: "Nature d'admission", value: hopital.nature_hospit },
                );

                // patientInfo.push(
                //     { label: "Motif", value: hopital.motifhospit == null || hopital.motifhospit == '' ? 'Aucun' : hopital.motifhospit },
                // );

                patientInfo.forEach(info => {
                    doc.setFontSize(8);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 35, yPoss);
                    yPoss += 7;
                });

                yPoss = (yPos + 50);

                const medecinInfo = [];

                if (hopital.numbon && hopital.numbon !== null) {
                    medecinInfo.push({ label: "N° prise en charge", value: hopital.numbon });
                }

                medecinInfo.push(
                    { label: "Id hospitalisation", value: hopital.numhospit },
                    { 
                        label: "Medecin", 
                        value: hopital.medecin.length > 20 
                            ? hopital.medecin.substring(0, 20) + '...' 
                            : hopital.medecin 
                    },
                    { label: "Spécialité", value: hopital.specialite },
                    { label: "Date d'entrée le ", value: formatDate(hopital.dateentree) },
                    { label: "Date de sortie prévu le ", value: formatDate(hopital.datesortie) },
                    { label: "Nombre de jours ", value: calculateDaysBetween(hopital.dateentree, hopital.datesortie)+" Jour(s)" },
                    { label: "Chambre Occupée", value: "CH-"+hopital.chambre_code },
                    { label: "Lit Occupée", value: "LIT-"+hopital.lit_code+"/"+hopital.lit_type },
                    { label: "Prix Chambre", value: formatPriceT(hopital.chambre_prix)+" Fcfa" },
                );

                medecinInfo.forEach(info => {
                    doc.setFontSize(8);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin + 100, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 135, yPoss);
                    yPoss += 7;
                });

                {{-- yPoss = (yPoss + 14); --}}

                {{-- const typeInfo = [
                    { label: "Type d'admission", value: hopital.type_hospit },
                    { label: "Nature d'admission", value: hopital.nature_hospit },
                ]; --}}

                {{-- typeInfo.forEach(info => {
                    doc.setFontSize(8);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 35, yPoss);
                    yPoss += 7;
                }); --}}

                yPoss = (yPoss);

                const donneeTable = prestation;

                let totalGeneral = 0;
                let totalAssurance = 0; // Total Part Assurance
                let totalPatient = 0;

                if (donneeTable.length > 0) {
                    yPossT = yPoss + 10;
                    doc.autoTable({
                        startY: yPossT,
                        head: [['N°', 'Nom de la prestation', 'Montant Total', 'Part Assurance', 'Part Patient']],
                        body: donneeTable.map((item, index) => {
                            totalPatient += item.prix_pat || 0;
                            totalAssurance += item.prix_ass || 0;
                            totalGeneral += item.prix || 0;

                            return [
                                index + 1,
                                item.name, 
                                formatPriceT(item.prix) + " Fcfa",
                                formatPriceT(item.prix_ass) + " Fcfa",
                                formatPriceT(item.prix_pat) + " Fcfa"
                            ];
                        }),
                        theme: 'striped',
                        tableWidth: 'auto',
                        styles: {
                            fontSize: 7,
                            overflow: 'linebreak',
                        },
                        foot: [
                            [
                                { content: 'Totals', colSpan: 2, styles: { halign: 'center', fontStyle: 'bold' } },
                                { content: formatPriceT(totalGeneral) + " Fcfa", styles: { fontStyle: 'bold' } },
                                { content: formatPriceT(totalAssurance) + " Fcfa", styles: { fontStyle: 'bold' } },
                                { content: formatPriceT(totalPatient) + " Fcfa", styles: { fontStyle: 'bold' } },
                            ],
                        ],
                    });

                    const finalY = doc.autoTable.previous.finalY || yPossT + 10;
                    yPoss = finalY + 10;

                    const finalInfo = [
                        { label: "Montant Total", value: formatPriceT(hopital.montant_total) + " Fcfa" },
                        ...(hopital.assure === 1 ? [{ label: "Part assurance", value: formatPriceT(hopital.montant_ass) + " Fcfa" }] : []),
                        { label: "Remise", value: formatPriceT(hopital.remise) + " Fcfa" },
                    ];

                    if (hopital.assure === 1) {
                        finalInfo.push({ label: "Taux", value: hopital.taux + "%" });
                    }

                    finalInfo.forEach(info => {
                        doc.setFontSize(9);
                        doc.setFont("Helvetica", "bold");
                        doc.text(info.label, leftMargin + 110, yPoss);
                        doc.setFont("Helvetica", "normal");
                        doc.text(": " + info.value, leftMargin + 150, yPoss);
                        yPoss += 7;
                    });

                    doc.setFontSize(11);
                    doc.setFont("Helvetica", "bold");
                    doc.text('Montant à payer', leftMargin + 110, yPoss);
                    doc.text(": " + formatPriceT(hopital.montant_pat) + " Fcfa", leftMargin + 150, yPoss);
                    
                    yPoss = doc.autoTable.previous.finalY || yPossT + 10;
                    yPoss = yPoss + 10;

                    if (yPoss + 30 > doc.internal.pageSize.height) {
                        doc.addPage();
                        yPoss = 20;
                    }

                        doc.setFontSize(10);
                        doc.setFont("Helvetica", "bold");
                        doc.text('Montant Versé', leftMargin , yPoss);
                        doc.setFont("Helvetica", "bold");
                        doc.text(": " + formatPriceT(hopital.montant_verser) + " Fcfa", leftMargin + 40, yPoss);
                        yPoss += 7;

                        doc.setFontSize(10);
                        doc.setFont("Helvetica", "bold");
                        doc.text('Montant Remis', leftMargin , yPoss);
                        doc.setFont("Helvetica", "bold");
                        doc.text(": " + formatPriceT(hopital.montant_remis) + " Fcfa", leftMargin + 40, yPoss);
                        yPoss += 7;

                        // Display Reste à Payer
                        doc.setFontSize(10);
                        doc.setFont("Helvetica", "bold");
                        doc.text('Reste à Payer', leftMargin , yPoss);
                        doc.setFont("Helvetica", "bold");
                        doc.text(": " + formatPriceT(hopital.montant_restant) + " Fcfa", leftMargin + 40, yPoss);
                }

            }

            function addFooter() {
                // Add footer with current date and page number in X/Y format
                const pageCount = doc.internal.getNumberOfPages();
                const footerY = doc.internal.pageSize.getHeight() - 2; // 10 mm from the bottom

                for (let i = 1; i <= pageCount; i++) {
                    doc.setPage(i);
                    doc.setFontSize(8);
                    doc.setTextColor(0, 0, 0);
                    const pageText = `Page ${i} sur ${pageCount}`;
                    const pageTextWidth = doc.getTextWidth(pageText);
                    const centerX = (doc.internal.pageSize.getWidth() - pageTextWidth) / 2;
                    doc.text(pageText, centerX, footerY);
                    doc.text("Imprimé le : " + new Date().toLocaleDateString() + " à " + new Date().toLocaleTimeString(), 15, footerY); // Left-aligned
                }
            }

            drawConsultationSection(yPos);

            addFooter();

            doc.output('dataurlnewwindow');
        }

        //-----------------------------------------------------------------------

        function payer_Soinsam()
        {
            const login = @json(Auth::user()->login);
            const id = $("#id_Soinsam").val();
            const numfac = $("#id_code_fac_Soinsam").val();
            const matricule = $("#matricule_Soinsam").val();
            const montant_verser = $("#input_montant_verser_Soinsam");
            const montant_remis = $("#input_montant_remis_Soinsam");
            const montant_restant = $("#input_montant_restant_Soinsam");
            const montant = $("#input_montant_payer_Soinsam");

            if(!montant_verser.val().trim() || !montant_remis.val().trim() || !montant_restant.val().trim() || !montant.val().trim()){
                showAlert('Alert', 'Impossible d\'éffectuée le paiement.','error');
                return false;
            }

            if(montant_verser.val() <= 0){
                showAlert('Alert', 'Veuillez saisir un montant verser s\'il vous plaît !!!','warning');
                return false;
            }

            var preloader_ch = `
                <div id="preloader_ch">
                    <div class="spinner_preloader_ch"></div>
                </div>
            `;
            // Add the preloader to the body
            document.body.insertAdjacentHTML('beforeend', preloader_ch);

            $.ajax({
                url: '/api/facture_payer_soinsam/' + numfac,
                method: 'GET',
                data: { 
                    id: id, 
                    matricule: matricule, 
                    montant: montant.val(), 
                    montant_verser: montant_verser.val(), 
                    montant_remis: montant_remis.val(),
                    montant_restant: montant_restant.val(),
                    login: login,
                },
                success: function(response) {

                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }

                    if (response.success) {

                        document.getElementById("facture_num_soinsam").value = '';
                        table_soinsam.clear().draw();

                        const patient = response.patient;
                        const soins = response.soins;
                        const produit = response.produit;

                        generatePDFInvoice(patient, soins, produit);

                        showAlert('Succès', 'Paiement éffectuée.','success');

                    } else if (response.error) {
                        showAlert('Alert', 'Une erreur est survenue lors du paiement.','error');
                    } else if (response.caisse_fermer) {
                        showAlert('Alert', 'La caisse est actuellement fermer, Veuillez ouvrir la caisse avant d\'éffectuer un encaissement.','info');
                    }

                    caisse_verf();

                },
                error: function(xhr, status, error) {
                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }
                    showAlert('Alert', 'Une erreur est survenue lors du paiement.','error');
                }
            });
        }

        const table_soinsam = $('.Table_Soinsam').DataTable({

            processing: false,
            serverSide: false,
            deferLoading: true,
            ajax: function(data, callback) {

                const numfac = $('#facture_num_soinsam').val();

                if (!numfac) {
                    return;
                }

                if (numfac.length < 4 || numfac.substring(0, 3) !== 'FCS') {
                    $('#facture_num_soinsam').val(null);
                    showAlert('Alert', 'Numéro de facture incorrecte.', 'warning');
                    return;
                }

                var preloader_ch = `
                    <div id="preloader_ch">
                        <div class="spinner_preloader_ch"></div>
                    </div>
                `;
                // Add the preloader to the body
                document.body.insertAdjacentHTML('beforeend', preloader_ch);
                
                $.ajax({
                    url: `/api/list_facture_soinsam/${numfac}`,
                    type: 'GET',

                    success: function(response) {
                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }
                        // Supprimez ou cachez les données de la DataTable en cas d'erreur
                        table_cons.clear().draw();
                        // Supprimer ou cacher les données de la DataTable au besoin
                        if (response.status === 'success') {
                            // Vérifier si la facture est totalement payée ou non
                            if (response.data.part_patient_reste === 0) {
                                showAlert('Information', 'La facture est déjà totalement réglée.', 'success');
                            } else {
                                callback({ data: [response.data] });
                                showAlert('Information', `Facture trouvée. Montant restant à régler : ${formatPriceT(response.data.part_patient_reste)} Fcfa.`, 'info');
                            }
                            // Ajouter les données à la DataTable
                        } else if (response.status === 'error') {
                            // Gérer les messages d'erreur dans le cas d'un succès avec message d'erreur
                            showAlert('Attention', response.message, 'warning');
                            // callback({ data: [] });
                        } else if (response.status === 'hospit') {
                            // Gérer les messages d'erreur dans le cas d'un succès avec message d'erreur
                            showAlert('Alert', response.message, 'info');
                            // callback({ data: [] });
                        }
                    },
                    error: function(xhr, status, error) {
                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }
                        // Supprimez ou cachez les données de la DataTable en cas d'erreur
                        callback({ data: [] });
                        // Gestion des erreurs avec messages
                        let errorMessage = 'Une erreur est survenue.';
                        if (xhr.responseJSON && xhr.responseJSON.error) {
                            errorMessage = xhr.responseJSON.error; // Message d'erreur spécifique
                        } else if (xhr.status === 404) {
                            errorMessage = 'Facture introuvable.';
                        } else if (xhr.status === 500) {
                            errorMessage = 'Erreur interne du serveur. Veuillez réessayer plus tard.';
                        }

                        // Afficher le message d'erreur à l'utilisateur
                        showAlert('Alert', errorMessage ,'info');

                        // Log pour le développeur
                        // console.error(`Erreur: ${error}`);
                        // console.error(`Status: ${status}`);
                        // console.error(`Response:`, xhr.responseJSON);
                    }
                });
            },
            columns: [
                { 
                    data: null, 
                    render: (data, type, row, meta) => meta.row + 1,
                    searchable: false,
                    orderable: false,
                },
                { 
                    data: 'numfac', 
                    render: (data, type, row) => `
                    <div class="d-flex align-items-center">
                        <a class="d-flex align-items-center flex-column me-2">
                            <img src="{{asset('assets/images/facture.webp')}}" class="img-2x rounded-circle border border-1">
                        </a>
                        ${data}
                    </div>`,
                    searchable: true, 
                },
                {
                    data: 'montant',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-primary';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'prototal',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-primary';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'stotal',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-primary';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'remise',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-danger';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-success';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_assurance',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-warning';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient_reste',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-danger';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                { 
                    data: 'date',
                    render: (data, type, row) => {
                        return data ? `${formatDateHeure(data)}` : 'Néant';
                    },
                    searchable: true,
                },
                {
                    data: null,
                    render: (data, type, row) => `
                        <div class="d-inline-flex gap-1" style="font-size:10px;">
                            <a class="btn btn-outline-success btn-sm" data-bs-toggle="modal" data-bs-target="#Caisse_Soinsam" 
                                id="paye_Soinsam"
                                data-id="${row.id_soins}"
                                data-numfac="${row.numfac}"
                                data-matricule="${row.matricule_patient}"
                                data-reste="${row.part_patient_reste}"
                            >
                                <i class="ri-hand-coin-line"></i>
                            </a>
                        </div>
                    `,
                    searchable: false,
                    orderable: false,
                },
            ],
            searching: false,
            ...dataTableConfig,
            initComplete: function(settings, json) {
                initSoinsam();
            },
        });

        $('.Table_Soinsam').on('draw.dt', function() {
            initSoinsam();
        });

        function initSoinsam() {

            $('.Table_Soinsam').on('click', '#paye_Soinsam', function() {
                const id = $(this).data('id');
                const matricule = $(this).data('matricule');
                const numfac = $(this).data('numfac');
                const reste = $(this).data('reste');
                
                document.getElementById('input_montant_payer_Soinsam').value = `${formatPrice(reste) || 0}`;
                document.getElementById('input_montant_verser_Soinsam').value = '0';
                document.getElementById('input_montant_remis_Soinsam').value = '0';
                document.getElementById('id_code_fac_Soinsam').value = `${numfac}`;
                document.getElementById('id_Soinsam').value = `${id}`;
                document.getElementById('matricule_Soinsam').value = `${matricule}`;
                document.getElementById('input_montant_restant_Soinsam').value = `${formatPrice(reste) || 0}`;
            });
        }

        $('#btn_refresh_table_Soinsam').on('click', function () {
            table_soinsam.ajax.reload(null, false); 
        });

        function generatePDFInvoice(patient, soins, produit) 
        {
            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({ orientation: 'p', unit: 'mm', format: 'a4' });

            const pdfFilename = "SOINS AMBULATOIRE Facture N°" + patient.numfac_soins + " du " + formatDate(patient.date_soin);
            doc.setProperties({
                title: pdfFilename,
            });

            let yPos = 10;

            function drawConsultationSection(yPos) {
                rightMargin = 15;
                leftMargin = 15;
                pdfWidth = doc.internal.pageSize.getWidth();

                const titlea = "RECU";
                doc.setFontSize(100);
                doc.setTextColor(242, 242, 242); // Gray color for background effect
                doc.setFont("Helvetica", "bold");
                doc.text(titlea, 120, yPos + 120, { align: 'center', angle: 40 });

                const logoSrc = "{{asset('assets/images/logo.png')}}";
                const logoWidth = 22;
                const logoHeight = 22;
                doc.addImage(logoSrc, 'PNG', leftMargin, yPos - 7, logoWidth, logoHeight);

                // Informations de l'entreprise
                doc.setFontSize(10);
                doc.setTextColor(0, 0, 0);
                doc.setFont("Helvetica", "bold");
                // Texte de l'entreprise
                const title = "ESPACE MEDICO SOCIAL LA PYRAMIDE DU COMPLEXE";
                const titleWidth = doc.getTextWidth(title);
                const titleX = (doc.internal.pageSize.getWidth() - titleWidth) / 2;
                doc.text(title, titleX, yPos);
                // Texte de l'adresse
                doc.setFont("Helvetica", "normal");
                const address = "Abidjan Yopougon Selmer, Non loin du complexe sportif Jesse-Jackson - 04 BP 1523";
                const addressWidth = doc.getTextWidth(address);
                const addressX = (doc.internal.pageSize.getWidth() - addressWidth) / 2;
                doc.text(address, addressX, (yPos + 5));
                // Texte du téléphone
                const phone = "Tél.: 20 24 44 70 / 20 21 71 92 - Cel.: 01 01 01 63 43";
                const phoneWidth = doc.getTextWidth(phone);
                const phoneX = (doc.internal.pageSize.getWidth() - phoneWidth) / 2;
                doc.text(phone, phoneX, (yPos + 10));
                doc.setFontSize(10);
                doc.setFont("Helvetica", "normal");
                const spatientDate = new Date(patient.date_soin);
                // Formatter la date et l'heure séparément
                const formattedDate = spatientDate.toLocaleDateString();
                // const formattedTime = spatientDate.toLocaleTimeString();
                doc.text("Date: " + formattedDate, 15, (yPos + 28));
                // doc.text("Heure: " + formattedTime, 15, (yPos + 30));

                //Ligne de séparation
                doc.setFontSize(15);
                doc.setFont("Helvetica", "bold");
                doc.setLineWidth(0.5);
                doc.setTextColor(0, 0, 0);
                // doc.line(10, 35, 200, 35); 
                const titleR = "RECU DE PAIEMENT";
                const titleRWidth = doc.getTextWidth(titleR);
                const titleRX = (doc.internal.pageSize.getWidth() - titleRWidth) / 2;
                // Définir le padding
                const paddingh = 0; // Padding vertical
                const paddingw = 8; // Padding horizontal
                // Calculer les dimensions du rectangle
                const rectX = titleRX - paddingw; // X du rectangle
                const rectY = (yPos + 18) - paddingh; // Y du rectangle
                const rectWidth = titleRWidth + (paddingw * 2); // Largeur du rectangle
                const rectHeight = 15 + (paddingh * 2); // Hauteur du rectangle
                // Définir la couleur pour le cadre (noir)
                doc.setDrawColor(0, 0, 0);
                doc.rect(rectX, rectY, rectWidth, rectHeight); // Dessiner le rectangle
                // Ajouter le texte centré en gras
                doc.setFontSize(15);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0); // Couleur du texte rouge
                doc.text(titleR, titleRX, (yPos + 25)); // Positionner le texte
                const titleN = "N° "+patient.numrecu;
                doc.text(titleN, (doc.internal.pageSize.getWidth() - doc.getTextWidth(titleN)) / 2, (yPos + 31));

                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0);
                const numDossier = patient.numdossier ? " N° Dossier : " + patient.numdossier : " N° Dossier : Aucun";
                const numDossierWidth = doc.getTextWidth(numDossier);
                doc.text(numDossier, (pdfWidth - rightMargin - numDossierWidth) + 5, yPos + 25);

                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0);
                const numDossier2 = patient.idenregistremetpatient ? " N° matricule : " + patient.idenregistremetpatient  : " N° matricule : Aucun";
                const numDossierWidth2 = doc.getTextWidth(numDossier);
                doc.text(numDossier2, (pdfWidth - rightMargin - numDossierWidth2) + 5, yPos + 30);

                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0);
                const numDate = "Date de paiement : "+ formatDateImp(patient.datereglt_pat) ;
                const numDateWidth = doc.getTextWidth(numDate);
                doc.text(numDate, (doc.internal.pageSize.getWidth() - numDateWidth) / 2, yPos + 40);      

                yPoss = (yPos + 50);

                const patientInfo = [
                    { 
                        label: "Nom et Prénoms", 
                        value: patient.nom_patient.length > 25 
                            ? patient.nom_patient.substring(0, 25) + '...' 
                            : patient.nom_patient 
                    },
                    { label: "Assurer", value: patient.assure === 1 ? "Oui" : "Non"  },
                    { label: "Age", value: calculateAge(patient.datenais) + " Ans" },
                    { label: "Contact", value: patient.telpatient }
                ];

                if (patient.assure == 1) {
                    patientInfo.push(
                        { label: "Societe", value: patient.societe },
                        { label: "Assurance", value: patient.assurance },
                        { label: "Matricule assurance", value: patient.matriculeassure },
                    );
                }

                patientInfo.forEach(info => {
                    doc.setFontSize(8);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 35, yPoss);
                    yPoss += 7;
                });

                yPoss = (yPos + 50);

                const typeInfo = [];

                typeInfo.push(
                    { label: "Nbre Soins Infirmiers", value: patient.nbre_soins },
                    { label: "Nbre Produits Utilisés", value: patient.nbre_produit },
                );

                typeInfo.forEach(info => {
                    doc.setFontSize(8);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin + 100, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 135, yPoss);
                    yPoss += 7;
                });

                if (patient.assure == 1) {
                    yPoss += 15;
                }

                const donneeTables = soins;
                let yPossT = yPoss + 25; 

                // const totalsi = donneeTables.reduce((sum, item) => sum + parseInt(item.price.replace(/[^0-9]/g, '') || 0), 0);

                // Tableau dynamique pour les détails des soins infirmiers
                doc.autoTable({
                    startY: yPossT,
                    head: [['N°', 'Nom du Soins Infirmiers', 'Prix Unitaire']],
                    body: donneeTables.map((item, index) => [
                        index + 1,
                        item.libelle_soins,
                        formatPriceT(item.price) + " Fcfa",
                    ]),
                    theme: 'striped',
                    tableWidth: 'auto',
                    styles: {
                        fontSize: 7,
                        overflow: 'linebreak',
                    },
                    foot: [[
                        { content: 'Totals', colSpan: 2, styles: { halign: 'center', fontStyle: 'bold' } },
                        { content: formatPriceT(patient.stotal) + " Fcfa", styles: { fontStyle: 'bold' } },
                    ]]
                });

                if (produit.length > 0) {

                    // Récupérer la position Y de la dernière ligne du tableau
                    yPoss = doc.autoTable.previous.finalY || yPossT + 10;
                    yPoss = yPoss + 5;
                
                    const donneeTable = produit;
                    yPossT = yPoss + 5; // Ajuster la position Y pour le tableau des produits

                    // const totalsoins = donneeTable.reduce((sum, item) => sum + parseInt(item.price.replace(/[^0-9]/g, '') || 0), 0);

                    doc.autoTable({
                        startY: yPossT,
                        head: [['N°', 'Nom du produit utilisé', 'Quantité', 'Prix Unitaire', 'Montant']],
                        body: donneeTable.map((item, index) => [
                            index + 1,
                            item.name,
                            item.qte,
                            formatPriceT(item.price) + " Fcfa",
                            formatPriceT(parseInt(item.qte) * parseInt(item.price)) + " Fcfa",
                        ]),
                        theme: 'striped',
                        tableWidth: 'auto',
                        styles: {
                            fontSize: 7,
                            overflow: 'linebreak',
                        },
                        foot: [[
                            { content: 'Totals', colSpan: 4, styles: { halign: 'center', fontStyle: 'bold' } },
                            { content: formatPriceT(patient.prototal) + " Fcfa", styles: { fontStyle: 'bold' } },
                        ]]
                    });
                }

                // Position Y après le tableau des produits
                yPoss = doc.autoTable.previous.finalY || yPossT + 10;
                yPoss = yPoss + 10;

                const compteInfo = [
                    { label: "Total", value: formatPriceT(patient.montant_total) + " Fcfa" },
                    ...(patient.assure == 1 ? 
                        [{ label: "Part assurance", value: formatPriceT(patient.part_assurance) + " Fcfa" }] 
                        : []),
                ];


                if (patient.assure == 1) {
                    compteInfo.push({ label: "Taux", value: patient.taux + "%" });
                }

                compteInfo.push({ label: "Remise", value: formatPriceT(patient.remise) + " Fcfa" });

                compteInfo.forEach(info => {
                    doc.setFontSize(9);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin + 110, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 150, yPoss);
                    yPoss += 7;
                });
                doc.setFontSize(11);
                doc.setFont("Helvetica", "bold");
                doc.text('Montant à payer', leftMargin + 110, yPoss);
                doc.setFont("Helvetica", "bold");
                doc.text(": "+formatPriceT(patient.ticket_moderateur)+" Fcfa", leftMargin + 150, yPoss);

                yPoss = doc.autoTable.previous.finalY || yPossT + 10;
                yPoss = yPoss + 10;

                if (yPoss + 30 > doc.internal.pageSize.height) {
                    doc.addPage();
                    yPoss = 20;
                }

                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.text('Montant Versé', leftMargin , yPoss);
                doc.setFont("Helvetica", "bold");
                doc.text(": " + formatPriceT(patient.montant_verser) + " Fcfa", leftMargin + 40, yPoss);
                yPoss += 7;

                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.text('Montant Remis', leftMargin , yPoss);
                doc.setFont("Helvetica", "bold");
                doc.text(": " + formatPriceT(patient.montant_remis) + " Fcfa", leftMargin + 40, yPoss);
                yPoss += 7;

                // Display Reste à Payer
                doc.setFontSize(10);
                doc.setFont("Helvetica", "bold");
                doc.text('Reste à Payer', leftMargin , yPoss);
                doc.setFont("Helvetica", "bold");
                doc.text(": " + formatPriceT(patient.montant_restant) + " Fcfa", leftMargin + 40, yPoss);

            }

            function addFooter() {
                // Add footer with current date and page number in X/Y format
                const pageCount = doc.internal.getNumberOfPages();
                const footerY = doc.internal.pageSize.getHeight() - 2; // 10 mm from the bottom

                for (let i = 1; i <= pageCount; i++) {
                    doc.setPage(i);
                    doc.setFontSize(8);
                    doc.setTextColor(0, 0, 0);
                    const pageText = `Page ${i} sur ${pageCount}`;
                    const pageTextWidth = doc.getTextWidth(pageText);
                    const centerX = (doc.internal.pageSize.getWidth() - pageTextWidth) / 2;
                    doc.text(pageText, centerX, footerY);
                    doc.text("Imprimé le : " + new Date().toLocaleDateString() + " à " + new Date().toLocaleTimeString(), 15, footerY); // Left-aligned
                }
            }

            drawConsultationSection(yPos);

            addFooter();

            doc.output('dataurlnewwindow');
        }

    });
</script>



@endsection