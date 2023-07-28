<?php 

namespace Model;
class Article extends \Orm\Model
{
    protected static ?string $table = "article";
    protected static string $primaryKey = "id";
    public $title;
}


?>