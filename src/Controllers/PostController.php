<?php

require_once('src/Model/Post.php');
require_once('src/Model/Comment.php');
require_once('src/Lib/Database.php');

use Application\Model\Post\PostRepository;
use Application\Model\Comment\CommentRepository;
use Application\Lib\Database\DatabaseConnection;

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
