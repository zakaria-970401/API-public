<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class ResiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('resi.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pencarian(Request $request)
    {


        $kurir = Http::get('https://api.binderbyte.com/cekresi', [
            'awb' => $request->no_resi,
            'api_key' => 'f9d4c0158f97156b5cbfb5222e5cc21bc2b9394586dd6de1958d52c674f75d52',
            'courier' => $request->courier,
        ])->json()['data'];

        $status = Http::get('https://api.binderbyte.com/cekresi', [
            'awb' => $request->no_resi,
            'api_key' => 'f9d4c0158f97156b5cbfb5222e5cc21bc2b9394586dd6de1958d52c674f75d52',
            'courier' => $request->courier,
        ])->json()['data']['received'];

        $cekdata = Http::get('https://api.binderbyte.com/cekresi', [
            'awb' => $request->no_resi,
            'api_key' => 'f9d4c0158f97156b5cbfb5222e5cc21bc2b9394586dd6de1958d52c674f75d52',
            'courier' => $request->courier,
        ])->json();


        // $pengirim = Http::get('https://api.binderbyte.com/cekresi', [
        //     'awb' => $request->no_resi,
        //     'api_key' => 'f9d4c0158f97156b5cbfb5222e5cc21bc2b9394586dd6de1958d52c674f75d52',
        //     'courier' => $request->courier,
        // ])->json()['data']['tracking'][9]['currentDroppoint'];

        $tracking = Http::get('https://api.binderbyte.com/cekresi', [
            'awb' => $request->no_resi,
            'api_key' => 'f9d4c0158f97156b5cbfb5222e5cc21bc2b9394586dd6de1958d52c674f75d52',
            'courier' => $request->courier,
        ])->json()['data']['tracking'];


        // dump($cekdata);

        return view('resi.hasil', compact('kurir', 'tracking', 'cekdata', 'status'));
    }
}
