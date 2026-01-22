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
            Listes des factures
        </li>
    </ol>
</div>
@endsection

@section('content')

<div class="app-body">
    <div class="row gx-3">
        <div class="col-xxl-12 col-sm-12">
            <div class="card mb-3 cadreTitle">
                <div class="card-body">
                    <div class="py-4 px-3 text-white">
                        <h3>FACTURES</h3>
                        <h6>Caisse / Liste des Factures</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row gx-3" >
        <div class="col-sm-12">
            <div class="card mb-3">
                <div class="card-body" style="margin-top: -20px;">
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
                        </ul>
                        <div class="tab-content" id="customTabContent">
                            {{-- <div class="alert bg-warning text-white alert-dismissible d-flex align-items-center fade show fade-in-out" role="alert">
                                <i class="ri-alert-line fs-3 me-2 lh-1"></i>
                                <div>                                
                                    <h6>ATTENTION : </h6> 
                                    L'expression << Réimprimer recu >>, fait référence a l'impression du dernier recu de paiement de la facture de l'acte.
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div> --}}
                            <div class="card-header" style="margin-top: -20px;margin-bottom: -40px;">
                                <div class="row gx-3">
                                    <div class="col-12">
                                        <div class=" mb-3">
                                            <div class="card-body">
                                                <div class="row gx-3">
                                                    <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Du</label>
                                                            <input type="date" id="searchDate1" placeholder="Recherche" class="form-control me-1" value="{{ date('Y-m-d', strtotime('-1 months')) }}" max="{{ date('Y-m-d') }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-xxl-6 col-lg-6 col-md-6 col-sm-6">
                                                        <div class="mb-3">
                                                            <label class="form-label">Au</label>
                                                            <input type="date" id="searchDate2" placeholder="Recherche" class="form-control me-1" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane active show fade" id="twoA1" role="tabpanel" aria-labelledby="tab-twoA1">
                                <div class="card-header d-flex align-items-center justify-content-between">
                                    <h5 class="card-title">
                                        Consultation(s)
                                    </h5>
                                    <div class="d-flex" >
                                        <a id="btn_search_Cons" class="btn btn-outline-success ms-auto me-2">
                                            <i class="ri-search-2-line"></i>
                                        </a>
                                        <a id="btn_refresh_table_Cons" class="btn btn-outline-info ms-auto">
                                            <i class="ri-loop-left-line"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <div class="">
                                            <table id="Table_day" class="Table_Cons">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">N° facture</th>
                                                        <th scope="col">Facture Réglé ?</th>
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
                                        <a id="btn_search_Exam" class="btn btn-outline-success ms-auto me-2">
                                            <i class="ri-search-2-line"></i>
                                        </a>
                                        <a id="btn_refresh_table_Exam" class="btn btn-outline-info ms-auto">
                                            <i class="ri-loop-left-line"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <div class="">
                                            <table id="Table_day" class="Table_Exam">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">N° facture</th>
                                                        <th scope="col">Facture réglé ?</th>
                                                        <th scope="col">Montant Total</th>
                                                        <th scope="col">Montant Examen</th>
                                                        <th scope="col">Part Assurance</th>
                                                        <th scope="col">Part Patient</th>
                                                        <th scope="col">Prélevement</th>
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
                                        <a id="btn_search_Hos" class="btn btn-outline-success ms-auto me-2">
                                            <i class="ri-search-2-line"></i>
                                        </a>
                                        <a id="btn_refresh_table_Hos" class="btn btn-outline-info ms-auto">
                                            <i class="ri-loop-left-line"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <div class="">
                                            <table id="Table_day" class="Table_Hos">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Id facture</th>
                                                        <th scope="col">Fcatue regle ?</th>
                                                        <th scope="col">Montant Total</th>
                                                        <th scope="col">Part Assurance</th>
                                                        <th scope="col">Montant a payer</th>
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
                                        <a id="btn_search_Soinsam" class="btn btn-outline-success ms-auto me-2">
                                            <i class="ri-search-2-line"></i>
                                        </a>
                                        <a id="btn_refresh_table_Soinsam" class="btn btn-outline-info ms-auto">
                                            <i class="ri-loop-left-line"></i>
                                        </a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="">
                                        <div class="">
                                            <table id="Table_day" class="Table_Soinsam">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">N°</th>
                                                        <th scope="col">Id facture</th>
                                                        <th scope="col">Fcatue regle ?</th>
                                                        <th scope="col">Montant Total</th>
                                                        <th scope="col">Montant Produit</th>
                                                        <th scope="col">Montant Soins</th>
                                                        <th scope="col">Remise</th>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('jsPDF-master/dist/jspdf.umd.js')}}"></script>
<script src="{{asset('jsPDF-AutoTable/dist/jspdf.plugin.autotable.min.js')}}"></script>
<script src="{{asset('assets/app/js/pdf/para.js')}}"></script>
<script src="{{asset('assets/app/js/pdf/consultation.js')}}"></script>
<script src="{{asset('assets/app/js/pdf/examen.js')}}"></script>
<script src="{{asset('assets/app/js/pdf/hospitalisation.js')}}"></script>
<script src="{{asset('assets/app/js/pdf/soins.js')}}"></script>

<script>
    document.addEventListener("DOMContentLoaded", function() {

        const table_cons = $('.Table_Cons').DataTable({

            processing: true,
            serverSide: false,
            ajax: function(data, callback) {

                const date1 = $('#searchDate1').val();
                const date2 = $('#searchDate2').val();
                
                $.ajax({
                    url: `/api/list_facture/${date1}/${date2}`,
                    type: 'GET',
                    success: function(response) {
                        callback({ data: response.data });
                    },
                    error: function() {
                        console.log('Error fetching data. Please check your API or network Consultation.');
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
                    render: (data, type, row) => {
                        const imgClass = row.statut_regle == 'Oui' ? '{{asset('assets/images/fac_payer.jpg')}}' 
                        : '{{asset('assets/images/fac_impayer.jpg')}}';
                        return `
                            <div class="d-flex align-items-center">
                                <a class="d-flex align-items-center flex-column me-2">
                                    <img src="${imgClass}" class="img-2x rounded-circle border border-1">
                                </a>
                                ${data}
                            </div>
                        `;
                    },
                    searchable: true,
                },
                {
                    data: 'statut_regle',
                    render: (data, type, row) => {
                        const badgeClass = row.statut_regle == 'Oui' ? 'bg-success' : 'bg-danger';
                        return `
                            <span class="badge ${badgeClass}">
                                ${data}
                            </span>
                        `;
                    },
                    searchable: true,
                },
                {
                    data: 'part_assurance',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'remise',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'montant',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient_reste',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
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
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="dropdown">
                                <i class="ri-more-2-fill"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" class="dropdown-item text-info" id="Cfacture" 
                                        data-idconsexterne="${row.idconsexterne}"
                                    >
                                        <i class="ri-printer-line"></i>
                                        Réimprimer facture
                                    </a>
                                </li>
                                ${ row.numrecu != null ?
                                `<li>
                                    <a href="#" class="dropdown-item text-info" id="printer_Cons"
                                        data-idconsexterne="${row.idconsexterne}"
                                    >
                                        <i class="ri-printer-line"></i>
                                        Réimprimer recu
                                    </a>
                                </li>` : ``}
                            </ul>
                        </div>
                    `,
                    searchable: false,
                    orderable: false,
                },
            ],
            ...dataTableConfig,
            initComplete: function(settings, json) {
                initCons();
            },
        });

        const table_exam = $('.Table_Exam').DataTable({

            processing: true,
            serverSide: false,
            ajax: function(data, callback) {

                const date1 = $('#searchDate1').val();
                const date2 = $('#searchDate2').val();
                
                $.ajax({
                    url: `/api/list_facture_examen_all/${date1}/${date2}`,
                    type: 'GET',
                    success: function(response) {
                        callback({ data: response.data });
                    },
                    error: function() {
                        console.log('Error fetching data. Please check your API or network Examen.');
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
                    render: (data, type, row) => {
                        const imgClass = row.statut_regle == 'Oui' ? '{{asset('assets/images/fac_payer.jpg')}}' 
                        : '{{asset('assets/images/fac_impayer.jpg')}}';
                        return `
                            <div class="d-flex align-items-center">
                                <a class="d-flex align-items-center flex-column me-2">
                                    <img src="${imgClass}" class="img-2x rounded-circle border border-1">
                                </a>
                                ${data}
                            </div>
                        `;
                    },
                    searchable: true,
                },
                {
                    data: 'statut_regle',
                    render: (data, type, row) => {
                        const badgeClass = row.statut_regle == 'Oui' ? 'bg-success' : 'bg-danger';
                        return `
                            <span class="badge ${badgeClass}">
                                ${data}
                            </span>
                        `;
                    },
                    searchable: true,
                },
                {
                    data: 'montant',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'montant_examen',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_assurance',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'prelevement',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient_reste',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
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
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="dropdown">
                                <i class="ri-more-2-fill"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" class="dropdown-item text-info" id="Efacture" 
                                        data-id="${row.id}"
                                    >
                                        <i class="ri-printer-line"></i>
                                        Réimprimer facture
                                    </a>
                                </li>
                                ${ row.numrecu != null ?
                                `<li>
                                    <a href="#" class="dropdown-item text-info" id="printer_Exam"
                                        data-id="${row.id}"
                                    >
                                        <i class="ri-printer-line"></i>
                                        Réimprimer recu
                                    </a>
                                </li>` : ``}
                            </ul>
                        </div>
                    `,
                    searchable: false,
                    orderable: false,
                },
            ],
            ...dataTableConfig,
            initComplete: function(settings, json) {
                initExam();
            },
        });

        const table_hos = $('.Table_Hos').DataTable({

            processing: true,
            serverSide: false,
            ajax: function(data, callback) {
                const date1 = $('#searchDate1').val();
                const date2 = $('#searchDate2').val();
                
                $.ajax({
                    url: `/api/list_facture_hos_all/${date1}/${date2}`,
                    type: 'GET',
                    success: function(response) {
                        callback({ data: response.data });
                    },
                    error: function() {
                        console.log('Error fetching data. Please check your API or network Hos.');
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
                    render: (data, type, row) => {
                        const imgClass = row.statut_regle == 'Oui' ? '{{asset('assets/images/fac_payer.jpg')}}' 
                        : '{{asset('assets/images/fac_impayer.jpg')}}';
                        return `
                            <div class="d-flex align-items-center">
                                <a class="d-flex align-items-center flex-column me-2">
                                    <img src="${imgClass}" class="img-2x rounded-circle border border-1">
                                </a>
                                ${data}
                            </div>
                        `;
                    },
                    searchable: true,
                },
                {
                    data: 'statut_regle',
                    render: (data, type, row) => {
                        const badgeClass = row.statut_regle == 'Oui' ? 'bg-success' : 'bg-danger';
                        return `
                            <span class="badge ${badgeClass}">
                                ${data}
                            </span>
                        `;
                    },
                    searchable: true,
                },
                {
                    data: 'montant',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_assurance',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'remise',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient_reste',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
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
                        ${ row.montant > 0 ?
                        `<div class="btn-group">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="dropdown">
                                <i class="ri-more-2-fill"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" class="dropdown-item text-info" id="Hfacture" 
                                        data-numhospit="${row.numhospit}"
                                    >
                                        <i class="ri-printer-line"></i>
                                        Réimprimer facture
                                    </a>
                                </li>` : ``}
                                ${ row.numrecu != null ?
                                `<li>
                                    <a href="#" class="dropdown-item text-info" id="printer_Hos"
                                        data-numhospit="${row.numhospit}"
                                    >
                                        <i class="ri-printer-line"></i>
                                        Réimprimer recu
                                    </a>
                                </li>
                            </ul>
                        </div>` : ``}
                    `,
                    searchable: false,
                    orderable: false,
                },
            ],
            ...dataTableConfig,
            initComplete: function(settings, json) {
                initHos();
            },
        });

        const table_soinsam = $('.Table_Soinsam').DataTable({

            processing: true,
            serverSide: false,
            ajax: function(data, callback) {

                const date1 = $('#searchDate1').val();
                const date2 = $('#searchDate2').val();
                
                $.ajax({
                    url: `/api/list_facture_soinsam_all/${date1}/${date2}`,
                    type: 'GET',
                    success: function(response) {
                        callback({ data: response.data });
                    },
                    error: function() {
                        console.log('Error fetching data. Please check your API or network Soinsam.');
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
                    render: (data, type, row) => {
                        const imgClass = row.statut_regle == 'Oui' ? '{{asset('assets/images/fac_payer.jpg')}}' 
                        : '{{asset('assets/images/fac_impayer.jpg')}}';
                        return `
                            <div class="d-flex align-items-center">
                                <a class="d-flex align-items-center flex-column me-2">
                                    <img src="${imgClass}" class="img-2x rounded-circle border border-1">
                                </a>
                                ${data}
                            </div>
                        `;
                    },
                    searchable: true,
                },
                {
                    data: 'statut_regle',
                    render: (data, type, row) => {
                        const badgeClass = row.statut_regle == 'Oui' ? 'bg-success' : 'bg-danger';
                        return `
                            <span class="badge ${badgeClass}">
                                ${data}
                            </span>
                        `;
                    },
                    searchable: true,
                },
                {
                    data: 'montant',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'prototal',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'stotal',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'remise',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_assurance',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient_reste',
                    render: (data, type, row) => {
                        const value = data ? formatPriceT(data) : 0;
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
                        <div class="btn-group">
                            <button type="button" class="btn btn-outline-primary" data-bs-toggle="dropdown">
                                <i class="ri-more-2-fill"></i>
                            </button>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#" class="dropdown-item text-info" id="Sfacture" 
                                        data-id="${row.id_soins}"
                                    >
                                        <i class="ri-printer-line"></i>
                                        Réimprimer facture
                                    </a>
                                </li>
                                ${ row.numrecu != null ?
                                `<li>
                                    <a href="#" class="dropdown-item text-info" id="printer_Soinsam"
                                        data-id="${row.id_soins}"
                                    >
                                        <i class="ri-printer-line"></i>
                                        Réimprimer recu
                                    </a>
                                </li>` : ``}
                            </ul>
                        </div>
                    `,
                    searchable: false,
                    orderable: false,
                },
            ],
            ...dataTableConfig,
            initComplete: function(settings, json) {
                initSoinsam();
            },
        });

        //-----------------------------------------------------------------------

        $('#searchDate1').on('change', function() {
            const date1 = $(this).val();
            
            if (date1) {
                $('#searchDate2').val(date1);
                $('#searchDate2').attr('min', date1);
            }
        });

        $('#searchDate2').on('change', function() {
            const date2 = $(this).val();
            const date1 = $('#searchDate1').val();

            if (date2 && date1 && new Date(date2) < new Date(date1)) {
                alert('La deuxiéme date ne peut pas être supérieure à la premiére date.');
                $(this).val(date1);
            }
        });

        //-----------------------------------------------------------------------

        function formatDateSearch(date)
        {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        };

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
        //-----------------------------------------------------------------------

        function initCons() 
        {

            $('#Table_day').on('click', '#Cfacture', function() {
                var preloader_ch = `
                    <div id="preloader_ch">
                        <div class="spinner_preloader_ch"></div>
                    </div>
                `;
                // Add the preloader to the body
                document.body.insertAdjacentHTML('beforeend', preloader_ch);

                const code = $(this).data('idconsexterne');

                fetch(`/api/fiche_consultation/${code}`) // API endpoint
                .then(response => response.json())
                .then(data => {
                    // Access the 'chambre' array from the API response
                    const facture = data.facture;

                    var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }

                    pdfFactureConsultation(facture);

                })
                .catch(error => {
                    console.error('Erreur lors du chargement des données:', error);
                });
            });

            $('.Table_Cons').on('click', '#printer_Cons', function() {

                var preloader_ch = `
                    <div id="preloader_ch">
                        <div class="spinner_preloader_ch"></div>
                    </div>
                `;
                // Add the preloader to the body
                document.body.insertAdjacentHTML('beforeend', preloader_ch);

                const code = $(this).data('idconsexterne');

                fetch(`/api/fiche_consultation/${code}`)
                    .then(response => response.json())
                    .then(data => {

                        const facture = data.facture;

                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }

                        pdfFactureRecuConsultation(facture);
                    })
                    .catch(error => {
                        console.error('Erreur lors du chargement des données:', error);
                    });
            });
        }

        $('#btn_refresh_table_Cons').on('click', function () {
            const today = new Date();
            const twoMonthsAgo = new Date(today);
            twoMonthsAgo.setMonth(today.getMonth() - 1);

            $('#searchDate1').val(formatDateSearch(twoMonthsAgo));
            $('#searchDate2').val(formatDateSearch(today));

            table_cons.ajax.reload(null, false);
        });

        $('#btn_search_Cons').on('click', function () {
            table_cons.ajax.reload(null, false); 
        });

        //-----------------------------------------------------------------------

        function initExam() 
        {

            $('.Table_Exam').on('click', '#Efacture', function() {
                var preloader_ch = `
                    <div id="preloader_ch">
                        <div class="spinner_preloader_ch"></div>
                    </div>
                `;
                // Add the preloader to the body
                document.body.insertAdjacentHTML('beforeend', preloader_ch);

                const id = $(this).data('id');

                fetch(`/api/detail_examen/${id}`) // API endpoint
                    .then(response => response.json())
                    .then(data => {
                        // Access the 'chambre' array from the API response
                        const facture = data.facture;
                        const examen = data.examen;
                        const sumMontantEx = data.sumMontantEx;

                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }

                        pdfFactureExamen(examen, facture, sumMontantEx);

                    })
                    .catch(error => {
                        console.error('Erreur lors du chargement des données:', error);
                    });
            });

            $('.Table_Exam').on('click', '#printer_Exam', function() {

                var preloader_ch = `
                    <div id="preloader_ch">
                        <div class="spinner_preloader_ch"></div>
                    </div>
                `;
                // Add the preloader to the body
                document.body.insertAdjacentHTML('beforeend', preloader_ch);

                const id = $(this).data('id');

                fetch(`/api/detail_examen/${id}`) // API endpoint
                    .then(response => response.json())
                    .then(data => {

                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }

                        const examen = data.examen;
                        const facture = data.facture;
                        const sumMontantEx = data.sumMontantEx;

                        pdfFactureRecuExamen(examen, facture, sumMontantEx);

                    })
                    .catch(error => {
                        console.error('Erreur lors du chargement des données:', error);
                    });
            });
        }

        $('#btn_refresh_table_Exam').on('click', function () {
            const today = new Date();
            const twoMonthsAgo = new Date(today);
            twoMonthsAgo.setMonth(today.getMonth() - 1);

            $('#searchDate1').val(formatDateSearch(twoMonthsAgo));
            $('#searchDate2').val(formatDateSearch(today));

            table_exam.ajax.reload(null, false);
        });

        $('#btn_search_Exam').on('click', function () {
            table_exam.ajax.reload(null, false); 
        });

        //-----------------------------------------------------------------------

        function initHos() 
        {

            $('.Table_Hos').on('click', '#Hfacture', function() {

                var preloader_ch = `
                    <div id="preloader_ch">
                        <div class="spinner_preloader_ch"></div>
                    </div>
                `;
                // Add the preloader to the body
                document.body.insertAdjacentHTML('beforeend', preloader_ch);

                const numhospit = $(this).data('numhospit');

                fetch(`/api/detail_hos/${numhospit}`) // API endpoint
                    .then(response => response.json())
                    .then(data => {
                        // Access the 'chambre' array from the API response
                        const hopital = data.hopital;
                        const prestation = data.prestation;

                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }

                        pdfFacturehos(hopital, prestation);

                    })
                    .catch(error => {
                        console.error('Erreur lors du chargement des données:', error);
                    });
            });

            $('.Table_Hos').on('click', '#printer_Hos', function() {

                var preloader_ch = `
                    <div id="preloader_ch">
                        <div class="spinner_preloader_ch"></div>
                    </div>
                `;
                // Add the preloader to the body
                document.body.insertAdjacentHTML('beforeend', preloader_ch);

                const numhospit = $(this).data('numhospit');

                fetch(`/api/detail_hos_recu/${numhospit}`) // API endpoint
                    .then(response => response.json())
                    .then(data => {
                        // Access the 'chambre' array from the API response
                        const hopital = data.hopital;
                        const prestation = data.prestation;

                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }

                        pdfFactureRecuhos(hopital, prestation);

                    })
                    .catch(error => {
                        console.error('Erreur lors du chargement des données:', error);
                    });
            });
        }

        $('#btn_refresh_table_Hos').on('click', function () {
            const today = new Date();
            const twoMonthsAgo = new Date(today);
            twoMonthsAgo.setMonth(today.getMonth() - 2);

            $('#searchDate1').val(formatDateSearch(twoMonthsAgo));
            $('#searchDate2').val(formatDateSearch(today));

            table_hos.ajax.reload(null, false);
        });

        $('#btn_search_Hos').on('click', function () {
            table_hos.ajax.reload(null, false); 
        });

        //-----------------------------------------------------------------------

        function initSoinsam() 
        {

            $('.Table_Soinsam').on('click', '#Sfacture', function() {

                var preloader_ch = `
                    <div id="preloader_ch">
                        <div class="spinner_preloader_ch"></div>
                    </div>
                `;
                // Add the preloader to the body
                document.body.insertAdjacentHTML('beforeend', preloader_ch);

                const id = $(this).data('id');

                fetch(`/api/imp_fac_soinam/${id}`) // API endpoint
                    .then(response => response.json())
                    .then(data => {
                        // Access the 'chambre' array from the API response
                        const patient = data.patient;
                        const soins = data.soins;
                        const produit = data.produit;

                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }

                        pdfFactureSoins(patient, soins, produit);

                    })
                    .catch(error => {
                        console.error('Erreur lors du chargement des données:', error);
                    });
            });

            $('.Table_Soinsam').on('click', '#printer_Soinsam', function() {

                var preloader_ch = `
                    <div id="preloader_ch">
                        <div class="spinner_preloader_ch"></div>
                    </div>
                `;
                // Add the preloader to the body
                document.body.insertAdjacentHTML('beforeend', preloader_ch);

                const id = $(this).data('id');

                fetch(`/api/detail_soinam/${id}`) // API endpoint
                    .then(response => response.json())
                    .then(data => {
                        // Access the 'chambre' array from the API response

                        if (data.existep) {
                            
                            showAlert("ALERT", 'Une erreur s\'est produite, veuillez réessayer plutard .', "error");
                            return; 
                        }

                        const patient = data.patient;
                        const soins = data.soins;
                        const produit = data.produit;

                        var preloader = document.getElementById('preloader_ch');
                        if (preloader) {
                            preloader.remove();
                        }

                        pdfFactureRecuSoins(patient, soins, produit);

                    })
                    .catch(error => {
                        console.error('Erreur lors du chargement des données:', error);
                    });
            });
        }

        $('#btn_refresh_table_Soinsam').on('click', function () {
            const today = new Date();
            const twoMonthsAgo = new Date(today);
            twoMonthsAgo.setMonth(today.getMonth() - 1);

            $('#searchDate1').val(formatDateSearch(twoMonthsAgo));
            $('#searchDate2').val(formatDateSearch(today));

            table_soinsam.ajax.reload(null, false);
        });

        $('#btn_search_Soinsam').on('click', function () {
            table_soinsam.ajax.reload(null, false); 
        });

    });
</script>



@endsection