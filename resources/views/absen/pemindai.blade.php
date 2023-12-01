@extends('layouts.app')
@section('content')
    <!-- Include the ZXing library for QR code scanning -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <style>
        .html5-qr-code .qr-code-actions {
            display: none !important;
        }
    </style>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Pemindai Absen</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Pemindai Absen</li>
        </ol>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between">
                            <h5 class="card-title">Pemindai Absen</h5>
                            <a href="{{route('absen.index')}}" class="btn text-warning" title="Kembali"><i class="fa fa-backward"></i> Kembali</a>
                        </div>
                    </div>
                    <div class="card-body">
                        @include('layouts.message')
                        <div class="row justify-content-center">
                            <div class="col-6">
                                <div class="img-fluid">
                                    <div id="reader" width="600px"></div>
                                    <audio id="successSound" src="{{asset('assets/audio/beep.wav')}}"></audio>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead class="table-secondary">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Siswa</th>
                                        <th class="text-center">Status</th>
                                        <th>Waktu Absen</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($absen as $k => $v)
                                    <tr>
                                        <td>{{$k+1}}</td>
                                        <td>{{$v->siswa->nama}}</td>
                                        <td class="text-center">{!!$v->status ==  1 ? '<i class="fa fa-check text-success fw-bold"></i>' : '<i class="fa fa-x text-danger fw-bold"></i>'  !!}</td>
                                        <td>{{$v->waktu_absen}}</td>
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

    <script>
        function playSuccessSound() {
            let successSound = document.getElementById("successSound");
            successSound.play();
        }

        function onScanSuccess(decodedText, decodedResult) {
            playSuccessSound();
            // handle the scanned code as you like, for example:
            console.log(`Code matched = ${decodedText}`, decodedResult);
        }

        function onScanFailure(error) {
            // handle scan failure, usually better to ignore and keep scanning.
            // for example:
            // console.warn(`Code scan error = ${error}`);
        }

        let html5QrcodeScanner = new Html5QrcodeScanner(
        "reader",
        { fps: 10, qrbox: {width: 250, height: 250} },
        /* verbose= */ false);
        html5QrcodeScanner.render(onScanSuccess, onScanFailure);
    </script>
@endsection