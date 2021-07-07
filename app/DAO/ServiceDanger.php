<?php


namespace App\DAO;
use DB;
use App\metier\Danger;

class ServiceDanger
{
    public function getListeDangers() {
        try {
            $mesDangers = DB::table('danger')
                ->orderby('libelle_danger')
                ->get();

            return $mesDangers;
        } catch (QueryException $e) {
            throw new MonException($e->getMessage());
        }
    }
}
