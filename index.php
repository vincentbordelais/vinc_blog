<?php
// ROUTEUR

require_once('src/Controllers/HomepageController.php');
require_once('src/Controllers/PostController.php');
require_once('src/Controllers/Comment/AddCommentController.php');
require_once('src/controllers/Comment/UpdateCommentController.php');

use Application\Controllers\Comment\Add\AddCommentController;
use Application\Controllers\Comment\Update\UpdateCommentController;
use Application\Controllers\HomePage\HomepageController;
use Application\Controllers\Post\PostController;

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new PostController())->execute($identifier);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new AddCommentController())->execute($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } elseif ($_GET['action'] === 'updateComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];
                // It sets the input only when the HTTP method is POST (ie. the form is submitted).
                $input = null;
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    $input = $_POST;
                }

                (new UpdateCommentController())->execute($identifier, $input);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        } else {
            throw new Exception("La page que vous recherchez n'existe pas.");
        }
    } else {
        (new HomepageController())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();

    require('Templates/error.php');
}
