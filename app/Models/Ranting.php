<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ranting extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'ranting';

    protected $fillable = [
        'nama_ranting', 'alamat', 'kabupaten_id'
    ];

    /**
     * Get the user associated with the Ranting
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function Regency()
    {
        return $this->hasOne(Regency::class, 'id','kabupaten_id');
    }

}
