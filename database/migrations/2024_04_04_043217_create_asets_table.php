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
        Schema::create('asets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_aset', 50);
            $table->date('tgl_beli');
            $table->string('serial_number', 20);
            $table->string('posisi_saat_ini', 50);
            $table->string('scan_bon', 100)->nullable();
            $table->string('scan_milik', 100)->nullable();
            $table->string('foto_aset', 100);
            $table->boolean('aktif')->default(1);
            $table->text('keterangan')->nullable();
            $table->string('unit_bisnis', 25);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('asets');
    }
};
