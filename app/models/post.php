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

    public function id() {
        return $this->_post_id;
    }
    public function title() {
        return $this->_post_title;
    }
    public function author() {
        return $this->_post_author;
    }
    public function date() {
        return $this->_post_date;
    }
    public function content() {
        return $this->_post;
    }

    public function setId($id) {
        $this->_post_id = (int) $id;
    }
    public function setTitle($title) {
        $this->_post_title = $title;
    }
    public function setAuthor($author) {
        $this->_post_author = $author;
    }
    public function setDate($date) {
        $this->_post_date = $date;
    }
    public function setContent($content) {
        $this->_post =  $content;
    }
}