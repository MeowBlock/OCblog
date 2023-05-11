<?php 

namespace App\Router;
class Router {

private $url; // Contiendra l'URL sur laquelle on souhaite se rendre
private $routes = []; // Contiendra la liste des routes

public function __construct($url){
    $this->url = $url;
}

public function get($path, $callable) {
    $route = new Route($path, $callable);
    $this->routes['GET'][] = $route;
}

public function post($path, $callable) {
    $route = new Route($path, $callable);
    $this->routes['POST'][] = $route;
}

public function run() {
    if(!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
        throw new RouterException('requested method doesn\'t exist');
    }
    foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
        if($route->match($this->url)) {
            return $route->call();
        }
    }
    throw new RouterException('Route doesn\'t exist');

}

}
?>