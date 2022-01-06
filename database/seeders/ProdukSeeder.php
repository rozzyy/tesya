<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\Produk\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Produk::truncate();
        $produk = [
            [
                'nama' => 'Mie Goreng',
                'harga' => '1500',
                'gambar' => 'https://picsum.photos/id/1/200/300',
                'deskripsi' => 'Mie yang digoreng',
                'qty' => 8,
                'kategori_id' => 1,
                'no_produk' => '00101'
            ],
            [
                'nama' => 'Nasi Goreng',
                'harga' => '15000',
                'gambar' => 'https://picsum.photos/id/1/200/300',
                'deskripsi' => 'Nasi yang digoreng',
                'qty' => 2,
                'kategori_id' => 1,
                'no_produk' => '00102'
            ]
        ];

        foreach($produk as $item) {
            Produk::create($item);
        }
        Schema::enableForeignKeyConstraints();
    }
}
