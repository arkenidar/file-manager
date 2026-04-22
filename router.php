<?php

// router.php

// This file is used as a router for PHP's built-in web server.
// It handles requests for .md files and redirects the root URL to index.md with view=html query parameter. 

// Get the request URI and parse it to get the path
$request_uri = $_SERVER['REQUEST_URI'] ?? '/';
// Parse the request URI to get the path component
$request_path = parse_url($request_uri, PHP_URL_PATH) ?? '/';
// Decode the URI to get the actual path
$uri = rawurldecode($request_path);

if ($uri === '/') {
    $uri = '/index.md?view=html';
    // Redirect to the index.md page with view=html query parameter
    header('Location: ' . $uri);
    exit;
}

// Handle requests for .md files
if (str_ends_with($uri, '.md')) {
    // Check if the view=html query parameter is present
    if (@$_GET['view'] === 'html') {
        require __DIR__ . '/php/markdown.php';
        exit;
    }
}
return false; // Let PHP's built-in server handle static files
