@extends('layouts.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tambah Pengguna</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Tambah Pengguna</li>
        </ol>
        @include('layouts.message')
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts.message')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Tambah Data Pengguna</h5>
                            <a href="{{route('pengguna.index')}}" class="btn text-warning" title="Kembali"><i class="fa fa-backward"></i> Kembali</a>
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
                        <form action="{{route('pengguna.tambah', @$pengguna->id)}}" method="POST">@csrf
                            <div class="form-group mt-3">
                                <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" class="form-control" value="{{@$pengguna->nama}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="nama_pengguna">Nama Pengguna</label>
                                <input type="text" name="nama_pengguna" id="nama_pengguna" class="form-control" value="{{@$pengguna->nama_pengguna}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="kata_sandi">Kata Sandi Baru</label>
                                <input type="password" name="kata_sandi" id="kata_sandi" class="form-control">
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