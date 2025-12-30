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

// Buat direktori storage yang dibutuhkan jika belum ada
if (!is_dir($_ENV['APP_STORAGE'] . '/framework/views')) {
    mkdir($_ENV['APP_STORAGE'] . '/framework/views', 0755, true);
}
if (!is_dir($_ENV['APP_STORAGE'] . '/framework/sessions')) {
    mkdir($_ENV['APP_STORAGE'] . '/framework/sessions', 0755, true);
}
if (!is_dir($_ENV['APP_STORAGE'] . '/framework/cache')) {
    mkdir($_ENV['APP_STORAGE'] . '/framework/cache', 0755, true);
}
if (!is_dir($_ENV['APP_STORAGE'] . '/logs')) {
    mkdir($_ENV['APP_STORAGE'] . '/logs', 0755, true);
}


// Handle Request
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$request = Illuminate\Http\Request::capture();
$response = $kernel->handle($request);

$response->send();

$kernel->terminate($request, $response);

