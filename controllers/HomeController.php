<?php

require '../core/Controller.php';

class HomeController extends Controller
{
    /**
     * Fonction d'action par défaut du controller "home"
     */

    public function index()
    {
        $this->render('home/index.html.php', [
            'title' => 'bienvenue sur la page d\'Accueil'
        ]);
    }
}
