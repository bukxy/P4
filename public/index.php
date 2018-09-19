<?php

require('../app/models/Autoloader.php');
App\models\Autoloader::register();

require('controller.php');

if(isset($_GET['p'])) {
    $p = $_GET['p'];
} else {
    $p = 'index';
}

ob_start();

if($p === 'index') {
    require '../app/views/front/indexView.php';
} elseif ($p === 'blog') {
    require '../app/views/front/blogView.php';
} elseif ($p === 'post') {
    require '../app/views/front/postView.php';
}

$content = ob_get_clean();
require '../app/views/front/templates/acceuil.php';
