INSERT INTO brands (name, slug, intro, published) VALUES
('Philips', 'philips', 'Trusted appliance brand for modern kitchens.', 1),
('Preethi', 'preethi', 'Popular Indian kitchen appliance brand.', 1),
('Prestige', 'prestige', 'Known for cooktops and cookware.', 1),
('IFB', 'ifb', 'Home appliance brand with strong kitchen lineup.', 1),
('Kent', 'kent', 'Water purification and health-focused appliances.', 1);

INSERT INTO categories (name, slug, description, featured, published) VALUES
('Air Fryers', 'air-fryers', 'Oil-light cooking appliances for modern kitchens.', 1, 1),
('Mixer Grinders & Blenders', 'mixer-grinders-blenders', 'Everyday prep tools for blending and grinding.', 1, 1),
('Induction Cooktops', 'induction-cooktops', 'Portable and efficient electric cooking solutions.', 1, 1),
('Microwave Ovens', 'microwave-ovens', 'Convection and microwave cooking appliances.', 1, 1),
('Water Purifiers', 'water-purifiers', 'Home water purification systems for daily use.', 1, 1);

INSERT INTO products (
    brand_id, category_id, model_name, slug, short_description, full_description, expert_summary,
    short_highlight, power_watts, capacity, material, key_features, speed_settings, dimensions, weight,
    colors_finish, warranty, energy_rating, noise_level, compatible_with, release_year, pros, cons,
    best_for, avoid_for, affiliate_url, featured_image, meta_title, meta_description, published, featured, popularity_score
) VALUES
(1, 1, 'Philips Air Fryer HD9200', 'philips-air-fryer-hd9200', 'Compact air fryer for daily family cooking.', 'Detailed placeholder description.', 'Balanced option for compact kitchens.', 'Compact design with easy controls', '1400W', '4.1L', 'Plastic + Metal', 'Rapid Air technology, easy cleaning, adjustable temperature', '7 modes', '36 x 26 x 29 cm', '4.5 kg', 'Black', '2 years', 'BEE 4 Star', 'Low', 'Indian kitchens', 2024, 'Easy to use|Compact footprint|Reliable brand', 'Small for large families|Basic presets', 'Small families and beginners', 'Large batch cooking users', 'https://amazon.in', '/assets/images/placeholder.svg', 'Philips Air Fryer HD9200 Review & Specs', 'Check features, specs, pros, cons, and expert summary for Philips Air Fryer HD9200.', 1, 1, 95),

(2, 2, 'Preethi Mixer Grinder Zodiac', 'preethi-mixer-grinder-zodiac', 'Versatile mixer grinder for daily prep tasks.', 'Detailed placeholder description.', 'Strong all-rounder for grinding and mixing.', 'Versatile jars and attachments', '750W', '5 jars', 'Stainless Steel', 'Multiple jars, food processor support, strong motor', '3 speeds', '48 x 28 x 33 cm', '6.2 kg', 'Black/Silver', '2 years', 'NA', 'Moderate', 'Indian food prep', 2024, 'Powerful motor|Multi-use|Good brand trust', 'Can be bulky|Louder than compact units', 'Busy home cooks', 'Minimal-use buyers', 'https://amazon.in', '/assets/images/placeholder.svg', 'Preethi Zodiac Mixer Grinder Review', 'Explore specs and features of the Preethi Zodiac mixer grinder.', 1, 1, 92),

(3, 3, 'Prestige Induction Cooktop PIC 20', 'prestige-induction-cooktop-pic-20', 'Slim induction cooktop for everyday cooking.', 'Detailed placeholder description.', 'Solid budget-friendly induction pick.', 'Preset menus and slim build', '1200W', 'NA', 'Ceramic Top', 'Indian menu presets, push button controls, compact body', '7 modes', '35 x 28 x 6 cm', '2.4 kg', 'Black', '1 year', 'Energy Efficient', 'Silent', 'Induction base utensils', 2023, 'Compact|Simple controls|Easy to store', 'Lower power than premium units|Basic display', 'Students and compact kitchens', 'Heavy-duty cooking needs', 'https://amazon.in', '/assets/images/placeholder.svg', 'Prestige PIC 20 Induction Cooktop Review', 'Review the Prestige PIC 20 induction cooktop specs and suitability.', 1, 0, 88),

(4, 4, 'IFB 25L Convection Microwave', 'ifb-25l-convection-microwave', 'Convection microwave for baking, grilling, and reheating.', 'Detailed placeholder description.', 'Feature-rich microwave for mixed cooking needs.', '25L cavity and convection support', '900W', '25L', 'Steel + Glass', 'Auto cook menus, grill, convection, child lock', '10 modes', '48 x 41 x 28 cm', '14 kg', 'Black', '1 year', 'Energy Efficient', 'Moderate', 'Family kitchens', 2024, 'Versatile cooking|Good capacity|Useful presets', 'Needs counter space|Learning curve for new users', 'Families needing multi-mode cooking', 'Users wanting very compact units', 'https://amazon.in', '/assets/images/placeholder.svg', 'IFB 25L Convection Microwave Review', 'Detailed specs and expert summary for IFB 25L convection microwave.', 1, 1, 90),

(5, 5, 'Kent Grand Plus Water Purifier', 'kent-grand-plus-water-purifier', 'RO+UV+UF purifier for household water treatment.', 'Detailed placeholder description.', 'Strong fit where input water quality is inconsistent.', 'Multi-stage purification with storage tank', '60W', '8L', 'Food Grade Plastic', 'RO, UV, UF, TDS control, storage tank', 'Auto modes', '40 x 25 x 52 cm', '8.1 kg', 'White', '1 year', 'Energy Efficient', 'Low', 'Municipal and mixed water supply', 2024, 'Multi-stage purification|Good storage|Trusted category brand', 'Needs maintenance|Wall space required', 'Homes needing added purification layers', 'Areas with already-safe low-TDS water', 'https://amazon.in', '/assets/images/placeholder.svg', 'Kent Grand Plus Water Purifier Review', 'Check specs, features, and best use cases for Kent Grand Plus water purifier.', 1, 1, 94);

INSERT INTO blog_categories (name, slug) VALUES
('Best Of', 'best-of'),
('Vs Comparisons', 'vs-comparisons'),
('Buying Guides', 'buying-guides'),
('Reviews', 'reviews');

INSERT INTO blog_posts (blog_category_id, title, slug, excerpt, content, featured_image, meta_title, meta_description, featured, published)
VALUES
(1, 'Best Air Fryers for Home Kitchens', 'best-air-fryers-for-home-kitchens', 'Top options for compact and family kitchens.', '<h2>Overview</h2><p>Sample article content.</p>', '/assets/images/placeholder.svg', 'Best Air Fryers for Home Kitchens', 'Compare top air fryers for Indian home kitchens.', 1, 1),
(2, 'Philips Air Fryer HD9200 vs IFB 25L Convection Microwave', 'philips-hd9200-vs-ifb-25l-convection-microwave', 'A practical comparison between two different cooking approaches.', '<h2>Comparison</h2><p>Sample comparison article.</p>', '/assets/images/placeholder.svg', 'Philips HD9200 vs IFB 25L', 'See which appliance type fits your cooking needs better.', 0, 1);

INSERT INTO settings (setting_key, setting_value) VALUES
('site_name', 'BestKitchenCompare'),
('footer_text', 'This site contains affiliate links. We may earn a commission at no extra cost to you.'),
('default_affiliate_disclosure', 'As an Amazon Associate, I earn from qualifying purchases.'),
('amazon_button_label', 'Check Latest Price on Amazon'),
('contact_email', 'hello@bestkitchencompare.com');
