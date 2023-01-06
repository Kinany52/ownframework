<?php

namespace App\Repository;

use App\Entity\ProductsEntity;
use Core\DB;
use Generator;

class ProductsRepository
{
    //1st method: one way of persisting data to database
    public static function persistEntity($id, string $name, string $size)
    {
        $stmt = DB::instance()->prepare("INSERT INTO products VALUES(?, ?, ?)");
        $stmt->execute([$id, $name, $size]);
    }

    //2nd method: another way of persisting data to database
    public static function persistingEntity(ProductsEntity $productsEntity)
    {
        $stmt = DB::instance()->prepare("INSERT INTO products VALUES(?, ?, ?)");
        $stmt->execute($productsEntity->toArray());
    }

    public static function getProduct(int $id): Generator
    {
        $stmt = DB::instance()->prepare("SELECT * FROM products WHERE id=?");
        $stmt->execute([$id]);
        while ($singleVal = $stmt->fetch())
		yield new ProductsEntity(...$singleVal);
    }

    public static function updateProduct(string $size, int $id)
    {
        $stmt = DB::instance()->prepare("UPDATE products SET size=? where id=? LIMIT 1");
        $stmt->execute([$size, $id]);
    }

    public static function eraseProduct(int $id)
    {
        $stmt = DB::instance()->prepare("DELETE FROM products where id=? LIMIT 1");
        $stmt->execute([$id]);
    }
}