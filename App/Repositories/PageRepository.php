<?php

namespace App\Repositories;

use App\Models\Page;
use PDO;

class PageRepository extends Repository
{
    private string $className = Page::class;

    public function getAll(): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM pages;");
        $statement->execute();

        return $statement->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function getFirst(int $id): null|object
    {
        $statement = $this->pdo->prepare("SELECT * FROM pages WHERE id=:id;");
        $statement->execute([':id' => $id]);

        $page = $statement->fetchObject($this->className);

        if ($page instanceof $this->className === false) {
            return null;
        }

        return $page;
    }
}