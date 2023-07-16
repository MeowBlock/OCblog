<?php 

namespace App\Controller;

use model\User;

class AuthentificationManager
{
    protected $id;
    protected $email;
    protected $password;
    protected $name;

    public function login($user) {
        $u = $user::first([['email', '=', $user->email]], [], false);
        $this->id = $_SESSION['user']['id'] = $u['id'];
        $this->email = $_SESSION['user']['email'] = $u['email'];
        $this->password = $u['password'];
        $this->name = $_SESSION['user']['name'] = $u['name'];
    }

    public function verifyConnect(){
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
}


?>