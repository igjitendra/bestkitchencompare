<?php
require_once __DIR__ . '/../../core/Database.php';
require_once __DIR__ . '/../../core/Helpers.php';
$pdo = Database::getInstance();

$featuredCategories = $pdo->query("SELECT * FROM categories WHERE published = 1 ORDER BY featured DESC, name ASC LIMIT 6")->fetchAll();
$featuredProducts = $pdo->query("
    SELECT p.*, b.name AS brand_name, c.name AS category_name
    FROM products p
    JOIN brands b ON p.brand_id = b.id
    JOIN categories c ON p.category_id = c.id
    WHERE p.published = 1
    ORDER BY p.featured DESC, p.popularity_score DESC, p.id DESC
    LIMIT 8
")->fetchAll();
$latestPosts = $pdo->query("SELECT * FROM blog_posts WHERE published = 1 ORDER BY published_at DESC LIMIT 3")->fetchAll();

$pageTitle = 'BestKitchenCompare - Compare & Review Home & Kitchen Appliances';
$pageDescription = 'Premium home and kitchen appliance comparisons, reviews, and buying guides with trusted affiliate recommendations.';
include __DIR__ . '/../layouts/header.php';
?>

<main>
    <section class="bg-gradient-to-b from-white to-emerald-50/50">
        <div class="mx-auto max-w-7xl px-4 py-16 lg:px-6 lg:py-24">
            <div class="max-w-3xl">
                <span class="inline-flex rounded-full bg-emerald-100 px-4 py-2 text-sm font-semibold text-emerald-800">Trusted appliance research platform</span>
                <h1 class="mt-6 text-4xl font-black tracking-tight text-slate-900 md:text-6xl">Compare the best home & kitchen appliances with confidence.</h1>
                <p class="mt-5 max-w-2xl text-lg leading-8 text-slate-600">Discover expert comparisons, practical buying guides, and no-clutter recommendations built to help you choose better products faster.</p>

                <form action="/blog" method="get" class="mt-8 flex flex-col gap-3 rounded-3xl border border-slate-200 bg-white p-3 shadow-xl shadow-slate-200/50 sm:flex-row">
                    <input type="text" name="q" placeholder="Search products, brands, and guides..."
                           class="flex-1 rounded-2xl border border-slate-200 px-4 py-3 outline-none focus:border-emerald-500">
                    <button class="rounded-2xl bg-slate-900 px-6 py-3 font-semibold text-white hover:bg-slate-800">Search</button>
                </form>

                <div class="mt-6 text-sm text-slate-500">As an Amazon Associate, I earn from qualifying purchases.</div>
            </div>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-14 lg:px-6">
        <div class="mb-8 flex items-end justify-between">
            <div>
                <h2 class="text-2xl font-black tracking-tight">Featured categories</h2>
                <p class="mt-2 text-slate-600">Browse by appliance type and narrow down your options faster.</p>
            </div>
        </div>

        <div class="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <?php foreach ($featuredCategories as $category): ?>
                <a href="/category/<?= e($category['slug']) ?>" class="rounded-3xl border border-slate-200 bg-white p-6 shadow-sm transition hover:-translate-y-1 hover:shadow-lg">
                    <div class="text-lg font-bold"><?= e($category['name']) ?></div>
                    <p class="mt-2 text-sm text-slate-600"><?= e($category['description']) ?></p>
                </a>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-14 lg:px-6">
        <div class="mb-8">
            <h2 class="text-2xl font-black tracking-tight">Featured products</h2>
            <p class="mt-2 text-slate-600">Popular picks with strong research intent and comparison potential.</p>
        </div>

        <div class="grid gap-6 md:grid-cols-2 xl:grid-cols-4">
            <?php foreach ($featuredProducts as $product): ?>
                <?php include __DIR__ . '/../partials/product-card.php'; ?>
            <?php endforeach; ?>
        </div>
    </section>

    <section class="mx-auto max-w-7xl px-4 py-14 lg:px-6">
        <?php include __DIR__ . '/../partials/affiliate-disclosure.php'; ?>
        <div class="mt-8 grid gap-6 md:grid-cols-3">
            <div class="rounded-3xl border border-slate-200 bg-white p-6">
                <h3 class="text-lg font-bold">Why trust us</h3>
                <p class="mt-2 text-sm text-slate-600">We compare specs, usability, brand reputation, practical fit, and use-case suitability before recommending products.</p>
            </div>
            <div class="rounded-3xl border border-slate-200 bg-white p-6">
                <h3 class="text-lg font-bold">How we review</h3>
                <p class="mt-2 text-sm text-slate-600">We evaluate features, capacity, warranty, build quality, and real-world suitability for Indian households.</p>
            </div>
            <div class="rounded-3xl border border-slate-200 bg-white p-6">
                <h3 class="text-lg font-bold">Latest guides</h3>
                <p class="mt-2 text-sm text-slate-600">Find best-of roundups, head-to-head comparisons, and practical buying advice.</p>
            </div>
        </div>
    </section>
</main>

<?php include __DIR__ . '/../layouts/footer.php'; ?>
