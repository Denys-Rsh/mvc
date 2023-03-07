<?php

namespace App\Repositories;

use PDO;

class Repository
{
    protected PDO $pdo;

    public function __construct(array $config)
    {
        $this->pdo = $this->initPDO($config);
    }

    private function initPDO(array $config): PDO
    {
        return new PDO(
            $config['dsn'],
            $config['username'],
            $config['password'],
        );
    }
}