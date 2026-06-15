<?php
$uri = urldecode(
    parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH) ?? ''
);

// Jika file statis (CSS, JS, Gambar, dll) ada di folder public, layani langsung
if ($uri !== '/' && file_exists(__DIR__ . '/../public' . $uri)) {
    return false;
}

// Jika tidak, arahkan request ke index.php di root folder
require_once __DIR__ . '/../index.php';
