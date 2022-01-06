<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Banner\Banner;
use Illuminate\Support\Facades\Schema;

class BannerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Banner::truncate();
        $banner = [
            'judul' => 'Sayur Segar',
            'judul_besar' => 'Sayur 100% Organik',
            'gambar' => 'http://localhost:8000/public/images/banner.jpg'
        ];

        Banner::create($banner);
        Schema::enableForeignKeyConstraints();
    }
}
