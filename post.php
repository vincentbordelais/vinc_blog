<?php

require('src/model.php');

if (isset($_GET['id']) && $_GET['id'] > 0) {
    $id = $_GET['id'];
} else {
    echo 'Erreur : aucun identifiant de billet envoyé';

    die;
}

$post = getPost($id);
$comments = getComments($id);

require('templates/post.php');
