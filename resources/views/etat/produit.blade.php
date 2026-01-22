@extends('app')

@section('titre', 'Produits Pharmacie')

@section('info_page')
<div class="app-hero-header d-flex align-items-center">
    <!-- Breadcrumb starts -->
    <ol class="breadcrumb">
        <li class="breadcrumb-item">
            <i class="ri-bar-chart-line lh-1 pe-3 me-3 border-end"></i>
            <a href="{{route('index_accueil')}}">Espace Santé</a>
        </li>
        <li class="breadcrumb-item text-primary" aria-current="page">
            Produits Pharmacie utilisés
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
                    <h5 class="card-title text-center">Produits Pharmacie utilisés</h5>
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
                                <label class="form-label">
                                    Date début
                                </label>
                                <input type="date" class="form-control" id="date1" max="{{ date('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label">
                                    Date Fin
                                </label>
                                <input type="date" class="form-control" id="date2" max="{{ date('Y-m-d') }}">
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
    $(document).ready(function() {

        document.getElementById("date1").addEventListener("change", datechange);
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

        function formatPriceT(price) {

            // Convert to float and round to the nearest whole number
            let number = Math.round(parseInt(price));
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

        function datechange()
        {
            const date1Value = document.getElementById('date1').value;
            const date2 = document.getElementById('date2');

            date2.value = date1Value;
            date2.min = date1Value;
        }

        function imp_fac()
        {
            const date1 = document.getElementById('date1');
            const date2 = document.getElementById('date2');

            if (!date1.value.trim() || !date2.value.trim()) {
                showAlert('Alert', 'Veuillez saisir des dates S\'il vous plaît.','warning');
                return false; 
            }

            function isValidDate(dateString) {
                const regEx = /^\d{4}-\d{2}-\d{2}$/;
                if (!dateString.match(regEx)) return false;
                const date = new Date(dateString);
                const timestamp = date.getTime();
                if (typeof timestamp !== 'number' || isNaN(timestamp)) return false;
                return dateString === date.toISOString().split('T')[0];
            }

            if (!isValidDate(date1.value)) {
                showAlert('Erreur', 'La première date est invalide.', 'error');
                return false;
            }

            if (!isValidDate(date2.value)) {
                showAlert('Erreur', 'La deuxième date est invalide.', 'error');
                return false;
            }

            const startDate = new Date(date1.value);
            const endDate = new Date(date2.value);

            if (startDate > endDate) {
                showAlert('Erreur', 'La date de début ne peut pas être supérieur à la date de fin.', 'error');
                return false;
            }

            // const oneYearInMs = 365 * 24 * 60 * 60 * 1000;
            // if (endDate - startDate > oneYearInMs) {
            //     showAlert('Erreur', 'La plage de dates ne peut pas dépasser un an.', 'error');
            //     return false;
            // }

            var preloader_ch = `
                <div id="preloader_ch">
                    <div class="spinner_preloader_ch"></div>
                </div>
            `;
            // Add the preloader to the body
            document.body.insertAdjacentHTML('beforeend', preloader_ch);

            $.ajax({
                url: '/api/etat_prod_utilise',
                method: 'GET',
                data: {
                    date1: date1.value, 
                    date2: date2.value,
                },
                success: function(response) {

                    var preloader = document.getElementById('preloader_ch');
                    if (preloader) {
                        preloader.remove();
                    }

                    if (response.donnee_0) {

                        showAlert('Informations', 'Aucune donnée n\'a été trouvée pour cette période','info');

                    } else if (response.success) {

                        const data = response.data || [];
                        const date1 = response.date1;
                        const date2 = response.date2;

                        generatePDFInvoice(data,date1,date2);

                    } else {
                        showAlert('Alert', 'Une erreur est survenue lors de la verification','info');
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

        function generatePDFInvoice(data,date1,date2)
        {

            const { jsPDF } = window.jspdf;
            const doc = new jsPDF({ orientation: 'p', unit: 'mm', format: 'a4' });

            const pdfFilename = "Produits Pharmacie Utilisés du" + formatDate(date1) + " au " + formatDate(date2);
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

                if (formatDate(date1) === formatDate(date2)) {
                    titleR = "Produits Pharmacie Utilisés le "+formatDate(date1);
                }else{
                    titleR = "Produits Pharmacie Utilisés du "+formatDate(date1)+" au "+formatDate(date2);
                }

                const titleRWidth = doc.getTextWidth(titleR);
                const titleRX = (doc.internal.pageSize.getWidth() - titleRWidth) / 2;

                const paddingh = 5;  // Ajuster le padding en hauteur
                const paddingw = 5;  // Ajuster le padding en largeur

                const rectX = titleRX - paddingw;
                let rectY = yPos + 20; // Position initiale du rectangle
                const rectWidth = titleRWidth + (paddingw * 2);
                const rectHeight = 2 + (paddingh * 2);

                doc.setDrawColor(0, 0, 0);
                doc.rect(rectX, rectY, rectWidth, rectHeight);

                // Centrer le texte dans le rectangle
                const textY = rectY + (rectHeight / 2) + 2;  // Ajustement de la position Y du texte pour centrer verticalement
                doc.text(titleR, titleRX, textY);

                yPoss = (yPos + 40);
                
                let grandTotal = 0;

                if (data.length > 0) {

                    // Trier les données par date croissante
                    data.sort((a, b) => new Date(a.date) - new Date(b.date));

                    // Calculate totals
                    const total = data.reduce((sum, item) => sum + parseInt(item.total || 0), 0);

                    grandTotal += total;

                    // Table with a footer row for totals
                    doc.autoTable({
                        startY: yPoss,
                        head: [['N°', 'Produit', 'Quantité', 'Prix unitaire', 'Total', 'Date']],
                        body: data.map((item, index) => [
                            index + 1,
                            item.nom || '',
                            item.qte || '0',
                            (formatPriceT(item.prix) || '0') + " Fcfa",
                            (formatPriceT(item.total) || '0') + " Fcfa",
                            formatDateHeure(item.date) || '',
                        ]),
                        theme: 'striped',
                        tableWidth: 'auto',
                        styles: {
                            fontSize: 7,
                            overflow: 'linebreak',
                        },
                        // Add a footer row for totals
                        foot: [[
                            { content: 'Totals', colSpan: 4, styles: { halign: 'center', fontStyle: 'bold' } },
                            { content: formatPriceT(grandTotal) + " Fcfa", styles: { fontStyle: 'bold' } },
                            ''
                        ]]
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
                    const pageText = `Page ${i} sur ${pageCount}`;
                    const pageTextWidth = doc.getTextWidth(pageText);
                    const centerX = (doc.internal.pageSize.getWidth() - pageTextWidth) / 2;
                    doc.text(pageText, centerX, footerY);
                    doc.text("Imprimé le : " + new Date().toLocaleDateString() + " à " + new Date().toLocaleTimeString(), 15, footerY); // Left-aligned
                }
            }

            drawSection(yPos);

            addFooter();

            // doc.output('dataurlnewwindow');

            var blob = doc.output('blob');
            window.open(URL.createObjectURL(blob));
        }

    });
</script>

@endsection


