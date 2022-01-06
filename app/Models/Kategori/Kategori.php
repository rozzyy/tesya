<?php

namespace App\Models\Kategori;

use App\Models\Produk\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'kode',
        'nama',
        'gambar'
    ];

    public function produk() {
        return $this->hasMany(Produk::class, 'kategori_id', 'id');
    }
}
