<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class nasabah extends Model
{
    use HasFactory;
    protected $table = 'nasabah';

    protected $keyType = 'string';

    public $incrementing = false;


    protected $fillable = [
        'nis',
        'nama',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'jenis',
        'status',
        'foto',
        'saldo',
    ];


    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }
}
