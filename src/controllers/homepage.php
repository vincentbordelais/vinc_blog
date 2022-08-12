<?php

require_once('src/model/post.php');

function homepage()
{
    $repository = new PostRepository;
    $posts = $repository->getPosts();
    // $posts = getPosts();

    require('templates/homepage.php');
}
