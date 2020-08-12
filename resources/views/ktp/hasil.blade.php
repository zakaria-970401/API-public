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
    <div class="row">
        <div class="col">
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col" class="text-center">No.</th>
                    <th scope="col" class="text-center">Nama</th>
                    <th scope="col" class="text-center">Tempat Lahir</th>
                    <th scope="col" class="text-center">Jenis Kelamin</th>
                    <th scope="col" class="text-center">Provinsi</th>
                    <th scope="col" class="text-center">Kota/Kabupaten</th>
                    <th scope="col" class="text-center">Kecamatan</th>
                    <th scope="col" class="text-center">Kelurahan</th>
                  </tr>
                </thead>
                <tbody>
                  @if ($status['message'] == "success")
                  <tr>
                    <th scope="row">1</th>
                    <td class="text-center"> {{ $identitas['nama'] }}</td>
                    <td class="text-center">{{ $identitas['tempat_lahir'] }}</td>
                    <td class="text-center">
                      @if( $identitas['jenis_kelamin'] =="L" ) Laki-Laki
                      @elseif( $identitas['jenis_kelamin'] =="P" ) Perempuan
                      @endif
                    </td>
                    <td class="text-center">{{ $identitas['namaPropinsi'] }}</td>
                    <td class="text-center">{{ $identitas['namaKabko'] }}</td>
                    <td class="text-center">{{ $identitas['namaKec'] }}</td>
                    <td class="text-center" >{{ $identitas['namaKel'] }}</td>
                  </td>
                  </tr>
                  @else
                  <tr>
                    <td colspan="8" class="text-center" style="background: yellow"><h4>Data Tidak Di Temukan, Mohon Periksa NIK Dan Nama </td></h4>
                  </td>
                </tr>
              </div>
            </tbody>
          </table>
          @endif
        </div>
</div>

@endsection