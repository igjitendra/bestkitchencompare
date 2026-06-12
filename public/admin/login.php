<?php
require_once __DIR__ . '/../../src/core/Database.php';
require_once __DIR__ . '/../../src/core/Session.php';
require_once __DIR__ . '/../../src/core/Auth.php';
require_once __DIR__ . '/../../src/core/CSRF.php';
require_once __DIR__ . '/../../src/core/Helpers.php';

Session::start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!CSRF::verify($_POST['_csrf_token'] ?? '')) {
        Session::flash('error', 'Invalid security token.');
        header('Location: /admin/login.php');
        exit;
    }

    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if (Auth::login($username, $password)) {
        header('Location: /admin/index.php');
        exit;
    }

    Session::flash('error', 'Invalid login credentials.');
    header('Location: /admin/login.php');
    exit;
}

$error = Session::flash('error');
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Login - BestKitchenCompare</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="flex min-h-screen items-center justify-center bg-slate-100 p-4">
    <div class="w-full max-w-md rounded-3xl bg-white p-8 shadow-2xl">
        <div class="mb-8 text-center">
            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-2xl bg-emerald-600 text-xl font-black text-white">BK</div>
            <h1 class="mt-4 text-2xl font-black">Admin Login</h1>
            <p class="mt-2 text-sm text-slate-500">BestKitchenCompare dashboard access</p>
        </div>

        <?php if ($error): ?>
            <div class="mb-4 rounded-2xl bg-red-50 px-4 py-3 text-sm text-red-700"><?= e($error) ?></div>
        <?php endif; ?>

        <form method="post" class="space-y-4">
            <?= CSRF::input() ?>
            <div>
                <label class="mb-2 block text-sm font-semibold">Username</label>
                <input type="text" name="username" required class="w-full rounded-2xl border border-slate-300 px-4 py-3 outline-none focus:border-emerald-500">
            </div>
            <div>
                <label class="mb-2 block text-sm font-semibold">Password</label>
                <input type="password" name="password" required class="w-full rounded-2xl border border-slate-300 px-4 py-3 outline-none focus:border-emerald-500">
            </div>
            <button class="w-full rounded-2xl bg-slate-900 px-4 py-3 font-bold text-white hover:bg-slate-800">Sign in</button>
        </form>
    </div>
</body>
</html>
