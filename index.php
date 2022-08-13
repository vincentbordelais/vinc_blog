<?php
// ROUTEUR

require_once('src/Controllers/HomePageController.php');
require_once('src/Controllers/PostController.php');
require_once('src/Controllers/AddCommentController.php');

try {
    if (isset($_GET['action']) && $_GET['action'] !== '') {
        if ($_GET['action'] === 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                post($identifier);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } elseif ($_GET['action'] === 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                $identifier = $_GET['id'];

                addComment($identifier, $_POST);
            } else {
                throw new Exception('Aucun identifiant de post envoyé');
            }
        } else {
            throw new Exception('La page souhaitée n\'existe pas.');
        }
    } else {
        homepage();
    }
} catch (Exception $e) {
    $errorMessage = $e->getMessage();
    require('templates/error.php');
}
