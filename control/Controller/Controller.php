<?php 

namespace App\Controller;

use twig;

abstract class Controller
{

    public $auth;
    public $twig;

    function __construct() {
        $this->auth = new AuthentificationManager;
        $this->twig = new twig\Twig();
        $this->twig = $this->twig->twig;

    }
}


?>