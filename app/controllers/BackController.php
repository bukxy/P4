<?php

namespace App\controllers;

use App\models\PostManager;
use App\models\CommentManager;


class BackController {

    public static function adminDashboard() {

        $postmanager = new PostManager();
        $posts = $postmanager->getAllPosts();

        require('../app/views/back/admin.php');
    }
}