<?php

namespace App\models;

class Post {

    private $_post_id;
    private $_post_title;
    private $_post_author;
    private $_post_date;
    private $_post;

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
        return $this->_post_id;
    }
    public function getTitle() {
        return $this->_post_title;
    }
    public function getAuthor() {
        return $this->_post_author;
    }
    public function getDate() {
        return $this->_post_date;
    }
    public function getPost() {
        return $this->_post;
    }

    public function setId($id) {
        $id = (int) $id;

        if ($id >0) {
           $this->_post_id = $id; 
        }
    }
    public function setTitle($title) {

        if (is_string($title)) {
            $this->_post_title = $title;
        }  
    }
    public function setAuthor($author) {

        if (is_string($author)) {
            $this->_post_author = $author;
        }
    }
    public function setDate($date) {
        $this->_post_date = $date;
    }
    public function setPost($post) {
        if (is_string($post)) {
            $this->_post =  $post;
        }
    }
}