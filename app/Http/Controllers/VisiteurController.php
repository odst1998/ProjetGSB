<?php


namespace App\Http\Controllers;
use Request;
use App\DAO\ServiceVisiteur;

class VisiteurController extends controller
{
    public function signIn() {
            try {
                $login = Request::input('login');
                $pwd = Request::input('pwd');
                $unVisiteur = new ServiceVisiteur();
                $connected = $unVisiteur->login($login, $pwd);
                if ($connected) {
                    return view('home');
                } else {
                    $erreur = "Login ou mot de passe inconnu !";
                    return view('error', compact('erreur'));
                }
            } catch (MonException $e) {
                $erreur = $e->getMessage();
                return view('error', compact('erreur'));
            }

    }

    /**
     * Déconnecte le visiteur authentifié
     * @return type Vue home
     */
    public function signOut() {
        try {

            $unVisiteur = new ServiceVisiteur();
            $unVisiteur->logout();
            return view('home');
        } catch (Exception $e) {
            $erreur = $e->getMessage();
            return view('Error', compact('erreur'));
        }
    }

    /**
     * Initialise le formulaire d'authentification
     * @return type Vue formLogin
     */
    public function getLogin() {
        try {
            $erreur = "";
            return view('formLogin', compact('erreur'));
        } catch (Exception $ex) {
            $erreur = $ex->getMessage();
            return view('Error', compact('erreur'));
        }
    }
}
