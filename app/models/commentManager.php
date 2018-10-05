<?php

namespace App\models;

use \PDO;

class CommentManager {

    public function addComment(Comment $comment) {
        $q = Database::getPDO()->prepare('INSERT INTO comments(comment_id_post, comment_author, comment_date, comment) VALUES(:comment_id_post, :comment_author, :comment_date, :comment)');

        $q->bindValue(':comment_id_post', $comment->idPost());
        $q->bindValue(':comment_author', $comment->author());
        $q->bindValue(':comment_date', $comment->date());
        $q->bindValue(':comment', $comment->comment());
    
        $q->execute();
    }

    public function getOneComment($id) {
        $id = (int) $id;

        $q = Database::getPDO()->query('SELECT comment_id, comment_id_post, comment_author, comment_date, comment FROM comments WHERE id = '.$id);
        $datas = $q->fetch(PDO::FECTH_ASSOC);

        return new Comment($datas);
    }

    public function updateComment(Comment $comment) { 
        $q = Database::getPDO()->prepare('UPDATE comments SET idPost = :comment_id_post, commentAuthor = :comment_author, commentDate = :comment_date, commentContent = :comment WHERE id = :id');

        $q->bindValue(':comment_id_post', $comment->idPost());
        $q->bindValue(':comment_author', $comment->author());
        $q->bindValue(':comment_date', $comment->date());
        $q->bindValue(':comment', $comment->comment());
        $q->bindValue(':id', $comment->id(), PDO::PARAM_INT);
    
        $q->execute();    
    }

    public function deleteComment($id) {
        $q = Database::getPDO()->exec('DELETE FROM comments WHERE id = '.$comment->id());   
    }

    public function getAllComments(){
        $comments = [];
        $q = Database::getPDO()->query('SELECT comment_id, comment_id_post, comment_author, comment_date, comment 
        FROM comments ORDER BY comment_date DESC');

        while ($datas = $q-> fetch(PDO::FETCH_ASSOC)){
            $comments[] = new Comment($datas);
        }
        var_dump($comments);
        return $comments;
    }

    public function getCommentsByPostId($postId) {
        $comments = [];

        $q = Database::getPDO()->prepare("SELECT comment_id, comment_id_post, post_id, comment_author, comment_date, comment
        FROM posts
        INNER JOIN comments
        ON comment_id_post = post_id
        WHERE comment_id_post = ?
        ORDER BY comment_date DESC");

        $q->execute(array($_GET['id']));

        while ($datas = $q-> fetch()){
            $comments[] = new Comment($datas);
        }
        
        return $comments;
    }

}