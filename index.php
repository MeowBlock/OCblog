<?php
require 'vendor/autoload.php';

$router = new \App\Router\Router($_GET['url']);
$getController = new \Controller\getController();
$router->get('/', function(){echo 'index';});
$router->get('/posts', function(){echo 'Tous les articles';});
$router->get('/posts/:id', $getController->getArticle);




$router->post('/posts/:id', function($id){echo 'Poster pour l\'article '.$id. ' '. var_dump($_POST);});
$router->run();
?>