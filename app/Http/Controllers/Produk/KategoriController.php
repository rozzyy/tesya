<?php

namespace App\Http\Controllers\Produk;

use App\Http\Controllers\Controller;
use App\Models\Kategori\Kategori;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin/kategori');
    }

    public function data()
    {
        $kategori = Kategori::all();
        return datatables()->of($kategori)->addColumn('action', function ($row) {
            $html = '<a href="/panel/kategori/'. $row->id .'" class="btn btn-xs btn-secondary"> <i class="fa fa-edit"></i> Edit</a> ';
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
        return view('admin/add_kategori');
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
            'kode' => 'required',
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $kategori = new Kategori();
        $kategori->kode = $request->kode;
        $kategori->nama = $request->nama;
        
        if ($request->file('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = Carbon::now()->format('ymdHis') . "-" . $name;
            $path = Storage::putFileAs('/public/images', $file, $filename);
            $url = $request->getSchemeAndHttpHost();
            $url_name = $url . "/" . $path;
            if ($url_name) {
                $kategori->gambar = $url_name;
            }
        }

        $kategori->save();

        return redirect()->back()->with('message', 'Kategori Berhasil Ditambah!');
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
    public function edit(Kategori $kategori)
    {   
        return view('admin/edit_kategori', compact('kategori'));
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
            'kode' => 'required',
            'nama' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $kategori = Kategori::find($id);
        $kategori->kode = $request->get('kode');
        $kategori->nama = $request->get('nama');
        if ($request->file('image')) {
            $file = $request->file('image');
            $name = $file->getClientOriginalName();
            $filename = Carbon::now()->format('ymdHis') . "-" . $name;
            $path = Storage::putFileAs('/public/images', $file, $filename);
            $url = $request->getSchemeAndHttpHost();
            $url_name = $url . "/" . $path;
            if ($url_name) {
                $kategori->gambar = $url_name;
            }
        } else {
            $kategori->gambar = $request->get('gambar');
        }

        $kategori->update();

        return redirect()->back()->with('message', 'Kategori berhasil dirubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::findOrFail($id);
        $kategori->delete();

        return response()->json($kategori);
    }
}
