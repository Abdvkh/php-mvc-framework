<?php

require_once __DIR__ . '/vendor/autoload.php';

//$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
//$dotenv->load();

use app\core\Application;
use app\controllers\SiteController;

$config = [
    'db' => [
        'dsn' => 'mysql:host=127.0.0.1;port3306;dbname=mvc_framework',// $_ENV['DB_DSN'],
        'user' => 'root',//$_ENV['DB_USER'],
        'password' => ''//$_ENV['DB_PASSWORD']
    ]
];

$app = new Application(__DIR__, $config);

$app->db->applyMigrations();