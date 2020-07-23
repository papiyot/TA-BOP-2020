<?php

namespace App\Http\Controllers;

use App\Dep;
use App\Detail_dep;
use App\pt;
use PDF;

use Illuminate\Http\Request;

class DepController extends Controller
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
        $dep = dep::all();
        return view('departemen.list', compact('dep'));
    }
    public function cetak_pdf()
    {
         $dep = dep::all();
        $pdf = PDF::loadview('departemen.depar_pdf', ['dep' => $dep]);
        return $pdf->download('daftar-departemen.pdf');
    }
    public function cetak_pete()
    {
         $pt = pt::all();
        $pdf = PDF::loadview('departemen.pete_pdf', ['pt' => $pt]);
        return $pdf->download('daftar-pt.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $dep = dep::all();
        $pete = pt::orderBy('created_at', 'ASC')->get();
        return view('departemen.input', compact('dep', 'pete'));
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

        $data = $request->validate([
            'jenis_dp' => 'required',
        ], $message);

        dep::create($request->all()); 

       /** if (count($data['jenis_dp']) > 0) {
            foreach ($data['jenis_dp'] as $item => $value) {
                $data2  = array(
                    //'kd_dasar' => $data['kd_dasar'][$item],
                    'jenis_dp' => $data['jenis_dp'][$item]
                );
                dep::create($data2);
            }
        }**/
    
        return redirect()->back()->with('success', 'Data yang anda masukan Berhasil');
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