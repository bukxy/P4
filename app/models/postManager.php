<?php

namespace App\models;

use \PDO;

class PostManager {

    public function addPost(Post $post) {
        $q = Database::getPDO()->prepare('INSERT INTO posts(post_title, post_author, post_date, post) 
        VALUES(:post_title, :post_author, :post_date, :post)');

        $q->bindValue(':post_title', $post->getTitle());
        $q->bindValue(':post_author', $post->author());
        $q->bindValue(':post_date', $post->date());
        $q->bindValue(':post', $post->post());
    
        $q->execute();
    }

    public function getOnePost($postId) {

        $post = [];

        $q = Database::getPDO()->prepare('SELECT post_id, post_title, post_author, post_date, post 
        FROM posts 
        WHERE post_id = ?');

        $q->execute(array($_GET['id']));

        while ($datas = $q->fetch()){
            $post[] = new Post($datas);
        }

        return $post;
    }

    public function updatePost(Post $post) { 
        $q = Database::getPDO()->prepare('UPDATE posts 
        SET postTitle = :post_title, postAuthor = :post_author, postDate = :post_date, postContent = :post 
        WHERE id = :id');

        $q->bindValue(':post_title', $post->title());
        $q->bindValue(':post_author', $post->author());
        $q->bindValue(':post_date', $post->date());
        $q->bindValue(':post', $post->post());
        $q->bindValue(':id', $post->id(), PDO::PARAM_INT);
    
        $q->execute();    
    }

    public function deletePost($id) {
        $q = Database::getPDO()->exec('DELETE FROM posts 
        WHERE id = '.$post->id());   
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