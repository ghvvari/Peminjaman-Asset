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
    Schema::create('karyawans', function (Blueprint $table) {
      $table->id();
      $table->string('nama_karyawan', 30);
      $table->string('email', 100);
      $table->string('username', 50);
      $table->string('password');
      $table->integer('nik');
      $table->text('alamat');
      $table->string('no_telp', 15);
      $table->string('jenis_kelamin', 10);
      $table->string('jabatan', 15);
      $table->date('tgl_lahir');
      $table->string('status_hubungan', 15);
      $table->char('unit_bisnis', 15);
      $table->timestamps();
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('karyawans');
  }
};
