<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use DB;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
        // $this->middleware('auth');
    // }
    use RegistersUsers;

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('welcome');
    }

    public function daftar(Request $request)
    {
        $cek = DB::table('users')->where('email', $request['email'])->count();
        if ($cek != 0) {
            return Redirect()->back()->withInput()->with('status', 'Email Sudah digunakan');
        }
        $pt_id = Helper::getCode('pt', 'pt_id', 'PT-');
        $add_pt = DB::table('pt')->insert(
            [
                'pt_id' => $pt_id,
                'pt_nama' => $request->pt_id,
                'pt_alamat' => '',
                'pt_notelp' => ''
            ]
        );
        $add_user = User::create(
            [
                'id' => Helper::getCode('users', 'id', 'US-'),
                'name' => $request->name,
                'email' => $request->email,
                'pt_id' => $pt_id,
                'password' => Hash::make($request->password)
            ]
        );
        $this->guard()->login($add_user);
        // return $add_user;
    }
}
