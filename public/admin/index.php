<?php
require_once __DIR__ . '/../../src/core/Database.php';
require_once __DIR__ . '/../../src/core/Session.php';
require_once __DIR__ . '/../../src/core/Auth.php';
require_once __DIR__ . '/../../src/core/Helpers.php';

Auth::requireAuth();
$pdo = Database::getInstance();

$stats = [
    'products' => $pdo->query("SELECT COUNT(*) FROM products")->fetchColumn(),
    'posts' => $pdo->query("SELECT COUNT(*) FROM blog_posts")->fetchColumn(),
    'brands' => $pdo->query("SELECT COUNT(*) FROM brands")->fetchColumn(),
    'categories' => $pdo->query("SELECT COUNT(*) FROM categories")->fetchColumn(),
];

$recentProducts = $pdo->query("SELECT id, model_name, published, created_at FROM products ORDER BY id DESC LIMIT 5")->fetchAll();
$recentPosts = $pdo->query("SELECT id, title, published, published_at FROM blog_posts ORDER BY id DESC LIMIT 5")->fetchAll();
$messages = $pdo->query("SELECT id, name, email, status, created_at FROM contact_messages ORDER BY id DESC LIMIT 5")->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard - BestKitchenCompare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100">
<div class="flex min-h-screen">
    <aside class="hidden w-72 bg-slate-900 p-6 text-white lg:block">
        <div class="text-2xl font-black">BestKitchenCompare</div>
        <nav class="mt-8 space-y-2">
            <a href="/admin/index.php" class="block rounded-2xl bg-slate-800 px-4 py-3">Dashboard</a>
            <a href="/admin/products.php" class="block rounded-2xl px-4 py-3 hover:bg-slate-800">Products</a>
            <a href="/admin/brands.php" class="block rounded-2xl px-4 py-3 hover:bg-slate-800">Brands</a>
            <a href="/admin/categories.php" class="block rounded-2xl px-4 py-3 hover:bg-slate-800">Categories</a>
            <a href="/admin/blog.php" class="block rounded-2xl px-4 py-3 hover:bg-slate-800">Blog</a>
            <a href="/admin/messages.php" class="block rounded-2xl px-4 py-3 hover:bg-slate-800">Messages</a>
            <a href="/admin/newsletter.php" class="block rounded-2xl px-4 py-3 hover:bg-slate-800">Newsletter</a>
            <a href="/admin/settings.php" class="block rounded-2xl px-4 py-3 hover:bg-slate-800">Settings</a>
            <a href="/admin/logout.php" class="block rounded-2xl px-4 py-3 text-red-300 hover:bg-slate-800">Logout</a>
        </nav>
    </aside>

    <main class="flex-1 p-6 lg:p-8">
        <div class="mb-8 flex items-center justify-between">
            <div>
                <h1 class="text-3xl font-black tracking-tight">Dashboard</h1>
                <p class="mt-2 text-slate-600">Overview of products, content, and inbound leads.</p>
            </div>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            <div class="rounded-3xl bg-white p-6 shadow-sm"><div class="text-sm text-slate-500">Total Products</div><div class="mt-2 text-3xl font-black"><?= (int)$stats['products'] ?></div></div>
            <div class="rounded-3xl bg-white p-6 shadow-sm"><div class="text-sm text-slate-500">Blog Posts</div><div class="mt-2 text-3xl font-black"><?= (int)$stats['posts'] ?></div></div>
            <div class="rounded-3xl bg-white p-6 shadow-sm"><div class="text-sm text-slate-500">Brands</div><div class="mt-2 text-3xl font-black"><?= (int)$stats['brands'] ?></div></div>
            <div class="rounded-3xl bg-white p-6 shadow-sm"><div class="text-sm text-slate-500">Categories</div><div class="mt-2 text-3xl font-black"><?= (int)$stats['categories'] ?></div></div>
        </div>

        <div class="mt-8 grid gap-6 xl:grid-cols-3">
            <section class="rounded-3xl bg-white p-6 shadow-sm">
                <h2 class="text-lg font-bold">Recent Products</h2>
                <div class="mt-4 space-y-3">
                    <?php foreach ($recentProducts as $row): ?>
                        <div class="flex items-center justify-between rounded-2xl border border-slate-100 px-4 py-3">
                            <span class="text-sm font-medium"><?= e($row['model_name']) ?></span>
                            <span class="rounded-full px-3 py-1 text-xs <?= $row['published'] ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600' ?>">
                                <?= $row['published'] ? 'Published' : 'Draft' ?>
                            </span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
    </main>
</div>
</body>
</html>
