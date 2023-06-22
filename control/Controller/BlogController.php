<?php 

namespace App\Controller;

use twig;

class BlogController
{
    public static function getBlog() {
        $twig = new twig\Twig();
    $articles = \Model\Article::find(null, [], false);
    echo $twig->twig->render('liste_articles.html.twig', ['articles' => $articles]);
    }
}


?>