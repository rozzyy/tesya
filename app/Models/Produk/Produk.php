<?php

namespace App\Models\Produk;

use App\Models\Kategori\Kategori;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable =  [
        'nama',
        'no_produk',
        'harga',
        'qty',
        'deskripsi',
        'gambar',
        'kategori_id'
    ];

    public function kategori() {
        return $this->belongsTo(Kategori::class, 'kategori_id', 'id');
    }
}
