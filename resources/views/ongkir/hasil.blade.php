@extends('master.layout')

@section('judul', 'Cek Tarif Ongkir')


@section('konten')

<div class="row">
    <div class="col mt-5">
    <h3>Cek Ongkirrrr</h3>
    <hr style="background: red">
    <div class="card" style="width: 70rem; height: 60rem;" >
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
                    <div class="row">
                        <div class="col mt-3">
                            <hr style="background: red">
                            <h3 class="text-center">Hasil Hitung Ongkos Kirim</h3>
                            <hr style="background: red">
                        </div>
                    </div>
                    <div class="row">
                      <div class="col-md-9">
                        <h6>Asal Paket : {{$asalpaket['province']}}, {{$asalpaket['city_name']}}  </h6>
                        <h6>Berat Paket : {{$beratpaket['weight'] / 1000 }} Kg </h6>
                      </div>
                      <div class="col-md-2">
                        <h6>Tujuan Paket : {{$tujuanpaket['province']}} , {{$tujuanpaket['city_name']}} </h6>
                        <h6>Jasa Ekpedisi : {{$beratpaket['courier'] }} </h6>
                      </div>
                    </div>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                          <tr>
                            <th class="text-center">No.</th>
                            <th class="text-center">Asal Provinsi</th>
                            <th class="text-center">Asal Kota</th>
                            <th class="text-center">Tujuan Povinsi</th>
                            <th class="text-center">Tujuan Kota</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td class="text-center">1</th>
                            <td class="text-center">{{$asalpaket['province']}}</td>
                            <td class="text-center">{{$asalpaket['city_name']}}</td>
                            <td class="text-center">{{$tujuanpaket['province']}}</td>
                            <td class="text-center">{{$tujuanpaket['city_name']}}</td>
                          </tr>
                          <td colspan="5" style="background: aqua"><center><strong>JENIS SERVICE EKPEDISI</td></strong>
                        </td>
                        <tr>
                          @foreach ($ongkir as $ong => $value)             
                          <td colspan="1" style="background: gold"><center><strong>{{$value['description']}}</td></strong>
                            <td class="text-center">Estimasi Waktu Pengiriman : </td>
                            <td class="text-center"><strong>{{$value['cost'][0]['etd']}} Hari</td></strong>
                            <td class="text-center">Harga :</td>
                            <td class="text-center" colspan="1"><h4>Rp. <strong>{{$value['cost'][0]['value']}}</strong></h4></td></td>
                          </tr>
                        </td>
                          @endforeach
                      </td>
                      </tr>
                      </tbody>
                      </table>
                </div>            
            </div>
        </div>
    </div>

            <script type="text/javascript">
                $(document).ready(function() {
                    placeholder: "Select a state",
    $('.myselect').select2();
});
            </script>
@endsection