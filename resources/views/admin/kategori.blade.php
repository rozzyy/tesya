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
        <div class="col-sm-12">
            <div class="card">

                <div class="card-header">
                    <h5>Daftar Kategori</h5>
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
                    <div class="row my-2">
                        <div class="col-sm-6">
                        </div>
                        <div class="col-sm-6">
                            <a href="{{ route('buat.kategori') }}" class="btn btn-primary float-right" type="button">
                                <i class="fa fa-plus"></i> Tambah Kategori
                            </a>
                        </div>
                    </div>
                    <table class="table table-bordered table-condensed table-striped" id="data-table" width="100%">
                        <thead>
                        <tr>
                            <th width="20px"> No. </th>
                            <th></th>
                            <th>Kode</th>
                            <th>Nama</th>
                            <th width="100px">Opsi</th>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
        <!-- [ sample-page ] end -->
    </div>
    <!-- [ Main Content ] end -->
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="text-center">
                        <h4>Anda yakin untuk menghapus data?</h4>
                        <h6>Data anda tidak dapat dikembalikan lagi.</h6>
                    </div>
                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="button" class="btn btn-danger" id="delete">Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('data.kategori') }}",
        columns: [
            {"data": 'id', "name": 'id'},
            {
                "data": 'gambar', 
                "render": function (data, type, row, meta) {
                    return '<div class="text-center"><img src="'+data+'" class="w-75" alt="kategori"/></div>';
                }
            },
            {"data": 'nama', "nama": 'nama'},
            {"data": 'kode', "name": 'kode'},
            {"data": 'action', "name": 'Actions', orderable: false, searchable: false}
        ]
    });
    var kategori_id = ''
    $('body').on('click', '#btn-delete', function(e) {
        kategori_id = this.value
        $("#exampleModal").modal('show')
    })
    $('#delete').on('click', function(e) {
        e.preventDefault()
        var id = kategori_id
        $.ajax({
            type: "DELETE",
            url: "{{ url('/panel/kategori') }}".concat('/',id),
            dataType: 'json',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function (res) {
                var oTable = $('#data-table').dataTable()
                oTable.fnDraw(false)
                $('#exampleModal').modal('hide')
            }
        })
    })
</script>
@endsection