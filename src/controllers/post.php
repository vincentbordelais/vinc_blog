<?php

require_once('src/model/post.php');
require_once('src/model/comment.php');
require_once('src/lib/database.php');

function post(string $identifier)
{
    $postRepository = new PostRepository;
    $postRepository->connection = new DatabaseConnection();
    $post = $postRepository->getPost($identifier);
    // $post = getPost($identifier);
    $commentRepository = new CommentRepository();
    $commentRepository->connection = new DatabaseConnection();;
    $comments = $commentRepository->getComments($identifier);

    require('templates/post.php');
}
