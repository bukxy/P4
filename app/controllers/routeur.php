<?php

require('../app/models/Autoloader.php');
App\models\Autoloader::register();

require('../app/controllers/FrontController.php');
require('../app/controllers/BackController.php');

use App\controllers\FrontController;
use App\controllers\BackController;

try {
    if (isset($_GET['p'])) {
        if ($_GET['p'] == 'home') {
            FrontController::home();
        }
        elseif ($_GET['p'] == 'blog') {
            FrontController::listPosts();
        }
        elseif ($_GET['p'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                FrontController::post();
            }
            else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        }
        elseif ($_GET['p'] == 'connexion') {
            FrontController::connexion();
        }
        elseif ($_GET['p'] == 'admin') {
            BackController::adminDashboard();
        }
    }
    else {
        FrontController::home();
    }
} catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}