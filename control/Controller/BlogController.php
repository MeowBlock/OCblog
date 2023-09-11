<?php 

namespace App\Controller;

use \Model\Article;
class BlogController extends Controller
{
    public function getBlog() {
    $articles = Article::find(null, [], false);
    
    foreach ($articles as &$article) {
        $article['date'] = Article::formatDate($article['datetime']);
        $article['datetime'] = Article::formatDatetime($article['datetime']);
    }
    echo $this->twig->render('liste_article.html.twig', ['articles' => $articles]);
    }
}


?>