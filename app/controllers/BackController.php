<?php

namespace App\controllers;

use App\models\PostManager;
use App\models\CommentManager;
use App\models\Post;
use App\models\Comment;


class BackController {

    public static function adminDashboard() {

        $postmanager = new PostManager();
        $posts = $postmanager->getAllPosts();

        require('../app/views/back/admin.php');
    }

    public static function editPostView() {

        $onePost = new PostManager();

        $post = $onePost->getOnePost(
            $post = new Post([
                'post_id' => $_GET['id']
            ])
        );

        require('../app/views/back/editPostView.php');
    }

    public static function newPost() {
        require('../app/views/back/addPostView.php');
    }

    public static function addPost() {

        $postManager = new PostManager();
        $addPost = $postManager->addPost(
            $post = new Post(
                [
                    'post_title' => $_POST['title'],
                    'post_author' => $_POST['author'],
                    'post' => $_POST['post']
                ]
            )
        );

        if ($addPost === false) {
            die('Impossible d\'ajouter l\'article !');
        } else {
            header('Location: index.php?p=admin');
        }

    }

    public static function updatePost() {

        $postManager = new PostManager();
        $updatePost = $postManager->updatePost(
            $updatePost = new Post(
                [
                    'post_id' => $_GET['id'],
                    'post_title' => $_POST['title'],
                    'post_author' => $_POST['author'],
                    'post' => $_POST['post']
                ]
            )
        );

        if ($updatePost === false) {
            die('Impossible de modifier l\'article !');
        } else {
            header('Location: index.php?p=admin&id=' . $postId);
        }
    }

    public static function deletePost() {

        $postManager = new PostManager();
        $deletePost = $postManager->deletePost(
            $deletePost = new Post(
                [
                    'post_id' => $_GET['id']
                ]
            )
        );

        if ($deletePost === false) {
            die('Impossible de supprimer l\'article !');
        } else {
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
            $comment = new Comment(
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
            $comment = new Comment(
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
            $deleteComment = new Comment(
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
        require('../app/views/back/userView.php');
    }

}