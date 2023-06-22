<?php 

namespace Model;
class Article extends \Orm\Model
{
    protected static ?string $table = "articles";
    protected static string $primaryKey = "id";
    public $title;
}


?>