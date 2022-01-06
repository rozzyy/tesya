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
                    <li class="breadcrumb-item"><a href="#!">Kategori</a></li>
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
                    <h5>Form Edit Kategori</h5>
                    <div class="card-header-right">
                        <div class="btn-group card-option">
                            <button type="button" class="btn dropdown-toggle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="feather icon-more-horizontal"></i>
                            </button>
                            <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
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
                            title: 'Kategori berhasil dirubah.',
                            timer: 3000
                        })
                    </script>
                @endif
                <form action="{{ route('edit.kategori', ['id' => $kategori->id]) }}" method="POST" class="my-2" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="container my-2">
                        <input type="hidden" name="gambar" value="{{ $kategori->gambar }}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Kode</label>
                            <input type="text" class="form-control @if($errors->has('kode')) is-invalid @endif" name="kode" aria-describedby="emailHelp" placeholder="Masukkan Kode" value="{{ $kategori->kode }}">
                            @if ($errors->has('kode'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('kode') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nama</label>
                            <input type="text" class="form-control @if($errors->has('nama')) is-invalid @endif" name="nama" aria-describedby="emailHelp" placeholder="Masukkan Nama" value="{{ $kategori->nama }}">
                            @if ($errors->has('nama'))
                                <span class="text-danger">
                                    <strong>{{ $errors->first('nama') }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Upload Gambar</label>
                            <input type="file" class="form-control-file" id="file-input" name="image">
                        </div>
                        <div>
                            <img src="{{ $kategori->gambar }}" alt="default" class="w-50" id="image">
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