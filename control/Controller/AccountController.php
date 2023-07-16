<?php 

namespace App\Controller;

use App\Controller\AuthentificationManager;

class AccountController extends Controller
{
    public function getAccount() {
        $auth = new AuthentificationManager;
        $auth->verifyConnect();
        echo $this->twig->render('admin.html.twig');

    }
}


?>