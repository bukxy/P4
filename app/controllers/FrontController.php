<?php

namespace App\controllers;

use App\models\PostManager;
use App\models\CommentManager;
use App\models\UserManager;
use App\models\Post;

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

    public static function newComment($postId, $author, $comment) {

        $commentManager = new CommentManager();
        $addComment = $commentManager->addComment($postId, $author, $comment);

        if ($addComment === false) {
            die('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?p=post&id=' . $postId);
        }

    }

    public static function checkUserConnexion() {

        $userManager = new UserManager();
        $user = $userManager->checkUserConnexion($email);

        $isPasswordCorrect = password_verify($_POST['pass'], $resultat['pass']);

        if (!$user) {
            die('Mauvais identifiant ou mot de passe !');
        }
        else {
            if ($isPasswordCorrect) {
                session_start();
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $email;
                echo 'Vous êtes connecté !';
            }
            else {
                echo 'Mauvais identifiant ou mot de passe !';
            }
        }
            
    }
}