<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dojeng extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'pelatih',
        'kontak',
        'alamat',
        'foto',
        'kacamatan',
        'kabupaten',
        'deskripsi'
    ];

    // One to one
    public function anggota()
    {
        return $this->hasOne('App\Models\Anggota', 'anggota_id');
    }
    // One to Many
    public function Kabupaten()
    {
        return $this->belongsTo(Regency::class, 'kabupaten', 'id');
    }

    public function Kecamatan()
    {
        return $this->belongsTo(District::class, 'kacamatan', 'id');
    }
}
