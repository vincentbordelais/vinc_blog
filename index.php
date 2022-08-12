<?php
// ROUTEUR

require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');

if (isset($_GET['id']) && $_GET['id'] !== '') {
    if ($_GET['action'] === 'post') {
        if (isset($_GET['id']) && $_GET['id'] > 0) {
            $id = $_GET['id'];

            post($id);
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
