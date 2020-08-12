<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class OngkirController extends Controller
{
    public function index()
    {

        $listkota = Http::get('https://api.rajaongkir.com/starter/city', [
            'key' => '76108c50082cc3ff2d6eba30add48dc0',
        ])->json()['rajaongkir']['results'];

        $kota = collect($listkota);

        $kota->transform(function ($paramkota) {

            $type = [
                'Kabupaten' => 'Kab. ',
                'Kota' => 'Kota ',
            ][$paramkota['type']];

            $paramkota['option'] = $type . $paramkota['city_name'];
            return $paramkota;
        });


        return view('ongkir.index', compact('provinsi', 'kota'));
    }

    public function hitungongkir(Request $request)
    {

        $listkota = Http::get('https://api.rajaongkir.com/starter/city', [
            'key' => '76108c50082cc3ff2d6eba30add48dc0',
        ])->json()['rajaongkir']['results'];

        $kota = collect($listkota);

        $kota->transform(function ($paramkota) {

            $type = [
                'Kabupaten' => 'Kab. ',
                'Kota' => 'Kota ',
            ][$paramkota['type']];

            $paramkota['option'] = $type . $paramkota['city_name'];
            return $paramkota;
        });


        $asalpaket = Http::POST('https://api.rajaongkir.com/starter/cost', [
            'key' => '76108c50082cc3ff2d6eba30add48dc0',
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier,
        ])->json()['rajaongkir']['origin_details'];

        $beratpaket = Http::POST('https://api.rajaongkir.com/starter/cost', [
            'key' => '76108c50082cc3ff2d6eba30add48dc0',
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier,
        ])->json()['rajaongkir']['query'];

        $tujuanpaket = Http::POST('https://api.rajaongkir.com/starter/cost', [
            'key' => '76108c50082cc3ff2d6eba30add48dc0',
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier,
        ])->json()['rajaongkir']['destination_details'];


        $ongkir = Http::POST('https://api.rajaongkir.com/starter/cost', [
            'key' => '76108c50082cc3ff2d6eba30add48dc0',
            'origin' => $request->origin,
            'destination' => $request->destination,
            'weight' => $request->weight,
            'courier' => $request->courier,
        ])->json()['rajaongkir']['results'][0]['costs'];

        // $ongkirr = Http::POST('https://api.rajaongkir.com/starter/cost', [
        //     'key' => '76108c50082cc3ff2d6eba30add48dc0',
        //     'origin' => $request->origin,
        //     'destination' => $request->destination,
        //     'weight' => $request->weight,
        //     'courier' => $request->courier,
        // ])->json()['rajaongkir']['results'][0]['costs'][0];

        // $collect = collect($ongkirr)->mapWithKeys(function ($paramongkir) {
        //     return [$paramongkir['value'] => $paramongkir['etd']];
        // });

        // dd($ongkir);

        return view('ongkir.hasil', compact('asalpaket', 'tujuanpaket', 'beratpaket', 'ongkir', 'provinsi', 'kota'));
    }
}
