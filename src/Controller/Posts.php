<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use Core\View;

class Posts
{
    public function index(): void
    {
       $posts = PostsRepository::getTitledComment();
       var_dump($posts);
       View::render('Posts/index.php', [
        //'posts' => $posts
       ]);
    }

    public function addNew(): void
    {
        echo 'Hello from addNew action of the Posts controller!';
    }

    public function getCont(): void
    {
        $testVar = PostsRepository::getSecondContent(2);
        var_dump($testVar);
    }
}