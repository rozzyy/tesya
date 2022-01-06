@extends('admin.admin_container')

@section('header')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">TESYA ADMIN PANEL</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-th-large"></i></a></li>
                    <li class="breadcrumb-item"><a href="/panel/produk">Produk</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('konten')
<div>
    <div class="row">
        <!-- [ sample-page ] start -->
        <div class="col-sm-8 offset-sm-2">
            <div class="card">

                <div class="card-header">
                    <h5>Form Tambah Produk</h5>
                    <div class="card-header-right">
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-more-horizontal"></i>
                            </button>
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                <li class="dropdown-item reload-card"><a href="/panel/produk/buat"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                @if (Session::has('message'))
                    {{-- <div class="container my-3">
                        <div class="alert alert-success alert-dismissable">
                            {{ Session::get('message') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    </div> --}}
                    <script type="text/javascript">
                        Swal.fire({
                            icon: 'success',
                            title: "{{ Session::get('message') }}",
                            timer: 3000
                        })
                    </script>
                @endif
                {{ $errors }}
                <form action="{{ route('produk') }}" method="POST" class="my-2" enctype="multipart/form-data">
                    @csrf
                    <div class="container my-2">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kategori</label>
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="text" name="kategori_id">
                                    <select class="form-control @if($errors->has('kategori_id')) is-invalid @endif" name="kategori_id">
                                        <option>-Pilih Kategori-</option>
                                        @foreach ($kategori_global as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama }} - {{ $item->kode }}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('kategori_id'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('kategori_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nomor Produk</label>
                            <input type="text" class="form-control @if($errors->has('no_produk')) is-invalid @endif" name="no_produk" aria-describedby="emailHelp" placeholder="Masukkan Nomor Produk">
                            @if ($errors->has('no_produk'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('no_produk') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control @if($errors->has('nama')) is-invalid @endif" name="nama" aria-describedby="emailHelp" placeholder="Masukkan Nama">
                            @if ($errors->has('nama'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Stok</label>
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="number" class="form-control @if($errors->has('qty')) is-invalid @endif" name="qty" aria-describedby="emailHelp" placeholder="Masukkan Stok">
                                    @if ($errors->has('qty'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('qty') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Harga</label>
                            <div class="row">
                                <div class="col-sm-5">
                                    <input type="number" class="form-control @if($errors->has('harga')) is-invalid @endif" name="harga" aria-describedby="emailHelp" placeholder="Masukkan Harga">
                                    @if ($errors->has('harga'))
                                        <span class="text-danger">
                                            <strong>{{ $errors->first('harga') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleTextarea1">Deskripsi</label>
                            <textarea class="form-control @if($errors->has('deskripsi')) is-invalid @endif" name="deskripsi" placeholder="Masukkan Deskripsi" rows="4"></textarea>
                            @if ($errors->has('deskripsi'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('deskripsi') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Upload Gambar</label>
                            <input type="file" class="form-control-file" id="file-input" name="image">
                        </div>
                        <div>
                            <img src="{{ url('admin/assets/images/default-image.jpeg') }}" alt="default" class="w-50" id="image">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
    <!-- Modal -->
    {{-- <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            <form action="#">
                <div class="form-group">
                    <label for="exampleInputEmail1">Kode</label>
                    <input type="text" class="form-control" id="kode" aria-describedby="emailHelp" placeholder="Masukkan Kode" id="kode">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Nama</label>
                    <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" placeholder="Masukkan Nama" id="nama">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Upload Gambar</label>
                    <input type="file" class="form-control-file" id="exampleInputEmail1">
                </div>
                <div>
                    <img src="{{ url('admin/assets/images/default-image.jpeg') }}" alt="default" class="w-100">
                </div>
            </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="btn-post">Simpan</button>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
        </div>
    </div> --}}
</div>
@endsection

@section('script')
<script>
    $("#file-input").on('change', function () {
        if (this.files) {
            var url = window.URL.createObjectURL(new Blob(this.files));
            setPreview(url)
        } else {
            alert("File input error")
        }
    })
    function setPreview (url) {
        $("#image").attr('src', url)
    }
</script>
@endsection