<?php

namespace src\Controller;

class Posts
{
    public function index(): void
    {
        echo 'Hello from the index action of the Posts controller!';
        echo '<p>Query string parameters: <pre>' .
                htmlspecialchars(print_r($_GET, true)) . '</pre></p>';
    }

    public function addNew(): void
    {
        echo 'Hello from addNew action of the Posts controller!';
    }
}