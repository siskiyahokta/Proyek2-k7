/*! -------------------------------------------------------
  Simplex Game Center - Full DB Schema & Seed (MySQL 8)
  Kompatibel dengan phpMyAdmin (gunakan tab SQL atau Import)
-------------------------------------------------------- */

-- Membuat database dan memilihnya
CREATE DATABASE IF NOT EXISTS `simplexgamecenter`
  CHARACTER SET utf8mb4
  COLLATE utf8mb4_unicode_ci;
USE `simplexgamecenter`;

-- Opsional: set sql_mode aman
SET NAMES utf8mb4;
SET time_zone = '+00:00';

-- ======================================================
-- Tabel: users
-- ======================================================
-- Tabel users untuk autentikasi dasar (Laravel-style)
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id`              BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name`            VARCHAR(100)    NOT NULL,
  `email`           VARCHAR(191)    NOT NULL,
  `email_verified_at` DATETIME NULL,
  `password`        VARCHAR(255)    NOT NULL,
  `remember_token`  VARCHAR(100)    NULL,
  `role`            ENUM('admin','user') NOT NULL DEFAULT 'user',
  `created_at`      TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`      TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Seed user admin (password: "password" - hash default Laravel)
INSERT INTO `users` (`name`, `email`, `password`, `role`)
VALUES ('Administrator', 'admin@example.com', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'admin');

-- ======================================================
-- Tabel: games
-- ======================================================
-- Tabel games untuk katalog game
DROP TABLE IF EXISTS `games`;
CREATE TABLE `games` (
  `id`            BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug`          VARCHAR(191)    NOT NULL,
  `title`         VARCHAR(200)    NOT NULL,
  `description`   TEXT            NULL,
  `genre`         VARCHAR(100)    NULL,
  `developer`     VARCHAR(150)    NULL,
  `publisher`     VARCHAR(150)    NULL,
  `release_year`  SMALLINT        NULL,
  `age_rating`    VARCHAR(20)     NULL,
  `platform`      ENUM('ps4','ps5','both') NOT NULL DEFAULT 'both',
  `cover_image`   VARCHAR(255)    NULL,
  `created_at`    TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`    TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `games_slug_unique` (`slug`),
  KEY `games_platform_idx` (`platform`),
  KEY `games_title_idx` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- Tabel: game_images
-- ======================================================
-- Tabel images pendukung tiap game (galeri)
DROP TABLE IF EXISTS `game_images`;
CREATE TABLE `game_images` (
  `id`         BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `game_id`    BIGINT UNSIGNED NOT NULL,
  `url`        VARCHAR(255)    NOT NULL,
  `position`   INT             NOT NULL DEFAULT 0,
  `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `game_images_game_id_idx` (`game_id`),
  CONSTRAINT `game_images_game_id_fk`
    FOREIGN KEY (`game_id`) REFERENCES `games` (`id`)
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- Tabel: consoles
-- ======================================================
-- Tabel konsol PS untuk disewa
DROP TABLE IF EXISTS `consoles`;
CREATE TABLE `consoles` (
  `id`            BIGINT UNSIGNED  NOT NULL AUTO_INCREMENT,
  `name`          VARCHAR(50)      NOT NULL,
  `type`          ENUM('ps4','ps5') NOT NULL,
  `status`        ENUM('available','rented') NOT NULL DEFAULT 'available',
  `hourly_rate`   INT UNSIGNED     NOT NULL,          -- harga per jam dalam IDR
  `rented_until`  DATETIME         NULL,              -- jika rented, kapan selesai
  `created_at`    TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`    TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `consoles_type_status_idx` (`type`, `status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- Tabel: payments
-- ======================================================
-- Tabel pembayaran (integrasi Midtrans/Snap)
DROP TABLE IF EXISTS `payments`;
CREATE TABLE `payments` (
  `id`               BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `provider`         VARCHAR(50)     NOT NULL DEFAULT 'midtrans',
  `provider_token`   VARCHAR(191)    NULL,
  `provider_order_id`VARCHAR(191)    NULL,
  `status`           ENUM('pending','paid','failed','expired','cancelled') NOT NULL DEFAULT 'pending',
  `gross_amount`     INT UNSIGNED    NOT NULL,
  `currency`         CHAR(3)         NOT NULL DEFAULT 'IDR',
  `payload`          JSON            NULL,            -- response/raw data dari gateway
  `created_at`       TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`       TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `payments_status_idx` (`status`),
  KEY `payments_provider_order_idx` (`provider_order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- Tabel: rentals
-- ======================================================
-- Tabel transaksi sewa konsol
DROP TABLE IF EXISTS `rentals`;
CREATE TABLE `rentals` (
  `id`              BIGINT UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id`         BIGINT UNSIGNED NULL,            -- boleh null untuk guest booking
  `console_id`      BIGINT UNSIGNED NOT NULL,
  `payment_id`      BIGINT UNSIGNED NULL,
  `start_time`      DATETIME        NOT NULL,
  `end_time`        DATETIME        NOT NULL,
  `duration_minutes`INT UNSIGNED    NOT NULL,
  `price_per_hour`  INT UNSIGNED    NOT NULL,
  `total_amount`    INT UNSIGNED    NOT NULL,
  `status`          ENUM('pending','paid','cancelled','expired','completed') NOT NULL DEFAULT 'pending',
  `created_at`      TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at`      TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `rentals_console_time_idx` (`console_id`, `start_time`, `end_time`),
  KEY `rentals_status_idx` (`status`),
  CONSTRAINT `rentals_user_id_fk`
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
    ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `rentals_console_id_fk`
    FOREIGN KEY (`console_id`) REFERENCES `consoles` (`id`)
    ON DELETE RESTRICT ON UPDATE CASCADE,
  CONSTRAINT `rentals_payment_id_fk`
    FOREIGN KEY (`payment_id`) REFERENCES `payments` (`id`)
    ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ======================================================
-- Seed: consoles (4 PS4 + 4 PS5)
-- ======================================================
-- 8 unit konsol dengan harga per jam berbeda
INSERT INTO `consoles` (`name`, `type`, `status`, `hourly_rate`, `rented_until`)
VALUES
  ('PS4-1', 'ps4', 'available', 10000, NULL),
  ('PS4-2', 'ps4', 'available', 10000, NULL),
  ('PS4-3', 'ps4', 'available', 10000, NULL),
  ('PS4-4', 'ps4', 'available', 10000, NULL),
  ('PS5-1', 'ps5', 'available', 15000, NULL),
  ('PS5-2', 'ps5', 'available', 15000, NULL),
  ('PS5-3', 'ps5', 'available', 15000, NULL),
  ('PS5-4', 'ps5', 'available', 15000, NULL);

-- ======================================================
-- Seed: games (subset utama sesuai yang ada di kode)
-- Catatan: image path mengacu ke folder public/images/games/* bila tersedia
-- ======================================================
INSERT INTO `games`
(`slug`,`title`,`description`,`genre`,`developer`,`publisher`,`release_year`,`age_rating`,`platform`,`cover_image`)
VALUES
('pes-2026-patch-monster','PES 2026 Patch Monster','Patch update untuk pengalaman sepak bola terbaru.','Sports','Konami','Konami',2026,'E','both','images/games/pes2026patchmonster-cover.jpg'),
('pes-2026-eleven','PES 2026 Eleven','Versi Eleven dengan peningkatan gameplay.','Sports','Konami','Konami',2026,'E','both','images/games/pes2026eleven-cover.jpg'),
('street-fighter','Street Fighter','Pertarungan klasik dengan roster ikonik.','Fighting','Capcom','Capcom',2018,'T','both','images/games/streetfighter-cover.jpg'),
('naruto-x-boruto','Naruto x Boruto','Aksi ninja seru dari dunia Naruto & Boruto.','Action','Bandai Namco','Bandai Namco',2020,'T','both','images/games/narutoxboruto-cover.jpg'),
('injustice','Injustice: Gods Among Us','Pertarungan superhero DC dengan jalan cerita gelap.','Fighting','NetherRealm','WB Games',2013,'T','both','images/games/injustice1-cover.jpg'),
('injustice-2','Injustice 2','Sekuel dengan sistem gear dan cerita epik.','Fighting','NetherRealm','WB Games',2017,'T','both','images/games/injustice2-cover.jpg'),
('it-takes-two','It Takes Two','Co-op puzzle adventure yang hangat & kreatif.','Adventure','Hazelight','EA',2021,'T','both','images/games/ittakestwo-cover.jpg'),
('nba-2k25','NBA 2K25','Simulasi basket realistis edisi 2025.','Sports','Visual Concepts','2K',2025,'E','both','images/games/nba2k25-cover.jpg'),
('overcooked','Overcooked!','Chaos dapur seru, cocok untuk party.','Party Simulation','Ghost Town Games','Team17',2016,'E','both','images/games/overcooked-cover.jpg'),
('gta5','GTA V','Open world legendaris di Los Santos.','Action','Rockstar North','Rockstar Games',2013,'M','both','images/games/gta5-cover.jpg'),
('downhills','Downhills','Balap sepeda downhill menantang.','Racing','Unknown','Unknown',2019,'E','both','images/games/downhills-cover.jpg'),
('fc25','EA Sports FC 25','Sepak bola modern pengganti FIFA.','Sports','EA Vancouver','EA',2025,'E','both','images/games/fc25-cover.jpg'),
('street-fighter-6','Street Fighter 6','Iterasi terbaru dengan mekanik modern.','Fighting','Capcom','Capcom',2023,'T','both','images/games/streetfighter6-cover.jpg');

-- Tambahkan beberapa contoh image untuk 3 game pertama
INSERT INTO `game_images` (`game_id`, `url`, `position`)
SELECT g.id, img.url, img.pos
FROM `games` g
JOIN (
  SELECT 'pes-2026-patch-monster' AS slug, 'images/games/pes2026patchmonster-1.jpg' AS url, 1 AS pos
  UNION ALL SELECT 'pes-2026-patch-monster','images/games/pes2026patchmonster-2.jpg',2
  UNION ALL SELECT 'pes-2026-eleven','images/games/pes2026eleven-1.jpg',1
  UNION ALL SELECT 'street-fighter','images/games/streetfighter-1.jpg',1
  UNION ALL SELECT 'street-fighter','images/games/streetfighter-2.jpg',2
) img ON img.slug = g.slug;

-- ======================================================
-- Contoh: satu rental dummy (pending, tanpa payment)
-- Hapus bagian ini jika tidak diperlukan
-- ======================================================
-- INSERT INTO `rentals`
-- (`user_id`,`console_id`,`payment_id`,`start_time`,`end_time`,`duration_minutes`,`price_per_hour`,`total_amount`,`status`)
-- VALUES (1, 1, NULL, NOW(), DATE_ADD(NOW(), INTERVAL 2 HOUR), 120, 10000, 20000, 'pending');

-- Selesai
