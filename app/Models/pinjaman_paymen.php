<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class pinjaman_paymen extends Model
{


    protected $table = 'pinjaman_paymen';
    protected $keyType = 'string';
    public $incrementing = false;


    protected $fillable = [
        'id',
        'user_id',
        'pinjaman_id',
        'jumlah'
    ];


    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
