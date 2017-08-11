<?php

// Home page
$app->get('/', "MicroCMS\Controller\HomeController::indexAction")
->bind('home');

// Experience
$app->get('/experience', "MicroCMS\Controller\ExperienceController::experienceAction")
->bind('experience');

$app->get('/experience/{id}', "MicroCMS\Controller\ExperienceController::experiencesingleAction")
->bind('experience_single');

// Loisirs
$app->get('/loisir', "MicroCMS\Controller\LoisirController::loisirAction")
->bind('loisir');

$app->get('/loisir/{id}', "MicroCMS\Controller\LoisirController::loisirsingleAction")
->bind('loisir_single');

// Perso
$app->get('/perso', "MicroCMS\Controller\PersoController::persoAction")
->bind('perso');

$app->get('/perso/{id}', "MicroCMS\Controller\PersoController::persosingleAction")
->bind('perso_single');

// Portfolio
$app->get('/portfolio', "MicroCMS\Controller\PortfolioController::portfolioAction")
->bind('portfolio');

$app->get('/portfolio/{id}', "MicroCMS\Controller\PortfolioController::portfoliosingleAction")
->bind('portfolio_single');


// Detailed info about an article
$app->match('/article/{id}', "MicroCMS\Controller\HomeController::articleAction")
->bind('article');

// Login form
$app->get('/login', "MicroCMS\Controller\HomeController::loginAction")
->bind('login');

// Admin zone
$app->get('/admin', "MicroCMS\Controller\AdminController::indexAction")
->bind('admin');

// Add a new article
$app->match('/admin/article/add', "MicroCMS\Controller\AdminController::addArticleAction")
->bind('admin_article_add');

// Edit an existing article
$app->match('/admin/article/{id}/edit', "MicroCMS\Controller\AdminController::editArticleAction")
->bind('admin_article_edit');

// Remove an article
$app->get('/admin/article/{id}/delete', "MicroCMS\Controller\AdminController::deleteArticleAction")
->bind('admin_article_delete');

// Edit an existing comment
$app->match('/admin/comment/{id}/edit', "MicroCMS\Controller\AdminController::editCommentAction")
->bind('admin_comment_edit');

// Remove a comment
$app->get('/admin/comment/{id}/delete', "MicroCMS\Controller\AdminController::deleteCommentAction")
->bind('admin_comment_delete');

// Add a user
$app->match('/admin/user/add', "MicroCMS\Controller\AdminController::addUserAction")
->bind('admin_user_add');

// Edit an existing user
$app->match('/admin/user/{id}/edit', "MicroCMS\Controller\AdminController::editUserAction")
->bind('admin_user_edit');

// Remove a user
$app->get('/admin/user/{id}/delete', "MicroCMS\Controller\AdminController::deleteUserAction")
->bind('admin_user_delete');

// API : get all articles
$app->get('/api/articles', "MicroCMS\Controller\ApiController::getArticlesAction")
->bind('api_articles');

// API : get all experiences
$app->get('/api/experience', "MicroCMS\Controller\ApiController::getExperiencesAction")
->bind('api_experiences');

// API : get an article
$app->get('/api/article/{id}', "MicroCMS\Controller\ApiController::getArticleAction")
->bind('api_article');

// API : get an experience
$app->get('/api/experience/{id}', "MicroCMS\Controller\ApiController::getExperienceAction")
->bind('api_experience');

// API : create an article
$app->post('/api/article', "MicroCMS\Controller\ApiController::addArticleAction")
->bind('api_article_add');

// API : create an article
$app->post('/api/experience', "MicroCMS\Controller\ApiController::addExperienceAction")
->bind('api_experience_add');

// API : remove an article
$app->delete('/api/article/{id}', "MicroCMS\Controller\ApiController::deleteArticleAction")
->bind('api_article_delete');

// API : remove an experience
$app->delete('/api/experience/{id}', "MicroCMS\Controller\ApiController::deleteExperienceAction")
->bind('api_experience_delete');

// CUSTOM STUFF

// Add a new experience
$app->match('/admin/experience/add', "MicroCMS\Controller\AdminController::addExperienceAction")
->bind('admin_experience_add');

// Edit an existing experience
$app->match('/admin/experience/{id}/edit', "MicroCMS\Controller\AdminController::editExperienceAction")
->bind('admin_experience_edit');

// Remove an experience
$app->get('/admin/experience/{id}/delete', "MicroCMS\Controller\AdminController::deleteExperienceAction")
->bind('admin_experience_delete');
