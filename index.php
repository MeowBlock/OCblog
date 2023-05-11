<?php
require 'vendor/autoload.php';


$router = new \App\Router\Router($_GET['url']);

$router->get('/posts', function(){echo 'Tous les articles';});
$router->get('/posts/:id', function($id){echo 'Afficher l\'article '.$id;
require('view/form_post.php');
});




$router->post('/posts/:id', function($id){echo 'Poster pour l\'article '.$id. ' '. var_dump($_POST);});
$router->run();
?>