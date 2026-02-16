<?php
// Simple router for PHP built-in server with clean URL support
$requestUri = $_SERVER['REQUEST_URI'];
$requestPath = parse_url($requestUri, PHP_URL_PATH);

// Remove query string from path for routing
$requestPath = strtok($requestPath, '?');

// Remove leading slash
$requestPath = ltrim($requestPath, '/');

// If root or empty, serve index.php
if (empty($requestPath) || $requestPath === '/') {
    require __DIR__ . '/index.php';
    return true;
}

// Clean URL routing patterns
// /category/sensors
if (preg_match('#^category/([a-zA-Z0-9-]+)$#', $requestPath, $matches)) {
    $_GET['category'] = $matches[1];
    require __DIR__ . '/codes.php';
    return true;
}

// /difficulty/beginner
if (preg_match('#^difficulty/([a-zA-Z0-9-]+)$#', $requestPath, $matches)) {
    $_GET['difficulty'] = $matches[1];
    require __DIR__ . '/codes.php';
    return true;
}

// /search/keyword
if (preg_match('#^search/(.+)$#', $requestPath, $matches)) {
    $_GET['search'] = urldecode($matches[1]);
    require __DIR__ . '/codes.php';
    return true;
}

// /codes/view-code/3 (numeric ID)
if (preg_match('#^codes/view-code/([0-9]+)$#', $requestPath, $matches)) {
    $_GET['id'] = $matches[1];
    require __DIR__ . '/view-code.php';
    return true;
}

// /codes/view-code/slug (slug-based)
if (preg_match('#^codes/view-code/([a-zA-Z0-9-]+)$#', $requestPath, $matches)) {
    $_GET['slug'] = $matches[1];
    require __DIR__ . '/view-code.php';
    return true;
}

// /codes
if ($requestPath === 'codes' || $requestPath === 'all-codes') {
    require __DIR__ . '/codes.php';
    return true;
}

// /home
if ($requestPath === 'home') {
    require __DIR__ . '/index.php';
    return true;
}

// If PHP file exists, serve it
if (file_exists(__DIR__ . '/' . $requestPath) && pathinfo($requestPath, PATHINFO_EXTENSION) === 'php') {
    require __DIR__ . '/' . $requestPath;
    return true;
}

// If file exists, serve it (static files)
if (file_exists(__DIR__ . '/' . $requestPath)) {
    return false; // Let PHP server handle static files
}

// Default to index.php (404 fallback)
require __DIR__ . '/index.php';
return true;
?>
