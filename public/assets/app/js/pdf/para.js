$(document).ready(function () {

    window.titlePdf = "ESPACE MEDICO SOCIAL LA PYRAMIDE DU COMPLEXE";
    window.address = "Abidjan Yopougon Selmer, Non loin du complexe sportif Jesse-Jackson - 04 BP 1523";
    window.phone = "Tél.: 20 24 44 70 / 20 21 71 92 - Cel.: 01 01 01 63 43";

    window.tetePdf = function (doc, yPos, rightMargin, leftMargin, pdfWidth) {

        // Texte en filigrane
        doc.setFontSize(100);
        doc.setTextColor(242, 237, 237);
        doc.setFont("Helvetica", "bold");
        doc.text("Facture", pdfWidth / 2, yPos + 120, { align: 'center', angle: 40 });

        // Logo
        const logoSrc = "assets/images/logo.jpg";
        doc.addImage(logoSrc, 'JPEG', leftMargin, yPos - 7, 22, 22);

        // Nom entreprise
        doc.setFontSize(10);
        doc.setTextColor(0, 0, 0);
        doc.setFont("Helvetica", "bold");
        doc.text(window.titlePdf, pdfWidth / 2, yPos, { align: "center" });

        // Adresse
        doc.setFont("Helvetica", "normal");
        doc.text(window.address, pdfWidth / 2, yPos + 5, { align: "center" });

        // Téléphone
        doc.text(window.phone, pdfWidth / 2, yPos + 10, { align: "center" });

    };

    window.piedPdf = function (doc, w, h) {

        doc.setFontSize(8);
        doc.setFont("Helvetica", "bold");
        doc.setTextColor(0, 0, 0);
        doc.text("Imprimer le "+new Date().toLocaleDateString()+" à "+new Date().toLocaleTimeString() , w, h);
    };

});