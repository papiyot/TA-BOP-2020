<?php
namespace App\Http\Controllers;

use App\Dasar;
use PDF;
use Illuminate\Http\Request;

class DasarController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $dasar=dasar::all();
        return view('dasar.list', compact('dasar'));
    }

    public function cetak_pdf()
    {
        $dasar=dasar::all();        
        $pdf = PDF::loadview('dasar.dasar_pdf', ['dasar' => $dasar]);
       return $pdf->download('daftar-dasar-pembebanan.pdf');
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       $dasars=dasar::all();
       return view('dasar.create1', compact('dasars'));
   }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $message = [
            'required' => ':attribute wajib diisi!!!',
        ];

        $this->validate($request,[
         'nama_dasar' => 'required',
     ],$message);
        dasar::create($request->all()); 

        return redirect()->back()->with('success', 'Data Yang Anda Masukan successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Dasar  $dasar
     * @return \Illuminate\Http\Response
     */
    public function show(Dasar $dasar)
    {
        return view('dasar.detail', compact('dasar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dasar  $dasar
     * @return \Illuminate\Http\Response
     */
    public function edit(Dasar $dasar)
    {
        return view('dasar.edit', compact('dasar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dasar  $dasar
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dasar $dasar)
    {

        $request->validate([
            'kd_dasar' => 'required',
            'nama_dasar' => 'required',


        ]); 

        $dasar->update($request->all()); 

        return redirect()->route('dasar.index')->with('success', 'Data Yang Anda Masukan successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dasar  $dasar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dasar $dasar)
    {
        $dasar->delete(); 

        return redirect()->route('dasar.index')
        ->with('success', 'Data deleted successfully');
    }
}
