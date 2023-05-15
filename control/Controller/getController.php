<?php 

namespace Controller;
class getController
{
    public function getArticle($id = 0) {
        return $id;
        if($id == 0 || !$id) {
            require('/view/liste_article.php');
        }
        require('/view/article.php');
    }
}


?>