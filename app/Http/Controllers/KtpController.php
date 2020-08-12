<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KtpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('ktp.index');
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
        $identitas = Http::get('https://api.binderbyte.com/cekktp', [
            'nik' => $request->ktp,
            'nama' => $request->nama,
            'api_key' => 'f9d4c0158f97156b5cbfb5222e5cc21bc2b9394586dd6de1958d52c674f75d52',
        ])->json()['data'];

        $status = Http::get('https://api.binderbyte.com/cekktp', [
            'nik' => $request->ktp,
            'nama' => $request->nama,
            'api_key' => 'f9d4c0158f97156b5cbfb5222e5cc21bc2b9394586dd6de1958d52c674f75d52',
        ])->json();

        // dd($identitas);

        return view('ktp.hasil', compact('identitas', 'status'));
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
}
