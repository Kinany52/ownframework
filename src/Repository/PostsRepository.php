<?php

namespace App\Repository;

use App\Entity\PostsEntity;
use Core\DB;
use Generator;

class PostsRepository
{
    //returns array of titles and contents from all rows in posts table (lIMITED to one row here)
    public static function getTitledContent()
    {
        $stmt = DB::instance()->prepare("SELECT title, content FROM posts ORDER BY created_at LIMIT 1");
        $stmt->execute([]);
        $result = $stmt->fetchAll();

        return $result;
    }

    //returns content (string) of given row by id
    public static function getSecondContent(int $id)
    {
        $stmt = DB::instance()->prepare("SELECT content FROM posts WHERE id=?");
        $stmt->execute([$id]);
        $result = $stmt->fetchColumn();

        return $result;
    }

    //returns number of affeted rows
    public static function getRowContent(int $id)
    {
        $stmt = DB::instance()->prepare("SELECT content FROM posts WHERE id=?");
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }

    //returns desired value (element of array) of the given array of row by id
    public static function accessArray(int $id): Generator
    {
        $stmt = DB::instance()->prepare("SELECT * FROM posts WHERE id=?");
        $stmt->execute([$id]);
        while ($singleVal = $stmt->fetch())
		yield new PostsEntity(...$singleVal);
    }
}