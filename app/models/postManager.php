<?php

namespace App\models;

use App\App;

class PostManager {

    public function getTitle(){
        return $this->post_title;
    }

    public function getUrl(){
        return 'index.php?p=post&id=' . $this->post_id;
    }

    public function getExtrait(){
        $html = '<p>' . substr($this->post, 0, 500) . '...</p>';
        $html .= '<p><a href="' . $this->getUrl() . '">Voir la suite</a></p>';

        return $html;
    }

    public function getContent(){
        return $this->post;
    }

    public static function getLast() {
        return App::getDb()->query('SELECT * FROM posts', __CLASS__);
    }

}