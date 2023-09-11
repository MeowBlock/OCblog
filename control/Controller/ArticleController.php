<?php 

namespace App\Controller;

use Model\Comment;
use Model\User;
use Model\Article;
class ArticleController extends Controller
{
    public function getArticle($id = 0) {
        $article = Article::first(['id', '=', $id], [], false);
            if($id == 0 || !$id) {
                header('location: ../posts/');
            }
            $comments = Comment::find([['articleId', '=', $id], ['statut', '=', '1']], [], false);
            $users = [];
            foreach ($comments as &$comment) {
                $user = User::first(['id', '=', $comment['userID']], ['name'], false);
                $comment['uname'] = $user['name'];
            }            
            $article['date'] = Article::formatDate($article['datetime']);
            $article['datetime'] = Article::formatDatetime($article['datetime']);
            
    
            echo $this->twig->render('article.html.twig', ['comments' => $comments, 'users' => $users, 'article' => $article, 'islogin' => (bool)$this->auth->verifyConnect()]);
        }
        public function postComment() {
            if(isset($_POST['article']) && isset($_POST['text']) && isset($_SESSION['user']['id']) && isset($_POST['comment'])) {
                $cmt = [];
                $cmt = Comment::find([['userID', '=', $_SESSION['user']['id']]], [], false, 1, null, [['datetime', 'DESC']]); 
                $cmt = $cmt[0];
                $publishok = false;
                if(isset($cmt)) {
                    $d1 = new \DateTimeImmutable($cmt['datetime']);
                    $d2 = new \DateTimeImmutable('now');
                    $interval = $d1->diff($d2, true);
                    if($interval->i > 10) {
                        $publishok = true;
                    }

                } else {
                    $publishok = true;
                }
            if($_POST['comment'] == 0 && $publishok) {
                $comment = new Comment;
                $comment->articleID = trim((int)$_POST['article']);
                $comment->userID = $_SESSION['user']['id'];
                $comment->text = $_POST['text'];
                $comment->statut = $this->auth->verifyAdmin() ? 0 : 0;
                $comment->datetime = date("Y-m-d H:i:s");
                $comment->save();
            } else if(!$publishok) {
                //error
            } else {
                //edit comment
            }

            }
            header('location: ./posts/'.$_POST['article']);
            }
        
}


?>