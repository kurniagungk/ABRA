<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class pinjaman extends Model
{
    use HasFactory;

    protected $table = 'pinjaman';
    protected $keyType = 'string';
    public $incrementing = false;


    protected $fillable = [
        'id',
        'user_id',
        'tunggakan',
        'dibayar',
        'total',
        'keterangan',
        'tempo',
        'tanggal',
        'status',
    ];

    public function paymen()
    {
        return $this->hasMany(pinjaman_paymen::class);
    }


    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
