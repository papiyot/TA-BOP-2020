<?php

namespace App\Http\Controllers;

use App\Detail_dep;
use App\Dep;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class Detail_depController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detail_dep = detail_dep::all();
        return view('detaildepar.list', compact('detail_dep'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {

        //$detaildep = detail_dep::with('depa')->get(); // For multiple data

        $detaildep = dep::all();
        //$detaildeps = detail_dep::with('depar')->where('kd_dp')->get();
        return view('detaildepar.create', compact('detaildep'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = $request->all();
        //dd($data);
        $request->validate([
            'kode' => 'required',
            //'kd_detail_dep' => 'required',
            'nama_detail_dep' => 'required',
            'kos_awal' => 'required',

        ]);

        Detail_dep::create($request->all());

        return redirect()->back()
            ->with('success', 'Data Yang Anda Masukan successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Detail_dep  $detail_dep
     * @return \Illuminate\Http\Response
     */
    public function show(Detail_dep $detail_dep)

    {

        return view('detaildepar.detail', compact('detail_deps'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Detail_dep  $detail_dep
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail_dep $detail_dep)
    {
       //$detail_deps = detail_dep::with('depa')->get();
        $detail_deps = dep::all();
        return view('detaildepar.edit', compact('detail_dep', 'detail_deps'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Detail_dep  $detail_dep
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail_dep $detail_dep)
    {
        $request->validate([
            'kode' => 'required',
            'nama_detail_dep' => 'required',
            'kos_awal' => 'required',
        ]);

        $detail_dep->update($request->all());

        return redirect()->route('detail_dep.index')
            ->with('success', 'Data Yang Anda Masukan successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Detail_dep  $detail_dep
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail_dep $detail_dep)
    {
        $detail_dep->delete();

        return redirect()->back()
            ->with('success', 'Data deleted successfully');
    }
}