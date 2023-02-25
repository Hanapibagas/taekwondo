<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SambutanKetua extends Model
{
  use HasFactory;

  protected $table = 'sambutan_ketua';

  protected $fillable = [
    'body',
  ];

  public function pengurus()
  {
    return $this->belongsTo(Pengurus::class);
  }

  public function anggota()
  {
    return $this->belongsTo(Anggota::class);
  }
}
