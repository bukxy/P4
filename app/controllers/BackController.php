<?php

namespace App\controllers;

use App\models\PostManager;
use App\models\CommentManager;
use App\models\UserManager;
use App\models\Post;
use App\models\Comment;
use App\models\User;

class BackController {

    public static function adminDashboard() {

        $postmanager = new PostManager();
        $posts = $postmanager->getAllPosts();

        require('../app/views/back/adminView.php');
    }

    public static function editPostView() {

        $onePost = new PostManager();

        $post = $onePost->getOnePost(
            new Post(
                [
                    'post_id' => $_GET['id']
                ]
            )
        );

        require('../app/views/back/editPostView.php');
    }

    public static function newPost() {
        require('../app/views/back/addPostView.php');
    }

    public static function addPost() {

        $postManager = new PostManager();

        $addPost = $postManager->addPost(
            new Post(
                [
                    'post_title' => $_POST['title'],
                    'post_author' => $_POST['author'],
                    'post' => $_POST['post']
                ]
            )
        );

        if ($addPost === false) {
			session_start();
			$_SESSION['notificationAdminNo'] = "Un problème est survenu lors de la création de l'article...";
			
			header('Location: index.php?p=admin');		
        } else {
			session_start();
			$_SESSION['postTitle'] = $_POST['title'];
			$_SESSION['notificationAdminYes'] = "L'article [ <span class='strongStyle'>" . $_SESSION['postTitle'] . "</span> ] à bien été créer !";
					
            header('Location: index.php?p=admin');			
        }

    }

    public static function updatePost() {

        $postManager = new PostManager();
        $updatePost = $postManager->updatePost(
            new Post(
                [
                    'post_id' => $_GET['id'],
                    'post_title' => $_POST['title'],
                    'post_author' => $_POST['author'],
                    'post' => $_POST['post']
                ]
            )
        );

        if ($updatePost === false) {
			session_start();
			$_SESSION['notificationAdminNo'] = "Un problème est survenu lors de l'enregistrement des modifications...";
			
			header('Location: index.php?p=admin');		
        } else {
			session_start();
			$_SESSION['postTitle'] = $_POST['title'];
			$_SESSION['notificationAdminYes'] = "Les modifications apportés à l'article [ <span class='strongStyle'>" . $_SESSION['postTitle'] . "</span> ] ont bien été prise en compte";
					
            header('Location: index.php?p=admin');			
        }
    }

    public static function deletePost() {

        $postManager = new PostManager();
        $deletePost = $postManager->deletePost(
            new Post(
                [
                    'post_id' => $_GET['id']
                ]
            )
        );

        if ($deletePost === false) {
			session_start();
			$_SESSION['notificationAdminNo'] = "Un problème est survenu lors de la suppression de l'article...";	
			header('Location: index.php?p=admin');		
        } else {
			session_start();
			$_SESSION['notificationAdminYes'] = "Vous avez supprimer cette article avec succcé !";
					
            header('Location: index.php?p=admin');			
        }

    }

    public static function getAllComments() {

        $commentsManager = new CommentManager();
        $allComments = $commentsManager-> getAllComments();

        require('../app/views/back/commentsView.php');
    }

    public static function editCommentView() {

        $oneComment = new CommentManager();

        $comment = $oneComment->getOneComment(            
            new Comment(
                [
                    'comment_id' => $_GET['id']
                ]
            )
        );

        require('../app/views/back/editComment.php');
    }

    public static function updateComment() {

        $commentsManager = new CommentManager();
        $editComment = $commentsManager->updateComment(
            new Comment(
                [
                    'comment_id' => $_GET['id'],
                    'comment' => $_POST['comment']
                ]
            )
        );

        if ($editComment === false) {
            die('Impossible de modifier le commentaire !');
        } else {
            header('Location: index.php?p=comments');
        }

    }

    public static function deleteComment() {

        $commentsManager = new CommentManager();
        $deleteComment = $commentsManager->deleteComment(
            new Comment(
                [
                    'comment_id' => $_GET['id']
                ]
            )
        );

        if ($deleteComment === false) {
            die('Impossible de supprimer le commentaire !');
        } else {
            header('Location: index.php?p=comments');
        }

    }

    public static function user() {
        $userManager = new UserManager();

        $user = $userManager->getOneUser(            
            new User(
                [
                    'pseudo' => $_GET['pseudo']
                ]
            )
        );

        require('../app/views/back/userView.php');
    }
    
    public static function checkUserConnexion() {

        $userManager = new UserManager();
        $user = $userManager->checkUserConnexion(
            new User(
                [
                    'pseudo' => $_POST['pseudo'],
                    'password' => $_POST['password']
                ]
            )
        );
        
        // Comparaison du pass envoyé via le formulaire avec la base
        $isPasswordCorrect = password_verify($_POST['password'], $user->getPassword());
		
		if ($isPasswordCorrect) {
			session_start();
			$_SESSION['pseudo'] = $_POST['pseudo'];
			$_SESSION['message'] = "Bienvenue ". $_SESSION['pseudo'] ." sur votre espace d'administration !";

			header('Location: index.php?p=admin');
		}
		else {
			session_start();
			$_SESSION['notif'] = 'Mot de passe est incorrect !';
			header('Location: index.php?p=connexion');
		}
    }

    public static function disconnect() {

        session_start();
        $_SESSION = array();
        session_destroy();

        header('Location: index.php?p=connexion');
    }
}