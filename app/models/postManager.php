<?php

namespace App\models;

use \PDO;

class PostManager {

    private $_post_title, $_post_author, $_post_date, $_post;

    public function addPost(Post $post) {
        $q = Database::getPDO()->prepare('INSERT INTO posts(post_title, post_author, post_date, post) VALUES(:post_title, :post_author, :post_date, :post)');

        $q->bindValue(':post_title', $post->title());
        $q->bindValue(':post_author', $post->author());
        $q->bindValue(':post_date', $post->date());
        $q->bindValue(':post', $post->post());
    
        $q->execute();
    }

    public function getOnePost($id) {
        $id = (int) $id;

        $q = Database::getPDO()->query('SELECT post_id, post_title, post_author, post_date, post FROM posts WHERE id = '.$id);
        $datas = $q->fetch(PDO::FECTH_ASSOC);

        return new Post($datas);
    }

    public function updatePost(Post $post) { 
        $q = Database::getPDO()->prepare('UPDATE posts SET postTitle = :post_title, postAuthor = :post_author, postDate = :post_date, postContent = :post WHERE id = :id');

        $q->bindValue(':post_title', $post->title());
        $q->bindValue(':post_author', $post->author());
        $q->bindValue(':post_date', $post->pdate());
        $q->bindValue(':post', $post->post());
        $q->bindValue(':id', $post->id(), PDO::PARAM_INT);
    
        $q->execute();    
    }

    public function deletePost(Post $post) {
        $q = Database::getPDO()->exec('DELETE FROM personnages WHERE id = '.$perso->id());   
    }

    public function getAllPosts(){
        $posts = [];
        $q =  Database::getPDO()->query('SELECT post_id, post_title, post_author, post_date, post FROM posts ORDER BY post_date DESC');

        while ($datas = $q-> fetch(PDO::FETCH_ASSOC)){
            $posts[] = new Post($datas);
        }
    }

}