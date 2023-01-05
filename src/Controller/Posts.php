<?php

namespace App\Controller;

use App\Repository\PostsRepository;
use Core\View;

class Posts
{
    public function index(): void
    {
       $posts = PostsRepository::getTitledContent();
        //echo '<pre>';
        //echo htmlspecialchars(print_r($posts, true));
        //echo '</pre>';
       
       View::render('Posts/index.php', [
        'posts' => $posts
       ]);
    }

    public function getSingleAccess(): void
    {
        $postId = 3;
        foreach (PostsRepository::accessArray($postId) as $arrayValue) {
            $singleContent = $arrayValue->content;
        }
        //echo $singleContent;

        foreach (PostsRepository::accessArray($postId) as $arrayValue) {
            $singleTitle = $arrayValue->title;
        }
        //echo $singleTitle;

        View::render('Posts/getSingleAccess.php', [
            'singleContent' => $singleContent,
            'singleTitle' => $singleTitle,
           ]);
    }

    public function getCont(): void
    {
        $postId = 2;
        $testVar = PostsRepository::getSecondContent($postId);
        //echo $testVar;
        //echo '<pre>';
        //var_dump($router->getRoutes());
        //echo htmlspecialchars(print_r($testVar, true));
        //echo '</pre>';

        View::render('Posts/getCont.php', [
            'testVar' => $testVar
           ]);
    }
}