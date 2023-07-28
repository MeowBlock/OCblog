<?php

namespace Orm;

use Exception;

abstract class Model
{
    protected static ?string $table = null;
    protected array $attr = [];

    protected static string $primaryKey = "id";
    protected static bool $timestamps = false;

    public function __construct(array $attr = [])
    {
        $this->attr = $attr;
    }

    /**
     * Permet de savoir si le model utilise les timestamp
     *
     * @return bool
     */
    public static function isTimestamps(): bool
    {
        return static::$timestamps;
    }
    /**
     * Methode magique pour récupérer un attribut/une méthode
     *
     * @param $name
     * @return mixed
     *
     * @throws Exception
     */
    public function __get($name)
    {
        // Si c'est une méthode on la retourne
        if (method_exists(static::class, $name)) {
            return $this->$name();
        }
        // Si ce n'est pas un attribut on soulève une erreur
        if (!array_key_exists($name, $this->attr)) {
            throw new Exception("L'attribut $name n'existe pas");
        }

        return $this->attr[$name];
    }

    /**
     * Permet de set un attribut pour le model
     *
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->attr[$name] = $value;
    }
    public static function find($criteria = null, array $colomns = [], $hydrate = true, $limit = null, $offset = null, $sort = [])
    {
        $query = Query::table(static::$table);

        // Si on veut que certains colonnes on construit la query
        if ($colomns != null) {
            $query = $query->select($colomns);
        }

        // Si y'a des critères on construit la query
        if($criteria){
            $query = self::constructQueryWithCriteria($query, $criteria);
        }

        $query->setLimit($limit);
        $query->setOffset($offset);
        $query->setSort($sort);

        $query = $query->get();

        // Si on a besoin d'hydrate on transforme le tableau en objet sinon on renvoi l'objet
        if($hydrate){
            return self::arrayToObject($query);
        }

        return $query;
    }
    public static function where($criteria)
    {
        // Si la table n'est pas renseigné on soulève une erreur
        if (static::$table == null) {
            throw new Exception("Le nom de la table doit être renseigné");
        }

        $query = Query::table(static::$table);

        return self::constructQueryWithCriteria($query, $criteria);
    }

    /**
     * Permet de construire une requête avec des critères
     *
     * @param Query $query
     * @param $criteria
     *
     * @return Query
     */
    private static function constructQueryWithCriteria(Query $query, $criteria): Query
    {
        // Si le critère est un int c'est que c'est l'id
        if (is_int($criteria)) {
            return $query->where(static::$primaryKey, "=", $criteria);
        }

        // Si c'est un tableau
        if (is_array($criteria)) {
            // Si y'a qu'un seul critère on construit la requête avec le critère
            if (!is_array($criteria[0])) {
                return $query->where($criteria[0], $criteria[1], $criteria[2]);
            }

            // Si y'en a plusieurs on ajoute les critères au fur à mesure
            foreach ($criteria as $crit) {
                $query = $query->where($crit[0], $crit[1], $crit[2]);
            }
        }

        return $query;
    }

    /**
     * Permet de récupérer seulement le premier résultat d'une query
     *
     * @param null $criteria
     * @param array $colomns
     *
     * @return mixed|void
     */
    public static function first($criteria = null, array $colomns = [], $hydrate = true)
    {
        // On execute le find
        $query = self::find($criteria, $colomns, $hydrate);
 
        // Si y'a un résultat on renvoi le premier
        if ($query != null) {
            return $query[0];
        }
    }

    /**
     * Permet de transformer un tableau en objet
     *
     * @param $array
     *
     * @return array
     */
    private static function arrayToObject($array)
    {
        $result = [];

        // On parcours le tableau pour créer les objets
        foreach ($array as $row) {
            $objet = new static($row);
            $result[] = $objet;
        }

        return $result;
    }

    public function insert()
    {
        // Si la table n'est pas renseignée on soulève une erreur
        if (static::$table == null) {
            throw new Exception("Le nom de la table doit être renseigné");
        }

        $query = Query::table(static::$table);

        $this->attr[static::$primaryKey] = $query->insert($this->attr);
    }

    public function update($timestampUpdate = false)
    {
        if (static::$table == null) {
            throw new Exception("Le nom de la table doit être renseigné");
        }

        if ($this->attr[static::$primaryKey] == null) {
            throw new Exception("La clé primaire ne doit pas être vide pour modifié une ligne");
        }

        $query = Query::table(static::$table);
        $query->where(static::$primaryKey, "=", $this->attr[static::$primaryKey]);

        $query->update($this->attr, $timestampUpdate);
    }

}