<?php

namespace App\Http\Controllers;

use App\PT;

use Illuminate\Http\Request;

class PtController extends Controller
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
        $pt = pt::all();
        //return response()->json($pt, 200);
        return view('pt.list', compact('pt'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pt.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':attribute wajib diisi!!!',
        ];

        $this->validate($request,[
            'nama_pt' => 'required',
            'alamat_pt' => 'required',
            'noTelp_pt' => 'required',
        ],$messages);
        
        pt::create($request->all()); 

        return redirect()->back()->with('success', 'Data Yang Anda Masukan successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PT  $pT
     * @return \Illuminate\Http\Response
     */
    public function show(PT $pt)
    {
        //
        return view('pt.detail', compact('pt'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PT  $pT
     * @return \Illuminate\Http\Response
     */
    public function edit(PT $pt)
    {
        //

        return view('pt.edit', compact('pt'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PT  $pT
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PT $pt)
    {

        $request->validate([
            'nama_pt' => 'required',
            'alamat_pt' => 'required',
            'noTelp_pt' => 'required',

        ]);

        $pt->update($request->all()); 

        return redirect()->route('pt.index')
        ->with('success', 'Data  Berhasil Diupdate.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PT  $pT
     * @return \Illuminate\Http\Response
     */
    public function destroy(PT $pt)
    {

        $pt->delete(); 

        return redirect()->route('pt.index')
        ->with('success', 'Data deleted successfully');
    }

    
}
