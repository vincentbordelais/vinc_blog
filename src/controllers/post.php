<?php

require_once('src/model/post.php');
require_once('src/model/comment.php');

function post(string $identifier)
{
    $repository = new PostRepository;
    $repository->getPost($identifier);
    // $post = getPost($identifier);
    $comments = getComments($identifier);

    require('templates/post.php');
}
