<?php 

namespace App\Controller;

use model\User;

class AuthentificationManager
{
    protected $id;
    protected $email;
    protected $password;
    protected $name;
    protected $isadmin = 0;

    public function login($user) {
        $u = $user::first([['email', '=', $user->email]], [], false);
        $this->id = $_SESSION['user']['id'] = $u['id'];
        $this->email = $_SESSION['user']['email'] = $u['email'];
        $this->password = $u['password'];
        $this->name = $_SESSION['user']['name'] = $u['name'];
        $this->isadmin = $_SESSION['user']['isadmin'] = $u['isadmin'];
    }
    public function deconnexion() {
        $this->id = $_SESSION['user']['id'] = '';
        $this->email = $_SESSION['user']['email'] = '';
        $this->password = '';
        $this->name = $_SESSION['user']['name'] = '';
        $this->isadmin = $_SESSION['user']['isadmin'] = '';
    }

    public function verifyConnect(){
        if(!isset($_SESSION['user'])) {
            return false;
        }
        $condition = [
            $_SESSION['user']['id'],
            $_SESSION['user']['email'],
            $_SESSION['user']['name']
        ];

        foreach($condition as $cond) {
            if(!isset($cond) || $cond == '') {
                return false;
            }
        }
        return true;

    }
    public function verifyAdmin(){
        if(!isset($_SESSION['user'])) {
            if(!isset($this->isadmin)) {
                return false;
            }
            return $this->isadmin;
        }
        if(isset($_SESSION['user']['isadmin'])) {
            return $_SESSION['user']['isadmin'];
        }
        return false;

    }
}


?>