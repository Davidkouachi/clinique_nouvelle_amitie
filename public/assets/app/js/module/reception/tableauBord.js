$(document).ready(function() {

    Statistique();
    Activity_cons();
    stat_fac_day();
    Activity_cons_count();
    datesearch();
    select_patient('#id_patient');
    select_list_medecin('#medecin_id')
    select_assureur('#assureur_id_societe');
    assurance();
    select_taux('#patient_idtauxcouv_new');
    select_societe('#patient_codesocieteassure_new');
    select_filiation('#patient_codefiliation_new');

    // ------------------------------------------------------------------

    OffClick('#btn_eng_consultation', eng_consultation);
    OffClick('#btn_remiseForm', Reset);
    OffChange('#acte_id', select_list_typeacte);
    OffClick('#btn_eng_societe', eng_societe);
    OffClick('#btn_eng_assurance', eng_assurance);
    OffClick('#btn_eng_patient', eng_patient);
    OffClick('#deleteBtnCons', delete_cons);
    OffClick('#btn_refresh_stat_fac', stat_fac_day);
    OffClick('#btn_refresh_table', stat_fac_day);

    // ------------------------------------------------------------------

    OffChange('#stat_bord_date', function () {
        // Afficher le préchargeur
        showPreloader();

        $('#date_bord_text').text(formatDate($(this).val()));

        Statistique();
    });

    OffClick('#btn_affiche_stat', function () {
        $('#div_btn_affiche_stat').hide();
        $('#div_btn_cache_stat').show();

        $('#stat_consultation_date').show();
        $('#stat_consultation').empty().show().css({
            'height': 'auto',
            'overflow-y': 'hidden'
        });
    });

    OffClick('#btn_cache_stat', function () {
        $('#div_btn_affiche_stat').show();
        $('#div_btn_cache_stat').hide();

        $('#stat_consultation_date').hide();
        $('#stat_consultation').empty().hide().css({
            'height': 'auto',
            'overflow-y': 'hidden'
        });
    });

    OffClick('#btn_search_stat_const_date', function () {
        $("#stat_consultation").show();
        Statistique_cons();
    });

    OffChange('#searchDate1', function () {
        const date1Value = $(this).val();
        $('#searchDate2')
            .attr('min', date1Value)
            .val(date1Value);
    });

    OffChange('#id_patient', function () {
        rech_dosier();
    });

    function datesearch() {
        const date1Value = $('#searchDate1').val();
        $('#searchDate2').attr('min', date1Value);
    }

    // ------------------------------------------------------------------

    var numberInput = [
        '#patient_tel_new',
        '#patient_tel2_new',
        '#patient_telu_new',
        '#patient_telu2_new',
        '#tel_assurance_new',
        '#mumcode'
    ];

    numberInput.forEach(function (id) {
        numberTel(id);
    });

    OffChange('#assure', function () {
        if ($(this).val() === '1') {
            $('#div_assurer').css('display', 'flex');
        } else {
            $('#div_assurer').css('display', 'none');
        }
    });

    OffInput('#taux_remise', function () {
        let montant_total = $('#montant_total').val();

        if (montant_total < 0) {
            showAlert('Alert', 'Veuillez vérifier le montant Total.', 'warning');
            return false;
        }

        $(this).val(formatPrice($(this).val()));

        $('#div_remise_appliq').css('display', 'none');
    });

    OffChange('#typeacte_idS', function () {
        if ($(this).val() !== '') {
            $('#div_remise').css('display', 'block');
        } else {
            $('#div_remise').css('display', 'none');
        }
    });

    OffChange('#assurance_utiliser', function () {
        if ($(this).val() === 'non') {
            $('#div_numcode').css('display', 'none');
            $('#mumcode').val('');
        } else {
            $('#div_numcode').css('display', 'block');
            $('#mumcode').val('');
        }
    });

    OffInput('#taux_remise', function () {
        const rawValue = $(this).val().replace(/[^0-9]/g, '');
        const formattedValue = formatPrice(rawValue);
        $(this).val(formattedValue);

        const appliq_remise = $('#appliq_remise').val();
        const assuranceUtiliser = $('#assurance_utiliser').val();

        if (appliq_remise === 'patient' || assuranceUtiliser === 'non') {

            const montant_patient = parseInt($('#montant_patient_hidden').val().replace(/\./g, '')) || 0;
            const remise = parseInt(rawValue) || 0;
            const montantRemis = montant_patient - remise;

            $('#montant_patient').val(formatPriceT(montantRemis));

        } else if (assuranceUtiliser === 'oui') {

            const montant_assurance = parseInt($('#montant_assurance_hidden').val().replace(/\./g, '')) || 0;
            const remise = parseInt(rawValue) || 0;
            const montantRemis = montant_assurance - remise;

            $('#montant_assurance').val(formatPriceT(montantRemis));
        }

        let assurance = parseInt($('#montant_assurance').val().replace(/[^0-9]/g, '')) || 0;
        let patient = parseInt($('#montant_patient').val().replace(/[^0-9]/g, '')) || 0;
        let total = assurance + patient;

        $('#montant_total_acte').val(formatPriceT(total));
    });

    OffChange('#appliq_remise', function () {
        $('#montant_assurance').val(formatPrice($('#montant_assurance_hidden').val()));
        $('#montant_patient').val(formatPrice($('#montant_patient_hidden').val()));

        const rawValue = $('#taux_remise').val().replace(/[^0-9]/g, '');
        const assuranceUtiliser = $('#assurance_utiliser').val();

        if ($(this).val() === 'patient' || assuranceUtiliser === 'non') {

            const montant_patient = parseFloat($('#montant_patient_hidden').val().replace(/\./g, '')) || 0;
            const remise = parseFloat(rawValue) || 0;
            const montantRemis = montant_patient - remise;

            $('#montant_patient').val(formatPriceT(montantRemis));

        } else if (assuranceUtiliser === 'oui') {

            const montant_assurance = parseFloat($('#montant_assurance_hidden').val().replace(/\./g, '')) || 0;
            const remise = parseFloat(rawValue) || 0;
            const montantRemis = montant_assurance - remise;

            $('#montant_assurance').val(formatPriceT(montantRemis));
        }
    });

    // ------------------------------------------------------------------

    function rech_dosier()
    {
        $('#div_typeacteS, #div_medecin').show();

        $('#montant_assurance').val('0');
        $('#taux_remise').val('0');
        $('#montant_total').val('0');
        $('#montant_patient').val('0');

        const id_patient = $('#id_patient').val();

        if (!id_patient || !id_patient.trim()) {
            showAlert('Alert', 'Veuillez saisie le nom d\'un du patient.', 'warning');
            return false;
        }

        showPreloader();

        window.api_rech_dossier(
            id_patient,
            function (response) {

                hidePreloader();

                if (response.existep) {
                    showAlert('Alert', 'Ce patient n\'existe pas.', 'error');
                    Reset();
                    return;
                }

                if (response.success) {

                    $('#medecin_id').val('').trigger('change');

                    addGroup(response.patient);

                    $('#div_info_consul').show();

                    if (response.patient.assure == 1) {
                        $('#input_part_assurance, #div_assurance_utiliser, #div_numcode').show();
                    } else {
                        $('#input_part_assurance, #div_assurance_utiliser, #div_numcode').hide();
                    }

                    select_list_typeacte();
                }
            },
            function () {
                hidePreloader();
                showAlert('Alert', 'Une erreur est survenue lors de la recherche.', 'error');
            }
        );
    }

    function addGroup(data)
    {
        const $dynamicFields = $('#div_info_patient');
        $dynamicFields.empty();

        let groupe = `
            <div class="row gx-3">
                <div class="col-12">
                    <div class="card-header">
                        <h5 class="card-title">Information du patient</h5>
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">N° dossier</label>
                        <input id="patient_numdossier" value="${data.numdossier}" readonly class="form-control">
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Nom et Prénoms</label>
                        <input value="${data.nomprenomspatient}" readonly class="form-control">
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Contact</label>
                        <input value="${data.telpatient}" readonly class="form-control">
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <div class="mb-3">
                        <label class="form-label">Assurer</label>
                        <input value="${data.assure == 1 ? 'Oui' : 'Non'}" readonly class="form-control">
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6 d-none">
                    <input id="patient_codeassurance" value="${data.codeassurance}" readonly class="form-control">
                </div>
        `;

        if (data.assure == 1) {
            groupe += `
                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Assurance</label>
                    <input value="${data.assurance}" readonly class="form-control">
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Matricule assurance</label>
                    <input value="${data.matriculeassure}" readonly class="form-control">
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Taux</label>
                    <div class="input-group">
                        <input id="patient_taux" value="${data.taux}" readonly class="form-control">
                        <span class="input-group-text">%</span>
                    </div>
                </div>

                <div class="col-xxl-3 col-lg-4 col-sm-6">
                    <label class="form-label">Société</label>
                    <input value="${data.societe}" readonly class="form-control">
                </div>
            `;
        } else {
            groupe += `
                <div class="d-none">
                    <input id="patient_taux" value="0" readonly>
                </div>
            `;
        }

        groupe += `</div>`;

        $dynamicFields.append(groupe);
    }

    function Reset()
    {
        $('#div_info_patient').empty();

        $('#div_info_consul').hide();
        $('#periode').val('').trigger('change.select2');
        $('#typeacte_id').val('').trigger('change.select2');
        $('#id_patient').val('').trigger('change.select2');
        $('#medecin_id').val('').trigger('change.select2');
        $('#appliq_remise').val('patient').trigger('change.select2');
        $('#taux_remise').val(0);

        // select_patient('#id_patient');
    }

    // ------------------------------------------------------------------

    function assurance() 
    {
        select_assurance('#codeassurance_societe');
        select_assurance('#patient_codeassurance_new');
    }

    function select_list_typeacte() {

        const divTypeActe = $('#div_typeacteS'); 
        const divMedecin = $('#div_medecin');
        const typeActeSelect = $('#typeacte_idS');

        const montant_assurance = $('#montant_assurance');
        const taux_remise = $('#taux_remise');
        const montant_total = $('#montant_total');
        const montant_patient = $('#montant_patient');

        const montant_total_acte = $('#montant_total_acte');

        const montant_patient_hidden = $('#montant_patient_hidden');
        const montant_assurance_hidden = $('#montant_assurance_hidden');

        // Reset des champs
        montant_assurance.val('');
        montant_total.val('');
        montant_patient.val('');

        const codeassurance = $('#patient_codeassurance').val();
        const patient_taux = $('#patient_taux');

        typeActeSelect.empty();
        divTypeActe.hide();
        divMedecin.hide();

        // Ajouter option par défaut
        typeActeSelect.append($('<option>', { value: '', text: 'Sélectionner' }));

        // Appel API séparé
        api_select_list_typeacte(
            codeassurance,
            function (response) {
                const data = response.typeacte;

                if (data && data.length > 0) {
                    data.forEach(function (item) {
                        typeActeSelect.append($('<option>', {
                            value: item.codgaran,
                            text: item.libgaran,
                            'data-prixj': item.prixj,
                            'data-prixn': item.prixn,
                            'data-prixf': item.prixf
                        }));
                    });

                    divTypeActe.show();
                    divMedecin.show();
                } else {
                    typeActeSelect.append($('<option>', {
                        value: '',
                        text: 'Aucun données disponible'
                    }));
                    divTypeActe.hide();
                }
            },
            function () {
                console.error("Erreur lors du chargement des types d'actes");
            }
        );

        // Gestion des événements (on utilise OffChange si tu veux)
        const periode = $('#periode');
        const appliq_remise = $('#appliq_remise');
        const auS = $('#assurance_utiliser');

        // Lorsque l'utilisateur sélectionne un type d'acte
        OffChange('#typeacte_idS', function () {

            if (periode.val() === '') {
                showAlert('Alert', 'Veuillez selectionner la période.', 'info');
                return;
            }

            const selectedOption = $(this).find('option:selected');
            let prix;

            if (periode.val() == 0) prix = selectedOption.data('prixj');
            else if (periode.val() == 1) prix = selectedOption.data('prixn');
            else if (periode.val() == 2) prix = selectedOption.data('prixf');

            if (prix) {
                calculateAndFormatAmounts(prix, patient_taux.val());
            } else {
                montant_total.val('');
                montant_assurance.val('');
                montant_patient.val('');
            }
        });

        // Lorsque l'utilisateur change l'assurance
        OffChange('#assurance_utiliser', function () {
            if (periode.val() === '' || typeActeSelect.val() === '') {
                showAlert('Alert', 'Veuillez selectionner la période et l\'acte.', 'info');
                return;
            }

            let prix = $('#montant_total').val().replace(/[^0-9]/g, '');
            taux_remise.val(0);

            if (prix) {
                if (this.value === 'oui') {
                    appliq_remise.find('option[value="assurance"]').show();
                    calculateAndFormatAmounts(prix, patient_taux.val());
                } else {
                    appliq_remise.val('patient');
                    appliq_remise.find('option[value="assurance"]').hide();
                    calculateAndFormatAmounts(prix, 0);
                }
            } else {
                montant_total.val('');
                montant_assurance.val('');
                montant_patient.val('');
            }
        });

        // Lorsque l'utilisateur change la période
        OffChange('#periode', function () {
            const selectedOption = typeActeSelect.find('option:selected');
            let prix;

            if (this.value == 0) prix = selectedOption.data('prixj');
            else if (this.value == 1) prix = selectedOption.data('prixn');
            else if (this.value == 2) prix = selectedOption.data('prixf');

            taux_remise.val(0);

            if (prix) {
                if (auS.val() === 'oui') {
                    appliq_remise.find('option[value="assurance"]').show();
                    calculateAndFormatAmounts(prix, patient_taux.val());
                } else {
                    appliq_remise.val('patient');
                    appliq_remise.find('option[value="assurance"]').hide();
                    calculateAndFormatAmounts(prix, 0);
                }
            } else {
                montant_total.val('');
                montant_assurance.val('');
                montant_patient.val('');
            }
        });

        // Montant total input
        OffInput('#montant_total', function () {
            const rawValue = $(this).val().replace(/[^0-9]/g, '');
            $(this).val(formatPrice(rawValue));

            if (periode.val() === '' || typeActeSelect.val() === '') return;

            let prix = rawValue;
            taux_remise.val(0);

            if ($('#assurance_utiliser').val() === 'oui') {
                appliq_remise.find('option[value="assurance"]').show();
                calculateAndFormatAmounts(prix, patient_taux.val());
            } else {
                appliq_remise.val('patient');
                appliq_remise.find('option[value="assurance"]').hide();
                calculateAndFormatAmounts(prix, 0);
            }
        });

        // Montant patient input
        OffInput('#montant_patient', function () {
            const rawValue = $(this).val().replace(/[^0-9]/g, '');
            $(this).val(formatPrice(rawValue));

            if (!rawValue) {
                $(this).val(0);
                montant_patient_hidden.val(0);
                return;
            }

            let assurance = parseInt(montant_assurance.val().replace(/[^0-9]/g, '')) || 0;
            let patient = parseInt(rawValue);
            montant_total_acte.val(formatPriceT(assurance + patient));
            montant_patient_hidden.val(formatPriceT(patient));
        });

        // Montant assurance input
        OffInput('#montant_assurance', function () {
            const rawValue = $(this).val().replace(/[^0-9]/g, '');
            $(this).val(formatPrice(rawValue));

            if (!rawValue) {
                $(this).val(0);
                montant_assurance_hidden.val(0);
                return;
            }

            let patient = parseInt(montant_patient.val().replace(/[^0-9]/g, '')) || 0;
            let assurance = parseInt(rawValue);
            montant_total_acte.val(formatPriceT(patient + assurance));
            montant_assurance_hidden.val(formatPriceT(assurance));
        });
    }

    function calculateAndFormatAmounts(prix, patient_taux) {
        // Vérifiez si le prix est défini et non null
        if (prix) {
            // console.log('Prix:', prix);
            // Assurez-vous que prix est une chaîne
            if (typeof prix !== 'string') {
                prix = prix.toString();
            }

            // Supprimez les séparateurs (ex : 1.000,00 => 100000)
            let prixFloat = parseFloat(prix.replace(/[.,]/g, ''));

            // Vérifiez si la conversion est valide
            if (isNaN(prixFloat)) {
                // console.error('Invalid price value:', prix);
                $('#montant_total').val(''); // Vider le champ si le prix est invalide
                return;
            }

            // Formater et afficher le prix total
            $('#montant_total').val(formatPrice(prixFloat.toString()));

            $('#montant_total_acte').val(formatPriceT(prixFloat));

            // Vérifiez si l'assurance est utilisée
            const au = $('#assurance_utiliser');
            let tauxFloat = parseFloat(patient_taux);

            if (au.val() === 'non') {
                tauxFloat = 0; // Pas d'assurance utilisée
            } else if (isNaN(tauxFloat) || tauxFloat < 0 || tauxFloat > 100) {
                // console.warn('Invalid patient_taux value:', patient_taux);
                tauxFloat = 0; // Défaut : pas de taux
            }

            // Calcul des montants
            let montantAssurance = 0;
            let montantPatient = 0;

            if (tauxFloat === 0) {
                montantPatient = prixFloat;
            } else {
                montantAssurance = Math.round((tauxFloat / 100) * prixFloat);
                montantPatient = Math.round(prixFloat - montantAssurance);
            }

            // Mettez à jour les champs correspondants
            $('#montant_assurance').val(formatPrice(montantAssurance.toString()));
            $('#montant_patient').val(formatPrice(montantPatient.toString()));
            $('#montant_patient_hidden').val(formatPrice(montantPatient.toString()));
            $('#montant_assurance_hidden').val(formatPrice(montantAssurance.toString()));
        } else {
            // Si aucun prix n'est défini, vider les champs
            $('#montant_total').val('');
            $('#montant_assurance').val('');
            $('#montant_patient').val('');
            $('#montant_patient_hidden').val('');
            $('#montant_assurance_hidden').val('');
        }
    }

    // ------------------------------------------------------------------

    function eng_societe() 
    {
        const nom = $("#nom_societe");
        const codeassurance= $("#codeassurance_societe");
        const assureur_id = $("#assureur_id_societe");

        if (!codeassurance.val().trim() || !nom.val().trim() || !assureur_id.val().trim()) {
            showAlert('Alert', 'Veuillez remplir tous les champs SVP.', 'warning');
            return false;
        }

        showPreloader();

        // AJAX request to create a new user
        $.ajax({
            url: '/api/societe_new',
            method: 'GET',
            data: {
                codeassurance: codeassurance.val(),
                nom: nom.val(),
                assureur_id: assureur_id.val(),
            },
            success: function(response) {
                hidePreloader();

                if (response.existe) {
                    showAlert('Alert', 'Cette société existe déjà', 'warning');
                } else if (response.success) {

                    nom.val('');
                    codeassurance.val('').trigger('change');
                    assureur_id.val('').trigger('change');

                    select_societe('#patient_codesocieteassure_new');

                    showAlert('Succès', 'Opération éffectuée.', 'success');
                } else if (response.error) {
                    showAlert('Erreur', response.message, 'error');
                }
            },
            error: function() {
                hidePreloader();
                showAlert('Erreur', 'Une erreur est survenue', 'error');
            }
        });
    }

    function eng_assurance() {
        const nom = $("#nom_assurance_new");
        const email = $("#email_assurance_new");
        const phone = $("#tel_assurance_new");
        const adresse = $("#adresse_assurance_new");
        const fax = $("#fax_assurance_new");
        const carte = $("#carte_assurance_new");
        const desc = $("#desc_assurance_new");

        // Vérification des champs obligatoires
        if (!nom.val().trim() || !email.val().trim() || !phone.val().trim() || !carte.val().trim() || !adresse.val().trim()) {
            showAlert('Alert', 'Tous les champs obligatoires n\'ont pas été remplis.', 'warning');
            return false;
        }

        // Vérification de l'email
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email.val().trim())) {
            showAlert('Alert', 'Email incorrect.', 'warning');
            return false;
        }

        // Vérification du téléphone
        if (phone.val().length !== 10) {
            showAlert('Alert', 'Contact incomplet.', 'warning');
            return false;
        }

        showPreloader();

        // Requête AJAX
        $.ajax({
            url: '/api/assurance_new',
            method: 'GET',
            data: {
                nom: nom.val(),
                email: email.val(),
                tel: phone.val(),
                desc: desc.val() || null,
                fax: fax.val() || null,
                adresse: adresse.val(),
                carte: carte.val()
            },
            success: function(response) {
                hidePreloader();

                if (response.tel_existe) {
                    showAlert('Alert', 'Ce numéro de contact appartient déjà à une assurance.', 'warning');
                } else if (response.email_existe) {
                    showAlert('Alert', 'Cet email appartient déjà à une assurance.', 'warning');
                } else if (response.nom_existe) {
                    showAlert('Alert', 'Cette assurance existe déjà.', 'warning');
                } else if (response.fax_existe) {
                    showAlert('Alert', 'Ce fax appartient déjà à une assurance.', 'warning');
                } else if (response.success) {

                    nom.val('');
                    email.val('');
                    phone.val('');
                    desc.val('');
                    fax.val('');
                    adresse.val('');
                    carte.val('');

                    assurance(); // rafraîchir la liste
                    showAlert('Succès', response.message, 'success');
                } else if (response.error) {
                    showAlert('Alert', 'Une erreur est survenue lors de l\'enregistrement.', 'error');
                }
            },
            error: function() {
                hidePreloader();
                showAlert('Alert', 'Une erreur est survenue lors de l\'enregistrement.', 'error');
            }
        });
    }

    function eng_patient() {
        const divAssurer = $("#div_assurer");

        let nom = $("#patient_nom_new");
        let prenom = $("#patient_prenom_new");
        let sexe = $("#patient_sexe_new");
        let datenais = $("#patient_datenaiss_new");
        let phone = $("#patient_tel_new");
        let phone2 = $("#patient_tel2_new");
        let residence = $("#patient_residence_new");
        let assurer = $("#assure");

        let filiation = $("#patient_codefiliation_new");
        let matricule_assurance = $("#patient_matriculeA_new");
        let assurance_id = $("#patient_codeassurance_new");
        let taux_id = $("#patient_idtauxcouv_new");
        let societe_id = $("#patient_codesocieteassure_new");

        let nomu = $("#patient_nomu_new");
        let telu = $("#patient_telu_new");
        let telu2 = $("#patient_telu2_new");

        // Validation des champs obligatoires
        if (!nom.val().trim() || !prenom.val().trim() || !phone.val().trim() || !datenais.val().trim() || !sexe.val().trim() || !residence.val().trim() || !assurer.val().trim()) {
            showAlert("Alert", "Veuillez remplir tous les champs obligatoires.", "warning");
            return false;
        }

        // Validation des numéros de téléphone
        if (phone.val().length !== 10 ) {
            showAlert("Alert", "Contact 1 incomplet.", "warning");
            return false;
        }

        if (phone2.val() && phone2.val().length !== 10) {
            showAlert("Alert", "Contact 2 incomplet.", "warning");
            return false;
        }

        if (telu.val() && telu.val().length !== 10) {
            showAlert("Alert", "Contact 1 en cas d'urgence incomplet.", "warning");
            return false;
        }

        if (telu2.val() && telu2.val().length !== 10) {
            showAlert("Alert", "Contact 2 en cas d'urgence incomplet.", "warning");
            return false;
        }

        // Validation des champs relatifs à l'assurance
        if (assurer.val() === "1") {
            if (!assurance_id.val() || !taux_id.val() || !societe_id.val() || !filiation.val() || !matricule_assurance.val()) {
                showAlert("Alert", "Veuillez remplir tous les champs relatifs à l'assurance.", "warning");
                return false;
            }
        }

        showPreloader();

        // Envoi AJAX
        $.ajax({
            url: "/api/patient_new",
            method: "GET", // POST pour créer les données
            data: {
                nom: nom.val(),
                prenom: prenom.val(),
                tel: phone.val(),
                tel2: phone2.val() || null,
                residence: residence.val(),
                assurer: assurer.val(),
                assurance_id: assurance_id.val() || 'NONAS',
                taux_id: taux_id.val() || null,
                societe_id: societe_id.val() || null,
                datenais: datenais.val(),
                sexe: sexe.val(),
                filiation: filiation.val() || null,
                matricule_assurance: matricule_assurance.val() || null,
                nomu: nomu.val() || null,
                telu: telu.val() || null,
                telu2: telu2.val() || null,
            },
            success: function (response) {
                // Supprimer le préchargement

                if (response.success) {

                    var newTab = new bootstrap.Tab(document.getElementById('tab-oneAAA'));
                    newTab.show();

                    // Réinitialisation des champs
                    nom.val("");
                    prenom.val("");
                    phone.val("");
                    phone2.val("");
                    residence.val("");
                    datenais.val("");
                    sexe.val("").trigger('change');

                    nomu.val("");
                    telu.val("");
                    telu2.val("");

                    filiation.val("").trigger('change');
                    matricule_assurance.val("");
                    assurance_id.val("").trigger('change');
                    taux_id.val("").trigger('change');
                    societe_id.val("").trigger('change');
                    assurer.val("").trigger('change');

                    divAssurer.hide();

                    const selectElement = $('#id_patient');
                    selectElement.empty();

                    // Ajouter l'option par défaut
                    const defaultOption = $('<option>', {
                        value: '',
                        text: 'Selectionner'
                    });
                    selectElement.append(defaultOption);

                    $.ajax({
                        url: '/api/name_patient_reception',
                        method: 'GET',
                        dataType: 'json',
                        success: function(data) {

                            data.name.forEach(item => {
                                const option = $('<option>', {
                                    value: item.idenregistremetpatient,
                                    text: item.nomprenomspatient
                                });
                                selectElement.append(option);
                            });

                            hidePreloader();

                            $('#id_patient').val(response.id).trigger('change');

                        },
                        error: function() {
                            console.error('Erreur lors du chargement des patients');
                        }
                    });

                    // showAlert("Succès", response.message, "success");
                } else if (response.error) {
                    showAlert("Alert", response.message, "error");
                }
            },
            error: function () {

                hidePreloader();
                showAlert("Alert", "Une erreur est survenue lors de l'enregistrement.", "error");
            }
        });
    }

    // ------------------------------------------------------------------

    const table_cons = $('.Table_day_cons').DataTable({

        processing: true,
        serverSide: false,
        ajax: {
            url: `/api/list_cons_day`,
            type: 'GET',
            dataSrc: 'data',
        },
        columns: [
            { 
                data: null, 
                render: (data, type, row, meta) => meta.row + 1,
                searchable: false,
                orderable: false,
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
                            ${row.regle == 0 ? `
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
            initializeRowEventListenersCons();
        },
    });

    OffClick('#btn_refresh_table', function () {
        table_cons.ajax.reload(null, false); 
    });

    function initializeRowEventListenersCons() {

        // Clique sur "Cfacture"
        $('.Table_day_cons').on('click', '#Cfacture', function() {
            showPreloader();

            const code = $(this).data('idconsexterne');

            $.ajax({
                url: `/api/fiche_consultation/${code}`,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    hidePreloader();
                    const facture = data.facture;
                    pdfFactureConsultation(facture);
                },
                error: function(err) {
                    hidePreloader();
                    console.error('Erreur lors du chargement des données:', err);
                    showAlert('Erreur', 'Impossible de charger la facture.', 'error');
                }
            });
        });

        // Clique sur "Cfiche"
        $('.Table_day_cons').on('click', '#Cfiche', function() {
            showPreloader();

            const code = $(this).data('idconsexterne');

            $.ajax({
                url: `/api/fiche_consultation/${code}`,
                method: 'GET',
                dataType: 'json',
                success: function(data) {
                    hidePreloader();
                    const facture = data.facture;
                    pdfFicheConsultation(facture);
                },
                error: function(err) {
                    hidePreloader();
                    console.error('Erreur lors du chargement des données:', err);
                    showAlert('Erreur', 'Impossible de charger la fiche.', 'error');
                }
            });
        });

        // Clique sur "deleteCons"
        $('.Table_day_cons').on('click', '#deleteCons', function(e) {
            e.preventDefault();
            const numfac = $(this).data('numfac');
            $('#IddeleteCons').val(numfac);
        });
    }

    function eng_consultation() {

        const login = user.login;
        const id_patient = $('#id_patient').val();
        const assurance_utiliser = $('#assurance_utiliser').val();
        const typeacte_idS = $('#typeacte_idS').val();
        const medecin_id = $('#medecin_id').val();
        const periode = $('#periode').val();
        const montant_assurance = $('#montant_assurance').val();
        const montant_patient = $('#montant_patient').val();
        const taux_remise = $('#taux_remise').val() || 0;
        const montant_total = $('#montant_total').val();
        const mumcode = $('#mumcode').val() || null;

        const codeassurance = $('#patient_codeassurance').val() || null;
        const patient_numdossier = $('#patient_numdossier').val() || null;
        const patient_taux = $('#patient_taux').val();

        // Validation des champs obligatoires
        if (!typeacte_idS || !medecin_id ) {
            showAlert('Alert', 'Tous les champs sont obligatoires.', 'warning');
            return false;
        }

        if (montant_assurance < 0 || montant_patient < 0 || taux_remise < 0) {
            showAlert('Alert', 'Veuillez vérifier le montant de la remise.', 'warning');
            return false;
        }

        let assurance = parseInt($('#montant_assurance').val().replace(/[^0-9]/g, '')) || 0;
        let patient = parseInt($('#montant_patient').val().replace(/[^0-9]/g, '')) || 0;
        let remise = parseInt($('#taux_remise').val().replace(/[^0-9]/g, '')) || 0;
        let total = assurance + patient + remise;

        if (total !== parseInt(montant_total.replace(/[^0-9]/g, ''))) {
            showAlert('Alert', 'Veuillez vérifier les différents montants.', 'warning');
            return false;
        }

        showPreloader();

        $.ajax({
            url: '/api/new_consultation',
            method: 'GET', // Utiliser 'POST' pour créer des données
            data: {
                id_patient: id_patient,
                typeacte_id: typeacte_idS,
                user_id: medecin_id,
                periode: periode,
                montant_assurance: montant_assurance,
                montant_patient: montant_patient,
                taux_remise: taux_remise,
                total: montant_total,
                appliq_remise: $('#appliq_remise').val(),
                mumcode: mumcode,
                assurance_utiliser: assurance_utiliser,
                login: login,
                codeassurance: codeassurance,
                patient_numdossier: patient_numdossier,
                patient_taux: patient_taux,
            },
            success: function(response) {
                hidePreloader();
                
                if (response.success) {

                    $('#div_info_patient').empty();
                    $('#div_info_consul').hide();
                    $('#mumcode').val('');

                    if ($('#stat_consultation').html().trim() !== "") {
                        Statistique_cons();
                    }

                    table_cons.ajax.reload(null, false);

                    Statistique();
                    Reset();
                    stat_fac_day();
                    Activity_cons();
                    Activity_cons_count();

                    showAlert('Succès', 'Patient Enregistrée.', 'success');

                } else if (response.error) {
                    showAlert('Alert', 'Une erreur est survenue lors de l\'enregistrement.', 'error');
                }
            },
            error: function() {
                hidePreloader();
                showAlert('Alert', 'Une erreur est survenue lors de l\'enregistrement.', 'error');
            }
        });
    }

    function delete_cons() {
        // Récupérer le numéro de facture
        const numfac = $('#IddeleteCons').val();

        // Masquer le modal Bootstrap
        $('#MdeleteCons').modal('hide');

        showPreloader();

        // Requête AJAX
        $.ajax({
            url: '/api/delete_Cons/' + numfac,
            method: 'GET',
            success: function(response) {
                hidePreloader(); // Retirer le préchargeur

                if (response.success) {
                    table_cons.ajax.reload(null, false); // Rafraîchir la table
                    showAlert('Succès', 'Opération éffectuée.', 'success');
                } else if (response.error) {
                    showAlert('Erreur', 'Échec de l\'opération.', 'error');
                }
            },
            error: function() {
                hidePreloader();
                showAlert('Erreur', 'Erreur lors de la suppression.', 'error');
            }
        });
    }


    //-------------------------------------------------------------------

    function Statistique() {
        const nbre_fac = $('#nbre_fac');
        const montant_fac_r = $('#montant_fac_r');
        const montant_fac_nr = $('#montant_fac_nr');
        const total_fac = $('#total_fac');

        const stat_cons = $('#stat_cons');
        const stat_exam = $('#stat_exam');
        const stat_soins = $('#stat_soins');
        const stat_hosp = $('#stat_hosp');

        $.ajax({
            url: '/api/statistique_reception/' + $('#stat_bord_date').val(),
            method: 'GET',
            success: function(response) {
                hidePreloader();

                nbre_fac.text(response.nbre_fac);
                montant_fac_r.text(formatPrice(response.montant_fac_r.toString()) + ' Fcfa');
                montant_fac_nr.text(formatPrice(response.montant_fac_nr.toString()) + ' Fcfa');
                total_fac.text(formatPrice(response.total_fac.toString()) + ' Fcfa');
                stat_cons.text(response.stat_cons);
                stat_exam.text(response.stat_exam);
                stat_soins.text(response.stat_soins);
                stat_hosp.text(response.stat_hosp);
            },
            error: function() {
                hidePreloader();
            }
        });
    }

    function Statistique_cons() {
        const stat_consultation = $('#stat_consultation');

        stat_consultation.html(`
            <div class="d-flex justify-content-center align-items-center mb-3">
                <div class="spinner-border text-warning me-2" role="status" aria-hidden="true"></div>
                <strong>Chargement des données...</strong>
            </div>
        `);

        const date1 = $('#searchDate1').val();
        const date2 = $('#searchDate2').val();

        $('#div_btn_affiche_stat, #div_btn_cache_stat').hide();

        $.ajax({
            url: `/api/statistique_reception_cons/${date1}/${date2}`,
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                const typeactes = data.typeacte;
                stat_consultation.empty();

                $('#div_btn_affiche_stat').hide();
                $('#div_btn_cache_stat').show();

                if (typeactes.length > 0) {
                    stat_consultation.show();

                    $.each(typeactes, function(index, item) {
                        const row = $(`
                            <div class="col-xxl-3 col-xl-4 col-md-6 col-12">
                                <div class="card mb-3">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="p-2 border border-primary rounded-circle me-3">
                                                <div class="icon-box md bg-primary-subtle rounded-5">
                                                    <i class="ri-stethoscope-line fs-4 text-primary"></i>
                                                </div>
                                            </div>
                                            <div class="d-flex flex-column">
                                                <h6 class="lh-1">${item.libgaran}</h6>
                                                <p class="m-0">${item.nbre} Consultation(s)</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-1">
                                            <div class="text-start"><p class="mb-0 text-primary">Part Assurance</p></div>
                                            <div class="text-end"><p class="mb-0 text-primary">${formatPrice(item.part_assurance.toString())} Fcfa</p></div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-1">
                                            <div class="text-start"><p class="mb-0 text-primary">Part Patient</p></div>
                                            <div class="text-end"><p class="mb-0 text-primary">${formatPrice(item.part_patient.toString())} Fcfa</p></div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-1">
                                            <div class="text-start"><p class="mb-0 text-primary">Montant Total</p></div>
                                            <div class="text-end"><p class="mb-0 text-primary">${formatPrice(item.total.toString())} Fcfa</p></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        `);
                        stat_consultation.append(row);
                    });

                    stat_consultation.css({ height: "550px", overflowY: "auto" });

                } else {
                    stat_consultation.html(`
                        <div class="d-flex justify-content-center align-items-center mb-3">
                            <strong class="text-danger">Aucune données n'a été trouvées</strong>
                        </div>
                    `);
                }
            },
            error: function() {
                stat_consultation.html(`
                    <div class="d-flex justify-content-center align-items-center mb-3">
                        <strong class="text-danger">Erreur lors du chargement des données</strong>
                    </div>
                `);
            }
        });
    }

    function Activity_cons() {
        $.ajax({
            url: '/api/getWeeklyConsultations',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                $('#docActivity').html('<div id="docActivity2"></div>');

                var options = {
                    chart: {
                        height: 150,
                        type: "bar",
                        toolbar: { show: false }
                    },

                    plotOptions: {
                        bar: {
                            columnWidth: "70%",
                            borderRadius: 2,
                            distributed: true,
                            dataLabels: { position: "center" }
                        }
                    },

                    series: [{
                        name: "Consultations",
                        data: data
                    }],

                    legend: { show: false },

                    xaxis: {
                        categories: ["Lun","Mar","Mer","Jeu","Ven","Sam","Dim"],
                        axisBorder: {
                            show: false,
                            color: "#ffffff" // ✅ ligne axe X blanche
                        },
                        axisTicks: {
                            show: false,
                            color: "#ffffff" // ✅ ticks blancs
                        },
                        labels: {
                            show: true,
                            style: {
                                colors: "#ffffff", // ✅ texte blanc
                                fontSize: "12px"
                            }
                        }
                    },

                    yaxis: {
                        show: false,
                        axisBorder: {
                            show: true,
                            color: "#ffffff" // ✅ ligne axe Y blanche
                        },
                        axisTicks: {
                            show: true,
                            color: "#ffffff"
                        },
                        labels: {
                            style: {
                                colors: "#ffffff", // ✅ texte blanc
                                fontSize: "12px"
                            }
                        }
                    },

                    grid: {
                        borderColor: "#ffffff",
                        strokeDashArray: 5,
                        xaxis: { lines: { show: true } },
                        yaxis: { lines: { show: false } },
                        padding: { top: 0, right: 0, bottom: 0, left: 0 }
                    },

                    tooltip: {
                        y: {
                            formatter: function(val) {
                                return val;
                            }
                        }
                    },

                    colors: [
                        "rgba(255,255,255,0.7)",
                        "rgba(255,255,255,0.6)",
                        "rgba(255,255,255,0.5)",
                        "rgba(255,255,255,0.4)",
                        "rgba(255,255,255,0.3)",
                        "rgba(255,255,255,0.2)",
                        "rgba(255,255,255,0.2)"
                    ]
                };

                var chart = new ApexCharts(document.querySelector("#docActivity2"), options);
                chart.render();
            },
            error: function(err) { console.error('Error fetching data:', err); }
        });
    }

    function Activity_cons_count() {
        $.ajax({
            url: '/api/getConsultationComparison',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                const percentage = data.percentage || 0;
                const currentWeek = data.currentWeek || 0;
                const lastWeek = data.lastWeek || 0;

                $('#consultationComparison').html(`
                    <div class="text-center">
                        (${currentWeek}) consultation(s) cette semaine par rapport à ceux de la semaine dernière (${lastWeek}). soit <span class="badge bg-danger">${percentage}%</span> de différence.
                    </div>
                `);
            },
            error: function(err) { console.error('Error fetching data:', err); }
        });
    }

    function stat_fac_day() {
        const page = $('#content_stat_fac');
        page.html(`
            <div class="d-flex justify-content-center align-items-center mb-3">
                <div class="spinner-border text-warning me-2" role="status" aria-hidden="true"></div>
                <strong class="text-white">Chargement des données...</strong>
            </div>
        `);

        $.ajax({
            url: '/api/getStatFacDay',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                const table = data.data;

                page.html('<div class="row g-3" id="content_stat_fac2"></div>');

                $.each(table, function(index, item) {
                    const colorClass = item.pourcentage >= 0 ? 'bg-success' : 'bg-danger';
                    const arrowIcon = item.pourcentage >= 0 
                        ? '<i class="ri-arrow-right-up-line ms-1 fw-bold text-white"></i>'
                        : '<i class="ri-arrow-right-down-line ms-1 fw-bold text-white"></i>';
                    const pourcentageClass = item.pourcentage >= 0 ? 'text-success' : 'text-danger';

                    const row = $(`
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="${colorClass} rounded-2 d-flex align-items-center flex-column p-2">
                                <div class="m-0">
                                    <div class="d-flex flex-column align-items-center">
                                        <div class="fs-6 text-white fw-normal">${formatPrice(item.montant.toString())} Fcfa</div>
                                        <small class="text-dark fw-bold text-white">${item.nom}</small>
                                        <div class="ms-2 ${pourcentageClass} d-flex">
                                            <small class="text-white">${item.pourcentage}%</small>
                                            ${arrowIcon}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `);

                    $('#content_stat_fac2').append(row);
                });
            },
            error: function(err) { console.error('Error fetching data:', err); }
        });
    }

    // -----------------------------------------------------------------

    const table_rdv = $('.Table_day_rdv').DataTable({

        processing: true,
        serverSide: false,
        ajax: {
            url: `/api/list_rdv_day`,
            type: 'GET',
            dataSrc: 'data',
        },
        columns: [
            { 
                data: null, 
                render: (data, type, row, meta) => meta.row + 1,
                searchable: false,
                orderable: false,
            },
            { 
                data: 'patient', 
                render: (data, type, row) => `
                <div class="d-flex align-items-center">
                    <a class="d-flex align-items-center flex-column me-2">
                        <img src="/assets/images/rdv1.png" class="img-2x rounded-circle border border-1">
                    </a>
                    ${data}
                </div>`,
                searchable: true, 
            },
            {
                data: 'patient_tel',
                render: (data, type, row) => {
                    return data ? `+225 ${data}` : 'Néant';
                },
                searchable: true,
            },
            {
                data: 'medecin',
                render: (data, type, row) => {
                    return data ? `Dr. ${data}` : 'Néant';
                },
                searchable: true,
            },
            { 
                data: 'specialite',
                searchable: true, 
            },
            { 
                data: 'date',
                render: formatDate,
                searchable: true, 
            },
            {
                data: 'statut',
                render: (data, type, row) => `
                    <span class="badge ${data === 'en attente' ? 'bg-danger' : 'bg-success'}">
                        ${data === 'en attente' ? 'En Attente' : 'Terminer'}
                    </span>
                `,
                searchable: true,
            },
            { 
                data: 'created_at',
                render: formatDateHeure,
                searchable: true, 
            }
        ],
        ...dataTableConfig,
    });

    OffClick('#btn_refresh_table_rdv', function () {
        table_rdv.ajax.reload(null, false); 
    });

});