<?php 

namespace Model;
class User extends \Orm\Model
{
    protected static ?string $table = "user";
    protected static string $primaryKey = "id";


    public function login() {

        $user = $this::first([['email', '=', $this->email]], [], false);

        $this->id = $user['id'];
        $this->name = $user['name'];
        $_SESSION['user']['id'] = $user['id'];
        $_SESSION['user']['email'] = $user['login'];
        $_SESSION['user']['password'] = $user['password'];
        $_SESSION['user']['name'] = $user['name'];
    }
}



?>