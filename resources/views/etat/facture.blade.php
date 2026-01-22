@extends('app')

@section('titre', 'Nouvel Acte')

@section('info_page')
<div class="app-hero-header d-flex align-items-center">
    <!-- Breadcrumb starts -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="ri-bar-chart-line lh-1 pe-3 me-3 border-end"></i>
            <a href="{{route('index_accueil')}}">Espace Santé</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
            Etats des Factures
        </li>
    </ol>
</div>
@endsection

@section('content')

<div class="app-body">
    <!-- Row starts -->
    <div class="row justify-content-center">
        <div class="col-xxl-4 col-lg-6 col-md-8 col-sm-8">
            <div class="card mb-3">
                <div class="card-header">
                    <h5 class="card-title text-center">Facture par assurance</h5>
                </div>
                <div class="card-header">
                    <div class="text-center">
                        <a class="d-flex align-items-center flex-column">
                            <img src="{{asset('assets/images/pdf2.png')}}" class="img-7x">
                        </a>
                    </div>
                </div>
                <div class="card-body" >
                    <div class="row gx-3">
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">Type</label>
                                <select class="form-control select2" id="type">
                                    <option value="tous">Tout</option>
                                    <option value="fac_deposer">
                                        Déposer
                                    </option>
                                    <option value="fac_deposer_regler">
                                        Déposer & régler
                                    </option>
                                    <option value="fac_deposer_non_regler">
                                        Déposer & non-régler
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">
                                    Assurance
                                </label>
                                <select class="form-select select2" id="assurance_id"></select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">
                                    Société
                                </label>
                                <select class="form-select select2" id="societe_id"></select>
                            </div>
                        </div>
                        <dpiv class="col-12">
                            <div class="mb-3">
                                <label class="form-label">
                                    Période
                                </label>
                                <input type="month" class="form-control" id="periode" max="{{ date('Y-m', strtotime('-1 months')) }}">
                            </div>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-center">
                            <div class="mb-3 d-flex gap-2 justify-content-center">
                                <button id="btn_imp" class="btn btn-primary">
                                    <i class="ri-printer-line"></i>
                                    Imprimer
                                </button>
                            </div>
                        </div>  
                    </div>
                    <!-- Row ends -->
                </div>
            </div>
        </div>
    </div>
    <!-- Row ends -->
</div>

<script src="{{asset('jsPDF-master/dist/jspdf.umd.js')}}"></script>
<script src="{{asset('jsPDF-AutoTable/dist/jspdf.plugin.autotable.min.js')}}"></script>

@include('select2')

<script>
    document.addEventListener("DOMContentLoaded", function() {

        select_assurance();
        select_societe();

        document.getElementById("btn_imp").addEventListener("click", imp_fac);

        function showAlert(title, message, type) {
            Swal.fire({
                title: title,
                text: message,
                icon: type,
            });
        }

        function formatPrice(price) {

            // Convert to float and round to the nearest whole number
            let number = Math.round(parseFloat(price));
            if (isNaN(number)) {
                return '';
            }

            // Format the number with dot as thousands separator
            return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
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

        function select_assurance()
        {
            const selectElement = $('#assurance_id');
            selectElement.empty();

            // Ajouter l'option par défaut
            const defaultOption = $('<option>', {
                value: 'tous',
                text: 'Tout'
            });
            selectElement.append(defaultOption);

            $.ajax({
                url: '/api/assurance_select_patient_new',
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    data.assurance.forEach(item => {
                        const option = $('<option>', {
                            value: item.codeassurance,
                            text: item.libelleassurance
                        });
                        selectElement.append(option);
                    });
                },
                error: function() {
                    console.error('Erreur lors du chargement des assurance');
                }
            });
        }

        function select_societe() 
        {
            const selectElement2 = $('#societe_id');
            selectElement2.empty();
            selectElement2.append($('<option>', {
                value: 'tous',
                text: 'Tout',
            }));

            $.ajax({
                url: '/api/societe_select_patient_new',
                method: 'GET',
                success: function(response) {
                    const data = response.societe;

                    data.forEach(function(item) {
                        selectElement2.append($('<option>', {
                            value: item.codesocieteassure,
                            text: item.nomsocieteassure,
                        }));
                    });
                },
                error: function() {
                    // showAlert('danger', 'Impossible de generer le code automatiquement');
                }
            });
        }

        function imp_fac()
        {
            const type = document.getElementById('type');
            const assurance_id = $('#assurance_id').val();
            const societe_id = $('#societe_id').val();
            const periode = document.getElementById('periode');

            if (!periode.value.trim()) {
                showAlert('Alert', 'Veuillez saisir une période.','warning');
                return false; 
            }

            if (assurance_id == 'tous' && type.value != 'tous' ) {
                showAlert('Alert', 'Veuillez selectionner une assurance SVP!!! .','info');
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
                url: '/api/etat_fac_assurance',
                method: 'GET',
                data: {
                    type: type.value || null, 
                    assurance_id: assurance_id || null, 
                    societe_id: societe_id || null, 
                    periode: periode.value,
                },
                success: function(response) {

                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }

                    if (response.facture_non_trouve) {

                        showAlert('Informations', 'Aucune facture n\'a été trouvée pour cette période','info');

                    } else if (response.success) {

                        const societes = response.societes;
                        const assurance = response.assurance;
                        const month = response.month;
                        const year = response.year;
                        const type = response.type;
                        const m_total = response.m_total;
                        const m_assurance = response.m_assurance;
                        const m_patient = response.m_patient;

                        if (societes.length > 0) {

                            generatePDFInvoice(societes,assurance,month,year,type,m_total,m_assurance,m_patient);
                        } else {
                           showAlert('Informations', 'Aucune facture n\'a été trouvée pour cette période','info'); 
                        }

                    }

                },
                error: function() {

                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }

                    showAlert('Alert', ' Une erreur est survenue.','error');
                }
            });
        }

        function genererNomMois(month) {
          // Tableau des noms de mois en français
          const moisNoms = [
            'Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin',
            'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'
          ];

          const moisNom = moisNoms[month - 1];
          // Génération du nom de fichier
          return `${moisNom}`;
        }

        function generatePDFInvoice(societes,assurance,month,year,type,m_total,m_assurance,m_patient) {

            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({ orientation: 'l', unit: 'mm', format: 'a4' });

            let pdfFilename ;

            if (assurance === null || assurance === undefined) {

                if (type == 'tous') {
                    pdfFilename = "Facture_de_" + genererNomMois(month) + '_' + year;
                } else if (type == 'fac_deposer') {
                    pdfFilename = "Facture_Deposer_de_" + genererNomMois(month) + '_' + year;
                } else if (type == 'fac_deposer_regler') {
                    pdfFilename = "Facture_Deposer_Regler_de_" + genererNomMois(month) + '_' + year;
                } else if (type == 'fac_deposer_non_regler') {
                    pdfFilename = "Facture_Deposer_Non_Regler_de_" + genererNomMois(month) + '_' + year;
                }
            } else {
                pdfFilename = assurance.libelleassurance + "_facture_de_" + genererNomMois(month) + '_' + year;
                if (type == 'tous') {
                    pdfFilename = assurance.libelleassurance +  "_facture_de_" + genererNomMois(month) + '_' + year;
                } else if (type == 'fac_deposer') {
                    pdfFilename = assurance.libelleassurance +  "_facture_Deposer_de_" + genererNomMois(month) + '_' + year;
                } else if (type == 'fac_deposer_regler') {
                    pdfFilename = assurance.libelleassurance +  "_facture_Deposer_Regler_de_" + genererNomMois(month) + '_' + year;
                } else if (type == 'fac_deposer_non_regler') {
                    pdfFilename = assurance.libelleassurance +  "_facture_Deposer_Non_Regler_de_" + genererNomMois(month) + '_' + year;
                }
            }

            doc.setProperties({
                title: pdfFilename,
            });

            let yPos = 10;

            function drawSection(yPos) {

                rightMargin = 15;
                leftMargin = 15;
                pdfWidth = doc.internal.pageSize.getWidth();

                const logoSrc = "{{asset('assets/images/logo.png')}}";
                const logoWidth = 22;
                const logoHeight = 22;
                doc.addImage(logoSrc, 'PNG', leftMargin, yPos - 7, logoWidth, logoHeight);

                doc.setFontSize(10);
                doc.setTextColor(0, 0, 0);
                doc.setFont("Helvetica", "bold");

                const title = "ESPACE MEDICO SOCIAL LA PYRAMIDE DU COMPLEXE";
                const titleWidth = doc.getTextWidth(title);
                const titleX = (doc.internal.pageSize.getWidth() - titleWidth) / 2;
                doc.text(title, titleX, yPos);

                doc.setFont("Helvetica", "normal");
                const address = "Abidjan Yopougon Selmer, Non loin du complexe sportif Jesse-Jackson - 04 BP 1523";
                const addressWidth = doc.getTextWidth(address);
                const addressX = (doc.internal.pageSize.getWidth() - addressWidth) / 2;
                doc.text(address, addressX, (yPos + 5));

                const phone = "Tél.: 20 24 44 70 / 20 21 71 92 - Cel.: 01 01 01 63 43";
                const phoneWidth = doc.getTextWidth(phone);
                const phoneX = (doc.internal.pageSize.getWidth() - phoneWidth) / 2;
                doc.text(phone, phoneX, (yPos + 10));

                // Définir le style pour le texte
                doc.setFontSize(12);
                doc.setFont("Helvetica", "bold");
                doc.setLineWidth(0.5);
                doc.setTextColor(0, 0, 0);

                let titleR;

                if (assurance === null || assurance === undefined) {
                    if (type == "tous") {
                        titleR = "LISTE DES FACTURES PAR PERIODE";
                    } else if (type == "fac_deposer") {
                        titleR = "LISTE DES FACTURES DEPOSER PAR PERIODE";
                    } else if (type == "fac_deposer_regler") {
                        titleR = "LISTE DES FACTURES DEPOSER & REGLER PAR PERIODE";
                    } else if (type == "fac_deposer_non_regler") {
                        titleR = "LISTE DES FACTURES DEPOSER & NON-REGLER PAR PERIODE";
                    } else if (type == "fac_regler_non_regler") {
                        titleR = "LISTE DES FACTURES REGLER & NON-REGLER PAR PERIODE";
                    }
                } else {
                    if (type == "tous") {
                        titleR = "LISTE DES FACTURES PAR ASSURANCE : " + assurance.libelleassurance;
                    } else if (type == "fac_deposer") {
                        titleR = "LISTE DES FACTURES DEPOSER PAR ASSURANCE : " + assurance.libelleassurance;
                    } else if (type == "fac_deposer_regler") {
                        titleR = "LISTE DES FACTURES DEPOSER & REGLER PAR ASSURANCE : " + assurance.libelleassurance;
                    } else if (type == "fac_deposer_non_regler") {
                        titleR = "LISTE DES FACTURES DEPOSER & NON-REGLER PAR ASSURANCE : " + assurance.libelleassurance;
                    } else if (type == "fac_regler_non_regler") {
                        titleR = "LISTE DES FACTURES REGLER & NON-REGLER PAR ASSURANCE : " + assurance.libelleassurance;
                    }
                }

                const titleRWidth = doc.getTextWidth(titleR);
                const titleRX = (doc.internal.pageSize.getWidth() - titleRWidth) / 2;

                const paddingh = 5;  // Ajuster le padding en hauteur
                const paddingw = 5;  // Ajuster le padding en largeur

                const rectX = titleRX - paddingw;
                let rectY = yPos + 18; // Position initiale du rectangle
                const rectWidth = titleRWidth + (paddingw * 2);
                const rectHeight = 15 + (paddingh * 2);

                doc.setDrawColor(0, 0, 0);
                doc.rect(rectX, rectY, rectWidth, rectHeight);

                // Centrer le texte dans le rectangle
                const textY = rectY + (rectHeight / 2) - 2;  // Ajustement de la position Y du texte pour centrer verticalement
                doc.text(titleR, titleRX, textY);

                // Ajout de la date sous le titre avec un saut de ligne
                const dateText = "Période de " + genererNomMois(month) + ' ' + year; // Assurez-vous que formatDate est une fonction qui formate la date comme vous le souhaitez
                const dateTextWidth = doc.getTextWidth(dateText);
                const dateTextX = (doc.internal.pageSize.getWidth() - dateTextWidth) / 2; // Centrer la date

                // Positionner la date sous le rectangle
                doc.text(dateText, dateTextX, textY + 10);  // Ajuster `+ 10` selon l'espace souhaité entre le titre et la date

                yPoss = (yPos + 60);

                if (societes.length > 0) {
                    societes.forEach((societe, index) => {

                        const fac_cons = societe.consultation || [];
                        const fac_exam = societe.testlaboimagerie || [];
                        const fac_soinsam = societe.soins_medicaux || [];
                        const fac_hopital = societe.admission || [];

                        const fac_global = [
                            ...fac_cons.map(item => ({
                                ...item,
                                acte: 'Consultation',
                            })),
                            ...fac_exam.map(item => ({
                                ...item,
                                acte: 'Examen',
                            })),
                            ...fac_soinsam.map(item => ({
                                ...item,
                                acte: 'Soins Ambulatoire',
                            })),
                            ...fac_hopital.map(item => ({
                                ...item,
                                acte: 'Hospitalisation',
                            })),
                        ];

                        if (yPoss + 30 > doc.internal.pageSize.height) {  
                            doc.addPage();
                            yPoss = 20; // Réinitialisation en haut de la page
                        }

                        if (fac_global.length > 0) {
                            doc.setFontSize(12);
                            doc.setFont("Helvetica", "bold");
                            doc.text("Société : " + (societe.nomsocieteassure || "Inconnue"), 15, yPoss);
                            yPoss += 10;

                            let totalAssurance = fac_global.reduce((sum, item) => sum + parseInt(item.part_assurance || 0), 0);
                            let totalPatient = fac_global.reduce((sum, item) => sum + parseInt(item.part_patient || 0), 0);
                            let totalMontant = fac_global.reduce((sum, item) => sum + parseInt(item.montant || 0), 0);

                            doc.autoTable({
                                startY: yPoss,
                                head: [['N°', 'Date', 'Numéro de Bon', 'Patient', 'Assurance', 'Société', 'Acte effectué', 'Montant Total', 'Part Assurance', 'Part assuré']],
                                body: fac_global.map((item, index) => [
                                    index + 1,
                                    formatDate(item.created_at) || '',
                                    item.num_bon || '',
                                    item.patient || '',
                                    item.assurance || '',
                                    item.societe || '',
                                    item.acte || '',
                                    (formatPrice(item.montant) || '0') + " Fcfa",
                                    (formatPrice(item.part_assurance) || '0') + " Fcfa",
                                    (formatPrice(item.part_patient) || '0') + " Fcfa",
                                ]),
                                theme: 'striped',
                                tableWidth: 'auto',
                                styles: {
                                    fontSize: 7,
                                    overflow: 'linebreak',
                                },
                                foot: [[
                                    { content: 'Totals', colSpan: 7, styles: { halign: 'center', fontStyle: 'bold' } },
                                    { content: formatPrice(totalMontant) + " Fcfa", styles: { fontStyle: 'bold' } },
                                    { content: formatPrice(totalAssurance) + " Fcfa", styles: { fontStyle: 'bold' } },
                                    { content: formatPrice(totalPatient) + " Fcfa", styles: { fontStyle: 'bold' } },
                                    ''
                                ]]
                            });

                            doc.addPage();
                            yPoss = 20;

                            // const finalY = doc.autoTable.previous.finalY || yPoss + 10;
                            // yPoss = finalY + 10;

                            // if (yPoss + 40 > doc.internal.pageSize.height) {
                            //     doc.addPage();
                            //     yPoss = 10;
                            // }
                        }

                    });

                    // Afficher les grands totaux après toutes les sociétés
                    doc.setFontSize(14);
                    doc.setFont("Helvetica", "bold");
                    doc.text("TOTAL DES FACTURES", 15, yPoss);
                    yPoss += 10;

                    const grandTotalInfo = [
                        { label: "Total Assurance", value: (formatPrice(m_assurance) || '0') +" Fcfa" },
                        { label: "Total Patient", value: (formatPrice(m_patient) || '0' ) + " Fcfa" },
                        { label: "Montant Total", value: (formatPrice(m_total) || '0' ) + " Fcfa" },
                    ];

                    grandTotalInfo.forEach((info, index) => {
                        doc.text(info.label + " : " + info.value, 15, yPoss + (index * 8));
                    });
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
                    
                    // Page number centered
                    const pageText = `Page ${i} sur ${pageCount}`;
                    const pageTextWidth = doc.getTextWidth(pageText);
                    const centerX = (doc.internal.pageSize.getWidth() - pageTextWidth) / 2;
                    doc.text(pageText, centerX, footerY); // Centered at the bottom

                    // Date at the left
                    doc.text("Imprimé le : " + new Date().toLocaleDateString() + " à " + new Date().toLocaleTimeString(), 15, footerY); // Left-aligned
                }
            }

            drawSection(yPos);

            addFooter();

            // doc.output('dataurlnewwindow');

            // doc.save('Facture_'+genererNomMois(month)+'_'+year+'.pdf');

            var blob = doc.output('blob');
            var blobURL = URL.createObjectURL(blob);
            window.open(blobURL);
        }

    });
</script>

@endsection


