<?php
require 'vendor/autoload.php';

$router = new \App\Router\Router($_GET['url']);
$getController = new \Controller\getController();
$getArticleFunc = array($getController,"getArticle");
$router->get('/', function(){echo 'index';});
$router->get('/posts', $getArticleFunc);
$router->get('/posts/:id', $getArticleFunc);




$router->post('/posts/:id', function($id){echo 'Poster pour l\'article '.$id. ' '. var_dump($_POST);});
$router->run();
?>