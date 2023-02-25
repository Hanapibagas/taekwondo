<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NaikTingkat extends Model
{
  use HasFactory;

  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'naik_tingkats';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'anggota_id', 'tgl_pengajuan', 'tgl_disetujui', 'sabuk_id', 'regency_id', 'status'
  ];

  // one to one
  public function anggota()
  {
    return $this->belongsTo('App\Models\Anggota', 'anggota_id', 'id');
  }

  public function regency()
  {
    return $this->belongsTo(Regency::class);
  }

  public function sabuk()
  {
    return $this->belongsTo('App\Models\Sabuk', 'sabuk_id');
  }

  // one to many


}
