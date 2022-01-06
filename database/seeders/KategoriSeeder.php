<?php

namespace Database\Seeders;

use App\Models\Kategori\Kategori;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Kategori::truncate();
        $kategori = [
            [
                'nama' => 'Makanan',
                'kode' => '001',
                'gambar' => 'https://picsum.photos/id/1/200/300'
            ],
            [
                'nama' => 'Minuman',
                'kode' => '002',
                'gambar' => 'https://picsum.photos/id/2/200/300'
            ],
            [
                'nama' => 'Pakaian',
                'kode' => '003',
                'gambar' => 'https://picsum.photos/id/3/200/300'
            ],
            [
                'nama' => 'Perabot',
                'kode' => '004',
                'gambar' => 'https://picsum.photos/id/4/200/300'
            ],
            [
                'nama' => 'Elektroik',
                'kode' => '005',
                'gambar' => 'https://picsum.photos/id/5/200/300'
            ]
        ];

        foreach($kategori as $item) {
            Kategori::create($item);
        }
        Schema::enableForeignKeyConstraints();
    }
}
