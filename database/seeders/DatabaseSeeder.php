<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Karyawan;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
      $karyawan = new Karyawan();
      $karyawan->username = 'bintang';
      $karyawan->email = 'bintang@example.com';
      $karyawan->password = bcrypt('123456'); // Jangan menggunakan Crypt::encryptString() untuk menyimpan password, gunakan bcrypt() atau Hash::make()
      $karyawan->nik = '1234567890';
      $karyawan->nama_karyawan = 'Nama Karyawan 1';
      $karyawan->tgl_lahir = '1990-01-01';
      $karyawan->no_telp = '081234567890';
      $karyawan->jabatan = 'Jabatan 1';
      $karyawan->status_hubungan = 'Status 1';
      $karyawan->unit_bisnis = 'Unit Bisnis 1';
      $karyawan->jenis_kelamin = 'Laki-laki';
      $karyawan->alamat = 'Alamat 1';
      $karyawan->save();

    }
}
