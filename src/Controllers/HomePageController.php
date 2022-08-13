<?php

require_once('src/Model/Post.php');
require_once('src/Lib/Database.php');

use Application\Model\Post\PostRepository;
use Application\Lib\Database\DatabaseConnection;

function homepage()
{
    $postRepository = new PostRepository;
    $postRepository->connection = new DatabaseConnection();
    $posts = $postRepository->getPosts();
    // $posts = getPosts();

    require('templates/homepage.php');
}
