<?php

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// Auto-initialize SQLite database if missing/empty
$dbPath = __DIR__.'/database/database.sqlite';
if (file_exists(__DIR__.'/.env')) {
    $envContent = @file_get_contents(__DIR__.'/.env');
    if ($envContent !== false) {
        if (preg_match('/^DB_DATABASE=(.+)$/m', $envContent, $matches)) {
            $parsedPath = trim($matches[1], " \t\n\r\0\x0B\"'");
            // Check if it is an absolute path or relative
            if (strpos($parsedPath, '/') === 0 || strpos($parsedPath, '\\') === 0 || preg_match('/^[a-zA-Z]:/', $parsedPath)) {
                $dbPath = $parsedPath;
            } else {
                $dbPath = __DIR__ . '/' . $parsedPath;
            }
        }
    }
}

$isNewDb = !file_exists($dbPath) || filesize($dbPath) == 0;
if ($isNewDb) {
    $dbDir = dirname($dbPath);
    if (!is_dir($dbDir)) {
        @mkdir($dbDir, 0755, true);
    }
    @touch($dbPath);
}

// Auto-create/fix storage symlink if missing or broken
$storageLink = __DIR__.'/public/storage';
$storageTarget = '../storage/app/public'; // Relative to the public/ directory where the symlink is placed
if (!file_exists($storageLink) && !is_link($storageLink)) {
    try {
        if (function_exists('symlink')) {
            @symlink($storageTarget, $storageLink);
        }
    } catch (\Throwable $e) {
        // Suppress any symlink errors on restricted hosting environments
    }
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

// Only run auto-migration and seeding on local environment (prevent production database wipes)
$isLocal = false;
if (file_exists(__DIR__.'/.env')) {
    $envContent = @file_get_contents(__DIR__.'/.env');
    if ($envContent !== false && preg_match('/^APP_ENV=local/m', $envContent)) {
        $isLocal = true;
    }
}

if ($isNewDb && $isLocal) {
    try {
        $kernel = $app->make(\Illuminate\Contracts\Console\Kernel::class);
        $kernel->call('migrate', ['--force' => true, '--seed' => true]);
    } catch (\Throwable $e) {
        // Silently fall back if there's any config or permission mismatch
    }
}

$app->handleRequest(Request::capture());
