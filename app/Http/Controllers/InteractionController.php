<?php


namespace App\Http\Controllers;
use App\DAO\ServiceDanger;
use App\DAO\ServiceInteraction;
use App\DAO\ServiceMedicament;
use Session;
use Request;

class InteractionController extends Controller
{
    // On recherche toutes les Interactions
    public function ListerInteractions() {
        if (Session::get('connect') == true) {
            try {
                $uneInteraction = new ServiceInteraction();
                $mesInteractions = $uneInteraction->getListeInteractions();

                $unMedicament = new ServiceMedicament();
                $mesMedicaments = $unMedicament->getListeMedicaments();

                return view('vues/listerInteractions', compact('mesInteractions', 'mesMedicaments'));
            } catch (MonException $e) {
                $erreur = $e->getMessage();
                return view('error', compact('erreur'));
            } catch (Exception $ex) {
                $erreur = $ex->getMessage();
                return view('error', compact('erreur'));
            }
        }else {
            $erreur = "Vous devez être connecté pour réaliser cette opération.";
            return view('error', compact('erreur'));
        }
    }

    public function ajoutInteraction() {
        if (Session::get('connect') == true) {
            try {
                $unMedicament = new ServiceMedicament();
                $mesMedicaments = $unMedicament->getListeMedicaments();
                $unDanger = new ServiceDanger();
                $mesDangers = $unDanger->getListeDangers();
                return view('vues/formAjoutInteraction',
                    compact('mesMedicaments', 'mesDangers'));
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

    public function postAjoutInteraction() {
        if (Session::get('connect') == true) {
            try {
                $idMed1 = Request::input('medicament1');
                $idMed2 = Request::input('medicament2');
                $danger = Request::input('danger');

                $uneInteraction = new ServiceInteraction();
                $linteraction = $uneInteraction->getInteractionByID($idMed1, $idMed2);
                if ($linteraction != null) {
                    $erreur = "L'interaction renseignée existe déjà !";
                    return view('error', compact('erreur'));
                }
                else{
                    $uneInteraction->ajoutInteraction($idMed1, $idMed2, $danger);
                    return redirect()->route('ListeInteractions');
                }
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

    public function modificationInteraction($idMed1,$idMed2) {
        if (Session::get('connect') == true) {
            try {
                $uneInteraction = new ServiceInteraction();
                $monInteraction = $uneInteraction->getInteractionByID($idMed1, $idMed2);

                $unDanger = new ServiceDanger();
                $mesDangers = $unDanger->getListeDangers();

                $unMedicament = new ServiceMedicament();
                $mesMedicaments = $unMedicament->getListeMedicaments();
                $medicament1 = $unMedicament->getMedicamentById($idMed1);
                $medicament2 = $unMedicament->getMedicamentById($idMed2);

                return view('vues/formModifInteraction', compact('monInteraction', 'mesDangers', 'mesMedicaments','medicament1','medicament2'));
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

    public function postModifierInteraction() {
        if (Session::get('connect') == true) {
            try {
                $idMed1 = Request::input('id_medicament1');
                $idMed2 = Request::input('id_medicament2');
                $danger = Request::input('danger');

            $uneInteraction = new ServiceInteraction();
            $uneInteraction->modifInteraction($idMed1, $idMed2, $danger);
                return redirect()->route('ListeInteractions');
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



    public function suppressionInteractions($idMed,$idMedInt) {
        if (Session::get('connect') == true) {
            try {
                $uneInteraction = new ServiceInteraction();
                $uneInteraction->supprimeInteraction($idMed, $idMedInt);
                return redirect()->route('ListeInteractions');
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
