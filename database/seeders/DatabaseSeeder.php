<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Users
        DB::table('users')->insert([
            ['id' => 1, 'name' => 'Admin', 'email' => 'admin@gmail.com', 'password' => Hash::make('12345678'), 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'name' => 'Fahmi', 'email' => 'fahmi@gmail.com', 'password' => Hash::make('12345678'), 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Data Resto (Menggunakan data terbaru)
        DB::table('data_resto')->insert([
            ['id' => 1, 'nama' => 'Kebuli Ori', 'kategori' => 'Makanan', 'harga' => 7000.00, 'keterangan' => 'Yaitu nasi kebuli tanpa toping dengan rasa original', 'foto' => 'assets/img/menu/ori.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nama' => 'Kebuli Mix (Ayam & Telur)', 'kategori' => 'Makanan', 'harga' => 11000.00, 'keterangan' => 'Nasi kebuli mix yaitu nasi kebuli dengan tambahan ayam dan telur dadar', 'foto' => 'assets/img/menu/mx.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nama' => 'Kebuli Ayam', 'kategori' => 'Makanan', 'harga' => 10000.00, 'keterangan' => 'Nasi kebuli Ayam yaitu nasi dengan tambahan toping ayam', 'foto' => 'assets/img/menu/ayam.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nama' => 'Teh Panas', 'kategori' => 'Minuman', 'harga' => 3000.00, 'keterangan' => 'Terdapat juga minuman teh panas', 'foto' => 'assets/img/menu/teh.jpg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'nama' => 'Kebuli Sapi', 'kategori' => 'Makanan', 'harga' => 13000.00, 'keterangan' => 'Nasi kebuli dengan toping sapi', 'foto' => 'assets/img/menu/sap.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 6, 'nama' => 'Kebuli Telur', 'kategori' => 'Makanan', 'harga' => 9000.00, 'keterangan' => 'Nasi kebuli telur yaitu nasi kebuli dengan tambahan telur dadar', 'foto' => 'assets/img/menu/telur.jpeg', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 7, 'nama' => 'Jahe Geprek', 'kategori' => 'Minuman', 'harga' => 4000.00, 'keterangan' => 'Jahe geprek pas untuk menghangatkan tubuh', 'foto' => 'assets/img/menu/jahe.jpg', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Sales (untuk Dashboard)
        DB::table('sales')->insert([
            ['id' => 1, 'branch_name' => 'Cabang Jakarta', 'sale_date' => '2025-06-05', 'total_sales' => 1500000.00, 'notes' => 'Penjualan harian normal.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'branch_name' => 'Cabang Bandung', 'sale_date' => '2025-06-05', 'total_sales' => 1200000.00, 'notes' => 'Promosi diskon 10%.', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'branch_name' => 'Cabang Jakarta', 'sale_date' => '2025-06-06', 'total_sales' => 2000000.00, 'notes' => 'Penjualan hari ini.', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Testimoni (Menggunakan data terbaru)
        DB::table('testimoni')->insert([
            ['id' => 1, 'nama' => 'Aflah', 'keterangan' => 'Nasi kebuli di warung ini sungguh luar biasa! Rasa bumbu yang kaya, porsinya besar, dan harganya sangat terjangkau. Saya dan keluarga sangat puas!', 'foto' => 'assets/img/testimonials/aplah.jpeg', 'pekerjaan' => 'Pekerja Buruh', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 2, 'nama' => 'Irfan', 'keterangan' => 'Pelayanan ramah, suasana warung nyaman, dan citarasa nasi kebuli yang otentik. Recommended banget buat yang suka masakan Arab!', 'foto' => 'assets/img/testimonials/irfan.jpeg', 'pekerjaan' => 'Pekerja Pabrik', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 3, 'nama' => 'Affan', 'keterangan' => 'Pertama kali nyobain nasi kebuli di sini, langsung jatuh cinta! Sapinya empuk, nasi gurih, rasanya mantap. Akan datang lagi pasti!', 'foto' => 'assets/img/testimonials/affan.jpeg', 'pekerjaan' => 'Pengusaha', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 4, 'nama' => 'Akhyar', 'keterangan' => 'Cocok banget buat acara keluarga atau kumpul bareng teman. Porsi besar, rasa autentik, dan pelayanan yang ramah membuat kami senang.', 'foto' => 'assets/img/testimonials/ahyar.jpeg', 'pekerjaan' => 'Mahasiswa', 'created_at' => now(), 'updated_at' => now()],
            ['id' => 5, 'nama' => 'Gani', 'keterangan' => 'Nasi kebuli di sini benar-benar istimewa! Pilihan lauk yang beragam, bumbu yang khas, dan kualitas bahan makanan yang terjamin.', 'foto' => 'assets/img/testimonials/gani.jpeg', 'pekerjaan' => 'Pilot', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Contacts
        DB::table('contacts')->insert([
            ['id' => 1, 'name' => 'Rina', 'email' => 'rina@gmail.com', 'subject' => 'Pertanyaan Menu', 'message' => 'Apakah ada menu vegetarian?', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Orders
        DB::table('orders')->insert([
            ['id' => 1, 'name' => 'Andi', 'email' => 'andi@gmail.com', 'phone' => '08123456789', 'address' => 'Jl. Sudirman No. 123, Jakarta', 'menu_id' => '1', 'quantity' => 2, 'total_price' => 14000.00, 'created_at' => now(), 'updated_at' => now()],
        ]);
    }
}
?>
