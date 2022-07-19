<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HargaOngkir extends Model
{
    use HasFactory;
    protected $table = "harga_ongkir";
    protected $guarded = ['provinces_id', 'ongkir'];
}
