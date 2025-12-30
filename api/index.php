<?php

// Forward Vercel Serverless Functions requests to Laravel

// Gunakan folder /tmp untuk storage (wajib untuk Vercel read-only filesystem)
$_ENV['APP_STORAGE'] = '/tmp/storage';

/*
|--------------------------------------------------------------------------
| Run The Application
|--------------------------------------------------------------------------
*/

// Kita copy sebagian logika dari public/index.php untuk bisa memanipulasi $app sebelum handleRequest

define('LARAVEL_START', microtime(true));

// Maintenance mode check
if (file_exists($maintenance = __DIR__ . '/../storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register Autoloader
require __DIR__ . '/../vendor/autoload.php';

// Bootstrap App
$app = require_once __DIR__ . '/../bootstrap/app.php';

// FIX: Set storage path ke /tmp karena Vercel read-only
$app->useStoragePath($_ENV['APP_STORAGE']);

// Handle Request
$request = Illuminate\Http\Request::capture();
$response = $app->handleRequest($request);

$response->send();

$app->terminate();
