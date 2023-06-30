<?php 

namespace App\Controller;

class LoginController extends Controller
{
    public function getLogin($errors = []) {
        echo $this->twig->render('login.html.twig', ['errors' => $errors]);
    }

    public function postLoginPage() {
        if($_POST['login'] == 'login') {
            $this->postLogin();
        } else if ($_POST['login'] == 'register') {
            $this->postRegister();
        } else {
            $this->getLogin(['La page demandée n\'existe pas']);

        }
    }
    public function postLogin() {
        $user = new \Model\User;
        $blabla = $user->find([['login', '=', $_POST['email']],['password', '=', $_POST['password']]], [], false);
        if($blabla == []) {
            $this->getLogin(['Email ou mot de passe incorrect']);
        } else {
            var_dump('login');
            var_dump($blabla);
        }
    }
    public function postRegister() {
        $error = [];
        $user = new \Model\User;
        if($_POST['password'] != $_POST['password-confirm']) {
            $error[] = 'Les mots de passes ne correspondent pas';
        }
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $error[] = 'l\'adresse mail est invalide';
        }
        //VERIFIER EMAIL EXISTE
        $blabla = $user->find([['login', '=', $_POST['email']]], [], false);

        if($error == []) {
            //register user
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        } else {
            $this->getLogin($error);
        }

    }
}


?>