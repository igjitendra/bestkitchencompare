# BestKitchenCompare

Premium PHP + MySQL affiliate website for home and kitchen appliance comparisons.

## Requirements
- PHP 8.1+
- MySQL 8+
- Apache with mod_rewrite
- Composer optional
- Node optional if compiling Tailwind locally

## Setup
1. Create database `bestkitchencompare`.
2. Import `database/schema.sql`.
3. Import `seeds/sample_data.sql`.
4. Update `src/config/database.php`.
5. Point web root to `/public`.
6. Ensure `public/assets/uploads/` is writable.
7. Create admin password hash with PHP and insert admin row.
8. Open homepage and admin login.

## Admin Login
- URL: `/admin/login.php`
- Username: `admin`
- Password: `Admin@123456` after inserting the correct hash.

## Rules implemented
- No product price displayed anywhere.
- All affiliate CTAs use: `Check Latest Price on Amazon`
- Affiliate links open in new tab with `rel="nofollow sponsored noopener"`.

## SEO
- Canonicals
- Open Graph
- Twitter Cards
- JSON-LD
- robots.txt
- sitemap.xml
- llms.txt
