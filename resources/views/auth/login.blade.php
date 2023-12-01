@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <a href="{{url('/')}}" class="card-header text-center text-decoration-none text-dark">
                    <img width="100" src="{{asset('assets/img/logo.png')}}" alt="">
                    <h3 class=" mt-3">{{ config('app.name') }}</h3>
                </a>

                <div class="card-body">
                    @if ($errors->any())
                        <p class="text-danger fw-bold text-center">Gagal Masuk!</p>
                    @endif
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nama_pengguna" class="col-md-4 col-form-label text-md-end">Nama Pengguna</label>

                            <div class="col-md-6">
                                <input id="nama_pengguna" type="text" class="form-control @if($errors->any()) is-invalid @endif" name="nama_pengguna" value="{{ old('nama_pengguna') }}" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Kata Sandi</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @if($errors->any()) is-invalid @endif" name="password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary rounded rounded-0 w-50">Masuk Aplikasi</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
