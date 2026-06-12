<?php
require_once __DIR__ . '/../../src/core/Database.php';
require_once __DIR__ . '/../../src/core/Auth.php';
require_once __DIR__ . '/../../src/core/Helpers.php';

Auth::requireAuth();
$pdo = Database::getInstance();

$q = trim($_GET['q'] ?? '');
$sql = "
    SELECT p.id, p.model_name, p.slug, p.featured, p.published, b.name AS brand_name, c.name AS category_name
    FROM products p
    JOIN brands b ON p.brand_id = b.id
    JOIN categories c ON p.category_id = c.id
";
$params = [];

if ($q !== '') {
    $sql .= " WHERE p.model_name LIKE :q OR b.name LIKE :q ";
    $params['q'] = "%{$q}%";
}

$sql .= " ORDER BY p.id DESC";
$stmt = $pdo->prepare($sql);
$stmt->execute($params);
$products = $stmt->fetchAll();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Products - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-100 p-6">
    <div class="mx-auto max-w-7xl">
        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
            <div>
                <h1 class="text-3xl font-black">Products</h1>
                <p class="mt-2 text-slate-600">Manage appliance listings and affiliate-ready specs.</p>
            </div>
            <a href="/admin/product-add.php" class="rounded-2xl bg-emerald-600 px-5 py-3 font-bold text-white hover:bg-emerald-500">Add Product</a>
        </div>

        <form class="mb-6">
            <input type="text" name="q" value="<?= e($q) ?>" placeholder="Search by model or brand..."
                class="w-full rounded-2xl border border-slate-300 bg-white px-4 py-3 outline-none focus:border-emerald-500">
        </form>

        <div class="overflow-hidden rounded-3xl bg-white shadow-sm">
            <table class="min-w-full text-sm">
                <thead class="bg-slate-50 text-left text-slate-600">
                    <tr>
                        <th class="px-5 py-4">Product</th>
                        <th class="px-5 py-4">Brand</th>
                        <th class="px-5 py-4">Category</th>
                        <th class="px-5 py-4">Featured</th>
                        <th class="px-5 py-4">Status</th>
                        <th class="px-5 py-4">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    <?php foreach ($products as $product): ?>
                    <tr>
                        <td class="px-5 py-4 font-semibold"><?= e($product['model_name']) ?></td>
                        <td class="px-5 py-4"><?= e($product['brand_name']) ?></td>
                        <td class="px-5 py-4"><?= e($product['category_name']) ?></td>
                        <td class="px-5 py-4"><?= $product['featured'] ? 'Yes' : 'No' ?></td>
                        <td class="px-5 py-4">
                            <span class="rounded-full px-3 py-1 text-xs <?= $product['published'] ? 'bg-emerald-100 text-emerald-700' : 'bg-slate-100 text-slate-600' ?>">
                                <?= $product['published'] ? 'Published' : 'Draft' ?>
                            </span>
                        </td>
                        <td class="px-5 py-4">
                            <a href="/admin/product-edit.php?id=<?= (int)$product['id'] ?>" class="font-semibold text-emerald-600 hover:text-emerald-500">Edit</a>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
