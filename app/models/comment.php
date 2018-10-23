<?php

namespace App\models;

class Comment {

    private $comment_id;
    private $comment_id_post;
    private $comment_author;
    private $comment_date;
    private $comment_report;
    private $comment;

    public function __construct(array $datas)
    {
      $this->hydrate($datas);
    }

    public function hydrate(array $datas) {
        foreach ($datas as $key => $value) {
            $method = 'set'.ucfirst($key);

            if (method_exists($this, $method)){
                $this->$method($value);
            }
        }
    }

    public function getId() {
        return $this->comment_id;
    }
    public function getIdPost() {
        return $this->comment_id_post;
    }
    public function getAuthor() {
        return $this->comment_author;
    }
    public function getDate() {
        return $this->comment_date;
    }
    public function getReport() {
        return $this->comment_report;
    }
    public function getComment() {
        return $this->comment;
    }

    public function setComment_id($id) {
        $id = (int) $id;

        if ($id >0) {
           $this->comment_id = $id;
        }
    }
    public function setComment_id_post($id_post) {
        $id_post = (int) $id_post;

        if ($id_post >0) {
           $this->comment_id_post = $id_post; 
        }
    }
    public function setComment_author($author) {
        $this->comment_author = $author;
    }
    public function setComment_report($report) {
        $report = (int) $report;

        if ($report == null) {
            echo 'Aucun';
        }

        if ($report >0) {
           $this->comment_report = $report;
        }
    }
    public function setComment_date($date) {
        $this->comment_date = $date;
    }
    public function setComment($comment) {
        $this->comment =  $comment;
    }
}