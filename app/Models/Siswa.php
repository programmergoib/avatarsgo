<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    public function rombel()
    {
        return $this->belongsTo(Rombel::class, 'kode_rombel', 'kode_rombel');
    }
}
