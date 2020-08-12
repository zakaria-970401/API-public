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
            <input type="text" class="form-control col-md-3" id="no_resi" name="no_resi" placeholder="Masukan No. Resi">
          </div>
          <div class="col-md-3 mr-8">
              <button type="submit" class="btn btn-info btn-block"><i class="fa fa-search ">Cari</i></button>
            </div>
        </form>
           
            <hr style="background-color:red">
     </div>
</div>


@endsection