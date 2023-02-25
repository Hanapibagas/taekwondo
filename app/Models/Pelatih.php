<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelatih extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'pelatihs';

  protected $fillable = [
    'nama', 'foto', 'sabuk_id', 'dojeng_id', 'regency_id'
  ];

  // One to One
  public function sabuk()
  {
    return $this->belongsTo('App\Models\Sabuk', 'sabuk_id', 'id');
  }

  public function dojeng()
  {
    return $this->belongsTo('App\Models\Dojeng', 'dojeng_id', 'id');
  }

  public function regency()
  {
    return $this->belongsTo(Regency::class);
  }

  // One to Many
}
