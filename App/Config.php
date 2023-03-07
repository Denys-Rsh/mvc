<?php

namespace App;
class Config
{
    private array $config;

    public function __construct()
    {
        $this->config = [
            'pdo' => [
                'dsn' => 'mysql:host=mysql;dbname=app',
                'username' => 'app',
                'password' => 'app',
            ],
        ];
    }

    public function get(string $name): array
    {
        return $this->config[mb_strtolower($name)] ?? [];
    }
}