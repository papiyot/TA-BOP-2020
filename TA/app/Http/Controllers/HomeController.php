<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Det_Dasar;
use App\Detail_dep;
use App\PT;
use App\Dasar;
use App\Dep;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }


     public function hasil()
    {
               $pt = pt::all();
               $dasar=dasar::all();
               $dep = dep::all();
               $detaildasar = det_dasar::all();
               $detail_dep = detail_dep::all();

        return view('simple', compact('pt','dasar','dep','detaildasar','detail_dep'));
    }

    


}
