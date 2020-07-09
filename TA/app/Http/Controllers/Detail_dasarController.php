<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Det_Dasar;
use App\Detail_dep;
use App\PT;
use App\Dasar;
use App\Dep;

class Detail_dasarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     $detaildasar = det_dasar::all();
     return view('detaildasar.list', compact('detaildasar'));
 }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pet = pt::orderBy('created_at', 'ASC')->get();
        $det = detail_dep::with('depa')->orderBy('created_at', 'ASC')->get();
        $dsr = dasar::all();
        return view('detaildasar.create1',compact('pet','dsr','det'));
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
        //dd($data)
        $request->validate([
            'beban_id' => 'required',
            'detaildep_id' => 'required',
            'pt_id' => 'required',
            'jkl' => 'required',
            'lh' => 'required',
            'jm' => 'required',
            

        ]);

        det_dasar::create($request->all()); 

        return redirect()->back()->with('success', 'Data Yang Anda Masukan successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(request $request)
    {
        $cari = $request->cari;
       $detaildasar = det_dasar::with('pt')
       ->where('pt_id','like',"%".$cari."%")->paginate();
       return view('departemen.show', compact('detaildasar'));
   }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pet = pt::orderBy('created_at', 'DESC')->get();
        $det = detail_dep::with('depa')->orderBy('created_at', 'DESC')->get();
        $dsr = dasar::all();
        return view('detaildasar.edit', compact('pet','dsr','det'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kd_detail_dasar)
    {
        $request->validate([
          'beban_id' => 'required',
          'detaildep_id' => 'required',
          'pt_id' => 'required',
          'jkl' => 'required',
          'lh' => 'required',
          'jm' => 'required',

      ]);

        $det_dasar->update($request->all());

        return redirect()->route('detaildasar.index')
        ->with('success', 'Data Yang Anda Masukan successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function lihat1(request $request)
    {
        $data = new \stdClass();
        $cari = $request->cari;
        $data->detaildasar = det_dasar::where('pt_id','like',"%".$cari."%")
        ->with('dasar')->paginate();
        $data->pet = pt::orderBy('created_at','ASC')->get();
        $data->getdata = [];
        $collect = [];
        foreach($data->detaildasar as $detaildasar){
            $sub = new \stdClass();
            $sub = $detaildasar;
            $sub->layanan = [];
            
            // dd($collect);
            if($detaildasar->detaildep->kode== 'DP001'){
                array_push($collect, $detaildasar->kd_detail_dasar);
                $sub->layanan = det_dasar::where('pt_id', 'like', "%" . $cari . "%")->whereNotIn('kd_detail_dasar', $collect)->get();
            }
            
            array_push($data->getdata, $sub);
            // dd($sub);
        }
        // dd($data->getdata);
        return view('detaildasar.lihat', compact('data'));
    }
    
}
