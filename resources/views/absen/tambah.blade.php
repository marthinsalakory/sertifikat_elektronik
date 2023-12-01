@extends('layouts.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Absen</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Absen</li>
        </ol>
        <div class="row justify-content-center">
            <div class="col-md-12">
                @include('layouts.message')
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Tambah Data Absen</h5>
                            <a href="{{route('absen.index')}}" class="btn text-warning" title="Kembali"><i class="fa fa-backward"></i> Kembali</a>
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
                        <form action="{{route('absen.tambah')}}" method="POST">@csrf
                            <div class="form-group mt-3">
                                <label for="judul">Judul Absen</label>
                                <input type="text" name="judul" id="judul" class="form-control" value="{{@$absen->judul}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="kelas">Kelas</label>
                                <select name="kelas" id="kelas" class="form-control">
                                    <option value="">Pilih</option>
                                    @foreach ($kelas as $v)
                                        <option value="{{$v->kode}}">{{$v->nama}} ({{$v->jurusan->nama}})</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <label for="tanggal_absen">Tanggal Absen</label>
                                <input type="date" name="tanggal_absen" id="tanggal_absen" class="form-control" value="{{@$absen->tanggal_absen}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="waktu_mulai">Waktu Mulai</label>
                                <input type="time" name="waktu_mulai" id="waktu_mulai" class="form-control" value="{{@$absen->waktu_mulai}}">
                            </div>
                            <div class="form-group mt-3">
                                <label for="waktu_selesai">Waktu Selesai</label>
                                <input type="time" name="waktu_selesai" id="waktu_selesai" class="form-control" value="{{@$absen->waktu_selesai}}">
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