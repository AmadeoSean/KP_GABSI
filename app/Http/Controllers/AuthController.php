<?php

namespace App\Http\Controllers;

use BackedEnum;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function login(){
        return view('login&register.halaman_login');
    }

    public function register(){
        return view('login&register.halaman_register');
    }

    public function authenticating(Request $request){
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // dd(Auth::user()->role_id);
            if(Auth::user()->role_id == 2){
              return redirect('pelatih');
            }else if(Auth::user()->role_id == 3){
              return redirect('atlet');
            }else{
              // return redirect()->intended('/');
              return redirect('/');
            }
            
            
        }
        
        Session::flash('status', 'failed');
        Session::flash('message', 'login wrong!!!');
        return redirect('/login');
    }

    public function logout(Request $request){
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

    public function register_user(Request $request){
      $data = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email:dns|unique:users',
        'password' => 'required|min:5|max:255',
        'role_id' =>'required',
        'gender' => 'required'
      ]);
      $data['password'] = Hash::make($data['password']);
      if($data['role_id'] == 'atlet'){
        $data['role_id'] = '3';
      }else{
        $data['role_id'] = '2';
      }
      User::create($data);
      
      $userData = DB::table('users')
                  ->select('id')
                  ->where('email', '=' , $data['email'])
                  ->get();
      
      
      
      if($data['role_id'] == '3'){
        // return redirect('register');
        DB::table('atlets')->insert([
          'nama' => $data['name'],
          'email' => $data['email'],
          'user_id' => $userData['0']->id,
          'jenis_kelamin' => $data['gender']
        ]);
      }else{
        DB::table('pelatihs')->insert([
          'nama' => $data['name'],
          'email' => $data['email'],
          'user_id' => $userData['0']->id,
          'jenis_kelamin' => $data['gender']
        ]);
      }
      Session::flash('status', 'success');
      Session::flash('message', 'registrasi berhasil');
      return redirect('login');
    }
}
