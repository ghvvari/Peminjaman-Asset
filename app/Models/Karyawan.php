<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Karyawan extends Authenticatable
{
    use HasFactory;

    protected $table = 'karyawans';
    protected $fillable = [
        'username',
        'email',
        'password',
        'nik',
        'nama_karyawan',
        'tgl_lahir',
        'no_telp',
        'jabatan',
        'status_hubungan',
        'unit_bisnis',
        'jenis_kelamin',
        'alamat',
        // Tambahkan nama field lainnya sesuai kebutuhan Anda
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
