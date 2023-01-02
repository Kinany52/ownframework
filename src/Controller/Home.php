<?php

namespace src\Controller;

use Core\View;

class Home
{
    public function index(): void
    {
        //echo 'Hello from the index action in the Home controller!';
        View::render('Home/index.php', [
            'name' => 'Sarmad',
            'colors' => ['red','blue']
        ]);
    }
}