<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warna extends Model
{
    use HasFactory;
    protected $table = 'warna';
    public $timestamps = false;


    protected $fillable = [
        'code',
    ];
}
