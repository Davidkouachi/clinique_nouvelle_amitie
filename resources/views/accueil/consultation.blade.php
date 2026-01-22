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
        <li class="breadcrumb-item text-primary" aria-current="page">
            Consultations
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
    <div class="row gx-3 mb-3" id="stat_consultation_date" style="display: none;">
        <div class="row gx-3">
            <div class="col-12">
                <div class="card mb-3">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <div class="w-100">
                            <div class="input-group">
                                <span class="input-group-text">Du</span>
                                <input type="date" id="searchDate1_stat" placeholder="Recherche" class="form-control me-1" value="{{ date('Y-m-d', strtotime('-1 months')) }}" max="{{ date('Y-m-d') }}">
                                <span class="input-group-text">au</span>
                                <input type="date" id="searchDate2_stat" placeholder="Recherche" class="form-control me-1" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}">
                                <a id="btn_search_stat_const_date" class="btn btn-outline-success ms-auto">
                                    <i class="ri-search-2-line"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row gx-3 mb-3" id="stat_consultation" ></div>

    <div class="row gx-3">
        <div class="col-12">
            <div class="card mb-3">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="card-title">
                        Liste des Conultations
                    </h5>
                </div>
                <div class="card-header d-flex align-items-center justify-content-between">
                    <div class="w-100">
                        <div class="input-group">
                            <span class="input-group-text">Du</span>
                            {{-- <input type="date" id="searchDate1" placeholder="Recherche" class="form-control me-1" value="{{ date('Y-m-d', strtotime('-1 months')) }}" max="{{ date('Y-m-d') }}"> --}}
                            <input type="date" id="searchDate1" placeholder="Recherche" class="form-control me-1" value="{{ date('Y-m-d', strtotime('-15 days')) }}" max="{{ date('Y-m-d') }}">
                            <span class="input-group-text">au</span>
                            <input type="date" id="searchDate2" placeholder="Recherche" class="form-control me-1" value="{{ date('Y-m-d') }}" max="{{ date('Y-m-d') }}">
                            <a id="btn_search_table" class="btn btn-outline-success ms-auto">
                                <i class="ri-search-2-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="">
                        <div class="">
                            <table id="Table_day" class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">N°</th>
                                        <th scope="col">N° Consultation</th>
                                        <th scope="col">N° dossier</th>
                                        <th scope="col">Nom et Prénoms</th>
                                        {{-- <th scope="col">Contact</th> --}}
                                        <th scope="col">Médecin consultant</th>
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

<script src="{{asset('jsPDF-master/dist/jspdf.umd.js')}}"></script>

<script>
    $(document).ready(function() {

        $("#deleteBtnCons").on("click", delete_cons);

        $('#btn_search_table').on('click', function() {
            $('#Table_day').DataTable().ajax.reload();
        });

        $('#searchDate1').on('change', function() {
            const date1Value = $(this).val(); // Récupère la valeur de #searchDate1
            const $date2 = $('#searchDate2'); // Sélecteur pour #searchDate2

            if ($date2.val() && new Date(date1Value) > new Date($date2.val())) {
                showAlert('Erreur', 'La date de début ne peut pas être supérieure à la date de fin.', 'warning');
                $(this).val($date2.val()); // Définit la valeur de #searchDate1 égale à celle de #searchDate2
            } else {
                $date2.attr('min', date1Value); // Définit la date minimale pour #searchDate2
            }
        });

        $('#searchDate2').on('change', function() {
            const date1Value = $('#searchDate1').val(); // Récupère la valeur de #searchDate1
            const date2Value = $(this).val(); // Récupère la valeur de #searchDate2

            if (new Date(date1Value) > new Date(date2Value)) {
                showAlert('Erreur', 'La date de fin ne peut pas être inférieure à la date de début.', 'warning');
                $(this).val(date1Value); // Définit la valeur de #searchDate2 égale à celle de #searchDate1
            }
        });

        $('#btn_affiche_stat').on('click', function() {
            $('#div_btn_affiche_stat').hide();
            $('#div_btn_cache_stat').show();

            $('#stat_consultation_date').show();
            $('#stat_consultation').empty();

            $('#stat_consultation').css({
                'height': 'auto',  // Vous pouvez ajuster la hauteur à votre convenance
                'overflow-y': 'hidden'
            });
        });

        $('#btn_cache_stat').on('click', function() {
            $('#div_btn_affiche_stat').show();
            $('#div_btn_cache_stat').hide();

            $('#stat_consultation_date').hide();
            $('#stat_consultation').empty();

            $('#stat_consultation').css({
                'height': 'auto',  // Vous pouvez ajuster la hauteur à votre convenance
                'overflow-y': 'hidden'
            });
        });

        $('#btn_search_stat_const_date').on('click', function() {
            Statistique_cons();
        });


        function formatPrice(input) {
            // Remove all non-numeric characters except the comma
            input = input.replace(/[^\d,]/g, '');

            // Convert comma to dot for proper float conversion
            input = input.replace(',', '.');

            // Convert to float and round to the nearest whole number
            let number = Math.round(parseFloat(input));
            if (isNaN(number)) {
                return '';
            }

            // Format the number with dot as thousands separator
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function formatPriceT(price) {

            // Convert to float and round to the nearest whole number
            let number = Math.round(parseInt(price));
            if (isNaN(number)) {
                return '';
            }

            // Format the number with dot as thousands separator
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
        }

        function formatDate(dateString) {
                const date = new Date(dateString);
                
                const day = String(date.getDate()).padStart(2, '0');
                const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
                const year = date.getFullYear();
                
                const hours = String(date.getHours()).padStart(2, '0');
                const minutes = String(date.getMinutes()).padStart(2, '0');
                const seconds = String(date.getSeconds()).padStart(2, '0');
                
                return `${day}/${month}/${year} ${hours}:${minutes}:${seconds}`; // Format as dd/mm/yyyy hh:mm:ss
        }

        function showAlert(title, message, type) {
            Swal.fire({
                title: title,
                text: message,
                icon: type,
            });
        }

        // ------------------------------------------------------------------

        function Statistique_cons() {

            const stat_consultation = document.getElementById("stat_consultation");

            const div = document.createElement('div');
            div.innerHTML = `
                <div class="d-flex justify-content-center align-items-center mb-3">
                    <div class="spinner-border text-warning me-2" role="status" aria-hidden="true"></div>
                    <strong>Chargement des données...</strong>
                </div>
            `;
            stat_consultation.appendChild(div);

            const date1 = $('#searchDate1_stat').val();
            const date2 = $('#searchDate2_stat').val();

            $('#div_btn_affiche_stat').hide();
            $('#div_btn_cache_stat').hide();

            fetch(`/api/statistique_reception_cons/${date1}/${date2}`) // API endpoint
                .then(response => response.json())
                .then(data => {

                    const typeactes = data.typeacte;
                    stat_consultation.innerHTML = '';

                    $('#div_btn_affiche_stat').hide();
                    $('#div_btn_cache_stat').show();

                    if (typeactes.length > 0) {

                        // Loop through each item in the chambre array
                        typeactes.forEach((item, index) => {
                            // Create a new row
                            const row = document.createElement('div');
                            row.className = "col-xxl-3 col-xl-4 col-md-6 col-12";
                            // Create and append cells to the row based on your table's structure
                            row.innerHTML = `
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="p-2 border border-primary rounded-circle me-3">
                                                <div class="icon-box md bg-primary-subtle rounded-5">
                                                    <i class="ri-stethoscope-line fs-4 text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="lh-1">
                                                    ${item.libgaran}
                                                </h6>
                                                <p class="m-0">
                                                    ${item.nbre} Consultation(s)
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-1">
                                            <div class="text-start">
                                                <p class="mb-0 text-primary">Part Assurance</p>
                                            </div>
                                            <div class="text-end">
                                                <p class="mb-0 text-primary">
                                                    ${formatPrice(item.part_assurance.toString())} Fcfa
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-1">
                                            <div class="text-start">
                                                <p class="mb-0 text-primary">Part Patient</p>
                                            </div>
                                            <div class="text-end">
                                                <p class="mb-0 text-primary">
                                                    ${formatPrice(item.part_patient.toString())} Fcfa
                                                </p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-1">
                                            <div class="text-start">
                                                <p class="mb-0 text-primary">Montant Total</p>
                                            </div>
                                            <div class="text-end">
                                                <p class="mb-0 text-primary">
                                                    ${formatPrice(item.total.toString())} Fcfa
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            `;
                            // Append the row to the table body
                            stat_consultation.style.height = "550px";
                            stat_consultation.style.overflowY = "auto";
                            stat_consultation.appendChild(row);

                        });
                    } else {

                        stat_consultation.innerHTML = '';
                        const div_alert = document.createElement('div');
                        div_alert.innerHTML = `
                            <div class="d-flex justify-content-center align-items-center mb-3">
                                <strong class="text-danger" >Aucune données n'a été trouvées</strong>
                            </div>
                        `;
                        stat_consultation.appendChild(div_alert);

                    }
                })
                .catch(error => {

                    stat_consultation.innerHTML = '';
                    const div_alert = document.createElement('div');
                    div_alert.innerHTML = `
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <strong class="text-danger" >Erreur lors du chargement des données</strong>
                        </div>
                    `;
                    stat_consultation.appendChild(div_alert);

                    console.error('Erreur lors du chargement des données:', error);
                });
        }

        // ------------------------------------------------------------------

        function formatDate(dateString) {

            const date = new Date(dateString);
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0'); // Months are zero-based
            const year = date.getFullYear();

            return `${day}/${month}/${year}`; // Format as dd/mm/yyyy
        }

        function formatDateHeure(dateString) {

            const date = new Date(dateString);
                
            const day = String(date.getDate()).padStart(2, '0');
            const month = String(date.getMonth() + 1).padStart(2, '0');
            const year = date.getFullYear();

            const hours = String(date.getHours()).padStart(2, '0');
            const minutes = String(date.getMinutes()).padStart(2, '0');
            const seconds = String(date.getSeconds()).padStart(2, '0');

            return `${day}/${month}/${year} à ${hours}:${minutes}:${seconds}`;
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

        $('#Table_day').DataTable({

            processing: true,
            serverSide: false,
            ajax: function(data, callback) {
                const startDate = $('#searchDate1').val();
                const endDate = $('#searchDate2').val();
                
                $.ajax({
                    url: `/api/list_cons_all/${startDate}/${endDate}`,
                    type: 'GET',
                    success: function(response) {
                        callback({ data: response.data });
                    },
                    error: function() {
                        console.log('Error fetching data. Please check your API or network.');
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
                    data: 'idconsexterne',
                    searchable: true, 
                },
                {
                    data: 'numdossier',
                    render: (data, type, row) => {
                        return data ? `${data}` : 'Aucun';
                    },
                    searchable: true,
                },
                { 
                    data: 'nom_patient',
                    searchable: true, 
                },
                // { 
                //     data: 'tel_patient', 
                //     render: (data) => `+225 ${data}`,
                //     searchable: true, 
                // },
                { 
                    data: 'nom_medecin',
                    searchable: true, 
                },
                { 
                    data: 'garantie',
                    searchable: true, 
                },
                { 
                    data: 'montant', 
                    render: (data) => `${formatPriceT(data)} Fcfa`,
                    searchable: true, 
                },
                { 
                    data: 'numfac', 
                    render: (data) => `${data}`,
                    searchable: true, 
                },
                { 
                    data: 'date', 
                    render: (data) => `${formatDate(data)}`,
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
                                    data-idconsexterne="${row.idconsexterne}">
                                        <i class="ri-printer-fill"></i>
                                        Imprimer Facture
                                    </a>
                                </li>
                                <li>
                                    <a href="#" class="dropdown-item text-info" id="Cfiche" 
                                    data-idconsexterne="${row.idconsexterne}">
                                        <i class="ri-printer-fill"></i>
                                        Imprimer Fiche
                                    </a>
                                </li>
                                ${parseFloat(row.montant_regle) === 0 ? `
                                    <li>
                                        <a href="#" class="dropdown-item text-danger" data-bs-toggle="modal" data-bs-target="#MdeleteCons" id="deleteCons" data-numfac="${row.numfac}" 
                                        >
                                            <i class="ri-delete-bin-line"></i>
                                            Supprimer
                                        </a>
                                    </li>` : 
                                ''}
                            </ul>
                        </div>
                    `,
                    searchable: false,
                    orderable: false,
                }
            ],
            ...dataTableConfig,
            initComplete: function(settings, json) {
                initializeRowEventListeners();
            },
        });

        function initializeRowEventListeners() {

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

            $('#Table_day').on('click', '#Cfiche', function() {
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

                    generatePDFficheCons(facture);

                })
                .catch(error => {
                    console.error('Erreur lors du chargement des données:', error);
                });
            });

            $('#Table_day').on('click', '#deleteCons', function() {
                const numfac = $(this).data('numfac');

                $('#IddeleteCons').val(numfac);
            });
        }

        function generatePDFInvoice(facture) {

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
                        { label: "Matricule Assurance", value: facture.matriculeassure },
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

        function generatePDFficheCons(facture) {

            const { jsPDF } = window.jspdf;
            const doc = new jsPDF();

            const pdfFilename = "Fiche Consultation N°" + facture.numfac + " du " + formatDate(facture.date);
            doc.setProperties({
                title: pdfFilename,
            });

            yPos = 10;

            function drawConsultationSection(yPos) {
                rightMargin = 15;
                leftMargin = 15;
                pdfWidth = doc.internal.pageSize.getWidth();

                const titlea = "Fiche";
                doc.setFontSize(100);
                doc.setTextColor(242, 237, 237); // Gray color for background effect
                doc.setFont("Helvetica", "bold");
                doc.text(titlea, 120, yPos + 150, { align: 'center', angle: 40 });

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
                const titleR = "FICHE DE CONSULTATION";
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

                yPoss = (yPos + 45);

                let assurer;

                if (facture.assure == 1) {
                    assurer = 'Oui';
                } else {
                    assurer = 'Non';
                }

                const patientInfo = [
                    { label: "Medecin", value: facture.nom_medecin },
                    { label: "Spécialité", value: facture.specialite },
                    { label: "Nom et Prénoms", value: facture.nom_patient },
                    { label: "Assurer", value: assurer},
                    { label: "Age", value: calculateAge(facture.datenais)+" an(s)" },
                    { label: "Contact", value: facture.telpatient },
                ];

                if (facture.assure == 1) {
                    patientInfo.push(
                        { label: "Société", value: facture.societe },
                        { label: "Assurance", value: facture.assurance },
                        { label: "Filiation", value: facture.filiation },
                        { label: "Matricule Assurance", value: facture.matriculeassure },
                    );
                }

                patientInfo.forEach(info => {
                    doc.setFontSize(10);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 38, yPoss);
                    yPoss += 7;
                });

                doc.setFontSize(30);
                doc.setLineWidth(0.5);
                doc.line(10, yPoss, 200, yPoss);

                doc.setFontSize(15);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(255, 0, 0);
                const rendu = "Compte Rendu";
                const titleRr = doc.getTextWidth(rendu);
                const titlerendu = (doc.internal.pageSize.getWidth() - titleRr) / 2;
                doc.text(rendu, titlerendu, yPoss + 10);
                // Dessiner une ligne sous le texte pour le souligner
                const underlineY = yPoss + 12; // Ajustez cette valeur selon vos besoins
                doc.setDrawColor(255, 0, 0);
                doc.setLineWidth(0.5); // Épaisseur de la ligne
                doc.line(titlerendu, underlineY, titlerendu + titleRr, underlineY);

                yPoss += 25;
                hPoss = yPoss;
                doc.setTextColor(0, 0, 0);

                const pInfo1 = [
                    { label: "BD", value: "..........." },
                    { label: "BG", value: "..........." },
                ];

                pInfo1.forEach(info => {
                    doc.setFontSize(10);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin, yPoss);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 15, yPoss);
                    yPoss += 10;
                });

                const pInfo2 = [
                    { label: "PoulsD", value: "..........." },
                    { label: "PoulsG", value: "..........." },
                ];

                pInfo2.forEach(info => {
                    doc.setFontSize(10);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin + 40, yPoss - 20);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 55, yPoss - 20);
                    yPoss += 10;
                });

                const pInfo3 = [
                    { label: "Temps", value: "..........." },
                    { label: "Taille", value: "..........." },
                ];

                pInfo3.forEach(info => {
                    doc.setFontSize(10);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin + 75, yPoss - 40);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 90, yPoss - 40);
                    yPoss += 10;
                });

                const pInfo4 = [
                    { label: "Poids", value: "..........." },
                    { label: "Glycemie", value: "..........." },
                ];

                pInfo4.forEach(info => {
                    doc.setFontSize(10);
                    doc.setFont("Helvetica", "bold");
                    doc.text(info.label, leftMargin + 110, yPoss - 60);
                    doc.setFont("Helvetica", "normal");
                    doc.text(": " + info.value, leftMargin + 130, yPoss - 60);
                    yPoss += 10;
                });

                hPoss += 25;

                doc.setFontSize(15);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(225, 0, 0);
                const motif = "Motif";
                const titleRm = doc.getTextWidth(motif);
                const titlemotif = (doc.internal.pageSize.getWidth() - titleRm) / 2;
                doc.text(motif, titlemotif, hPoss);
                // Dessiner une ligne sous le texte pour le souligner
                const underlineYm = hPoss + 2; // Ajustez cette valeur selon vos besoins
                doc.setDrawColor(225, 0, 0);
                doc.setLineWidth(0.5); // Épaisseur de la ligne
                doc.line(titlemotif, underlineYm, titlemotif + titleRm, underlineYm);

                doc.setFontSize(8);
                doc.setFont("Helvetica", "bold");
                doc.setTextColor(0, 0, 0);
                doc.text("Imprimer le "+new Date().toLocaleDateString()+" à "+new Date().toLocaleTimeString() , 5, 295);

            }

            drawConsultationSection(yPos);

            doc.output('dataurlnewwindow');
        }

        function delete_cons() {

            const numfac = document.getElementById('IddeleteCons').value;

            var modal = bootstrap.Modal.getInstance(document.getElementById('MdeleteCons'));
            modal.hide();

            var preloader_ch = `
                <div id="preloader_ch">
                    <div class="spinner_preloader_ch"></div>
                </div>
            `;
            // Add the preloader to the body
            document.body.insertAdjacentHTML('beforeend', preloader_ch);

            $.ajax({
                url: '/api/delete_Cons/'+numfac,
                method: 'GET',
                success: function(response) {

                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }

                    if (response.success) {
                        $('#Table_day').DataTable().ajax.reload(null, true);
                        showAlert('Succès', 'Opération éffectuée.','success');
                    } else if (response.error) {
                        showAlert("ERREUR", 'Echec de l\'opération', "error");
                    }
                
                },
                error: function() {
                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }

                    showAlert('Erreur', 'Erreur lors de la suppression.','error');
                }
            });
        }

    });
</script>

@endsection
