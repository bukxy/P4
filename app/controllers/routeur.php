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
        elseif ($_GET['p'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    FrontController::newComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Erreur : tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Erreur : aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['p'] == 'connexion') {
            FrontController::connexion();
        }
        elseif ($_GET['p'] == 'admin') {
            BackController::adminDashboard();
        }
        elseif ($_GET['p'] == 'editPost') {
            BackController::editPost();
        }
        elseif ($_GET['p'] == 'newPost') {
            BackController::newPost();
        }
        elseif ($_GET['p'] == 'addPost') {

            if (!empty($_POST['title']) && !empty($_POST['post'])) {
                BackController::addPost($_POST['title'], $_POST['author'], $_POST['post']);
            }
            else {
                throw new Exception('Impossible d\'ajouter cet article');
                var_dump($_POST['title'],$_POST['author'], $_POST['post']);
            }
        }
        elseif ($_GET['p'] == 'updatePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['post'])) {
                    BackController::updatePost($_POST['title'], $_POST['post']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                    var_dump($_POST['title'], $_POST['post']);
                }
            }
            else {
                throw new Exception('Cet article n\'existe pas');
            }
        }
        elseif ($_GET['p'] == 'deletePost') {
            BackController::deletePost();
        }
        elseif ($_GET['p'] == 'user') {
            BackController::user();
        }
        elseif ($_GET['p'] == 'checkUserConnexion') {
            if (isset($_GET['email']) && isset($_GET['password'])) {
                FrontController::checkUserConnexion($_POST['email'], $_POST['password']);
            }
            else {
                throw new Exception('Ce mot de passe ne correspond pas a cet utilisateur');
            }
        }
    }
    else {
        FrontController::home();
    }
} catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}