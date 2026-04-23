<?php

// Get the request URI and parse it to get the path
$request_uri = $_SERVER['REQUEST_URI'] ?? '/';
// Parse the request URI to get the path component
$request_path = parse_url($request_uri, PHP_URL_PATH) ?? '/';
// Decode the URI to get the actual path
$uri = rawurldecode($request_path);

// Handle requests for .md files
if (str_ends_with($uri, '.md')) {
    // Check if the view=html query parameter is present
    if (@$_GET['view'] === 'html') {
        require __DIR__ . '/../php/markdown.php';
        exit;
    }
}
return false; // Let PHP's built-in server handle static files
