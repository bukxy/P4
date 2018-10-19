<?php

namespace App\models;

use \PDO;

class CommentManager {

    public function addComment($postId, $author, $comment) {
        $q = Database::getPDO()->prepare('INSERT INTO comments(comment_id_post, comment_author, comment, comment_date) 
        VALUES(?, ?, ?, NOW())');

        $q->execute(array($postId, $author, $comment));

        return $q;

    }

    public function getOneComment(Comment $comment) {

        $q = Database::getPDO()->prepare('SELECT comment_id, comment_id_post, comment_author, comment_date, comment 
        FROM comments
        WHERE comment_id = :id');

        $q->bindValue(':id', $comment->getId());

        $q->execute();

        $comment = $q->fetch(PDO::FETCH_ASSOC);

        return new Comment($comment);
    }

    public function updateComment(Comment $comment) { 
        $q = Database::getPDO()->prepare('UPDATE comments 
        SET comment = :c
        WHERE comment_id = :com_id');

        $q->bindValue(':c', $comment->getComment());
        $q->bindValue(':com_id', $comment->getId());
    
        $q->execute();    
    }

    public function deleteComment($id) {
        $q = Database::getPDO()->prepare('DELETE FROM comments 
        WHERE comment_id = ?');

        $q->execute(array($id));
    }

    public function getAllComments(){
        $comments = [];

        $q = Database::getPDO()->query('SELECT comment_id, comment_author, comment_date, comment 
        FROM comments
        ORDER BY comment_date DESC');

        while ($datas = $q-> fetch()){
            $comments[] = new Comment($datas);
        }

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