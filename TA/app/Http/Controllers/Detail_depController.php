<?php

namespace App\Http\Controllers;

use App\Detail_dep;
use App\Dep;
use PDF;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class Detail_depController extends Controller
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
    public function index(Request $request)
    {
         
        $detail_dep = detail_dep::with(['detdsr.pt'])->get();
        //return response()->json($detail_dep, 200);
        return view('detaildepar.list', compact('detail_dep'));
    }
     


    public function cetak_pdf()
    {
        //$detail_dep = detail_dep::with('detdsr')->get();
        $detail_dep = detail_dep::with(['detdsr.pt:kd_pt,nama_pt'])->orderBy('created_at', 'ASC')->get();
        $pdf = PDF::loadview('detaildepar.detaildep_pdf', ['detail_dep' => $detail_dep]);
        return $pdf->download('daftar-detail.pdf');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()

    {
        $dep = dep::all();
        return view('detaildepar.create', compact('dep'));
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
        $message = [
            'required' => ':attribute wajib diisi!!!',

        ];

        $data = $request->validate([
            'kode' => 'required',
            'nama_detail_dep' => 'required',
            'kos_awal' => 'required',
        ], $message);


        Detail_dep::create($request->all());
        /**if (count($data['nama_detail_dep']) > 0) {
            foreach ($data['nama_detail_dep'] as $key => $value) {
                $data2 = array(
                    'kode' => $data['kode'][$key],
                    'nama_detail_dep' => $data['nama_detail_dep'][$key],
                    'kos_awal' => $data['kos_awal'][$key],
                );
                Detail_dep::create($data2);
            }
        }**/


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