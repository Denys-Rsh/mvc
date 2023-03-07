<?php

use App\Config;
use App\Exceptions\Viewable;
use App\Request;
use App\Response;
use App\Router;

ob_start();

define("PROJECT_DIR", realpath(__DIR__ . '/..'));

spl_autoload_register(function ($className) {
    $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    $filePath = realpath(sprintf('%s/../%s.php', __DIR__, $fileName));

    include_once $filePath;
});


$request = new Request($_SERVER);
$config = new Config();
$router = new Router($config);
$handler = $router->get($request->getQuery('route'));

$reflection = new ReflectionClass($handler['className']);
$controller = $reflection->newInstanceArgs([
    'config' => $handler['config'],
    'request' => $request,
]);

try {
    /** @var Response $view */
    $response = call_user_func_array([$controller, $handler['method']], []);
} catch (Viewable $notFoundException) {
    $response = new Response($notFoundException->getView());
    $response
        ->setCode($notFoundException->getCode());
}

$response->push();

ob_end_flush();