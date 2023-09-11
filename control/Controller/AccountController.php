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
            $cond = '';
            $articles = Article::find($cond, [], false);
            $nbArticles = count(Article::find([], ['id'], false));
            $nbUsers = count(User::find([], ['id'], false));
            $nbComments = count(Comment::find([], ['id'], false));
            echo $this->twig->render('admin.html.twig', ['articles' => $articles, 'isAdmin'=>$this->auth->verifyAdmin(), 'user'=>$_SESSION['user'], 'nbUsers' =>$nbUsers, 'nbArticles' =>$nbArticles, 'nbComments' =>$nbComments, 'activeCompte'=>'is-active']);
        } else {
            header('location: ./login');
        }
    }
    public function getAccountArticles() {
        if($this->auth->verifyConnect()) {
            $cond = $this->auth->verifyAdmin() ? [] : ['user_id', '=', $_SESSION['user']['id']];
            $articles = Article::find($cond, [], false);
            echo $this->twig->render('adminArticles.html.twig', ['articles' => $articles, 'isAdmin'=>$this->auth->verifyAdmin(), 'user'=>$_SESSION['user'], 'activeArticles'=>'is-active']);
        } else {
            header('location: ./login');
        }
    }
    public function getAccountCreateArticle($id = 0) {
        if($this->auth->verifyConnect() && $this->auth->verifyAdmin()) {
            if($id != 0) {
                $article =  Article::first([['id', '=', $id],['user_id', '=', $_SESSION['user']['id']]], [], false);
            } else {
                $article = new Article;
            }
            echo $this->twig->render('createArticle.html.twig', ['isAdmin'=>$this->auth->verifyAdmin(), 'article' => $article, 'activeCreation'=>'is-active']);

        } else {
            header('location: ./login');
        }
    }

    public function gestionImage($file) {
        $target_dir = "public/images/uploads/";
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($file["tmp_name"]);
        if($check !== false) {
            move_uploaded_file($file['tmp_name'], $target_file);
          $uploadOk = 1;
        } else {
          $uploadOk = 0;
        }
        if($uploadOk){
            return $target_file;
        }
        return false;
    }
    public function postAccountCreateArticle($id = 0) {
        if($this->auth->verifyConnect() && $this->auth->verifyAdmin() && isset($_POST['nom_form']) && $_POST['nom_form'] == 'creation_article') {
            if($id != 0) {
                $article =  Article::first([['id', '=', $id],['user_id', '=', $_SESSION['user']['id']]]);
            } else {
                $article = new Article;
            }
            $article->title = $_POST['title'];
            $article->description = $_POST['description'];
            $article->content = $_POST['content'];
            $article->user_id = $_SESSION['user']['id'];
            $article->datetime = date('Y-m-d H:i:s');
            $img = '';
            if(isset($_FILES['image']) && $_FILES['image']['tmp_name']) {
                $img = $this->gestionImage($_FILES['image']);
            } else if(isset($_POST['old_img']) && $_POST['old_img']) {
                $img = $_POST['old_img'];
            }
            $article->image = $img;
            $article->save();
            header('location: ./articles');
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
            echo $this->twig->render('adminComments.html.twig', ['isAdmin'=>$this->auth->verifyAdmin(),'comments' => $comments,'users' => $users2, 'activeComments'=>'is-active', 'all'=>$all]);
        } else{
            header('location: ./login');
        }
    }
    public function GetAllComments() {
        $comments = Comment::find([], [], false);
        $this->getAccountComments($comments);
    }
    public function deconnexion() {
        $this->auth->deconnexion();
        header('location: ../login');
    }
}


?>