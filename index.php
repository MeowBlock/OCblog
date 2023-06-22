<?php
use App\Controller\ArticleController;
use App\Controller\BlogController;




require 'vendor/autoload.php';

$router = new \App\Router\Router($_GET['url']);
$ArticleController = new ArticleController();

$getArticleFunc = array($ArticleController,"getArticle");


$router->get('/', [new BlogController, 'getBlog']);
$router->get('/posts', $getArticleFunc);
$router->get('/posts/:id', $getArticleFunc);



$router->post('/posts/:id', function($id){echo 'Poster pour l\'article '.$id. ' '. var_dump($_POST);});
$router->run();
?>