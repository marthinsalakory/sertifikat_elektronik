@extends('layouts.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Absen</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Absen</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Data Absen</h5>
                            <a href="{{route('absen.tambah')}}" class="btn text-primary" title="Tambah"><i class="fa fa-add"></i> Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('layouts.message')
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="datatablesSimple">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Absen</th>
                                        <th>Judul</th>
                                        <th>Tanggal Absen</th>
                                        <th>Waktu Mulai</th>
                                        <th>Waktu Selesai</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($absen as $k => $v)
                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{$v->kode_absen}}</td>
                                        <td>{{$v->judul}}</td>
                                        <td>{{$v->tanggal_absen}}</td>
                                        <td>{{$v->waktu_mulai}}</td>
                                        <td>{{$v->waktu_selesai}}</td>
                                        <td>
                                            <a href="{{route('absen.pemindai', $v->kode_absen)}}" class="btn text-primary"><i class="fa fa-qrcode"></i></a>
                                            <a href="{{route('absen.hapus', $v->kode_absen)}}" class="btn text-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection