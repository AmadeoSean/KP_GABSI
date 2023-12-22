<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        //  dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string','email:dns','max:255','unique:users'],
            'password' => ['required','string','min:8'],
            'role_id' =>['required'],
            'gender' => ['required']
        ]);

        // return Validator::make($data, [
        //     'name' => 'required|max:255',
        //     'email' => 'required|email:dns|unique:users',
        //     'password' => 'required|min:5|max:255',
        //     'role_id' =>'required',
        //     'gender' => 'required'
        // ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $userData =  User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role_id' => $data['role_id']
        ]);
        
        
         
      
      
      if($data['role_id'] == '3'){
        // return redirect('register');
        DB::table('atlets')->insert([
          'nama' => $data['name'],
          'email' => $data['email'],
          'user_id' => $userData['id'],
          'jenis_kelamin' => $data['gender']
        ]);
      }else{
        DB::table('pelatihs')->insert([
          'nama' => $data['name'],
          'email' => $data['email'],
          'user_id' => $data['id'],
          'jenis_kelamin' => $data['gender']
        ]);
      }
        return $userData;



        
    }
}
