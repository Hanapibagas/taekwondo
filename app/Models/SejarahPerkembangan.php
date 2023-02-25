<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SejarahPerkembangan extends Model
{
    use HasFactory;

    protected $table = 'sejarah_perkembangan';

    protected $fillable = [
        'title',
        'body',
    ];
}
