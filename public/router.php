<?php

// Get the request URI and parse it to get the path
$request_uri = $_SERVER['REQUEST_URI'] ?? '/';
// Parse the request URI to get the path component
$request_path = parse_url($request_uri, PHP_URL_PATH) ?? '/';
// Decode the URI to get the actual path
$uri = rawurldecode($request_path);

// Prevent direct access to this router script
// ( both in Apache server and in PHP's built-in server )
if (basename($uri) === basename(__FILE__)) {
    // This file is being accessed directly
    // You can log, block, or redirect as needed
    exit('Direct access not allowed.');
}

// Handle requests for .md files
if (str_ends_with($uri, '.md')) {
    // Check if the view=html query parameter is present
    if (@$_GET['view'] === 'html') {
        require __DIR__ . '/../php/markdown.php';
        exit;
    }
}
return false; // Let PHP's built-in server handle static files
