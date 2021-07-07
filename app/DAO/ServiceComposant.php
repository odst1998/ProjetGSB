<?php


namespace App\DAO;
use DB;
use App\metier\Composant;
use App\metier\Constituer;

class ServiceComposant
{
    public function getComposantsByMed($id_med) {
        try {
            $mesComposants = DB::table('composant')
                ->join('constituer', 'composant.id_composant', '=', 'constituer.id_composant')
                ->where('id_medicament', $id_med )
                ->get();

            return $mesComposants;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
}
