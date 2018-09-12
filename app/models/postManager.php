<?php

namespace App\models;

use App\App;

class PostManager {

    private $_post_title, $_post_author, $_post_date, $_post;

    public function add(Post $post) {
        $q = App::getDb()->prepare('INSERT INTO posts(post_title, post_author, post_date, post) VALUES(:post_title, :post_author, :post_date, :post)');

        $q->bindValue(':post_title', $post->postTitle());
        $q->bindValue(':post_author', $post->postAuthor());
        $q->bindValue(':post_date', $post->postDate());
        $q->bindValue(':post', $post->postContent());
    
        $q->execute();
    }

    public function get($id) {
        $id = (int) $id;

        $q = App::getDb()->query('SELECT post_id, post_title, post_author, post_date, post FROM posts WHERE id = '.$id);
        $datas = $q->fetch(PDO::FECTH_ASSOC);

        return new Post($datas);
    }

    public function update(Post $post) { 
        $q = App::getDb()->prepare('UPDATE posts SET postTitle = :post_title, postAuthor = :post_author, postDate = :post_date, postContent = :post WHERE id = :id');

        $q->bindValue(':post_title', $post->postTitle());
        $q->bindValue(':post_author', $post->postAuthor());
        $q->bindValue(':post_date', $post->postDate());
        $q->bindValue(':post', $post->postContent());
        $q->bindValue(':id', $post->id(), PDO::PARAM_INT);
    
        $q->execute();    
    }

    public function delete(Post $post) {
        $q = App::getDb()->exec('DELETE FROM personnages WHERE id = '.$perso->id());   
    }

    public function getList(){
        $posts = [];
        $q = App::getDb()->query('SELECT post_id, post_title, post_author, post_date, post FROM posts ORDER BY post_date DESC');

        while ($datas = $q-> fetch(PDO::FETCH_ASSOC)){
            $posts[] = new Post($datas);
        }
    }

}