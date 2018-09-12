<?php

namespace App\models;

class Comment {

    private $_comment_id;
    private $_comment_id_comment;
    private $_comment_author;
    private $_comment_date;
    private $_comment;

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

    public function id() {
        return $this->_comment_id;
    }
    public function idPost() {
        return $this->_comment_id_post;
    }
    public function author() {
        return $this->_comment_author;
    }
    public function date() {
        return $this->_comment_date;
    }
    public function content() {
        return $this->_comment;
    }

    public function setId($id) {
        $this->_comment_id = (int) $id;
    }
    public function setIdPost($id_post) {
        $this->_comment_id_post = (int) $id_post;
    }
    public function setAuthor($author) {
        $this->_comment_author = $author;
    }
    public function setDate($date) {
        $this->_comment_date = $date;
    }
    public function setContent($content) {
        $this->_comment =  $content;
    }
}