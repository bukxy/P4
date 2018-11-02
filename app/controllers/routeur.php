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
        elseif ($_GET['p'] == 'reportComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                FrontController::reportComment($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['p'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    FrontController::newComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        elseif ($_GET['p'] == 'connexion') {
            FrontController::connexion();
        }
        elseif ($_GET['p'] == 'admin') {
            BackController::adminDashboard();
        }
        elseif ($_GET['p'] == 'editPost') {
            BackController::editPostView();
        }
        elseif ($_GET['p'] == 'newPost') {
            BackController::newPost();
        }
        elseif ($_GET['p'] == 'addPost') {

            if (!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['post'])) {      
                BackController::addPost($_POST['title'], $_POST['author'], $_POST['post']);
            }
            else {
                throw new Exception('Impossible d\'ajouter cet article');
            }
        }
        elseif ($_GET['p'] == 'updatePost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['title']) && !empty($_POST['post'])) {
                    BackController::updatePost($_POST['title'], $_POST['author'], $_POST['post']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Cet article n\'existe pas');
            }
        }
        elseif ($_GET['p'] == 'deletePost') {
            BackController::deletePost();
        }
        elseif ($_GET['p'] == 'comments') {
            BackController::getAllComments();
        }
        elseif ($_GET['p'] == 'editComment') {
            BackController::editCommentView();
        }
        elseif ($_GET['p'] == 'updateComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['comment'])) {
                    BackController::updateComment($_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Cet article n\'existe pas');
            }
        }
        elseif ($_GET['p'] == 'deleteComment') {
            BackController::deleteComment();
        }
        elseif ($_GET['p'] == 'user') {
            BackController::user();
        }
        elseif ($_GET['p'] == 'checkUserConnexion') {
            BackController::checkUserConnexion($_POST['pseudo'], $_POST['password']);
        }
        elseif ($_GET['p'] == 'disconnect') {
            BackController::disconnect();
        }
    }
    else {
        FrontController::home();
    }
} catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}