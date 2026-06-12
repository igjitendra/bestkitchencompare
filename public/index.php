<?php
require_once __DIR__ . '/../src/core/Database.php';
require_once __DIR__ . '/../src/core/Session.php';
require_once __DIR__ . '/../src/core/Helpers.php';

Session::start();

$uri = trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/');

switch (true) {
    case ($uri === ''):
        require __DIR__ . '/../src/views/pages/home.php';
        break;

    case preg_match('#^category/([a-z0-9-]+)$#', $uri, $matches):
        $_GET['slug'] = $matches[1];
        require __DIR__ . '/../src/views/pages/category.php';
        break;

    case preg_match('#^product/([a-z0-9-]+)$#', $uri, $matches):
        $_GET['slug'] = $matches[1];
        require __DIR__ . '/../src/views/pages/product.php';
        break;

    case preg_match('#^brand/([a-z0-9-]+)$#', $uri, $matches):
        $_GET['slug'] = $matches[1];
        require __DIR__ . '/../src/views/pages/brand.php';
        break;

    case ($uri === 'compare'):
        require __DIR__ . '/../src/views/pages/compare.php';
        break;

    case ($uri === 'blog'):
        require __DIR__ . '/../src/views/pages/blog-index.php';
        break;

    case preg_match('#^blog/([a-z0-9-]+)$#', $uri, $matches):
        $_GET['slug'] = $matches[1];
        require __DIR__ . '/../src/views/pages/blog-post.php';
        break;

    case ($uri === 'about'):
        require __DIR__ . '/../src/views/pages/about.php';
        break;

    case ($uri === 'privacy-policy'):
        require __DIR__ . '/../src/views/pages/privacy.php';
        break;

    case ($uri === 'contact'):
        require __DIR__ . '/../src/views/pages/contact.php';
        break;

    case ($uri === 'disclaimer'):
        require __DIR__ . '/../src/views/pages/disclaimer.php';
        break;

    default:
        http_response_code(404);
        require __DIR__ . '/../src/views/pages/404.php';
        break;
}
