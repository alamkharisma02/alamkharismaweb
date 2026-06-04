<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Auto-initialize SQLite database if missing/empty
$dbPath = __DIR__.'/database/database.sqlite';
$isNewDb = !file_exists($dbPath) || filesize($dbPath) == 0;
if ($isNewDb) {
    $dbDir = dirname($dbPath);
    if (!is_dir($dbDir)) {
        @mkdir($dbDir, 0755, true);
    }
    @touch($dbPath);
}

// Determine if the application is in maintenance mode...
if (file_exists($maintenance = __DIR__.'/storage/framework/maintenance.php')) {
    require $maintenance;
}

// Register the Composer autoloader...
require __DIR__.'/vendor/autoload.php';

// Bootstrap Laravel and handle the request...
/** @var Application $app */
$app = require_once __DIR__.'/bootstrap/app.php';

if ($isNewDb) {
    try {
        $kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
        $kernel->call('migrate', ['--force' => true, '--seed' => true]);
    } catch (\Exception $e) {
        // Silently fall back if there's any config mismatch
    }
}

$app->handleRequest(Request::capture());
