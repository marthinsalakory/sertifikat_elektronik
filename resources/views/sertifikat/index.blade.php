@extends('layouts.app')
@section('content')

<!-- CDN html2canvas -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>


<style type="text/css">
  .hidden {
    display: none;
  }

  .pembungkus {
    position: relative;
  }

  #show-nama {
    position: absolute;
    top: 41%;
    left: 35%;
    right: 35%;
    color: black;
    font-weight: bold;
    font-size: 48px;
    text-align: center;
    text-transform: capitalize;
  }

  #show-deskripsi {
    position: absolute;
    top: 53%;
    left: 20%;
    right: 20%;
    color: black;
    font-weight: bold;
    font-size: 18px;
    text-align: center;
    text-transform: capitalize;
  }

  #show-pembicara {
    position: absolute;
    right: 15%;
    bottom: 16.7%;
    color: black;
    font-weight: bold;
    font-size: 15px;
    text-align: center;
    text-transform: capitalize;
  }

  #show-tanggal {
    position: absolute;
    left: 20%;
    bottom: 15%;
    color: black;
    font-weight: bold;
    font-size: 15px;
  }

  /*web mobile*/
  @media (max-width: 575.98px) {
    .hidden {
      display: none;
    }

    .pembungkus {
      position: relative;
    }

    #show-nama {
      position: absolute;
      top: 41%;
      left: 10%;
      right: 10%;
      color: black;
      font-weight: bold;
      font-size: 16px;
      text-align: center;
      text-transform: capitalize;
    }

    #show-deskripsi {
      position: absolute;
      top: 53%;
      left: 20%;
      right: 20%;
      color: black;
      font-weight: bold;
      font-size: 7px;
      text-align: center;
      text-transform: capitalize;
    }

    #show-pembicara {
      position: absolute;
      right: 22%;
      bottom: 15%;
      color: black;
      font-weight: bold;
      font-size: 8px;
      text-align: center;
      text-transform: capitalize;
    }

    #show-tanggal {
      position: absolute;
      left: 15%;
      bottom: 15%;
      color: black;
      font-weight: bold;
      font-size: 8px;
    }
  }
</style>
<div class="container mt-3" id="container">
  <h1 class="mt-4">Sertifikat</h1>
  <ol class="breadcrumb mb-4">
      <li class="breadcrumb-item active">Sertifikat</li>
  </ol>
  @include('layouts.message')
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <h5 class="card-title">SERTIFIKAT</h5>
        <a class="btn btn-success btn-sm" id="button" href="#gambar"><i class="fa fa-eye"></i> Preview</a>
      </div>
    </div>
    <div class="card-body">
      <div class="row justify-content-center">
        <div class="col-12">
          <div class="info">

          </div>
          <div class="form-group mb-3">
            <label>Nama</label>
            <input type="text" class="form-control" placeholder="Masukkan nama lengkap" id="nama">
          </div>
          <div class="form-group mb-3">
            <label>Deskripsi</label>
            <textarea type="text" class="form-control" placeholder="Mansukkan deskripsi" style="height: 120px" id="deskripsi">
              Telah menyelesaikan magang di Kantor Dinas Komunikasi dan Informasi Provinsi Maluku</textarea>
          </div>
          <div class="form-group mb-3">
            <label>Kepala Bidang Layanan Komunikasi dan Informasi</label>
            <input type="text" class="form-control" placeholder="Masukkan nama pembicara" id="pembicara" value="JOHN A. RUMALAWANG, S.Sos.M.Si">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="container mt-3">
  <div class="card">
    <div class="card-header">
      <div class="d-flex justify-content-between">
        <h5 class="card-title">Pratinjau Sertifikat</h5>
        <div class="form-group">
          <button onclick="downloadDivAsImage()" class="btn btn-warning btn-sm"><i class="fa fa-download"></i> Unduh</button>
          <a id="simpan_sertifikat" href="{{route('sertifikat.simpan')}}" class="btn btn-primary btn-sm"><i class="fa fa-save"></i> Simpan</a>
        </div>
      </div>
    </div>
    <div class="card-body">
      <div class="pembungkus" id="pembungkus">
        <img src="{{url('assets/img/template.jpg')}}" class="img-thumbnail" id="gambar">
        <p id="show-nama"></p>
        <p id="show-deskripsi">Telah menyelesaikan magang di Kantor Dinas Komunikasi dan Informasi Provinsi Maluku</p>
        <p class="border" id="show-pembicara">JOHN A. RUMALAWANG, S.Sos.M.Si</p>
        <p id="show-tanggal"></p>
      </div>
  </div>
</div>


<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript">
  //menampilkan text
  $(document).ready(function() {
    $('#button').click(function() {
      var nama = $('#nama').val();
      var kelas = $('#kelas').val();
      var deskripsi = $('#deskripsi').val();
      var pembicara = $('#pembicara').val();
      $('#show-nama').text(nama);
      $('#simpan_sertifikat').attr('href', "{{url('sertifikat/simpan')}}/" + nama);
      $('#show-kelas').text(kelas);
      $('#show-deskripsi').text(deskripsi);
      $('#show-pembicara').text(pembicara);
    });
  });
</script>
<script>
  //menampilkan tanggal hari ini
  var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
  var date = new Date();
  var day = date.getDate();
  var month = date.getMonth();
  var year = date.getYear();
  var tahun = (year < 1000) ? year + 1900 : year;
  document.getElementById("show-tanggal").innerHTML = "Date: " + day + " " + months[month] + " " + tahun;
</script>

<script>
  function downloadDivAsImage() {
    const divToDownload = document.getElementById('pembungkus');

    // Menggunakan html2canvas untuk merender div sebagai gambar
    html2canvas(divToDownload).then(function(canvas) {
      // Mengonversi gambar canvas menjadi URL data
      const image = canvas.toDataURL('image/png');

      // Buat sebuah tautan untuk pengunduhan
      const link = document.createElement('a');
      link.download = 'e_sertifikat.png';
      link.href = image;

      // Menambahkan tautan ke dokumen dan mengkliknya secara otomatis
      document.body.appendChild(link);
      link.click();

      // Membersihkan tautan setelah proses unduh selesai
      document.body.removeChild(link);
    });
  }
</script>
@endsection