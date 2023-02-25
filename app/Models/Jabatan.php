<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
  use HasFactory;

  protected $fillable = [
    'name'
  ];

  // One to one

  // One to Many
  public function pengurus()
  {
    return $this->hasOne('App\Models\Pengurus', 'pengurus_id');
  }

  public function pelatih()
  {
    return $this->hasOne('App\Models\Pelatih', 'pelatih_id');
  }
}
