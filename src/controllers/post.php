<?php

require_once('src/model/post.php');
require_once('src/model/comment.php');

function post(string $id)
{
    $post = getPost($id);
    $comments = getComments($id);

    require('templates/post.php');
}
