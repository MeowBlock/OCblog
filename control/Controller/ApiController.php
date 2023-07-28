<?php 

namespace App\Controller;

use App\Controller\AuthentificationManager;
use Model\Article;
use Model\Comment;
use Model\User;

class ApiController extends Controller
{
    public function AcceptComment() {
        $content = json_decode(file_get_contents('php://input'), true);
        if(isset($content['id']) && is_numeric($content['id'])) {
            $comment = Comment::first(['id', '=', $content['id']]);
            if(!isset($comment)) {
                return false;
            }
            if($content['mode'] == 'accept') {
                $comment->statut = 1;
            } else if($content['mode'] == 'refuse') {
                $comment->statut = -1;
            }
            $comment->update();
            echo 'true';
        }
        return false;
    }   

}
?>