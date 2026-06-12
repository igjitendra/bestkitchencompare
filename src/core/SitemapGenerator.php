<?php
class SitemapGenerator {
    public static function generate(): string {
        $pdo = Database::getInstance();
        $urls = [
            site_url(''),
            site_url('blog'),
            site_url('about'),
            site_url('contact'),
            site_url('privacy-policy'),
            site_url('disclaimer'),
        ];

        foreach ($pdo->query("SELECT slug FROM categories WHERE published = 1") as $row) {
            $urls[] = site_url('category/' . $row['slug']);
        }

        foreach ($pdo->query("SELECT slug FROM brands WHERE published = 1") as $row) {
            $urls[] = site_url('brand/' . $row['slug']);
        }

        foreach ($pdo->query("SELECT slug FROM products WHERE published = 1") as $row) {
            $urls[] = site_url('product/' . $row['slug']);
        }

        foreach ($pdo->query("SELECT slug FROM blog_posts WHERE published = 1") as $row) {
            $urls[] = site_url('blog/' . $row['slug']);
        }

        $xml = new SimpleXMLElement('<urlset/>');
        $xml->addAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');

        foreach ($urls as $url) {
            $u = $xml->addChild('url');
            $u->addChild('loc', htmlspecialchars($url));
            $u->addChild('changefreq', 'weekly');
            $u->addChild('priority', '0.8');
        }

        return $xml->asXML();
    }
}
