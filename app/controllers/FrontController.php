<?php

namespace App\controllers;

use App\models\PostManager;
use App\models\Post;

use App\models\CommentManager;
use App\models\Comment;

use App\models\UserManager;
use App\models\User;

require('../app/models/PostManager.php');
require('../app/models/CommentManager.php');

class FrontController {

    public static function about() {
        require('../app/views/front/aboutView.php');
    }

    public static function NotFound() {
        require('../app/views/front/404View.php');
    }

    public static function connexion() {
        require('../app/views/front/connexionView.php');
    }

    public static function listPosts() {

        $postManager = new PostManager();
        $posts = $postManager->getAllPosts();

        require('../app/views/front/blogView.php');

    }

    public static function post($id) {

        $onePost = new PostManager();
        $commentManager = new CommentManager();

        $post = $onePost->getOnePost(
            new Post(
                [
                    'post_id' => $id
                ]
            )
        );

        if ($post) {
            $comments = $commentManager->getCommentsByPostId(
                new Comment(
                    [
                        'comment_id_post' => $id
                    ]
                )
            );

            require('../app/views/front/postView.php');
        } else {
            FrontController::NotFound();
        }
    }

    public static function newComment() {

        $commentManager = new CommentManager();
        $addComment = $commentManager->addComment(
            new Comment(
                [
                    'comment_id_post' => $_GET['id'],
                    'comment_author' => $_POST['author'],
                    'comment' => $_POST['comment']
                ]
            )
        );

        if ($addComment === false) {
            FrontController::NotFound();
        } else {
            header('Location: index.php?p=post&id=' . $_GET['id']);
        }

    }

    public static function reportComment($id) {

        $commentManager = new CommentManager();
        $reportComment = $commentManager->reportComment(
            new Comment(
                [
                    'comment_id' => $id
                ]
            )
        );

        $idCommentReport = 'idCommentReport-'. $id;

        setcookie($idCommentReport, $id, time() + 365*24*3600, null, null, false, true);

        if ($reportComment === false) {
            FrontController::NotFound();
        } else {
            $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'index.php?p=blog';
            header('Location: ' . $referer);

        }
    }
}