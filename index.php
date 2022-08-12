<?php
// ROUTEUR

require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/add_comment.php');

if (isset($_GET['action']) && $_GET['action'] !== '') {
    if ($_GET['action'] === 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $identifier = $_GET['id'];

            post($identifier);
        } else {
            echo 'Erreur : aucun identifiant de post envoyé';
            die;
        }
    } elseif ($_GET['action'] === 'addComment') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $identifier = $_GET['id'];

            addComment($identifier, $_POST);
        } else {
            echo 'Erreur : aucun identifiant de post envoyé';
            die;
        }
    } else {
        echo 'Erreur 404 : La page souhaitée n\'existe pas.';
    }
} else {
    homepage();
}
