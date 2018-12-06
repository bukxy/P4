<?php

namespace App\models;

class Post {

    private $post_id;
    private $post_user_id;
    private $post_author;
    private $post_date;
    private $post_edit_date;
    private $post_title;
    private $post;

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
        return $this->post_id;
    }
    public function getUser_id() {
        return $this->post_user_id;
    }
    public function getTitle() {
        return $this->post_title;
    }
    public function getAuthor() {
        return $this->post_author;
    }
    public function getDate() {
        return $this->post_date;
    }
    public function getEdit_date() {
        return $this->post_edit_date;
    }
    public function getPost() {
        return $this->post; 
    }
    public function getReport() {
        return $this->post_report;
    }

    public function setPost_id($id) {
        $id = (int) $id;

        if ($id > 0) {
           $this->post_id = $id; 
        }
    }
    public function setPost_user_id($post_user_id) {
        $post_user_id = (int) $post_user_id;

        if ($post_user_id > 0) {
           $this->post_user_id = $post_user_id; 
        }
    }
    public function setPost_title($title) {

        if (is_string($title)) {
            $this->post_title = $title;
        }  
    }
    public function setPost_author($author) {

        if (is_string($author) && strlen($pseudo) <= 15) {
            $this->post_author = $author;
        }
    }
    public function setPost_date($date) {
        $this->post_date = $date;
    }
    public function setPost_edit_date($edit_date) {
        $this->post_edit_date = $edit_date;
    }
    public function setPost($post) {
        if (is_string($post)) {
            $this->post = $post;
        }
    }
}