<?php


namespace App\DAO;
use DB;
use App\metier\Visiteur;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\QueryException;
use  App\Exceptions\MonException;
class ServiceVisiteur
{
    public function login($login, $pwd) {
        $connected = false;
        try {
            $Utilisateur = DB::table('visiteur')
                ->select()
                ->where('login_visiteur', '=', $login)
                ->first();
            if ($Utilisateur) {
                if ($Utilisateur->pwd_visiteur == $pwd) {
                    Session::put('connect', true);
                    Session::put('login', $login);
                    $connected = true;
                }
            }
        }
        catch (QueryException $e)
        {
            throw new MonException ($e->getMessage());
        }
        return $connected;
    }

    /**
     * Délogue le visiteur en mettant son Id à 0
     * dans la session => le menu n'est plus accessible
     */
    public function logOut()
    {
        $deco = false;
        try {
            Session::put('connect', false);
            $deco = true;
            return $deco;
        } catch (MonException $e) {
            throw new MonException ($e->getMessage());
        }
    }
}
