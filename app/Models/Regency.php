<?php

/*
 * This file is part of the IndoRegion package.
 *
 * (c) Azis Hapidin <azishapidin.com | azishapidin@gmail.com>
 *
 */

namespace App\Models;

use AzisHapidin\IndoRegion\Traits\RegencyTrait;
use Illuminate\Database\Eloquent\Model;

/**
 * Regency Model.
 */
class Regency extends Model
{
  use RegencyTrait;

  /**
   * Table name.
   *
   * @var string
   */
  protected $table = 'regencies';

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
   */
  protected $hidden = [
    'province_id'
  ];

  /**
   * Regency belongs to Province.
   *
   * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function province()
  {
    return $this->belongsTo(Province::class);
  }

  /**
   * Regency has many districts.
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function districts()
  {
    return $this->hasMany(District::class);
  }

  /**
   * Get all of the comments for the Regency
   *
   * @return \Illuminate\Database\Eloquent\Relations\HasMany
   */

  // public function anggota()
  // {
  //   return $this->belongsTo(Anggota::class);
  // }

  public function pelatih()
  {
    return $this->belongsTo('App\Models\Pelatih', 'pelatih_id', 'id');
  }

  public function anggota()
  {
    return $this->belongsTo('App\Models\Anggota', 'anggota_id', 'id');
  }

  public function pengurus()
  {
    return $this->belongsTo('App\Models\Pengurus', 'pengurus_id', 'id');
  }
}
