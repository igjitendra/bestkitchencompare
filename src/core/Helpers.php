<?php
function e(?string $value): string {
    return htmlspecialchars((string)$value, ENT_QUOTES, 'UTF-8');
}

function slugify(string $text): string {
    $text = strtolower(trim($text));
    $text = preg_replace('/[^a-z0-9]+/i', '-', $text);
    return trim($text, '-');
}

function site_url(string $path = ''): string {
    return rtrim((require __DIR__ . '/../config/app.php')['app']['url'], '/') . '/' . ltrim($path, '/');
}

function affiliate_button_label(): string {
    return 'Check Latest Price on Amazon';
}

function affiliate_disclosure(): string {
    return 'As an Amazon Associate, I earn from qualifying purchases.';
}

function is_active_path(string $path): bool {
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    return $uri === $path;
}
