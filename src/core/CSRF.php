<?php
class CSRF {
    public static function token(): string {
        Session::start();
        if (!Session::has('_csrf_token')) {
            Session::set('_csrf_token', bin2hex(random_bytes(32)));
        }
        return Session::get('_csrf_token');
    }

    public static function input(): string {
        return '<input type="hidden" name="_csrf_token" value="' . htmlspecialchars(self::token()) . '">';
    }

    public static function verify(?string $token): bool {
        Session::start();
        return $token && hash_equals(Session::get('_csrf_token', ''), $token);
    }
}
