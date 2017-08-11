<?php

namespace MicroCMS\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class LoisirController {

    public function loisirAction(Application $app) {
        $loisirs = $app['dao.loisir']->findAll();
        // var_dump($experiences);
        return $app['twig']->render('loisir.html.twig', array('loisirs' => $loisirs));
    }

    public function loisirsingleAction($id, Application $app) {
       // Traitement pour récupérer une seule expérience avec la requete find($id) du DAO :)
    }
}
