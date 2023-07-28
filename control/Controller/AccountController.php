<?php 

namespace App\Controller;

use App\Controller\AuthentificationManager;
use Model\Article;
use Model\Comment;
use Model\User;

class AccountController extends Controller
{
    public function getAccountHpage() {
        if($this->auth->verifyConnect()) {
            $cond = $this->auth->verifyAdmin() ? [] : ['user_id', '=', $_SESSION['user']['id']];
            $articles = Article::find($cond, [], false);
            $nbArticles = count(Article::find([], ['id'], false));
            $nbUsers = count(User::find([], ['id'], false));
            $nbComments = count(Comment::find([], ['id'], false));
            echo $this->twig->render('admin.html.twig', ['articles' => $articles, 'user'=>$_SESSION['user'], 'nbUsers' =>$nbUsers, 'nbArticles' =>$nbArticles, 'nbComments' =>$nbComments, 'activeCompte'=>'is-active']);
        } else {
            header('location: ./login');
        }
    }
    public function getAccountArticles() {
        if($this->auth->verifyConnect()) {
            $cond = $this->auth->verifyAdmin() ? [] : ['user_id', '=', $_SESSION['user']['id']];
            $articles = Article::find($cond, [], false);
            echo $this->twig->render('adminArticles.html.twig', ['articles' => $articles, 'user'=>$_SESSION['user'], 'activeArticles'=>'is-active']);
        } else {
            header('location: ./login');
        }
    }
    public function getAccountComments($comments = '') {
        $all = true;
        if($this->auth->verifyConnect() && $this->auth->verifyAdmin()) {
            if(!$comments) {
                $comments = Comment::find(['statut', '=', 0], [], false);
                $all = false;
            }
            $users = User::find([], ['id', 'name'], false);
            foreach ($users as $user) {
                $users2[$user['id']] = $user['name'];
            }
            echo $this->twig->render('adminComments.html.twig', ['comments' => $comments,'users' => $users2, 'activeComments'=>'is-active', 'all'=>$all]);
        } else {
            header('location: ./login');
        }
    }
    public function GetAllComments() {
        $comments = Comment::find([], [], false);
        $this->getAccountComments($comments);
    }
}


?>