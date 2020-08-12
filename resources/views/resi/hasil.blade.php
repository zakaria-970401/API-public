@extends('master.layout')

@section('judul', 'Tracking Resi')

@section('konten')
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="/assets/css/main.css">
<!------ Include the above in your HEAD tag ---------->

    
<div class="row">
    <div class="col mt-5">
        <h4 style="text-center"><center>TRACKING NOMER RESI</h4>
            <br><br>
            <form action="/resi" method="POST">
                @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1"><strong>Kurir : </label></strong>
            <select class="form-control col-md-3" id="courier" name="courier">
              <option>--Silahkan Pilih--</option>
              <option value="jne">JNE</option>
              <option value="pos">Pos Indonesia</option>
              <option value="jnt">J&T Ekspress</option>
              <option value="tiki">Tiki</option>
              <option value="sicepat">SiCepat</option>
              <option value="wahana">Wahana</option>
              <option value="ninja">Ninja Ekpress</option>
              <option value="lion">Lion</option>
              <option value="anteraja">AnterAja</option>
            </select>
          </div>
          <div class="form-group">
            <label for="no_resi"><strong> Resi :</label></strong>
            <input type="text" class="form-control col-md-3" id="no_resi" name="no_resi" placeholder="Masukan No. Resi" required>
          </div>
          <div class="col-md-3 mr-8">
              <button type="submit" class="btn btn-info btn-block">Cari</button>
            </div>
        </form>
           
        <strong><center><h3>Order Tracking</h3></center></strong>
            <hr>
            <div class="row">    
                <div class="col-md-9">
                <h6><strong>No Resi :</strong> {{ $kurir['waybill'] }}</h6><br>
                    <h6><strong> Kurir :</strong> {{ $kurir['courier'] }}</h6>
                    
                </div>
                <div class="col">
                    @if($kurir['received']['status'] == "Delivered")
                    <h6 class="bg-success"><strong>Nama Penerima :</strong> {{$kurir['received']['name']}}</h6><br>
                    <h6 class="bg-success"><strong> Waktu Di terima :</strong> {{$kurir['received']['date'].'WIB'}}</h6>
                    @else
                    <h6 class="bg-warning"><strong>Nama Penerima : </strong> Belum Di Terima</h6><br>
                    <h6 class="bg-warning"><strong> Waktu Di terima :</strong> Belum Di Terima</h6>
                    @endif
                </div>
            </div>
            <hr>
            <br>
                
            <table class="table table-bordered track_tbl">
                <thead>
                    <tr>
                        <th></th>
                        <th class="text-center">No.</th>
                        <th class="text-center">Tanggal</th>
                        <th class="text-center">Jam</th>
                        <th class="text-center">Kota/Provinsi</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @if($cekdata['result'] == true )

                    @foreach ($tracking as $track)
                    <tr class="active">
                        <td class="track_dot">
                            <span class="track_line"></span>
                        </td>
                        <td class="text-center">{{ $loop->iteration }}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($track['date'])->format('d M, Y')}}</td>
                        <td class="text-center">{{ \Carbon\Carbon::parse($track['date'])->format('h:i').' '.'WIB'}} </td>
                        <td  class="text-center">{{$track['currentDroppoint']['city'] . ','. ' '. $track['currentDroppoint']['province']}}</td>
                        <td class="text-center">{{$track['desc']}}</td>
                        <td class="text-center">
                            @if( $track['code'] == "1" ) <p class="bg-warning">Dikirim Penjual</p>
                            @elseif( $track['code'] == "2"  ) <p class="bg-info">Sedang Proses</p> 
                            @elseif( $track['code'] == "3"  ) <p class="bg-secondary">Transit Kota Pusat</p>       
                            @elseif( $track['code'] == "4"  ) <p class="bg-primary">Sudah Sampai Area Pembeli</p> 
                            @endif
                            @endforeach
                      </td>
                    </tr>
                    @else
                    <td colspan="8" class="bg-danger"><strong><center><h4 class="text-white">Tidak Di Temukan Data Resi!!</td></strong></h4>
                 </td>
               </tr>
                @endif
                </tbody>
            </table>
            </div>
    </div>
</div>
@endsection