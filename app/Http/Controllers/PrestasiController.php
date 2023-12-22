<?php

namespace App\Http\Controllers;

use App\Models\Kejuaraan;
use App\Models\Prestasi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * 
     */

   

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('atlet');
        $kejuaraan = Kejuaraan::all();
        return view('prestasi/tambah_data_prestasi', compact('kejuaraan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('atlet');
        $data = new Prestasi();
        $data->id_kejuaraan = $request->get('kejuaraan_id');
        $data->id_atlet = Auth::user()->atlet->id;
        $data->nomor_spesialis = $request->get('nomor_spesialis');
        $data->peringkat = 'Juara '.$request->get('peringkat');
        $data->point = $request->get('point');
        $data->keterangan = $request->get('keterangan');
        $data->created_at = Carbon::now();
        $data->updated_at = Carbon::now();
        $data->save();
    

        Session::flash('status', 'update_data_berhasil');
        Session::flash('message', 'Data berhasil ditambahkan');
        return redirect()->route('atlet-daftar_prestasi');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('atlet');
        $prestasi = Prestasi::find($id);
        $kejuaraan = Kejuaraan::all();
        // dd($kejuaraan);
        return view('prestasi/detail_prestasi', compact('prestasi', 'kejuaraan'));
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
        $this->authorize('atlet');
        $prestasi = Prestasi::find($id);
        $prestasi->id_kejuaraan = $request->get("kejuaraan_id");
        $prestasi->nomor_spesialis = $request->get("nomor_spesialis");
        $prestasi->point = $request->get("point");
        $prestasi->peringkat = $request->get("peringkat");
        $prestasi->keterangan = $request->get("keterangan");
        $prestasi->save();

        // $user_atlet = User::find($atlet->user_id);
        // $user_atlet->email = $request->get("email");
        // $user_atlet->save();
      
        Session::flash('status', 'update_data_berhasil');
        Session::flash('message', 'Data berhasil diupdate');
        return redirect()->route('atlet-daftar_prestasi');
      
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
