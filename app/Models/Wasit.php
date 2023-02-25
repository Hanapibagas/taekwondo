<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wasit extends Model
{
  use HasFactory;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'nama', 'status_wasit', 'kelas', 'dan', 'pwn', 'dwn', 'pwd', 'dwd', 'foto'
  ];
}
