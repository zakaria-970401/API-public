@extends('master.layout')

@section('judul', 'Tracking KTP')

@section('konten')

    <div class="row">
        <div class="col-md-5 mt-5">
            <h3 class="text-center">Tracking Nomer KTP</h3>
            <hr style="background-color: red">
            
            <form action="/ktp" method="POST">
                @csrf
                <div class="form-group">
                <label>Masukan No. KTP :</label>
                <input type="text" class="form-control col-8" id="ktp" name="ktp" required>
                </div>
        </div>
        <div class="col-md-5 mt-3"><br><br><br><br>
        <div class="form-group">
                <label>Masukan Nama :</label>
                <input type="text" class="form-control col-8" id="nama" name="nama" required>
                <small id="nama" class="form-text text-danger">* Nama Depan Atau Nama Lengkap</small>
                </div>
        </div>
        <div class="col-md-8">
            <button type="submit" class="btn btn-success btn-lg btn-block"><i class="fa fa-search"> Cari</i></button>
        </div>
    </div>
    <br>
    <hr>
    
        </div>
    </div>
</div>

@endsection