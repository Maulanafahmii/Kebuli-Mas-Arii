-- Database: nasi_kebuli
-- Tabel users
DELETE FROM `users`;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$12$9lA5z2k3y4v5w6x7y8z9a0b1c2d3e4f5g6h7i8j9k0l1m2n3o4p5', NULL, '2025-06-06 21:01:00', '2025-06-06 21:01:00'),
(2, 'Fahmi', 'fahmi@gmail.com', NULL, '$2y$12$9lA5z2k3y4v5w6x7y8z9a0b1c2d3e4f5g6h7i8j9k0l1m2n3o4p5', NULL, '2025-06-06 21:01:00', '2025-06-06 21:01:00');

-- Tabel data_resto
DELETE FROM `data_resto`;
INSERT INTO `data_resto` (`id`, `nama`, `kategori`, `harga`, `keterangan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Kebuli Ori', 'Makanan', 7000.00, 'Yaitu nasi kebuli tanpa toping dengan rasa original', 'assets/img/menu/ori.jpeg', '2025-06-06 21:01:00', '2025-06-06 21:01:00'),
(2, 'Kebuli Mix (Ayam & Telur)', 'Makanan', 11000.00, 'Nasi kebuli mix yaitu nasi kebuli dengan tambahan ayam dan telur dadar', 'assets/img/menu/mx.jpeg', '2025-06-06 21:01:00', '2025-06-06 21:01:00'),
(3, 'Kebuli Ayam', 'Makanan', 10000.00, 'Nasi kebuli Ayam yaitu nasi dengan tambahan toping ayam', 'assets/img/menu/ayam.jpeg', '2025-06-06 21:01:00', '2025-06-06 21:01:00'),
(4, 'Teh Panas', 'Minuman', 3000.00, 'Terdapat juga minuman teh panas', 'assets/img/menu/teh.jpg', '2025-06-06 21:01:00', '2025-06-06 21:01:00'),
(5, 'Kebuli Sapi', 'Makanan', 13000.00, 'Nasi kebuli dengan toping sapi', 'assets/img/menu/sap.jpeg', '2025-06-06 21:01:00', '2025-06-06 21:01:00'),
(6, 'Kebuli Telur', 'Makanan', 9000.00, 'Nasi kebuli telur yaitu nasi kebuli dengan tambahan telur dadar', 'assets/img/menu/telur.jpeg', '2025-06-06 21:01:00', '2025-06-06 21:01:00'),
(7, 'Jahe Geprek', 'Minuman', 4000.00, 'Jahe geprek pas untuk menghangatkan tubuh', 'assets/img/menu/jahe.jpg', '2025-06-06 21:01:00', '2025-06-06 21:01:00');

-- Tabel sales
DELETE FROM `sales`;
INSERT INTO `sales` (`id`, `branch_name`, `sale_date`, `total_sales`, `notes`, `created_at`, `updated_at`) VALUES
(1, 'Cabang Jakarta', '2025-06-05', 1500000.00, 'Penjualan harian normal.', '2025-06-06 21:01:00', '2025-06-06 21:01:00'),
(2, 'Cabang Bandung', '2025-06-05', 1200000.00, 'Promosi diskon 10%.', '2025-06-06 21:01:00', '2025-06-06 21:01:00'),
(3, 'Cabang Jakarta', '2025-06-06', 2000000.00, 'Penjualan hari ini.', '2025-06-06 21:01:00', '2025-06-06 21:01:00');

-- Tabel testimoni
DELETE FROM `testimoni`;
INSERT INTO `testimoni` (`id`, `nama`, `keterangan`, `foto`, `pekerjaan`, `created_at`, `updated_at`) VALUES
(1, 'Aflah', 'Nasi kebuli di warung ini sungguh luar biasa! Rasa bumbu yang kaya, porsinya besar, dan harganya sangat terjangkau. Saya dan keluarga sangat puas!', 'assets/img/testimonials/aplah.jpeg', 'Pekerja Buruh', '2025-06-06 21:01:00', '2025-06-06 21:01:00'),
(2, 'Irfan', 'Pelayanan ramah, suasana warung nyaman, dan citarasa nasi kebuli yang otentik. Recommended banget buat yang suka masakan Arab!', 'assets/img/testimonials/irfan.jpeg', 'Pekerja Pabrik', '2025-06-06 21:01:00', '2025-06-06 21:01:00'),
(3, 'Affan', 'Pertama kali nyobain nasi kebuli di sini, langsung jatuh cinta! Sapinya empuk, nasi gurih, rasanya mantap. Akan datang lagi pasti!', 'assets/img/testimonials/affan.jpeg', 'Pengusaha', '2025-06-06 21:01:00', '2025-06-06 21:01:00'),
(4, 'Akhyar', 'Cocok banget buat acara keluarga atau kumpul bareng teman. Porsi besar, rasa autentik, dan pelayanan yang ramah membuat kami senang.', 'assets/img/testimonials/ahyar.jpeg', 'Mahasiswa', '2025-06-06 21:01:00', '2025-06-06 21:01:00'),
(5, 'Gani', 'Nasi kebuli di sini benar-benar istimewa! Pilihan lauk yang beragam, bumbu yang khas, dan kualitas bahan makanan yang terjamin.', 'assets/img/testimonials/gani.jpeg', 'Pilot', '2025-06-06 21:01:00', '2025-06-06 21:01:00');

-- Tabel contacts
DELETE FROM `contacts`;
INSERT INTO `contacts` (`id`, `name`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Rina', 'rina@gmail.com', 'Pertanyaan Menu', 'Apakah ada menu vegetarian?', '2025-06-06 21:01:00', '2025-06-06 21:01:00');

-- Tabel orders
DELETE FROM `orders`;
INSERT INTO `orders` (`id`, `name`, `email`, `phone`, `address`, `menu_id`, `quantity`, `total_price`, `created_at`, `updated_at`) VALUES
(1, 'Andi', 'andi@gmail.com', '08123456789', 'Jl. Sudirman No. 123, Jakarta', '1', 2, 14000.00, '2025-06-06 21:01:00', '2025-06-06 21:01:00');
