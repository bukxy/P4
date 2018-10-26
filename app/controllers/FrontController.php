<?php

namespace App\controllers;

use App\models\PostManager;
use App\models\Post;

use App\models\CommentManager;
use App\models\Comment;

use App\models\UserManager;
use App\models\User;

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

        $post = $onePost->getOnePost(
            $post = new Post([
                'post_id' => $_GET['id']
            ])
        );
        
        $comments = $commentManager->getCommentsByPostId(
            $comments = new Comment([
                'comment_id_post' => $_GET['id']
            ])
        );

        require('../app/views/front/postView.php');
    }

    public static function newComment() {

        $commentManager = new CommentManager();
        $addComment = $commentManager->addComment(
            $addComment = new Comment(
                [
                    'comment_id_post' => $_GET['id'],
                    'comment_author' => $_POST['author'],
                    'comment' => $_POST['comment']

                ]
            )
        );

        if ($addComment === false) {
            die('Impossible d\'ajouter le commentaire !');
        } else {
            header('Location: index.php?p=post&id=' . $_GET['id']);
        }

    }

    public static function reportComment() {

        $commentManager = new CommentManager();
        $reportComment = $commentManager->reportComment(
            $reportComment = new Comment(
                [
                    'comment_id' => $_GET['id']
                ]
            )
        );

        if ($reportComment === false) {
            die('Commentaire introuvable.'); // le faire en html
        } else {
            header('Location: index.php?p=post&id=' . $_GET['id']);
        }
    }

    public static function checkUserConnexion() {

        $userManager = new UserManager();
        $user = $userManager->checkUserConnexion(
            $user = new User(
                [
                    'pseudo' => $_POST['pseudo'],
                    'password' => $_POST['password']
                ]
            )
        );

        $pass_crypte = password_hash($_POST['password'], PASSWORD_DEFAULT); // On crypte le mot de passe

        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['password'], $pass_crypte);

        var_dump($pass_crypte);
        var_dump($isPasswordCorrect);

        if (isset($_POST['pseudo']))
        {
            echo 'Pseudo introuvable';
        }
        else
        {
            if ($isPasswordCorrect === true) {
                session_start();
                $_SESSION['pseudo'] = $_POST['pseudo'];
                echo 'Vous êtes connecté !';

                var_dump($_SESSION['pseudo']);

                //header('Location: index.php?p=connexion');
            }
            else {
                echo 'Mauvais mot de passe !';
            }
        }
    }
}