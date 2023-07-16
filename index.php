<?php

use App\Controller\AccountController;
use App\Controller\ArticleController;
use App\Controller\BlogController;
use App\Controller\HpageController;
use App\Controller\LoginController;

require 'vendor/autoload.php';

if(!isset($_SESSION)) {
    session_start();
}

date_default_timezone_set('Europe/Paris');
$url = isset($_GET['url']) ? $_GET['url'] : '/';
$router = new \App\Router\Router($url);
$ArticleController = new ArticleController();

$getArticleFunc = array($ArticleController,"getArticle");


$router->get('/',[new HpageController, 'getHpage'] );
$router->get('/posts', [new BlogController, 'getBlog']);
$router->get('/posts/:id', $getArticleFunc);
$router->get('/login', [new LoginController, 'getLogin']);
$router->post('/login', [new LoginController, 'postLoginPage']);
$router->get('/mon-compte',[new AccountController, 'getAccount'] );


$router->post('/posts/:id', function($id){echo 'Poster pour l\'article '.$id. ' '. var_dump($_POST);});
$router->run();
?>