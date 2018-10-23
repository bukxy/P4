<?php

namespace App\models;

use \PDO;

class CommentManager {

    public function addComment(Comment $comment) {
        $q = Database::getPDO()->prepare('INSERT INTO comments(comment_id_post, comment_author, comment, comment_date) 
        VALUES(:comment_id_post, :comment_author, :comment, NOW())');

        $q->bindValue(':comment_id_post', $comment->getIdPost());
        $q->bindValue(':comment_author', $comment->getAuthor());
        $q->bindValue(':comment', $comment->getComment());

        $q->execute();

        return $q;
    }

    public function getOneComment(Comment $comment) {

        $q = Database::getPDO()->prepare('SELECT comment_id, comment_id_post, comment_author, comment_date, comment_report, comment 
        FROM comments
        WHERE comment_id = :id');

        $q->bindValue(':id', $comment->getId());

        $q->execute();

        $comment = $q->fetch(PDO::FETCH_ASSOC);

        return new Comment($comment);
    }

    public function updateComment(Comment $comment) { 
        $q = Database::getPDO()->prepare('UPDATE comments 
        SET comment = :comment
        WHERE comment_id = :id');

        $q->bindValue(':comment', $comment->getComment());

        $q->bindValue(':id', $comment->getId());

        $q->execute();
    }

    public function deleteComment(Comment $comment) {
        $q = Database::getPDO()->prepare('DELETE FROM comments 
        WHERE comment_id = :id');

        $q->bindValue(':id', $comment->getId());

        $q->execute();
    }

    public function getAllComments(){
        $comments = [];

        $q = Database::getPDO()->query('SELECT comment_id, comment_author, comment_date, comment_report, comment 
        FROM comments
        ORDER BY comment_report DESC');

        while ($datas = $q-> fetch()){
            $comments[] = new Comment($datas);
        }

        return $comments;
    }

    public function getCommentsByPostId(Comment $comment) {
        $comments = [];

        $q = Database::getPDO()->prepare("SELECT comment_id, comment_id_post, post_id, comment_author, comment_date, comment
        FROM posts
        INNER JOIN comments
        ON comment_id_post = post_id
        WHERE post_id = ?
        ORDER BY comment_date DESC");

        $q->execute(array($comment->getIdPost()));

        while ($datas = $q-> fetch()){
            $comments[] = new Comment($datas);
        }

        return $comments;
    }

    public function reportComment(Comment $comment) {

        $q = Database::getPDO()->prepare("UPDATE comments 
        SET comment_report = comment_report + 1
        WHERE comment_id = ?");

        $q->execute(array($comment->getId()));
    }
}