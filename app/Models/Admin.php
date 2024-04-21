<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $tabel = 'admins';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function karyawan()
    {
        return $this->BelongsTo(Karyawan::class, 'id', 'nama_karyawan');
    }

    protected $hidden = [
      'password',
      'remember_token',
  ];
}
