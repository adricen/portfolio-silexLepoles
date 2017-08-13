<?php

namespace MicroCMS\Controller;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use MicroCMS\Domain\Article;
use MicroCMS\Domain\Experience;

class ApiController {

    /**
     * API articles controller.
     *
     * @param Application $app Silex application
     *
     * @return All articles in JSON format
     */
    public function getArticlesAction(Application $app) {
        $articles = $app['dao.article']->findAll();
        // Convert an array of objects ($articles) into an array of associative arrays ($responseData)
        $responseData = array();
        foreach ($articles as $article) {
            $responseData[] = $this->buildArticleArray($article);
        }
        // Create and return a JSON response
        return $app->json($responseData);
    }

    /**
     * API article details controller.
     *
     * @param integer $id Article id
     * @param Application $app Silex application
     *
     * @return Article details in JSON format
     */
    public function getArticleAction($id, Application $app) {
        $article = $app['dao.article']->find($id);
        $responseData = $this->buildArticleArray($article);
        // Create and return a JSON response
        return $app->json($responseData);
    }

    /**
     * API create article controller.
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     *
     * @return Article details in JSON format
     */
    public function addArticleAction(Request $request, Application $app) {
        // Check request parameters
        if (!$request->request->has('title')) {
            return $app->json('Missing required parameter: title', 400);
        }
        if (!$request->request->has('content')) {
            return $app->json('Missing required parameter: content', 400);
        }
        // Build and save the new article
        $article = new Article();
        $article->setTitle($request->request->get('title'));
        $article->setContent($request->request->get('content'));
        $app['dao.article']->save($article);
        $responseData = $this->buildArticleArray($article);
        return $app->json($responseData, 201);  // 201 = Created
    }

    /**
     * API delete article controller.
     *
     * @param integer $id Article id
     * @param Application $app Silex application
     */
    public function deleteArticleAction($id, Application $app) {
        // Delete all associated comments
        $app['dao.comment']->deleteAllByArticle($id);
        // Delete the article
        $app['dao.article']->delete($id);
        return $app->json('No Content', 204);  // 204 = No content
    }

    /**
     * Converts an Article object into an associative array for JSON encoding
     *
     * @param Article $article Article object
     *
     * @return array Associative array whose fields are the article properties.
     */
    private function buildArticleArray(Article $article) {
        $data  = array(
            'id' => $article->getId(),
            'title' => $article->getTitle(),
            'content' => $article->getContent()
            );
        return $data;
    }
    /**
     * API experiences controller.
     *
     * @param Application $app Silex application
     *
     * @return All experiences in JSON format
     */
    public function getExperiencesAction(Application $app) {
        $experiences = $app['dao.experience']->findAll();
        // Convert an array of objects ($articles) into an array of associative arrays ($responseData)
        $responseData = array();
        foreach ($experiences as $experience) {
            $responseData[] = $this->build*ExperienceArray($experience);
        }
        // Create and return a JSON response
        return $app->json($responseData);
    }

    /**
     * API experience details controller.
     *
     * @param integer $id Experience id
     * @param Application $app Silex application
     *
     * @return Experience details in JSON format
     */
    public function getExperienceAction($id, Application $app) {
        $experience = $app['dao.experience']->find($id);
        $responseData = $this->buildExperienceArray($experience);
        // Create and return a JSON response
        return $app->json($responseData);
    }

    /**
     * API create experience controller.
     *
     * @param Request $request Incoming request
     * @param Application $app Silex application
     *
     * @return Experience details in JSON format
     */
    public function addExperienceAction( Request $request, Application $app ) {
        // Check request parameters
        if (!$request->request->has('title')) {
            return $app->json('Missing required parameter: title', 400);
        }
        if (!$request->request->has('content')) {
            return $app->json('Missing required parameter: content', 400);
        }
        // Build and save the new experience
        $experience = new Experience();
        $experience->setTitle($request->request->get('title'));
        $experience->setContent($request->request->get('content'));
        $app['dao.experience']->save($experience);
        $responseData = $this->buildExperienceArray($experience);
        return $app->json($responseData, 201);  // 201 = Created
    }

    /**
     * API delete experience controller.
     *
     * @param integer $id Experience id
     * @param Application $app Silex application
     */
    public function deleteExperienceAction($id, Application $app) {
        // Delete all associated comments
        $app['dao.comment']->deleteAllByExperience($id);
        // Delete the experience
        $app['dao.experience']->delete($id);
        return $app->json('No Content', 204);  // 204 = No content
    }

    /**
     * Converts an Experience object into an associative array for JSON encoding
     *
     * @param Experience $experience Experience object
     *
     * @return array Associative array whose fields are the experience properties.
     */
    private function buildExperienceArray(Experience $experience) {
        $data  = array(
            'id' => $experience->getId(),
            'contrat' => $experience->getContrat(),
            'debut' => $experience->getDebut(),
            'fin' => $experience->getFin(),
            'poste' => $experience->getPoste(),
            'img' => $experience->getImg()
            );
        return $data;
    }
}
