<?php

namespace App\Entity;

class ProductsEntity
{
    public function __construct(
        public int $id,
        public string $name,
        public string $size
    )
    {}

    public function toArray()
    {
        return [$this->id, $this->name, $this->size];
    }
}