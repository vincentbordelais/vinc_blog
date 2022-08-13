<?php
// ROUTEUR

require_once('src/Controllers/HomepageController.php');
require_once('src/Controllers/PostController.php');
require_once('src/Controllers/Comment/AddCommentController.php');

use Application\Controllers\Comment\Add\AddCommentController;
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
        } elseif ($_GET['action'] === 'add_comment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                (new AddCommentController())->execute($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } else {
            throw new Exception('La page souhaitée n\'existe pas.');
        }
    } else {
        (new HomepageController())->execute();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('Templates/error.php');
}
