<?php

namespace MicroCMS\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class ExperienceController extends AdminController {

    public function experienceAction(Application $app) {
        $experiences = $app['dao.experience']->findAll();
        // var_dump($experiences);
        return $app['twig']->render('experience.html.twig', array('experiences' => $experiences));
    }

    public function experiencesingleAction($id, Application $app) {
       // Traitement pour récupérer une seule expérience avec la requete find($id) du DAO :)
    }

    public function addExperienceAction(Request $request, Application $app) {
        $experience = new Experience();
        $experienceForm = $app['form.factory']->create(ExperienceType::class, $experience);
        $experienceForm->handleRequest($request);
        if ($experienceForm->isSubmitted() && $experienceForm->isValid()) {
            $app['dao.experience']->save($experience);
            $app['session']->getFlashBag()->add('success', 'Vous avez créé une nouvelle experience.');
        }
        return $app['twig']->render('experience_form.html.twig', array(
            'title' => 'Nouvelle Experience',
            'experienceForm' => $experienceForm->createView()));
    }
}
