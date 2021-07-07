<?php


namespace App\DAO;
use DB;
use App\metier\Medicament;
use App\metier\Prescrire;
class ServiceMedicament
{
    //SELECT * FROM CLIENT
    public function getMedicamentById($idMed) {
        try {
            $monMedicaments = DB::table('medicament')
                ->join('famille', 'medicament.id_famille', '=', 'famille.id_famille')
                ->where('id_medicament', $idMed )
                ->first();
            return $monMedicaments;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function getListeMedicaments() {
        try {
            $mesMedicaments = DB::table('medicament')
                ->join('famille', 'medicament.id_famille', '=', 'famille.id_famille')
                ->orderBy('nom_commercial')
                ->get();
            return $mesMedicaments;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function getInteractionsMed($idMed) {
        try {
            $monInteraction = DB::table('interagir')
                ->join('medicament', 'interagir.id_medicament', '=', 'medicament.id_medicament')
                ->join('danger', 'interagir.dangerosite', '=', 'danger.code_danger')
                ->where('interagir.id_medicament', $idMed)
                ->orWhere('interagir.med_id_medicament', $idMed)
                ->get();
            return $monInteraction;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }

    public function getMedicLike($like){
        try {
            $resp = DB::table('medicament')
                ->select()
                ->join('famille', 'medicament.id_famille', '=', 'famille.id_famille')
                ->where('nom_commercial', 'like', $like.'%')
                ->orWhere('lib_famille', 'like', $like.'%')
                ->orderby('nom_commercial')
                ->get();
            return $resp;
        } catch (MonException $e) {
            throw new MonException ($e->getMessage());
        }
    }

    public function getListeMedNonPresc() {
        try {
            /* $mesMedicaments = DB::table('medicament')
                ->join('famille', 'medicament.id_famille', '=', 'famille.id_famille')
                ->whereNotIn('medicament.id_medicament ', DB::table('prescrire')->select('prescrire.id_medicament')->get())
                ->orderBy('nom_commercial')
                ->get(); */

            $mesMedicaments = DB::table("medicament")->select('*')
                ->join('famille', 'medicament.id_famille', '=', 'famille.id_famille')
                ->whereNOTIn('id_medicament',function($query){
                    $query->select('id_medicament')->from('prescrire');
                })
                ->get();
            return $mesMedicaments;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
}
