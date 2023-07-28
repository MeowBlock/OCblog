<?php 

namespace Model;
class Comment extends \Orm\Model
{
    protected static ?string $table = "comments";
    protected static string $primaryKey = "id";
}


?>