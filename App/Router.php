<?php

namespace App;

use App\Controllers\PageController;

class Router
{
    public function __construct(private readonly Config $config)
    {
        //
    }
    public function get(null|string $routeName): array
    {
        $routes = [
            'index' => [
                'className' => PageController::class,
                'method' => 'index',
                'config' => [
                    'pdo' => $this->config->get('pdo'),
                ],
            ],
            'show' => [
                'className' => PageController::class,
                'method' => 'show',
                'config' => [
                    'pdo' => $this->config->get('pdo'),
                ],
            ],
        ];

        return $routes[$routeName] ?? $routes['index'];
    }
}