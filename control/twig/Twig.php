<?php

namespace twig;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class Twig
{

    public $twig;
    public $loader;

    function __construct() {
        $this->loader = new FilesystemLoader('control/templates');
        $this->twig = new Environment($this->loader, [
            'debug' => true,
        ]);
        $this->twig->addExtension(new \Twig\Extension\DebugExtension());

    }

}