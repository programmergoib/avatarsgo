<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'nis', 'nis');
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class, 'nip', 'nip');
    }
}
