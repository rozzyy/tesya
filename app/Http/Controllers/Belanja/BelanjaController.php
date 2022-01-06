<?php

namespace App\Http\Controllers\Belanja;

use App\Http\Controllers\Controller;
use App\Models\Produk\Produk;
use Illuminate\Http\Request;

class BelanjaController extends Controller
{
    public function index() {
        $produk = Produk::paginate(10);
        $recent = Produk::orderBy('created_at', 'desc')->get();

        return view('belanja', ['produk' => $produk, 'recent' => $recent]);
    }
}
