<?php

namespace App\Http\Controllers;

use App\Models\CatatanPartner;
use App\Models\CatatanPelatih;
use App\Models\Latihan;
use Illuminate\Http\Request;


class LatihanController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function tambahCatatanDiri(Request $request, $id)
    {
        // dd($request);
        $catatan = CatatanPelatih::find($request->get('catatan_id'));
        $catatan->catatan_diri = $request->get('isiCatatan');   
        $catatan->save();
        return redirect('/atlet/latihan/detail_latihan/'.$id);
    }

    public function tambahCatatanPartner(Request $request, $id)
    {
       
        $catatan = new CatatanPartner();
        $catatan->nama_catatan = $request->get('namaCatatan');   
        $catatan->catatan_partner = $request->get('isiCatatan'); 
        $catatan->atlet_id = $request->get('atlet_id');
        $catatan->latihan_id = $request->get('latihan_id');
        $catatan->save();
        // $jadwalLatihan = JadwalLatihan::find($id);                          
        // $latihan = $jadwalLatihan->latihan;      
        // $pasangans = $latihan->grup->pasangans;      
        return redirect('/atlet/latihan/detail_latihan/'.$id);
    }

    public function tambahCatatanPelatih(Request $request, $id)
    {
        // dd($request);
        $catatan = new CatatanPelatih();
        $catatan->nama_catatan = $request->get('namaCatatan');   
        $catatan->catatan_pelatih = $request->get('isiCatatan'); 
        $catatan->latihan_id = $request->get('latihan_id');
        $catatan->pasangan_id = $request->get('pasangan');
        $catatan->save();
        // $jadwalLatihan = JadwalLatihan::find($id);                          
        // $latihan = $jadwalLatihan->latihan;      
        // $pasangans = $latihan->grup->pasangans;      
        return redirect('/pelatih/latihan/detail_latihan/'.$id);
    }
    public function getEditCatatanPelatih(Request $request){
        $catatan_id = $request->get('catatan_id');
        $jadwal_latihan_id = $request->get('jadwal_latihan_id');
        // dd($latihan_id .' & '. $catatan_id);
        // $data = Latihan::find($latihan_id)->catatanPelatih()->where('id',$catatan_id);
        $catatan = CatatanPelatih::find($catatan_id);
        return response()->json(array(
            'status'=>'oke',
            'msg'=> view('latihan.updateCatatanPelatihModal', compact('catatan', 'jadwal_latihan_id'))->render()
        ), 200);
    }
    
    public function EditCatatanPelatih(Request $request, $jadwal_latihan_id, $catatan_id)
    {
        // dd($request);
        $catatan = CatatanPelatih::find($catatan_id);
        $catatan->nama_catatan = $request->get('namaCatatan');
        $catatan->catatan_pelatih = $request->get('isiCatatan');
        $catatan->save();

        return redirect('/pelatih/latihan/detail_latihan/'.$jadwal_latihan_id);
    }

    public function getEditCatatanPartner(Request $request){
        // dd($request);
        $catatan_id = $request->get('catatan_id');
        $jadwal_latihan_id = $request->get('jadwal_latihan_id');
        // dd($latihan_id .' & '. $catatan_id);
        // $data = Latihan::find($latihan_id)->catatanPelatih()->where('id',$catatan_id);
        $catatan = CatatanPartner::find($catatan_id);
        return response()->json(array(
            'status'=>'oke',
            'msg'=> view('latihan.updateCatatanPartner', compact('catatan', 'jadwal_latihan_id'))->render()
        ), 200);
    }
    
    public function EditCatatanPartner(Request $request, $jadwal_latihan_id, $catatan_id)
    {
        $catatan = CatatanPartner::find($catatan_id);
        $catatan->nama_catatan = $request->get('namaCatatan');
        $catatan->catatan_partner = $request->get('isiCatatan');
        $catatan->save();
        return redirect('/atlet/latihan/detail_latihan/'.$jadwal_latihan_id);
    }

    public function getEditCatatanDiri(Request $request){
        // dd($request);
        $catatan_id = $request->get('catatan_id');
        $jadwal_latihan_id = $request->get('jadwal_latihan_id');
        // dd($latihan_id .' & '. $catatan_id);
        // $data = Latihan::find($latihan_id)->catatanPelatih()->where('id',$catatan_id);
        $catatan = CatatanPartner::find($catatan_id);
        return response()->json(array(
            'status'=>'oke',
            'msg'=> view('latihan.updateCatatanDiri', compact('catatan', 'jadwal_latihan_id'))->render()
        ), 200);
    }
    
    public function EditCatatanDiri(Request $request, $jadwal_latihan_id, $catatan_id)
    {
        $catatan = CatatanPartner::find($catatan_id);
        $catatan->catatan_diri = $request->get('isiCatatan');
        $catatan->save();
        return redirect('/atlet/latihan/detail_latihan/'.$jadwal_latihan_id);
    }
    
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
     * @param  \App\Models\JadwalLatihan  $jadwalLatihan
     * @return \Illuminate\Http\Response
     */
    public function show(Latihan $jadwalLatihan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JadwalLatihan  $jadwalLatihan
     * @return \Illuminate\Http\Response
     */
    public function edit(Latihan $jadwalLatihan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JadwalLatihan  $jadwalLatihan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Latihan $jadwalLatihan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JadwalLatihan  $jadwalLatihan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Latihan $jadwalLatihan)
    {
        //
    }
}
