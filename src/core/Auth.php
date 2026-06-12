<?php
class Auth {
    public static function login(string $username, string $password): bool {
        $pdo = Database::getInstance();
        $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = :username AND status = 'active' LIMIT 1");
        $stmt->execute(['username' => $username]);
        $admin = $stmt->fetch();

        if ($admin && password_verify($password, $admin['password_hash'])) {
            Session::start();
            session_regenerate_id(true);
            Session::set('admin_id', $admin['id']);
            Session::set('admin_username', $admin['username']);
            return true;
        }
        return false;
    }

    public static function check(): bool {
        Session::start();
        return Session::has('admin_id');
    }

    public static function requireAuth(): void {
        if (!self::check()) {
            header('Location: /admin/login.php');
            exit;
        }
    }

    public static function logout(): void {
        Session::start();
        Session::destroy();
    }
}
