<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = "tb_barang";

    protected $guarded = ["id"];

    // public function getGambarAttribute($value)
    // {

    // }
    protected $casts = [
        'gambar' => 'array',
    ];

    public function keranjang()
    {
        return $this->hasMany(Keranjang::class);
    }
}
