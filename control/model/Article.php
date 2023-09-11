<?php 

namespace Model;
class Article extends \Orm\Model
{
    protected static ?string $table = "article";
    protected static string $primaryKey = "id";

    public static function formatDatetime($datetime){
        $dt = new \DateTimeImmutable($datetime);
        return $dt->format('d/m/Y H:i');
    }
    public static function formatDate($datetime){
        $dt = new \DateTimeImmutable($datetime);

        return $dt->format('d/m/Y');
    }
}


?>