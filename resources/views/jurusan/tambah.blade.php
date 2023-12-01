@extends('layouts.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Jurusan</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Jurusan</li>
        </ol>
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts.message')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Tambah Data Jurusan</h5>
                            <a href="{{route('jurusan.index')}}" class="btn text-warning" title="Kembali"><i class="fa fa-backward"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form action="{{route('jurusan.tambah', @$jurusan->kode)}}" method="POST">@csrf
                            <div class="form-group mt-3">
                                <label for="kode">Kode</label>
                                <input type="text" name="kode" id="kode" class="form-control" value="{{@$jurusan->kode}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="nama">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="{{@$jurusan->nama}}">
                            </div>
                            <div class="form-group mt-3 text-center">
                                <button class="btn btn-primary rounded rounded-0 w-25">Simpan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection