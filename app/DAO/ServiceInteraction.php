<?php


namespace App\DAO;
use DB;
use App\metier\Interaction;

class ServiceInteraction
{
    public function getInteractionByID($idMed, $idMedInt) {
        try {
            $monInteraction = DB::table('interagir')
                ->join('medicament', 'interagir.id_medicament', '=', 'medicament.id_medicament')
                ->join('danger', 'interagir.dangerosite', '=', 'danger.code_danger')
                ->where('interagir.id_medicament', $idMed)
                ->where('interagir.med_id_medicament', $idMedInt)
                ->first();
            return $monInteraction;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    //SELECT * FROM interagir
    public function getListeInteractions() {
        try {
            $mesInteractions = DB::table('interagir')
                ->join('medicament', 'interagir.id_medicament', '=', 'medicament.id_medicament')
                ->join('danger', 'interagir.dangerosite', '=', 'danger.code_danger')
                ->orderby('nom_commercial')
                ->get();

            return $mesInteractions;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function ajoutInteraction($idMed1, $idMed2,$danger) {
        try {
            DB::table('interagir')->insert(
                [ 'id_medicament' => $idMed1,
                    'med_id_medicament' => $idMed2,
                    'dangerosite' => $danger]
            );
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function modifInteraction($idMed, $idMedInt,$danger) {
        try {
            DB::table('interagir')
                ->where('id_medicament', $idMed)
                ->where('med_id_medicament', $idMedInt)
                ->update([
                    'id_medicament' => $idMed,
                    'med_id_medicament' => $idMedInt,
                    'dangerosite' => $danger
                ]);
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }

    public function supprimeInteraction($idMed,$idMedInt)
    {
        try {
            DB::table('interagir')
                ->where('id_medicament', $idMed)
                ->where('med_id_medicament', $idMedInt)
                ->delete();
        } catch (QueryException $e) {
            throw new MonException($e->getMessage(), 5);
        }
    }
}
