<?php

namespace App\controllers;

use App\models\PostManager;
use App\models\CommentManager;


class BackController {

    public static function adminDashboard() {

        $postmanager = new PostManager();
        $posts = $postmanager->getAllPosts();

        require('../app/views/back/admin.php');
    }

    public static function editPost() {

        $onePost = new PostManager();

        $showOnePost = $onePost->getOnePost($_GET['id']);

        require('../app/views/back/editPostView.php');
    }

    public static function newPost() {
        require('../app/views/back/addPostView.php');
    }

    public static function addPost($title, $author, $post) {

        $postManager = new PostManager();
        $addPost = $postManager->addPost($title, $author, $post);

        if ($addPost === false) {
            die('Impossible d\'ajouter l\'article !');
        } else {
            header('Location: index.php?p=admin');
        }

    }

    public static function updatePost() {

        $postManager = new PostManager();
        $updatePost = $postManager->updatePost($_GET['edit']);

        if ($updatePost === false) {
            die('Impossible de modifier l\'article !');
        } else {
            header('Location: index.php?p=admin&id=' . $postId);
        }

    }

    public static function deletePost() {

        $postManager = new PostManager();
        $deletePost = $postManager->deletePost($_GET['id']);

        if ($deletePost === false) {
            die('Impossible de supprimer l\'article !');
        } else {
            header('Location: index.php?p=admin');
        }

    }

    public static function user() {
        require('../app/views/back/userView.php');
    }

}