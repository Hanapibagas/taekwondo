<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sabuk extends Model
{
  use HasFactory;

  protected $fillable = [
    'name'
  ];

  // One to one
  public function pelatih()
  {
    return $this->hasOne('App\Models\Pelatih', 'pelatih_id');
  }

  public function anggota()
  {
    return $this->hasOne('App\Models\Anggota', 'anggota_id', 'id');
  }

  public function naikTingkat()
  {
    return $this->hasOne('App\Models\NaikTingkat', 'sabuk_id');
  }


  // One to Many
}
