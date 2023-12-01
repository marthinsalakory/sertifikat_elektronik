@extends('layouts.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pengguna</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pengguna</li>
        </ol>
        @include('layouts.message')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Data Pengguna</h5>
                            <a href="{{route('pengguna.tambah')}}" class="btn text-primary" title="Tambah"><i class="fa fa-add"></i> Tambah</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('layouts.message')
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped" id="datatablesSimple">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Nama Pengguna</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($pengguna as $k => $v)
                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{$v->nama}}</td>
                                        <td>{{$v->nama_pengguna}}</td>
                                        <td class="text-center">
                                            <a href="{{route('pengguna.tambah', $v->id)}}" class="btn text-warning btn-xs" title="Ubah"><i class="fa fa-edit"></i></a>
                                            <a href="{{route('pengguna.hapus', $v->id)}}" class="btn text-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i></a>
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