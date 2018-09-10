<?php

namespace App\models;

class CommentManager {

    public function getComment(){
        return $this->comment;
    }

    public function getCommentAuthor(){
        return $this->comment_author;
    }

    public function getDate(){
        return $this->comment_date;
    }

}