<?php

namespace App\controllers;

use App\models\PostManager;
use App\models\CommentManager;

require('../app/models/postManager.php');
require('../app/models/commentManager.php');

class FrontController {

    public static function home() {
        require('../app/views/front/indexView.php');
    }

    public static function connexion() {
        require('../app/views/front/connexionView.php');
    }

    public static function listPosts() {

        $postManager = new PostManager();
        $posts = $postManager->getAllPosts();

        require('../app/views/front/blogView.php');

    }

    public static function post() {

        $onePost = new PostManager();
        $commentManager = new CommentManager();

        $showOnePost = $onePost->getOnePost($_GET['id']);
        $comments = $commentManager->getCommentsByPostId($_GET['id']);

        require('../app/views/front/postView.php');
    }
}