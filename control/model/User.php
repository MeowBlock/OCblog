<?php 

namespace Model;
class User extends \Orm\Model
{
    protected static ?string $table = "user";
    protected static string $primaryKey = "id";
    public $login;
    public $password;
    public $name;
}


?>