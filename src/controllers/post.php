<?php

require_once('src/model.php');

function post(string $id)
{
    $post = getPost($id);
    $comments = getComments($id);

    require('templates/post.php');
}
