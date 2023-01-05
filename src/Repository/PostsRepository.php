<?php

namespace App\Repository;

use App\Entity\PostsEntity;
use Core\DB;
use Generator;

class PostsRepository
{
    public static function getTitledContent()
    {
        $stmt = DB::instance()->prepare("SELECT title, content FROM posts ORDER BY created_at");
        $stmt->execute([]);
        $result = $stmt->fetchAll();

        return $result;
    }

    public static function getSecondContent(int $id)
    {
        $stmt = DB::instance()->prepare("SELECT content FROM posts WHERE id=? ORDER BY created_at");
        $stmt->execute([$id]);
        $result = $stmt->fetchColumn();

        return $result;
    }

    public static function accessArray(int $id): Generator
    {
        $stmt = DB::instance()->prepare("SELECT * FROM posts WHERE id=?");
        $stmt->execute([$id]);
        while ($singleVal = $stmt->fetch())
		yield new PostsEntity(...$singleVal);
    }
}