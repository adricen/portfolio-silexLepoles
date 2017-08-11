<?php

namespace MicroCMS\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class PersoController {

    public function persoAction(Application $app) {
        $persos = $app['dao.perso']->findAll();
        // var_dump($experiences);
        return $app['twig']->render('perso.html.twig', array('persos' => $persos));
    }

    public function persosingleAction($id, Application $app) {
       // Traitement pour récupérer une seule expérience avec la requete find($id) du DAO :)
    }
}
