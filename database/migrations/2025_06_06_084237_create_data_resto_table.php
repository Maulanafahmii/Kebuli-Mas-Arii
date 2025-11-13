<?php

  use Illuminate\Database\Migrations\Migration;
  use Illuminate\Database\Schema\Blueprint;
  use Illuminate\Support\Facades\Schema;

  return new class extends Migration
  {
      public function up(): void
      {
          Schema::create('data_resto', function (Blueprint $table) {
              $table->id();
              $table->string('nama');
              $table->string('kategori'); // Kolom baru
              $table->decimal('harga', 10, 2);
              $table->text('keterangan'); // Diganti dari deskripsi
              $table->string('foto')->nullable();
              $table->timestamps();
          });
      }

      public function down(): void
      {
          Schema::dropIfExists('data_resto');
      }
  };
  ?>
