<?php

namespace App\models;

use \PDO;

class PostManager {

    public function addPost(Post $post) {
        $q = Database::getPDO()->prepare('INSERT INTO posts(post_title, post_author, post_date, post) 
        VALUES(:post_title, :post_author, NOW(), :post)');

        $q->bindValue(':post_title', $post->getTitle());
        $q->bindValue(':post_author', $post->getAuthor());
        $q->bindValue(':post', $post->getPost());

        $q->execute();
    }

    public function getOnePost($postId) {

        $post = [];

        $q = Database::getPDO()->prepare('SELECT post_id, post_title, post_author, post_date, post 
        FROM posts 
        WHERE post_id = ?');

        $q->execute(array($postId));

        while ($datas = $q->fetch()){
            $post[] = new Post($datas);
        }
        
        return $post;
    }

    public function updatePost(Post $post) { 
        $q = Database::getPDO()->prepare('UPDATE posts 
        SET post_title = :post_title, post_author = :post_author, post_date = :post_date, post = :post 
        WHERE id = :id');

        $q->bindValue(':post_title', $post->getTitle());
        $q->bindValue(':post_author', $post->getAuthor());
        $q->bindValue(':post_date', $post->getDate());
        $q->bindValue(':post', $post->getPost());
        $q->bindValue(':id', $post->getId());
    
        $q->execute();
    }

    public function deletePost($postId) {
        $q = Database::getPDO()->prepare('DELETE FROM posts 
        WHERE post_id = ?');

        $q->execute(array($postId));
    }

    public function getAllPosts() {
        $posts = [];
        $q = Database::getPDO()->query("SELECT * FROM posts ORDER BY post_date DESC");

        while ($datas = $q->fetch()){
            $posts[] = new Post($datas);
        }

        return $posts;
    }

}