<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('serah_terima_asets', function (Blueprint $table) {
      $table->id('id_serah');
      $table->integer('id_aset');
      $table->date('tgl_serah');
      $table->integer('id_peminjam');
      $table->integer('id_penerima');
      $table->time('waktu_serah');
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('serah_terima_asets');
  }
};
