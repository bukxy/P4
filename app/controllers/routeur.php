<?php

require('../app/models/Autoloader.php');
App\models\Autoloader::register();

require('../app/controllers/FrontController.php');
require('../app/controllers/BackController.php');

use App\controllers\FrontController;
use App\controllers\BackController;

try {
    if (isset($_GET['p'])) {
        switch ($_GET['p']) {
            case 'home':
                FrontController::home();
                break;
            case 'blog';
                FrontController::listPosts();
                break;
            case 'post';
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    FrontController::post();
                }
                else {
                    throw new Exception('Aucun identifiant de post envoyé');
                }
                break;
            case 'reportComment';
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    FrontController::reportComment($_GET['id']);
                }
                else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
                break;
            case 'addComment';
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
                break;
            case 'connexion';
                FrontController::connexion();
                break;
            case 'admin';
                BackController::adminDashboard();
                break;
            case 'editPost';
                BackController::editPostView();
                break;
            case 'newPost';
                BackController::newPost();
                break;
            case 'addPost';

                if (!empty($_POST['title']) && !empty($_POST['author']) && !empty($_POST['post'])) {      
                    BackController::addPost($_POST['title'], $_POST['author'], $_POST['post']);
                }
                else {
                    throw new Exception('Impossible d\'ajouter cet article');
                }
                break;
            case 'updatePost';
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
                break;
            case 'deletePost';
                BackController::deletePost();
                break;
            case 'comments';
                BackController::getAllComments();
                break;
            case 'editComment';
                BackController::editCommentView();
                break;
            case 'updateComment';
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
                break;
            case 'deleteComment';
                BackController::deleteComment();
                break;
            case 'user';
                BackController::user();
                break;
            case 'checkUserConnexion';
                BackController::checkUserConnexion($_POST['pseudo'], $_POST['password']);
                break;
            case 'disconnect';
                BackController::disconnect();
                break;
            default :
                FrontController::home();
            break;
        }
    }
    else {
        FrontController::home();
    }
} catch(Exception $e) {
    echo 'Erreur : ' . $e->getMessage();
}