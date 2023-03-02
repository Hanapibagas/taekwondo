<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CalonMurid extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'umur',
        'nama_orang_tua',
        'pendidikan',
        'umum',
        'geup',
        'agama',
        'no_hp',
        'status_pendaftaran',
        'kabupaten_kota',
        'kacamatan',
        'dojang_id',
    ];

    public function Dojang()
    {
        return $this->belongsTo(Dojeng::class, 'dojang_id', 'id');
    }
}
