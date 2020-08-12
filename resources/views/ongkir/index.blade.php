@extends('master.layout')

@section('judul', 'Cek Tarif Ongkir')


@section('konten')

<div class="row">
    <div class="col mt-5">
    <h3>Cek Ongkirrrr</h3>
    <hr style="background: red">
    <div class="card" style="width: 70rem; height: 50rem;" >
        <div class="card-body">
            <form action="/ongkir" method="POST">
              @csrf
            <div class="row">
                <div class="col-md-6">
                        <label><strong> Asal Paket</label></strong>   
                    <div class="form-group">
                        <select class="myselect" id="origin" name="origin" style="width: 500px">
                          <option>--Pilih Kota--</option>
                           @foreach ($kota as $city)
                           <option value=" {{ $city['city_id']}} ">{{ $city['option']}}</option>    
                           @endforeach
                          </select>
                       </div>
                      <div class="form-group">
                        <label><strong> Berat Paket :</label></strong>
                        <input type="text" class="form-control" id="weight" name="weight" placeholder="Masukan Berat Paket">
                        <small class="text-danger">* Dalam Gram, Contoh = 1700 / 1.7Kg</small>
                      </div>
                    </div>
                    <div class="col-md-6">
                            <label><strong> Tujuan Paket</label></strong>
                          <div class="form-group">
                            <select class="myselect" id="destination" name="destination" style="width: 500px">
                              <option>--Pilih Kota--</option>
                              @foreach ($kota as $city)
                              <option value=" {{ $city['city_id']}} ">{{ $city['option']}}</option>    
                              @endforeach
                             </select>
                          </div>
                          <div class="form-group">
                            <label><strong>Kurir/Jasa Ekspedisi</label></strong>
                            <select class="myselect" id="courier" name="courier" style="width: 500px">
                              <option>--Pilih kurir--</option>
                              <option value="pos">POS INDONESIA</option>
                              <option value="tiki">TIKI </option>
                              <option value="jne">JNE</option>
                           </select>
                          </div>
                        </div>
                        <button type="submit" id="btn_hitung" class="btn btn-success btn-lg btn-block"><i class="fa fa-money"> Hitung Ongkir</button></i>
                      </form>
                    </div>
                    

            <script type="text/javascript">
                $(document).ready(function() {
                    placeholder: "Select a state",
    $('.myselect').select2();
});
            </script>
@endsection