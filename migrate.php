<?php
// Standalone script to initialize/migrate database without running HTTP middlewares (prevents DB session errors)

if (empty($_GET['key']) || $_GET['key'] !== 'akbadmin123') {
    die('Akses ditolak. Gunakan URL: /migrate.php?key=akbadmin123');
}

define('LARAVEL_START', microtime(true));

// Register Composer autoloader
require __DIR__.'/vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__.'/bootstrap/app.php';

$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);

// Create sqlite database file if missing
if (config('database.default') === 'sqlite') {
    $dbPath = config('database.connections.sqlite.database');
    if (!file_exists($dbPath)) {
        $dir = dirname($dbPath);
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }
        @touch($dbPath);
        echo "File database SQLite berhasil dibuat di: " . $dbPath . "<br>";
    }
}

// Run migrate:fresh --seed --force
echo "Sedang menjalankan migrasi dan seeding database...<br>";

try {
    $status = $kernel->call('migrate:fresh', [
        '--seed' => true,
        '--force' => true
    ]);

    echo "Status: " . ($status === 0 ? '<strong style="color:green;">SUKSES</strong>' : '<strong style="color:red;">GAGAL</strong>') . "<br><br>";
    echo "Output Konsol:<br><pre>" . htmlentities(\Artisan::output()) . "</pre>";
} catch (\Exception $e) {
    echo "Terjadi error saat menjalankan migrasi: " . $e->getMessage();
}
