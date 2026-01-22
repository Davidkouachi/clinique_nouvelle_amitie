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
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'remise',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'montant',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
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
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'montant_examen',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_assurance',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'prelevement',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
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
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_assurance',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'remise',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
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
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'prototal',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'stotal',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'remise',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_assurance',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
                        return `<span class="${color}">${value} Fcfa</span>`;
                    },
                    searchable: true,
                },
                {
                    data: 'part_patient',
                    render: (data, type, row) => {
                        const value = data ? formatPrice(data) : 0;
                        const color = 'text-dark';
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

        function formatDateSearch(date)
        {
            const year = date.getFullYear();
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are 0-indexed
            const day = String(date.getDate()).padStart(2, '0');
            return `${year}-${month}-${day}`;
        };

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
        //     const today = new Date();
        //     const twoMonthsAgo = new Date(today);
        //     twoMonthsAgo.setMonth(today.getMonth() - 2);

        //     $('#searchDate1').val(formatDateSearch(twoMonthsAgo));
        //     $('#searchDate2').val(formatDateSearch(today));
        //     $('#statut').val('tous').trigger('change');

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

        // $('.Table_Cons').on('draw.dt', function() {
        //     initCons();
        // });

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

                    generatePDFInvoice(facture);

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

                        generatePDFInvoice_Cons(facture);
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
                        { label: "Société", value: facture.societe },
                        { label: "Assurance", value: facture.assurance},
                        { label: "Matricule", value: facture.matriculeassure },
                        { label: "N° de Bon", value: facture.numbon || 'Aucun' },
                    );
                }

                patientInfo.forEach(info => {
                    doc.setFontSize(9);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin, yPoss);
                    doc.setFont("Helvetica", "bold");
                    doc.text(": " + info.value, leftMargin + 35, yPoss);
                    yPoss += 7;
                });

                yPoss = (yPos + 109);

                const payerInfo = [
                    { label: "Total Verser", value: (formatPriceT(facture.part_patient_regler) || '0')+" Fcfa" },
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

        function generatePDFInvoice(facture) 
        {

            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({ orientation: 'p', unit: 'mm', format: 'a4' });

            const pdfFilename = "Consultation Facture N°" + facture.numfac + " du " + formatDate(facture.date);
            doc.setProperties({
                title: pdfFilename,
            });

            yPos = 10;

            function drawConsultationSection(yPos) {
                rightMargin = 15;
                leftMargin = 15;
                pdfWidth = doc.internal.pageSize.getWidth();

                const titlea = "Facture";
                doc.setFontSize(100);
                doc.setTextColor(242, 237, 237); // Gray color for background effect
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
                const formattedDate = consultationDate.toLocaleDateString();
                // const formattedTime = consultationDate.toLocaleTimeString();
                // doc.text("N° Dossier: " + facture.numdossier, 15, (yPos + 25));
                doc.text("Date: " + formattedDate, 15, (yPos + 28));

                //Ligne de séparation
                doc.setFontSize(15);
                doc.setFont("Helvetica", "bold");
                doc.setLineWidth(0.5);
                doc.setTextColor(0, 0, 0);
                // doc.line(10, 35, 200, 35); 
                const titleR = "FACTURE DE CONSULTATION";
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
                const titleN = "N° "+ facture.numfac;
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

                yPoss = (yPos + 50);

                let assurer;

                if (facture.assure == 1) {
                    assurer = 'Oui';
                } else {
                    assurer = 'Non';
                }

                const patientInfo = [
                    { label: "Nom et Prénoms", value: facture.nom_patient },
                    { label: "Assurer", value: assurer },
                    { label: "Age", value: calculateAge(facture.datenais)+" an(s)" },
                    { label: "Contact", value: facture.telpatient }
                ];

                if (facture.assure == 1) {
                    patientInfo.push(
                        { label: "Société", value: facture.societe },
                        { label: "Assurance", value: facture.assurance },
                        { label: "Filiation", value: facture.filiation },
                        { label: "Matricule", value: facture.matriculeassure },
                        { label: "N° de Bon", value: facture.numbon || 'Aucun' },
                    );
                }

                patientInfo.forEach(info => {
                    doc.setFontSize(8);
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
                    { label: "Medecin", value: facture.nom_medecin },
                    { label: "Spécialité", value: facture.specialite },
                    { label: "Prix Consultation", value: formatPriceT(facture.montant)+" Fcfa" },
                ];

                medecinInfo.forEach(info => {
                    doc.setFontSize(8);
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
                doc.text(": "+formatPriceT(facture.partpatient)+" Fcfa", leftMargin + 135, yPoss);

                if (facture.assure == 1 ) {
                    doc.setFontSize(8);
                    doc.setFont("Helvetica", "bold");
                    doc.setTextColor(0, 0, 0);
                    doc.text("Imprimer le "+new Date().toLocaleDateString()+" à "+new Date().toLocaleTimeString() , 5, yPoss + 16);
                }else{
                    doc.setFontSize(8);
                    doc.setFont("Helvetica", "bold");
                    doc.setTextColor(0, 0, 0);
                    doc.text("Imprimer le "+new Date().toLocaleDateString()+" à "+new Date().toLocaleTimeString() , 5, yPoss + 28);
                }

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

        // $('.Table_Exam').on('draw.dt', function() {
        //     initExam();
        // });

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

                        generatePDFInvoiceExamen(examen, facture, sumMontantEx);

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

                        generatePDFInvoice_Exam(examen, facture, sumMontantEx);

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

                if (facture.assure == 1) {
                    yPoss += 20;
                }

                const donneeTables = examen;
                let yPossT = yPoss + 20; // Initialisation de la position Y pour le tableau des soins

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

                compteInfo.push({ label: "Remise", value: formatPriceT(facture.remise) + " Fcfa" });

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
                    { label: "Total Verser", value: (formatPriceT(facture.part_patient_regler) || '0')+" Fcfa" },
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

        function generatePDFInvoiceExamen(examen, facture, sumMontantEx) 
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

                const titlea = "Facture";
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
                const titleR = "FACTURE EXAMEN";
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
                const titleN = "N° "+facture.numfacbul;
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

                if (facture.assure == 1) {
                    yPoss += 20;
                }
                
                const donneeTables = examen;
                let yPossT = yPoss + 20; // Initialisation de la position Y pour le tableau des soins

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
                    { label: "Montant Total", value: formatPriceT(facture.montant)+" Fcfa"},
                    ...(facture.assure == 1 ? 
                            [{ label: "Part assurance", value: formatPriceT(facture.part_assurance) + " Fcfa" }] 
                            : []),
                    { label: "Prélevement", value: formatPriceT(facture.prelevement)+ " Fcfa" }
                ];

                if (facture.assure == 1 ) {
                    compteInfo.push({ label: "Taux", value: facture.taux + "%" });
                }

                compteInfo.push({ label: "Remise", value: formatPriceT(facture.remise) + " Fcfa" });

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

        // $('.Table_Exam').on('draw.dt', function() {
        //     initExam();
        // });

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

                        generatePDFInvoiceHos(hopital, prestation);

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

                        generatePDFInvoice_Hos(hopital, prestation);

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

                yPoss = (yPoss + 14);

                const typeInfo = [
                    { label: "Type d'admission", value: hopital.type_hospit },
                    { label: "Nature d'admission", value: hopital.nature_hospit },
                ];

                typeInfo.forEach(info => {
                    doc.setFontSize(8);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 35, yPoss);
                    yPoss += 7;
                });

                yPoss = (yPoss);

                const donneeTable = prestation;

                let totalGeneral = 0;
                let totalAssurance = 0; // Total Part Assurance
                let totalPatient = 0;

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

                if (hopital.montant_restant < hopital.montant_pat) {
                
                    yPoss = doc.autoTable.previous.finalY || yPossT + 10;
                    yPoss = yPoss + 10;

                    if (yPoss + 30 > doc.internal.pageSize.height) {
                        doc.addPage();
                        yPoss = 20;
                    }
                        doc.setFontSize(10);
                        doc.setFont("Helvetica", "bold");
                        doc.text('Total Versé', leftMargin , yPoss);
                        doc.setFont("Helvetica", "bold");
                        doc.text(": " + formatPriceT(hopital.part_patient_regler) + " Fcfa", leftMargin + 40, yPoss);
                        yPoss += 7;


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

        function generatePDFInvoiceHos(hopital, prestation)
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

                const titlea = "Facture";
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
                const titleR = "FACTURE HOSPITALISATION";
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
                const titleN = "N° "+hopital.numfachospit;
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

                yPoss = (yPos + 40);

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

                yPoss = (yPos + 40);

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

                yPoss = (yPos + 97);

                const typeInfo = [
                    { label: "Type d'admission", value: hopital.type_hospit },
                    { label: "Nature d'admission", value: hopital.nature_hospit },
                ];

                typeInfo.forEach(info => {
                    doc.setFontSize(8);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 35, yPoss);
                    yPoss += 7;
                });

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
                    ];

                    if (hopital.assure === 1) {
                        finalInfo.push({ label: "Taux", value: hopital.taux + "%" });
                    }

                    finalInfo.push({ label: "Remise", value: formatPriceT(hopital.remise) + " Fcfa" });

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
                } else {
                    yPoss += 7;

                    const finalInfo = [
                        { label: "Montant Total", value: formatPriceT(hopital.montant_total) + " Fcfa" },
                        ...(hopital.assure === 1 ? [{ label: "Part assurance", value: formatPriceT(hopital.montant_ass) + " Fcfa" }] : []),
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

                        generatePDFInvoiceSoinsam(patient, soins, produit);

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

                        generatePDFInvoice_Soinsam(patient, soins, produit);

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

        function generatePDFInvoice_Soinsam(patient, soins, produit) 
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
                        { label: "Société", value: patient.assurance },
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
                    yPoss += 20;
                }

                const donneeTables = soins;
                let yPossT = yPoss + 20; 

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
                doc.text(": "+formatPriceT(patient.part_patient)+" Fcfa", leftMargin + 150, yPoss);

                if (patient.numrecu != null) {

                    yPoss = doc.autoTable.previous.finalY || yPossT + 10;
                    yPoss = yPoss + 10;

                    if (yPoss + 30 > doc.internal.pageSize.height) {
                        doc.addPage();
                        yPoss = 20;
                    }
                        doc.setFontSize(10);
                        doc.setFont("Helvetica", "bold");
                        doc.text('Total Versé', leftMargin , yPoss);
                        doc.setFont("Helvetica", "bold");
                        doc.text(": " + formatPriceT(patient.part_patient_regler) + " Fcfa", leftMargin + 40, yPoss);
                        yPoss += 7;

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

        function generatePDFInvoiceSoinsam(patient, soins, produit) {
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

                const titlea = "Facture";
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
                const formattedTime = spatientDate.toLocaleTimeString();
                doc.text("Date: " + formattedDate, 15, (yPos + 25));
                doc.text("Heure: " + formattedTime, 15, (yPos + 30));

                //Ligne de séparation
                doc.setFontSize(15);
                doc.setFont("Helvetica", "bold");
                doc.setLineWidth(0.5);
                doc.setTextColor(0, 0, 0);
                // doc.line(10, 35, 200, 35); 
                const titleR = "FACTURE SOINS AMBULATOIRES";
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
                const titleN = "N° "+patient.numfac_soins;
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

                yPoss = (yPos + 40);

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
                        { label: "Société", value: patient.assurance },
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

                yPoss = (yPos + 40);

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
                    yPoss += 20;
                }

                const donneeTables = soins;
                let yPossT = yPoss + 20; 

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
                    { label: "Remise", value: formatPriceT(patient.remise) + " Fcfa" },
                ];


                if (patient.assure == 1) {
                    compteInfo.push({ label: "Taux", value: patient.taux + "%" });
                }

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