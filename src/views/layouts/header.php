<?php
$app = require __DIR__ . '/../../config/app.php';
$title = $pageTitle ?? $app['seo']['default_title'];
$description = $pageDescription ?? $app['seo']['default_description'];
$canonical = $canonicalUrl ?? site_url(trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'));
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= e($title) ?></title>
    <meta name="description" content="<?= e($description) ?>">
    <link rel="canonical" href="<?= e($canonical) ?>">

    <meta property="og:title" content="<?= e($title) ?>">
    <meta property="og:description" content="<?= e($description) ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= e($canonical) ?>">
    <meta property="og:image" content="<?= e(site_url('assets/images/placeholder.svg')) ?>">

    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= e($title) ?>">
    <meta name="twitter:description" content="<?= e($description) ?>">

    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assets/css/style.css">
    <script defer src="/assets/js/main.js"></script>
</head>
<body class="bg-slate-50 text-slate-800">
<header class="sticky top-0 z-50 border-b border-slate-200 bg-white/90 backdrop-blur">
    <div class="mx-auto flex max-w-7xl items-center justify-between px-4 py-4 lg:px-6">
        <a href="/" class="flex items-center gap-3">
            <div class="flex h-10 w-10 items-center justify-center rounded-2xl bg-emerald-600 text-white font-bold">BK</div>
            <div>
                <div class="text-lg font-extrabold tracking-tight">BestKitchenCompare</div>
                <div class="text-xs text-slate-500">Home & Kitchen Appliance Research</div>
            </div>
        </a>
        <nav class="hidden gap-6 md:flex">
            <a href="/" class="text-sm font-medium hover:text-emerald-600">Home</a>
            <a href="/blog" class="text-sm font-medium hover:text-emerald-600">Blog</a>
            <a href="/about" class="text-sm font-medium hover:text-emerald-600">About</a>
            <a href="/contact" class="text-sm font-medium hover:text-emerald-600">Contact</a>
        </nav>
    </div>
</header>
