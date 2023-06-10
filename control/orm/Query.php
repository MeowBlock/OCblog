<?php 

namespace Orm;
use PDO;
class Query{
    private $table;
    private $fields = '*';
    private $where = null;
    private $args = [];
    private $sql = null;

    private $limit = null;
    private $offset = null;

    private $sort = [];


/**
 * Permet de définir la table visée par la query
 *
 * @param $table
 *
 * @return Query
 */
public static function table($table){
    $query = new Query;

    $query->table = $table;

    return $query;
}

/**
 * Permet de stocker les champs à récupérer pour la query
 *
 * @param array $fields
 *
 * @return $this
 */
public function select(array $fields){
    $this->fields = implode(",", $fields);

    return $this;
}

/**
 * Permet de construire la partie where de la requête
 *
 * @param $field
 * @param $operator
 * @param $val
 *
 * @return $this
 */
public function where($field,$operator,$val){
    // Si c'est la première fois qu'on utilise le where pour la query on ajoute where
    $this->where .= !$this->where ? " where " : " AND ";

    // On concat + on stock les args
    $this->where .= $field." ".$operator." ?";
    $this->args[] = $val;

    return $this;
}

/**
 * Permet d'éxecuter un select
 *
 * @return mixed
 *
 * @throws \Exception
 */
public function get(){
    // On construit le select avec le where (si y'en a un)
    $this->sql = "SELECT ".$this->fields." FROM ".$this->table.$this->where;

    // Si on veut sort la query on ajoute l'order by
    if(!empty($this->sort)){
        $this->sql .= ' ORDER BY ';

        foreach ($this->sort as $s){
            $this->sql .= ' '. $s[0] . ' ' . $s[1] . ',';
        }

        $this->sql = substr($this->sql, 0, -1);
    }

    // On ajoute la limite s'il y en a une
    if($this->limit){
        $this->sql .= ' LIMIT '.$this->limit;
    }

    // On ajoute l'offset s'il y en a un
    if($this->offset){
        $this->sql .= ' OFFSET '.$this->offset;
    }

    // On récup la connexion & prépare la requête
    $pdo = Db::getConnection();
    $stmt = $pdo->prepare($this->sql);

    // Si y'a un where, on ajoute les arguments
    if($this->where != null){
        $stmt->execute($this->args);
    }
    else{
        $stmt->execute();
    }

    // On retourne les résultats
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
}
?>