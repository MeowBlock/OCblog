<?php 

namespace App\Controller;
use App\Controller\AuthentificationManager;

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
        $blabla = $user->first(['email', '=', $_POST['email']], [], false);
        if($blabla == [] || !password_verify($_POST['password'], $blabla['password'])) {
            $this->getLogin(['Email ou mot de passe incorrect']);
        } else {
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->email = $_POST['email'];
            $auth = new AuthentificationManager;
            $auth->login($user);
            header('location: ./mon-compte');
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
        $blabla = $user->find([['email', '=', $_POST['email']]], [], false);
        if($blabla != []) {
            $error[] = 'l\'identifiant est déjà utilisé';  
        }
        if($error == []) {
            //register user
            $user->password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $user->email = $_POST['email'];
            $user->name = $_POST['nom'];
            $user->insert();
            $auth = new AuthentificationManager;
            $auth->login($user);
            header('location: ./mon-compte');
        } else {
            $this->getLogin($error);
        }

    }
}


?>