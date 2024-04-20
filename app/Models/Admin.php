<?php

namespace App\Models;

use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $tabel = 'admins';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function karyawan()
    {
        return $this->BelongsTo(Karyawan::class, 'id', 'nama_karyawan');
    }
}
