<?php

namespace App\Http\Controllers;

use App\Dep;
use App\Detail_dep;

use Illuminate\Http\Request;

class DepController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dep = dep::all();
        return view('departemen.list', compact('dep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $dep = dep::all();
        return view('departemen.create1', compact('dep'));
    }

    public function pro()
    {

        $dep = dep::all();
        return view('departemen.createPro', compact('dep'));
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
         'numeric' => 'kos awal diisi dengan anggka!!!',

    ];

    $this->validate($request,[
            //'kd_pt' => 'required',
        'jenis_dp' => 'required',
        'nama_detail_dep' => 'required',
        'kos_awal' => 'required|numeric',
    ],$messages);

    $data = $request->all();
        //dd($data);
    $deps = new dep;
        //$deps->kd_dp = $data['kd_dp'];
    $deps->jenis_dp = $data['jenis_dp'];
    $deps->save();

       // $detail_deps= new detail_dep;
       // $detail_deps->kode = $deps->kd_dp;
       // $detail_deps->nama_detail_dep= $data['nama_detail_dep'];
       // $detail_deps->kos_awal= $data['kos_awal'];
       // $detail_deps->save();

    if (count($data['nama_detail_dep']) > 0) {
        foreach ($data['nama_detail_dep'] as $key => $value) {
            $data2= array(
                'kode' => $deps->kd_dp,
                'nama_detail_dep' =>$data['nama_detail_dep'][$key],
                'kos_awal' => $data['kos_awal'][$key],

            );
            detail_dep::create($data2);
        }

    }


    return redirect()->back()->with('sukses', 'Data yang anda masukan Berhasil');
}


    /**
     * Display the specified resource.
     *
     * @param  \App\Dep  $dep
     * @return \Illuminate\Http\Response
     */
    public function show(Dep $dep)
    {
        return view('departemen.detail', compact('dep'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Dep  $dep
     * @return \Illuminate\Http\Response
     */
    public function edit(Dep $dep)
    {
        return view('departemen.edit', compact('dep'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Dep  $dep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dep $dep)
    {
        $request->validate([
            'kd_dp' => 'required',
            'jenis_dp' => 'required'
        ]);
        $dep->update($request->all());

        return redirect()->route('dep.index')
        ->with('success', 'Data  Berhasil Diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Dep  $dep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dep $dep)
    {

        $dep->delete();

        return redirect()->back()
        ->with('success', 'Data deleted successfully');
    }
}