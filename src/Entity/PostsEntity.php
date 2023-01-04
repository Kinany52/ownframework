<?php

namespace App\Entity;

class PostsEntity
{
    public function __construct(
        public int $id,
        public string $title,
        public string $content,
        public string $created_at
    )
    {}
}