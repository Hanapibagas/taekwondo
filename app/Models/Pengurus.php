<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'regency_id', 'anggota_id', 'jabatan_id'
  ];

  // One to one
  public function regency()
  {
    return $this->belongsTo(Regency::class);
  }

  public function jabatan()
  {
    return $this->belongsTo('App\Models\Jabatan', 'jabatan_id', 'id');
  }

  // One to many
  public function anggota()
  {
    return $this->belongsTo('App\Models\Anggota', 'anggota_id', 'id');
  }
}
