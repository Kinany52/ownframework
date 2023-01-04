<?php

namespace App\Repository;

use PDO;
use Core\DB;

class PostsRepository
{
    public static function getTitledComment()
    {
        $stmt = DB::instance()->prepare("SELECT id, title, content FROM posts ORDER BY created_at");
        $stmt->execute([]);
        $result = $stmt->fetchAll();

        return $result;
    }

    public static function getSecondContent(int $id)
    {
        $stmt = DB::instance()->prepare("SELECT content FROM posts WHERE id=? ORDER BY created_at");
        $stmt->execute([$id]);
        $result = $stmt->fetchAll();

        return $result;
    }
}