<article class="group overflow-hidden rounded-3xl border border-slate-200 bg-white shadow-sm transition hover:-translate-y-1 hover:shadow-xl">
    <a href="/product/<?= e($product['slug']) ?>" class="block">
        <div class="aspect-[4/3] overflow-hidden bg-slate-100">
            <img src="<?= e($product['featured_image'] ?: '/assets/images/placeholder.svg') ?>"
                 alt="<?= e($product['model_name']) ?>"
                 class="h-full w-full object-cover transition duration-500 group-hover:scale-105"
                 loading="lazy">
        </div>
    </a>

    <div class="space-y-4 p-5">
        <div class="flex flex-wrap gap-2">
            <span class="rounded-full bg-slate-100 px-3 py-1 text-xs font-semibold text-slate-700"><?= e($product['brand_name']) ?></span>
            <span class="rounded-full bg-emerald-50 px-3 py-1 text-xs font-semibold text-emerald-700"><?= e($product['category_name']) ?></span>
        </div>

        <div>
            <h3 class="line-clamp-2 text-lg font-bold tracking-tight text-slate-900">
                <a href="/product/<?= e($product['slug']) ?>"><?= e($product['model_name']) ?></a>
            </h3>
            <p class="mt-2 text-sm text-slate-600"><?= e($product['short_highlight']) ?></p>
        </div>

        <ul class="space-y-2 text-sm text-slate-600">
            <li>Power: <?= e($product['power_watts'] ?: '—') ?></li>
            <li>Capacity: <?= e($product['capacity'] ?: '—') ?></li>
            <li>Warranty: <?= e($product['warranty'] ?: '—') ?></li>
        </ul>

        <div class="grid grid-cols-1 gap-3 sm:grid-cols-2">
            <a href="/compare?ids=<?= (int)$product['id'] ?>"
               class="inline-flex items-center justify-center rounded-2xl border border-slate-300 px-4 py-3 text-sm font-semibold text-slate-700 transition hover:border-slate-400 hover:bg-slate-50">
               Compare
            </a>
            <?php include __DIR__ . '/cta-button.php'; ?>
        </div>
    </div>
</article>
