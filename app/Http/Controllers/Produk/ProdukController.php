<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\Produk\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/produk');
    }

    public function data() {
        $produk = Produk::all();
        return datatables()->of($produk)->addColumn('action', function ($row) {
            $html = '<a href="/panel/produk/'. $row->id .'" class="btn btn-xs btn-secondary"> <i class="fa fa-edit"></i> Edit</a> ';
            $html .= '<button value="' . $row->id . '" class="btn btn-xs btn-danger" id="btn-delete"> <i class="fa fa-trash"></i> Hapus</button>';
            return $html;
        })->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin/add_produk');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_produk' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'qty' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $produk = new Produk;
        $produk->nama = $request->nama;
        $produk->no_produk = $request->no_produk;
        $produk->harga = $request->harga;
        $produk->qty = $request->qty;
        $produk->deskripsi = $request->deskripsi;
        $produk->kategori_id = $request->kategori_id;

        if ($request->file('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = Carbon::now()->format('ymdHis') . "-" . $name;
            $path = Storage::putFileAs('/public/images', $file, $filename);
            $url = $request->getSchemeAndHttpHost();
            $url_name = $url . "/" . $path;
            if ($url_name) {
                $produk->gambar = $url_name;
            }
        }


        $produk->save();

        return redirect()->back()->with('success', 'Produk Berhasil ditambah!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('admin/edit_produk', compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'no_produk' => 'required',
            'nama' => 'required',
            'harga' => 'required',
            'qty' => 'required',
            'deskripsi' => 'required',
            'kategori_id' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $produk = Produk::find($id);
        $produk->nama = $request->get('nama');
        $produk->no_produk = $request->get('no_produk');
        $produk->harga = $request->get('harga');
        $produk->qty = $request->get('qty');
        $produk->deskripsi = $request->get('deskripsi');
        $produk->kategori_id = $request->get('kategori_id');

        if ($request->file('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = Carbon::now()->format('ymdHis') . "-" . $name;
            $path = Storage::putFileAs('/public/images', $file, $filename);
            $url = $request->getSchemeAndHttpHost();
            $url_name = $url . "/" . $path;
            if ($url_name) {
                $produk->gambar = $url_name;
            }
        } else {
            $produk->gambar = $request->get('gambar');
        }


        $produk->update();

        return redirect()->back()->with('success', 'Produk Berhasil Dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return response()->json($produk);
    }
}
