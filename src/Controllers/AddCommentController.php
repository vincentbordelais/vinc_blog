<?php

require_once('src/Model/Comment.php');
require_once('src/Lib/Database.php');

use Application\Model\Comment\CommentRepository;
use Application\Lib\Database\DatabaseConnection;

function addComment(string $post, array $input)
{
    $author = null;
    $comment = null;
    if (!empty($input['author']) && !empty($input['comment'])) {
        $author = $input['author'];
        $comment = $input['comment'];
    } else {
        throw new Exception('Les données du formulaire sont invalides.');
    }

    $commentRepository = new CommentRepository();
    $commentRepository->connection = new DatabaseConnection();
    $success = $commentRepository->createComment($post, $author, $comment);
    if (!$success) {
        throw new Exception('Impossible d\'ajouter le commentaire !');
    } else {
        header('Location: index.php?action=post&id=' . $post); // Redirection
    }
}
