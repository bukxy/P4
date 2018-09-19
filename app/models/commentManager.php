<?php

namespace App\models;

use \PDO;


class CommentManager {

    private $_comment_id_post, $_comment_author, $_comment_date, $_comment;

    public function addComment(Comment $comment) {
        $q = Database::getPDO()->prepare('INSERT INTO comments(comment_id_post, comment_author, comment_date, comment) VALUES(:comment_id_post, :comment_author, :comment_date, :comment)');

        $q->bindValue(':comment_id_post', $comment->commentIdPost());
        $q->bindValue(':comment_author', $comment->commentAuthor());
        $q->bindValue(':comment_date', $comment->commentDate());
        $q->bindValue(':comment', $comment->commentContent());
    
        $q->execute();
    }

    public function getOneComment($id) {
        $id = (int) $id;

        $q = Database::getPDO()->query('SELECT comment_id, comment_id_post, comment_author, comment_date, comment FROM comments WHERE id = '.$id);
        $datas = $q->fetch(PDO::FECTH_ASSOC);

        return new Comment($datas);
    }

    public function updateComment(Comment $comment) { 
        $q = Database::getPDO()->prepare('UPDATE comments SET commentIdPost = :comment_id_post, commentAuthor = :comment_author, commentDate = :comment_date, commentContent = :comment WHERE id = :id');

        $q->bindValue(':comment_id_post', $comment->commentIdPost());
        $q->bindValue(':comment_author', $comment->commentAuthor());
        $q->bindValue(':comment_date', $comment->commentDate());
        $q->bindValue(':comment', $comment->commentContent());
        $q->bindValue(':id', $comment->id(), PDO::PARAM_INT);
    
        $q->execute();    
    }

    public function deleteComment(Comment $comment) {
        $q = Database::getPDO()->exec('DELETE FROM personnages WHERE id = '.$perso->id());   
    }

    public function getAllComments(){
        $comments = [];
        $q = Database::getPDO()->query('SELECT comment_id, comment_id_post, comment_author, comment_date, comment FROM comments ORDER BY comment_date DESC');

        while ($datas = $q-> fetch(PDO::FETCH_ASSOC)){
            $comments[] = new Comment($datas);
        }
    }

}