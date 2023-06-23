<?php 

namespace App\Controller;

class BlogController extends Controller
{
    public function getBlog() {
    $articles = \Model\Article::find(null, [], false);
    echo $this->twig->render('liste_articles.html.twig', ['articles' => $articles]);
    }
}


?>