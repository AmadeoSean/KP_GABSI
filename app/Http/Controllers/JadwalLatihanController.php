<?php

namespace App\Http\Controllers;

use App\Models\JadwalLatihan;
use App\Models\Atlet;
use App\Models\Grup;
use App\Models\Latihan;
use App\Models\Pasangan;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class JadwalLatihanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
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

    public function detailLatihan($id)
    {    
        $jadwalLatihan = JadwalLatihan::find($id);
        $latihan = $jadwalLatihan->latihan;
        $pasangans = $latihan->grup->pasangans;
        return view('latihan/detail_latihan', compact('jadwalLatihan', 'pasangans', 'latihan'));
    }


    public function detailLatihanAtlet($id)
    {    
        // dd($id);
        $jadwalLatihan = JadwalLatihan::find($id);
        $latihan = $jadwalLatihan->latihan;
        $pasangans = $latihan->grup->pasangans;
        // dd($pasangans);
        // dd($latihan);
        foreach($pasangans as $pasangan){
            if($pasangan->id_atlet_1 == Auth::user()->atlet->id || $pasangan->id_atlet_2 == Auth::user()->atlet->id){
                return view('latihan/detail_latihan', compact('jadwalLatihan', 'pasangan', 'latihan'));
            }
        }
        
      
        // dd('atlet 1 = '.$pasangans->atlet_1 . 'atlet 2 = '. $pasangans->atlet_2);
       
    }

    

    public function create()
    {
        $this->authorize('pelatih');
        $atlet = Atlet::all();
        return view('latihan/tambah_jadwal',compact('atlet'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //blom selesai 
        // dd($request);
        $this->authorize('pelatih');
        $grup = new Grup();
        $grup->save();
        // dd($request);
        $jadwalLatihan = new JadwalLatihan();
        $jadwalLatihan->nama  = $request->get('title');
        $jadwalLatihan->tanggal_latihan  = $request->get('date');
        $jadwalLatihan->jam_latihan = $request->get('time');
        $jadwalLatihan->lokasi = $request->get('location');
        $jadwalLatihan->id_pelatih = Auth::user()->pelatih->id;
        $jadwalLatihan->created_at = Carbon::now();
        $jadwalLatihan->updated_at = Carbon::now();
        $jadwalLatihan->save();
        

        

        $jml_pasangan = $request->get('jml_pasangan');
        for($i = 1; $i <= $jml_pasangan; $i++){
            $pasangan = new Pasangan();
            $pasangan->id_atlet_1 = $request->get('atlet_1_pasangan_'.$i);
            $pasangan->id_atlet_2 = $request->get('atlet_2_pasangan_'.$i);
            $pasangan->grup_id = $grup->id;
            $pasangan->save();
               
        }
        $latihan = new Latihan();
        $latihan->grup_id = $grup->id;
        $latihan->jadwal_latihan_id = $jadwalLatihan->id;
        $latihan->save();
        
      
        
    

        Session::flash('status', 'update_data_berhasil');
        Session::flash('message', 'Data berhasil ditambahkan');
        return redirect()->route('pelatih');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function show(JadwalLatihan $latihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function edit(JadwalLatihan $latihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JadwalLatihan $latihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Latihan  $latihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JadwalLatihan $latihan)
    {
        //
    }

}
