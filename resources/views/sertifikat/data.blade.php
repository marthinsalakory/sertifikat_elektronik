@extends('layouts.app')

@section('content')
    <div class="container-fluid mt-3">
        <h1 class="mt-4">Data Sertifikat</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Data Sertifikat</li>
        </ol>
        @include('layouts.message')
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <h5>Data Sertifikat</h5>
                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#tambah"><i class="fa fa-add"></i> Tambah</button>
                </div>
            </div>
            <div class="modal fade" id="tambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Sertifikat</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                      <form action="{{route('sertifikat.post')}}" method="POST">@csrf
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="text" name="nama" id="nama" value="{{old('nama')}}" class="form-control @error('nama') is-invalid @enderror">
                            @error('nama')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="text-end">
                            <button name="button" value="pratinjau" class="btn btn-warning mt-3 btn-sm"><i class="fa fa-eye"></i> Pratinjau</button>
                            <button name="button" value="simpan" class="btn btn-primary mt-3 btn-sm"><i class="fa fa-save"></i> Simpan</button>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="datatablesSimple">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Di Tambahkan Oleh</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sertifikat as $k => $v)
                                <tr>
                                    <th>{{$k+1}}</th>
                                    <td>{{$v->nama}}</td>
                                    <td>{{@$v->user->nama}}</td>
                                    <td>
                                        <a href="{{route('sertifikat.lihat', $v->id)}}" class="btn btn-primary btn-xs" title="Lihat"><i class="fa fa-eye"></i></a>
                                        <a onclick="return confirm('Hapus?')" href="{{route('sertifikat.hapus', $v->id)}}" class="btn btn-danger btn-xs" title="Hapus"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Menggunakan JavaScript untuk memicu tampilan modal saat halaman dimuat
                var myModal = new bootstrap.Modal(document.getElementById('tambah'));
                myModal.show();
            });
        </script>
    @endif
@endsection