<?php 

namespace Model;
class Comment extends \Orm\Model
{
    protected static ?string $table = "commentaires";
    protected static string $primaryKey = "id";
}


?>