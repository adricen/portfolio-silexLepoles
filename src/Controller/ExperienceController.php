<?php

namespace MicroCMS\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class ExperienceController {

    public function experienceAction(Application $app) {
        $experiences = $app['dao.experience']->findAll();
        // var_dump($experiences);
        return $app['twig']->render('experience.html.twig', array('experiences' => $experiences));
    }

    public function experiencesingleAction($id, Application $app) {
       // Traitement pour récupérer une seule expérience avec la requete find($id) du DAO :)
    }
}
