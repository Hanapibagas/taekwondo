<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'nama', 'alamat', 'jenis_kelamin', 'telp', 'tahun_terdaftar', 'photo', 'regency_id', 'sabuk_id', 'dojeng_id',
  ];

  // One to one
  public function pengurus()
  {
    return $this->hasOne('App\Models\Pengurus', 'pengurus_id');
  }

  public function sambutan()
  {
    return $this->hasOne(SambutanKetua::class);
  }

  public function regency()
  {
    return $this->belongsTo(Regency::class);
  }

  public function dojeng()
  {
    return $this->belongsTo('App\Models\Dojeng', 'dojeng_id', 'id');
  }

  public function sabuk()
  {
    return $this->belongsTo('App\Models\Sabuk', 'sabuk_id', 'id');
  }

  // One to Many

}
