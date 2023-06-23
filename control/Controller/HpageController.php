<?php 

namespace App\Controller;

class HpageController extends Controller
{
    public function getHpage() {
        echo $this->twig->render('showcase.html.twig');
    }
}


?>