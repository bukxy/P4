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

        if ($post) {
            require('../app/views/back/editPostView.php');
        } else {
            FrontController::NotFound();
        }
    }

    public static function newPost() {
        require('../app/views/back/addPostView.php');
    }

    public static function addANewPost() {

        $postManager = new PostManager();

        $addPost = $postManager->addPost(
            new Post(array
                (
                    'post_title' => $_POST['title'],
                    'post_author' => $_POST['author'],
                    'post' => $_POST['post']
                )
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

    public static function updatePost($id) {

        $postManager = new PostManager();
        $updatePost = $postManager->updatePost(
            new Post(
                [
                    'post_id' => $id,
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

        if ($comment) {
            require('../app/views/back/editCommentView.php');
        } else {
            FrontController::NotFound();
        }
   
    }

    public static function updateComment() {

        $commentsManager = new CommentManager();
        $editComment = $commentsManager->updateComment(
            new Comment(
                [
                    'comment_id' => $_GET['id'],
                    'comment_author' => $_POST['author'],
                    'comment' => $_POST['comment']
                ]
            )
        );

        if ($editComment === false) {
			session_start();
			$_SESSION['notificationAdminNo'] = "Un problème est survenu lors de l'enregistrement des modifications...";
			
			header('Location: index.php?p=comments');		
        } else {
			session_start();
			$_SESSION['postTitle'] = $_POST['author'];
			$_SESSION['notificationAdminYes'] = "Les modifications apportés au commentaire de [ <span class='strongStyle'>" . $_SESSION['postTitle'] . "</span> ] ont bien été prise en compte";
					
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
			session_start();
			$_SESSION['notificationAdminNo'] = "Un problème est survenu lors de la suppression du commentaire...";	
			header('Location: index.php?p=comments');		
        } else {
			session_start();
			$_SESSION['notificationAdminYes'] = "Vous avez supprimer ce commentaire avec succcé !";
					
            header('Location: index.php?p=comments');			
        }

    }



    /***************************************************************
     * 
     * 
     * 
     *                   GESTION UTILISATEURS 
     * 
     * 
     * 
    ***************************************************************/

    public static function listUsers() {

        $userManager = new UserManager();
        $users = $userManager->getAllUsers();

        require('../app/views/back/userView.php');
    }

    public static function newUser() {
        require('../app/views/back/addUserView.php');
    }

    public static function addANewUser() {

        $userManager = new UserManager();

        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $addUser = $userManager->addUser(
            new User(array
                (
                    'user_pseudo' => $_POST['pseudo'],
                    'user_email' => $_POST['email'],
                    'user_password' => $pass
                )
            )
        );
        
        if ($addUser === false) {
			session_start();
			$_SESSION['notificationAdminNo'] = "Un problème est survenu lors de la création de l'utilisateur...";
			
			header('Location: index.php?p=usersList');		
        } else {
			session_start();
			$_SESSION['postTitle'] = $_POST['pseudo'];
			$_SESSION['notificationAdminYes'] = "L'utilisateur [ <span class='strongStyle'>" . $_SESSION['postTitle'] . "</span> ] à bien été créer !";
					
            header('Location: index.php?p=usersList');			
        }

    }

    public static function editUserView() {

        $oneUser = new UserManager();

        $user = $oneUser->getOneUser(            
            new User(
                [
                    'user_id' => $_GET['id']
                ]
            )
        );

        if ($user) {
            require('../app/views/back/editUserView.php');
        } else {
            FrontController::NotFound();
        }
   
    }

    public static function updateUser($id) {

        $userManager = new UserManager();

        $pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $updateuser = $userManager->updateUser(
            new User(
                [
                    'user_id' => $id,
                    'user_pseudo' => $_POST['pseudo'],
                    'user_email' => $_POST['email'],
                    'user_password' => $pass
                ]
            )
        );

        if ($updatePost === false) {
			session_start();
			$_SESSION['notificationAdminNo'] = "Un problème est survenu lors de l'enregistrement des modifications...";
			
			header('Location: index.php?p=usersList');		
        } else {
			session_start();
			$_SESSION['postTitle'] = $_POST['title'];
			$_SESSION['notificationAdminYes'] = "Les modifications apportés à l'article [ <span class='strongStyle'>" . $_SESSION['postTitle'] . "</span> ] ont bien été prise en compte";
					
            header('Location: index.php?p=usersList');			
        }
    }

    public static function deleteUser() {

        $userManager = new UserManager();
        $deleteUser = $userManager->deleteUser(
            new User(
                [
                    'user_id' => $_GET['id']
                ]
            )
        );

        if ($deleteUser === false) {
			session_start();
			$_SESSION['notificationAdminNo'] = "Un problème est survenu lors de la suppression de l'utilisateur...";	
			header('Location: index.php?p=usersList');		
        } else {
			session_start();
			$_SESSION['notificationAdminYes'] = "Vous avez supprimer cet utilisateur avec succcé !";
					
            header('Location: index.php?p=usersList');			
        }

    }



    /***************************************************************
     * 
     * 
     * 
     *                 CONNEXION / DECONNEXION 
     * 
     * 
     * 
    ***************************************************************/
   


    public static function checkUserConnexion() {

        $userManager = new UserManager();
        $user = $userManager->checkUserConnexion(
            new User(
                [
                    'user_pseudo' => $_POST['pseudo'],
                    'user_password' => $_POST['password']
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
			$_SESSION['notif'] = 'Mot de passe incorrect !';
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