<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atlet;
use Illuminate\Support\Facades\Auth;

class AtletController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function dashboardAtlet(){
        return view('atlet.layout.halaman_utama');
    }

    public function listAtlet( Request $request){
        $keyword = $request->get('keyword');
     
        $data = Atlet::with('gabsi')
                ->Where('nama', 'LIKE', '%'.$keyword.'%')
                ->orWhere('email', 'LIKE', '%'.$keyword.'%' )
                ->orWhere('jenis_kelamin', $keyword)
                ->orWhereHas('gabsi', function($query) use($keyword){
                    $query->where('nama', 'LIKE', '%'.$keyword.'%');
                })
                ->paginate(20);
        return view('daftar_atlet', compact('data'));
    }
    
    public function profile()
    {
        $atlet = Atlet::where('user_id', Auth::user()->id)->get();
   
        return view('profile', compact('atlet'));
    }

    public function index()
    {
        return view('dashboard');
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
}
