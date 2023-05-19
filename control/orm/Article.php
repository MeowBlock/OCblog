<?php 

namespace Orm;
abstract class Article
{
    public $id;
    public $positions;
    public $title;
    

    function __construct($id) {
        $this->id = $id;

        //avant la BDD
        $this->positions = 4;
        $this->title = 'Mon premier article';
    }
}


?>