@extends('master.layout')

@section('judul', 'Halaman Utama')

@section('konten')
    
<br><br><br><br><br><br><br><br>
<div class="row">
    <div class="col-md-4 mt-3">
        <a href="/ongkir">
            <img src="/assets/img/ongkir.png" class="img-responsive" alt="Cinque Terre" height="350" width="350">
            <br>
            <br>
            <center><h5 class="text-dark">Cek Tarif Ongkir</h5>
            </a>
        </div>
        <div class="col-md-4 mt-3">
            <a href="/ktp">
                <img src="/assets/img/ktp.png" class="img-responsive" alt="Cinque Terre" height="350" width="350">
                <br>
                <br>
                <center><h5 class="text-dark">Tracking KTP</h5>
                </a>
            </div>
            <div class="col-md-4 mt-3">
                <a href="/resi">
                    <img src="/assets/img/resi.png" class="img-responsive" alt="Cinque Terre" height="350" width="350">
                    <br>
                    <br>
                    <center><h5 class="text-dark">Tracking Resi</h5>
                    </a>
                </div>
            </div>
@endsection