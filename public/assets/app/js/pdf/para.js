$(document).ready(function () {

    window.titlePdf = "CENTRE MEDICAL LA NOUVELLE AMITIE DE YAMOUSSOUKRO";
    window.address = "YAMOUSSOUKRO - 04 BP 1523";
    window.phone = "Tél.: 27 33 71 41 04 - Cel.: 07 59 11 37 73";
    window.colorbase = "#eb6325";

    window.configTable = function (themeColor = [235, 99, 37]) {
        return {
            theme: 'striped',
            tableWidth: 'auto',

            styles: {
                fontSize: 8,
                overflow: 'linebreak',
            },

            headStyles: {
                fillColor: themeColor,
                textColor: 255,
                fontStyle: 'bold',
            },

            bodyStyles: {
                fillColor: [255, 255, 255],
            },

            alternateRowStyles: {
                fillColor: [245, 245, 245],
            },

            footStyles: {
                fillColor: themeColor,
                textColor: 255,
                fontStyle: 'bold',
            },
        };
    };

    window.tetePdf = function (doc, yPos, rightMargin, leftMargin, pdfWidth) {

        // Texte en filigrane
        // doc.setFontSize(100);
        // doc.setTextColor(242, 237, 237);
        // doc.setFont("Helvetica", "bold");
        // doc.text(titleFac, pdfWidth / 2, yPos + 120, { align: 'center', angle: 40 });

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

    window.addFooter = function (doc) {
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

});