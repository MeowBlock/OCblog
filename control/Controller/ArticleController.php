<?php 

namespace App\Controller;
class ArticleController
{
    public function getArticle($id = 0) {
    $article = \Model\Article::first(['id', '=', $id]);
        if($id == 0 || !$id) {
            require('./view/liste_article.php');
        }
        require('./view/article.php');
    }
}


?>