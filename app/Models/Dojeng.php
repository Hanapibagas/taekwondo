<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dojeng extends Model
{
  use HasFactory;

  protected $fillable = [
    'name'
  ];

  // One to one
  public function anggota()
  {
    return $this->hasOne('App\Models\Anggota', 'anggota_id');
  }
  // One to Many
}
