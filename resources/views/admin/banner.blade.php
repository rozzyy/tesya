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
                    <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="#!">Banner</a></li>
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
        <div class="col-sm-8 offset-2">
            <div class="card">

                <div class="card-header">
                    <h5>Form Edit Banner</h5>
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
                <div class="card-body">
                    <form action="{{ route('update.banner', [ 'id' => 1 ]) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="exampleInputEmail1">Judul</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Judul" name="judul" value="{{ $banner->judul }}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sub Judul</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Sub Judul" name="judul_besar" value="{{ $banner->judul_besar }}">
                        </div>
                        <div class="form-group"> 
                            <label for="exampleInputEmail1">Upload Gambar</label>
                            <input type="file" class="form-control-file" name="image" id="file-input">
                        </div>
                        <div class="mb-2">
                            <img src="{{ $banner->gambar }}" alt="default" class="w-50" id="image">
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
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