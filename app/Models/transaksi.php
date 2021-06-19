<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class transaksi extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'transaksi';

    protected $keyType = 'string';

    public $incrementing = false;

    protected $fillable = [
        'nasabah_id',
        'user_id',
        'jenis',
        'setor',
        'tarik',
        'nasabah_id',
    ];


    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            $model->id = (string) Str::uuid();
        });
    }
}
