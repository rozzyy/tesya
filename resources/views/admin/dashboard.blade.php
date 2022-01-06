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
                    <li class="breadcrumb-item"><a href="#!">Dashboard</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('konten')
      <div>
          <h1>Halaman Dashboard</h1>
          @if(Session::has('message'))
            <div class="alert alert-success">
                {!! session('message') !!}
            </div>
           @endif
      </div>
@endsection