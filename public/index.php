<?php

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(dirname(__DIR__));
$dotenv->load();

use abubakr\phpmvc\Application;
use app\controllers\SiteController;

$config = [
    'userClass' => \app\models\User::class,
    'db' => [
        'db' => [
            'dsn' => $_ENV['DB_DSN'],
            'dbname' => $_ENV['DB_NAME'],
            'user' => $_ENV['DB_USER'],
            'password' => $_ENV['DB_PASSWORD']
        ]
    ]
];

$app = new Application(dirname(__DIR__), $config);

$app->router->get('/', [SiteController::class, 'home']);
$app->router->get('/contact', 'contact');

$app->router->get('/contact', [SiteController::class, 'contact']);
$app->router->post('/contact', [SiteController::class, 'contact']);

$app->router->get('/login', [\app\controllers\AuthController::class, 'login']);
$app->router->post('/login', [\app\controllers\AuthController::class, 'login']);
$app->router->get('/register', [\app\controllers\AuthController::class, 'register']);
$app->router->post('/register', [\app\controllers\AuthController::class, 'register']);

$app->router->get(
    '/logout',
    [
        \app\controllers\AuthController::class,
        'logout'
    ]);

$app->router->get(
    '/profile',
    [
        \app\controllers\AuthController::class,
        'profile'
    ]);

$app->run();