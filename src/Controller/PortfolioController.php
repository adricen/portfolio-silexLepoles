<?php

namespace MicroCMS\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;

class PortfolioController {

    public function portfolioAction(Application $app) {
        $portfolios = $app['dao.portfolio']->findAll();
        // var_dump($experiences);
        return $app['twig']->render('portfolio.html.twig', array('portfolios' => $portfolios));
    }

    public function portfoliosingleAction($id, Application $app) {
       // Traitement pour récupérer une seule expérience avec la requete find($id) du DAO :)
    }
}
