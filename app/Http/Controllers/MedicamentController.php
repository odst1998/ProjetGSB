<?php


namespace App\Http\Controllers;
use App\DAO\ServiceMedicament;
use App\DAO\ServiceComposant;
use Session;
use Request;

class MedicamentController extends Controller
{
    // On recherche tous les Medicaments
    public function ListerMedicaments() {
        if (Session::get('connect') == true) {
            try {
                $unMedicament = new ServiceMedicament();
                $mesMedicaments = $unMedicament->getListeMedicaments();
                return view('vues/listerMedicaments', compact('mesMedicaments'));
            } catch (MonException $e) {
                $erreur = $e->getMessage();
                return view('Error', compact('erreur'));
            } catch (Exception $ex) {
                $erreur = $ex->getMessage();
                return view('Error', compact('erreur'));
            }
        }else {
            $erreur = "Vous devez être connecté pour réaliser cette opération.";
            return view('error', compact('erreur'));
        }
    }

    public function getInteractionsMed($idM){
        try{
            $unMedic = new ServiceMedicament();
            $mesInteractions = $unMedic->getInteractionsMed($idM);
            $mesMedicaments = $unMedic->getListeMedicaments();
            return view('vues/listerInteractions', compact('mesInteractions', 'mesMedicaments'));
        }catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 204);
        }
    }

    public function postRechercheMed(){
        try{
            $like = Request::input('rechercher');
            $unMedic = new ServiceMedicament();
            $mesMedicaments = $unMedic->getMedicLike($like);
            return view('vues/listerMedicaments', compact('mesMedicaments', 'like'));
        }catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 204);
        }
    }

    public function ListerComposants() {
        if (Session::get('connect') == true) {
            try {
                $unMedicament = new ServiceMedicament();
                $mesMedicaments = $unMedicament->getListeMedicaments();
                return view('vues/formChoixMedicament', compact('mesMedicaments'));
            } catch (MonException $e) {
                $erreur = $e->getMessage();
                return view('Error', compact('erreur'));
            } catch (Exception $ex) {
                $erreur = $ex->getMessage();
                return view('Error', compact('erreur'));
            }
        }else {
            $erreur = "Vous devez être connecté pour réaliser cette opération.";
            return view('error', compact('erreur'));
        }
    }

    public function postListerComposants(){
        try{
            $id_med = Request::input('medicament');
            $unComposant = new ServiceComposant();
            $mesComposants = $unComposant->getComposantsByMed($id_med);
            return view('vues/listerComposants', compact('mesComposants'));
        }catch (MonException $e) {
            $erreur = $e->getMessage();
            return response()->json($erreur, 204);
        }
    }

    public function ListerMedNonPresc() {
        if (Session::get('connect') == true) {
            try {
                $unMedicament = new ServiceMedicament();
                $mesMedicaments = $unMedicament->getListeMedNonPresc();
                return view('vues/listerMedicaments', compact('mesMedicaments'));
            } catch (MonException $e) {
                $erreur = $e->getMessage();
                return view('Error', compact('erreur'));
            } catch (Exception $ex) {
                $erreur = $ex->getMessage();
                return view('Error', compact('erreur'));
            }
        }else {
            $erreur = "Vous devez être connecté pour réaliser cette opération.";
            return view('error', compact('erreur'));
        }
    }







}
