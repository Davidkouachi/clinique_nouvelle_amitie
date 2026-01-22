<?php

namespace App\Http\Controllers;

use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

// use App\Models\assurance;
// use App\Models\taux;
// use App\Models\societe;
// use App\Models\patient;
use App\Models\chambre;
use App\Models\lit;
// use App\Models\acte;
// use App\Models\typeacte;
// use App\Models\typemedecin;
use App\Models\User;
// use App\Models\role;
// use App\Models\consultation;
// use App\Models\detailconsultation;
// use App\Models\typeadmission;
// use App\Models\natureadmission;
// use App\Models\detailhopital;
// use App\Models\facture;
// use App\Models\produit;
// use App\Models\soinshopital;
// use App\Models\soinsinfirmier;
// use App\Models\typesoins;
// use App\Models\soinspatient;
// use App\Models\sp_produit;
// use App\Models\sp_soins;
// use App\Models\examenpatient;
// use App\Models\examen;
use App\Models\prelevement;
use App\Models\joursemaine;
use App\Models\rdvpatient;
use App\Models\programmemedecin;
use App\Models\depotfacture;
// use App\Models\caisse;
// use App\Models\historiquecaisse;
use App\Models\portecaisse;

class ApilistfactureController extends Controller
{
    public function list_facture_inpayer($numfac)
    {

        $facture = DB::table('consultation')
            ->join('dossierpatient', 'consultation.idenregistremetpatient', '=', 'dossierpatient.idenregistremetpatient')
            ->join('garantie', 'consultation.codeacte', '=', 'garantie.codgaran')
            ->join('factures', 'consultation.numfac', '=', 'factures.numfac')
            ->where('garantie.codtypgar', '=', 'CONS')
            ->where('consultation.numfac', '=', $numfac)
            ->select(
                'consultation.idconsexterne as idconsexterne',
                'consultation.montant as montant',
                'consultation.date as date',
                'consultation.numfac as numfac',
                'dossierpatient.numdossier as numdossier',
                'dossierpatient.idenregistremetpatient as matricule_patient',
                'factures.remise as remise',
                'factures.montant_ass as part_assurance',
                'factures.montant_pat as part_patient',
                'factures.montantregle_pat as part_patient_regler',
                'factures.montantreste_pat as part_patient_reste'
            )
            ->first();

        if ($facture) {
            $facture->part_patient_regler = $facture->part_patient_regler ?? 0;

            $facture->part_patient_reste = $facture->part_patient_reste ?? 0;

            if ($facture->part_patient_reste === 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'La facture est déjà totalement réglée.'
                ], 200); // 200 car ce n'est pas une erreur technique
            }

            return response()->json([
                'status' => 'success',
                'data' => $facture
            ], 200);

        } else {
            // Aucun résultat trouvé
            return response()->json([
                'status' => 'error',
                'message' => 'Facture introuvable.'
            ], 404);
        }
    }

    public function list_facture($date1, $date2)
    {
        $date1 = Carbon::parse($date1)->startOfDay();
        $date2 = Carbon::parse($date2)->endOfDay();

        $facture = DB::table('consultation')
            ->join('patient', 'consultation.idenregistremetpatient', '=', 'patient.idenregistremetpatient')
            ->leftjoin('dossierpatient', 'consultation.idenregistremetpatient', '=', 'dossierpatient.idenregistremetpatient')
            ->join('medecin', 'consultation.codemedecin', '=', 'medecin.codemedecin')
            ->join('specialitemed', 'medecin.codespecialitemed', '=', 'specialitemed.codespecialitemed')
            ->join('garantie', 'consultation.codeacte', '=', 'garantie.codgaran')
            ->join('factures', 'consultation.numfac', '=', 'factures.numfac')
            ->where('garantie.codtypgar', '=', 'CONS')
            ->where('dossierpatient.codetypedossier', '=', 'DC')
            ->whereBetween('consultation.date', [$date1, $date2])
            ->select(
                'consultation.idconsexterne as idconsexterne',
                'consultation.montant as montant',
                'consultation.date as date',
                'consultation.numfac as numfac',
                'consultation.regle as statut',
                'dossierpatient.numdossier as numdossier',
                'patient.nomprenomspatient as nom_patient',
                'patient.telpatient as tel_patient',
                'medecin.nomprenomsmed as nom_medecin',
                'specialitemed.nomspecialite as specialite',
                'factures.remise as remise',
                'factures.montant_ass as part_assurance',
                'factures.montant_pat as part_patient',
                'factures.montantregle_pat as part_patient_regler',
                'factures.montantreste_pat as part_patient_reste',
                'factures.numrecu as numrecu',
            )
            ->orderBy('consultation.date', 'desc')
            ->get();

        foreach ($facture as $value) {

            if (abs($value->part_patient_reste) == 0) {
                $value->statut_regle = 'Oui';
            } else {
                $value->statut_regle = 'Non';
            }

            $value->part_patient_reste = abs($value->part_patient_reste);
        }

        return response()->json([
            'data' => $facture,
        ]);
    }

    public function list_facture_hos($numfac)
    {
        $facture = DB::table('admission')
            ->join('dossierpatient', 'admission.idenregistremetpatient', '=', 'dossierpatient.idenregistremetpatient')
            ->join('factures', 'admission.numfachospit', '=', 'factures.numfac')
            ->where('admission.numfachospit', '=', $numfac)
            ->select(
                'admission.numhospit as numhospit',
                'admission.created_at as date',
                'admission.numfachospit as numfachospit',
                'dossierpatient.numdossier as numdossier',
                'admission.idenregistremetpatient as matricule_patient',
                'factures.remise as remise',
                'factures.montanttotal as montant',
                'factures.montant_ass as part_assurance',
                'factures.montant_pat as part_patient',
                'factures.montantregle_pat as part_patient_regler',
                'factures.montantreste_pat as part_patient_reste'
            )
            ->first();

        if ($facture) {

            $facture->part_patient_regler = $facture->part_patient_regler ?? 0;

            $facture->part_patient_reste = $facture->part_patient_reste ?? 0;

            if ($facture->part_patient_reste === 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'La facture est déjà totalement réglée.'
                ], 200); // 200 car ce n'est pas une erreur technique
            }

            return response()->json([
                'status' => 'success',
                'data' => $facture
            ], 200);

        } else {
            // Aucun résultat trouvé
            return response()->json([
                'status' => 'error',
                'message' => 'Facture introuvable.'
            ], 404);
        }
    }

    public function list_facture_hos_all($date1, $date2)
    {
        $date1 = Carbon::parse($date1)->startOfDay();
        $date2 = Carbon::parse($date2)->endOfDay();

        $facture = DB::table('admission')
            ->join('dossierpatient', 'admission.idenregistremetpatient', '=', 'dossierpatient.idenregistremetpatient')
            ->join('factures', 'admission.numfachospit', '=', 'factures.numfac')
            ->whereBetween('admission.dateentree', [$date1, $date2])
            ->where('dossierpatient.codetypedossier', '=', 'DH')
            ->select(
                'admission.numhospit as numhospit',
                'admission.created_at as date',
                'admission.numfachospit as numfachospit',
                'dossierpatient.numdossier as numdossier',
                'admission.idenregistremetpatient as matricule_patient',
                'factures.remise as remise',
                'factures.montanttotal as montant',
                'factures.montant_ass as part_assurance',
                'factures.montant_pat as part_patient',
                'factures.montantregle_pat as part_patient_regler',
                'factures.montantreste_pat as part_patient_reste',
                'factures.numrecu as numrecu',
            )
            ->orderBy('admission.dateentree', 'desc')
            ->get();

        foreach ($facture as $value) {

            if (abs($value->part_patient_reste) == 0 && abs($value->montant) > 0) {
                $value->statut_regle = 'Oui';
            } else {
                $value->statut_regle = 'Non';
            }

            $value->part_patient_reste = abs($value->part_patient_reste);
        }

        return response()->json([
            'data' => $facture,
        ]);
    }

    public function list_facture_soinsam($numfac)
    {

        $facture = DB::table('soins_medicaux')
            ->join('patient', 'patient.idenregistremetpatient', '=', 'soins_medicaux.idenregistremetpatient')
            ->join('dossierpatient', 'soins_medicaux.idenregistremetpatient', '=', 'dossierpatient.idenregistremetpatient')
            ->join('factures', 'soins_medicaux.numfac_soins', '=', 'factures.numfac')
            ->where('soins_medicaux.numfac_soins', '=', $numfac)
            ->select(
                'soins_medicaux.id_soins as id_soins',
                'soins_medicaux.montant_total as montant',
                'soins_medicaux.date_soin as date',
                'soins_medicaux.numfac_soins as numfac',
                'dossierpatient.numdossier as numdossier',
                'dossierpatient.idenregistremetpatient as matricule_patient',
                'factures.numhospit as numhospit',
                'factures.remise as remise',
                'factures.montant_ass as part_assurance',
                'factures.montant_pat as part_patient',
                'factures.montantregle_pat as part_patient_regler',
                'factures.montantreste_pat as part_patient_reste'
            )
            ->first();

        if ($facture) {

            if ($facture->numhospit !== null) {
                return response()->json([
                    'status' => 'hospit',
                    'message' => 'Cette facture est déjà liée a une hospitalisation.'
                ], 200);
            }

            $facture->part_patient_regler = $facture->part_patient_regler ?? 0;

            $facture->part_patient_reste = $facture->part_patient_reste ?? 0;

            if ($facture->part_patient_reste === 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'La facture est déjà totalement réglée.'
                ], 200); // 200 car ce n'est pas une erreur technique
            }

            $produittotal = DB::table('soins_medicaux_itemmedics')
                ->where('id_soins', '=', $facture->id_soins)
                ->select(DB::raw('COALESCE(SUM(REPLACE(price, ".", "") + 0), 0) as total'))
                ->first();

            $facture->prototal = $produittotal->total ?? 0;

            $soinstotal = DB::table('soins_medicaux_itemsoins')
                ->where('id_soins', '=', $facture->id_soins)
                ->select(DB::raw('COALESCE(SUM(REPLACE(price, ".", "") + 0), 0) as total'))
                ->first();

            $facture->stotal = $soinstotal->total ?? 0;

            return response()->json([
                'status' => 'success',
                'data' => $facture
            ], 200);

        } else {
            // Aucun résultat trouvé
            return response()->json([
                'status' => 'error',
                'message' => 'Facture introuvable.'
            ], 404);
        }
    }

    public function list_facture_soinsam_all($date1, $date2)
    {
        $date1 = Carbon::parse($date1)->startOfDay();
        $date2 = Carbon::parse($date2)->endOfDay();

        $facture = DB::table('soins_medicaux')
            ->join('patient', 'patient.idenregistremetpatient', '=', 'soins_medicaux.idenregistremetpatient')
            ->join('dossierpatient', 'soins_medicaux.idenregistremetpatient', '=', 'dossierpatient.idenregistremetpatient')
            ->join('factures', 'soins_medicaux.numfac_soins', '=', 'factures.numfac')
            ->whereBetween('soins_medicaux.date_soin', [$date1, $date2])
            ->where('factures.numhospit', '=', null)
            ->where('dossierpatient.codetypedossier', '=', 'DC')
            ->select(
                'soins_medicaux.id_soins as id_soins',
                'soins_medicaux.date_soin as date',
                'soins_medicaux.numfac_soins as numfac',
                'dossierpatient.numdossier as numdossier',
                'dossierpatient.idenregistremetpatient as matricule_patient',
                'factures.montanttotal as montant',
                'factures.remise as remise',
                'factures.montant_ass as part_assurance',
                'factures.montant_pat as part_patient',
                'factures.montantregle_pat as part_patient_regler',
                'factures.montantreste_pat as part_patient_reste',
                'factures.numrecu as numrecu',
            )
            ->orderBy('soins_medicaux.date_soin', 'desc')
            ->get();

        foreach ($facture as $value) {

            if (abs($value->part_patient_reste) == 0) {
                $value->statut_regle = 'Oui';
            } else {
                $value->statut_regle = 'Non';
            }

            // $value->part_patient_reste = abs($value->part_patient - $value->part_patient_regler);
            $value->part_patient_reste = abs($value->part_patient_reste);

            $produittotal = DB::table('soins_medicaux_itemmedics')
                ->where('id_soins', '=', $value->id_soins)
                ->select(DB::raw('COALESCE(SUM(qte * REPLACE(price, ".", "") + 0), 0) as total'))
                ->first();

            $value->prototal = $produittotal->total ?? 0;

            $soinstotal = DB::table('soins_medicaux_itemsoins')
                ->where('id_soins', '=', $value->id_soins)
                ->select(DB::raw('COALESCE(SUM(REPLACE(price, ".", "") + 0), 0) as total'))
                ->first();

            $value->stotal = $soinstotal->total ?? 0;

        }

        return response()->json([
            'data' => $facture,
        ]);
    }

    public function list_facture_examen($numfac)
    {

        $facture = DB::table('testlaboimagerie')
            ->join('factures', 'testlaboimagerie.numfacbul', '=', 'factures.numfac')
            ->where('testlaboimagerie.numfacbul', '=', $numfac)
            ->select(
                'testlaboimagerie.idtestlaboimagerie as id',
                'testlaboimagerie.typedemande as typedemande',
                'testlaboimagerie.date as date',
                'testlaboimagerie.heure as heure',
                'testlaboimagerie.numfacbul as numfac',
                'testlaboimagerie.prelevement as prelevement',
                'testlaboimagerie.idenregistremetpatient as matricule',
                'factures.numhospit as numhospit',
                'factures.montant_ass as part_assurance',
                'factures.montant_pat as part_patient',
                'factures.montantregle_pat as part_patient_regler',
                'factures.montantreste_pat as part_patient_reste',
                'factures.montanttotal as montant_total',
            )
            ->first();

        if ($facture) {

            if ($facture->numhospit !== null) {
                return response()->json([
                    'status' => 'hospit',
                    'message' => 'Cette facture est déjà liée a une hospitalisation.'
                ], 200);
            }

            $examen = DB::table('detailtestlaboimagerie')
                ->where('idtestlaboimagerie', '=', $facture->id)
                ->select(
                    'detailtestlaboimagerie.denomination as examen',
                    'detailtestlaboimagerie.resultat as resultat',
                    'detailtestlaboimagerie.prix as prix',
                )
                ->get();

            $sumMontantEx = $examen->sum(function ($item) {
                $montantEx = str_replace('.', '', $item->prix);
                return (int) $montantEx;
            });

            $facture->montant_examen = $sumMontantEx;

            $facture->part_patient_regler = $facture->part_patient_regler ?? 0;

            $facture->part_patient_reste = $facture->part_patient_reste ?? 0;

            if ($facture->part_patient_reste === 0) {
                return response()->json([
                    'status' => 'error',
                    'message' => 'La facture est déjà totalement réglée.'
                ], 200); // 200 car ce n'est pas une erreur technique
            }

            return response()->json([
                'status' => 'success',
                'data' => $facture
            ], 200);

        } else {
            // Aucun résultat trouvé
            return response()->json([
                'status' => 'error',
                'message' => 'Facture introuvable.'
            ], 404);
        }
    }

    public function list_facture_examen_all($date1, $date2)
    {
        $date1 = Carbon::parse($date1)->startOfDay();
        $date2 = Carbon::parse($date2)->endOfDay();

        $facture = DB::table('testlaboimagerie')
            ->join('patient', 'testlaboimagerie.idenregistremetpatient', '=', 'patient.idenregistremetpatient')
            ->leftjoin('dossierpatient', 'patient.idenregistremetpatient', '=', 'dossierpatient.idenregistremetpatient')
            ->leftjoin('medecin', 'testlaboimagerie.codemedecin', '=', 'medecin.codemedecin')
            ->join('factures', 'testlaboimagerie.numfacbul', '=', 'factures.numfac')
            ->whereBetween('testlaboimagerie.date', [$date1, $date2])
            ->where('factures.numhospit', '=', null)
            ->where('dossierpatient.codetypedossier', '=', 'DC')
            ->select(
                'testlaboimagerie.idtestlaboimagerie as id',
                'testlaboimagerie.idenregistremetpatient as matricule_patient',
                'testlaboimagerie.typedemande as typedemande',
                'testlaboimagerie.date as date',
                'testlaboimagerie.heure as heure',
                'testlaboimagerie.numfacbul as numfac',
                'testlaboimagerie.prelevement as prelevement',
                'testlaboimagerie.medicin_traitant as medicin_traitant',
                'dossierpatient.numdossier as numdossier',
                'patient.nomprenomspatient as nom_patient',
                'patient.telpatient as tel_patient',
                'medecin.nomprenomsmed as nom_medecin',
                'factures.montanttotal as montant',
                'factures.remise as remise',
                'factures.montant_ass as part_assurance',
                'factures.montant_pat as part_patient',
                'factures.montantregle_pat as part_patient_regler',
                'factures.montantreste_pat as part_patient_reste',
                'factures.numrecu as numrecu',
            )
            ->orderBy('testlaboimagerie.date', 'desc')
            ->get();

        foreach ($facture as $value) {

            if (abs($value->part_patient_reste) == 0) {
                $value->statut_regle = 'Oui';
            } else {
                $value->statut_regle = 'Non';
            }

            $value->part_patient_reste = abs($value->part_patient_reste);

            $examen = DB::table('detailtestlaboimagerie')
                ->where('idtestlaboimagerie', '=', $value->id)
                ->select(
                    'detailtestlaboimagerie.denomination as examen',
                    'detailtestlaboimagerie.resultat as resultat',
                    'detailtestlaboimagerie.prix as prix',
                )
                ->get();

            $sumMontantEx = $examen->sum(function ($item) {
                $montantEx = str_replace('.', '', $item->prix);
                return (int) $montantEx;
            });

            $value->montant_examen = $sumMontantEx;
        }

        return response()->json([
            'data' => $facture,
        ]);
    }

}
