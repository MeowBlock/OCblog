<?php
namespace Orm;

use Exception;
use PDO;
use PDOException;

class Db
{
    private static $pdo;
    private static $user = 'root';
    private static $pass = '';
    private static $host = 'localhost';
    private static $dbname = 'OCblog';

    /**
     * Permet d'effectuer la connexion à la base de données
     *
     * @param array $conf
     *
     * @return int|PDO
     */
    public static function makeConnection(array $conf = []): PDO
    {
        $options = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false,
            PDO::ATTR_STRINGIFY_FETCHES => false];

        try {
            self::$pdo = new PDO('mysql:host='.self::$host.';dbname='.self::$dbname.'', self::$user, self::$pass, $options);
        } catch (PDOException $e) {
            echo "Erreur !: " . $e->getMessage() . "<br/>";
        }
        return self::$pdo;
    }

    /**
     * Permet de récupérer la connexion
     *
     * @throws Exception
     */
    public static function getConnection(){
        if(self::$pdo == null && self::makeConnection() == null){
            throw new Exception("Il faut configurer la connexion");
        }

        return self::$pdo;
    }

}