<?php

namespace App\Http\Controllers;

use App\Models\JadwalLatihan;
use App\Models\Latihan;
use App\Models\Pelatih;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PelatihController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

   
    // public function listKejuaraan(){
    //     return view('pelatih/daftar_kejuaraan');
    // }

    public function listAtlet(){
        $this->authorize('pelatih');
        $pelatih = Pelatih::find(Auth::user()->pelatih->id);
        // dd($pelatih);
        $data = $pelatih->atlets;      
        
        // dd($pelatih);
        return view('atlet/daftar_atlet', compact('data'));
    }


    public function profile()
    {   
        $this->authorize('pelatih');
        $pelatih = Pelatih::where('user_id', Auth::user()->id)->get();
        return view('profile', compact('pelatih'));
    }
    
    public function index()
    {
        $this->authorize('pelatih');
        $data = JadwalLatihan::where('id_pelatih','=', Auth::user()->pelatih->id)->get();
        // dd($data);
        return view('dashboard', compact('data'));
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
        $this->authorize('pelatih');
        $pelatih = Pelatih::find($id);
        $pelatih->nama = $request->get("nama_lengkap");
        $pelatih->telp = $request->get("telp");
        $pelatih->email = $request->get("email");
        $pelatih->save();

        $user_pelatih = User::find($pelatih->user_id);
        $user_pelatih->email = $request->get("email");
        $user_pelatih->save();
        return redirect()->route('pelatih-profile')
                ->with('status', 'Profile successfully updated');
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
