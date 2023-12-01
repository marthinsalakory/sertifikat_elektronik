@extends('layouts.app')
@section('content')
    <!-- Include the ZXing library for QR code scanning -->
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <!-- Tombol untuk memicu pemindaian QR -->

    <!-- Tampilkan hasil pemindaian -->
    <h1 class="mt-4">Dashboard</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    {{-- <div style="width: 500px; height: 500px;">
        <div id="reader" width="600px"></div>
    </div> --}}

    <script>
        function onScanSuccess(decodedText, decodedResult) {
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