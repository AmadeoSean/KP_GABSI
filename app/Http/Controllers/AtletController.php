<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Atlet;
use App\Models\Gabsi;
use App\Models\JadwalLatihan;
use App\Models\Latihan;
use App\Models\Prestasi;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
        $this->authorize('atlet');
        $keyword = $request->get('keyword');
     
        // $data = Atlet::with('gabsi')
        //         ->Where('nama', 'LIKE', '%'.$keyword.'%')
        //         ->orWhere('email', 'LIKE', '%'.$keyword.'%' )
        //         ->orWhere('jenis_kelamin', $keyword)
        //         ->orWhereHas('gabsi', function($query) use($keyword){
        //             $query->where('nama', 'LIKE', '%'.$keyword.'%');
        //         })
        //         ->simplePaginate(20);
        $data = Atlet::with('gabsi')->get();
        // dd($data);
        return view('atlet/daftar_atlet', compact('data'));
    }
    
    public function profile()
    {
        $this->authorize('atlet');
        $atlet = Atlet::where('user_id', Auth::user()->id)->get();
        return view('profile', compact('atlet'));
    }

    public function listPrestasi(){
        $this->authorize('atlet');
        $atlet = Atlet::with('prestasis')->where('user_id', Auth::user()->id)->get();
        // $prestasi = $atlet->prestasis;
        // dd($atlet);
        return view('prestasi/daftar_prestasi', compact('atlet'));
    } 

     

    // public function showPrestasiDetail(Request $request){
    //     $id = $request->get('prestasi_id');
    //     // dd($id);
    //     // $id = $_POST['transaction_id'];
    //     $data = Prestasi::find($id);
    //     // $dataProduct = $data->productswithTrashed;
    //     // dd($dataProduct);
       
    //     return response()->json(array(
    //         'status'=>'oke',
    //         'msg'=> view('show_prestasi_modals', compact('data'))->render()
    //     ), 200);
    // }

    // public function dataPribadi()
    // {
    //     $atlet = Atlet::where('user_id', Auth::user()->id)->get();
    //     return view('data_diri', compact('atlet'));
    // }

    public function detailLatihan()
    {
        $atlet = Atlet::where('user_id', Auth::user()->id)->get();
        return view('latihan/catatan_latihan', compact('atlet'));
    }

    public function catatanKejuaraan()
    {
        $atlet = Atlet::where('user_id', Auth::user()->id)->get();
        return view('latihan/catatan_kejuaraan', compact('atlet'));
    }
    

    public function index()
    {
        // SELECT * FROM `jadwal_latihans` jd 
        // inner join latihans l on l.jadwal_latihan_id = jd.id 
        // inner join grups g on l.grup_id = g.id 
        // inner join pasangans p on p.grup_id = g.id where p.id_atlet_1 = 3 or p.id_atlet_2 = 3;
        // dd();
        $this->authorize('atlet');
        $data = JadwalLatihan::join('latihans', 'jadwal_latihans.id','=','latihans.jadwal_latihan_id')
        ->join('grups', 'latihans.grup_id', '=' , 'grups.id')
        ->join('pasangans', 'grups.id', '=','pasangans.grup_id')
        ->where('pasangans.id_atlet_1',Auth::user()->atlet->id)
        ->orWhere('pasangans.id_atlet_2',Auth::user()->atlet->id)
        ->select('jadwal_latihans.*')
        ->get();
        return view('dashboard', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('pelatih');
        $cabang = Gabsi::all();
        return view('atlet/tambah_data_atlet', compact('cabang'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('pelatih');
        $user = new User();
        $user->name = $request->get('nama');
        $user->role_id = 3;
        $user->password =  Hash::make('atlet');
        $user->email = $request->get('email');
        $user->created_at = Carbon::now();
        $user->updated_at = Carbon::now();
        $user->save();

        $data = new Atlet();
        $data->nama = $request->get('nama');
        $data->jenis_kelamin = $request->get('jenis_kelamin');
        $data->email = $request->get('email');
        $data->id_gabsi = $request->get('cabang_id');
        $data->user_id = $user['id'];
        $data->total_point = $request->get('total_point');
        $data->created_at = Carbon::now();
        $data->updated_at = Carbon::now();
        $data->save();
        Session::flash('status', 'update_data_berhasil');
        Session::flash('message', 'Data berhasil ditambahkan');
        return redirect()->route('pelatih-daftar_atlet');
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
        $this->authorize('atlet');
        $atlet = Atlet::find($id);
        $atlet->nama = $request->get("nama_lengkap");
        $atlet->nama_panggilan = $request->get("nama_panggilan");
        $atlet->tempat_lahir = $request->get("tempat_lahir");
        $atlet->tanggal_lahir = $request->get("tanggal_lahir");
        $atlet->telp = $request->get("telp");
        $atlet->email = $request->get("email");
        $atlet->save();

        $user_atlet = User::find($atlet->user_id);
        $user_atlet->email = $request->get("email");
        $user_atlet->save();
        return redirect()->route('atlet-profile')
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
