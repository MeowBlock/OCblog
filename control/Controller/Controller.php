<?php 

namespace App\Controller;

use twig;

abstract class Controller
{
    public $twig;

    function __construct() {
        $this->twig = new twig\Twig();
        $this->twig = $this->twig->twig;

    }
}


?>