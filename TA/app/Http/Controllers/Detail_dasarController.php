<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Det_Dasar;
use App\Detail_dep;
use App\PT;
use App\Dasar;
use App\Dep;
use phpDocumentor\Reflection\Types\Self_;

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
        return view('detaildasar.create1', compact('pet', 'dsr', 'det'));
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
            ->where('pt_id', 'like', "%" . $cari . "%")->paginate();
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
        return view('detaildasar.edit', compact('pet', 'dsr', 'det'));
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
        $data->detaildasar = det_dasar::where('pt_id', 'like', "%" . $cari . "%")
            ->with('dasar')->paginate();
        $data->pet = pt::orderBy('created_at', 'ASC')->get();
        $data->getdata = [];
        $collect = [];
        foreach ($data->detaildasar as $detaildasar) {
            $sub = new \stdClass();
            $sub = $detaildasar;
            $sub->layanan = [];
            if ($detaildasar->detaildep->kode == 'DP001') {
                array_push($collect, $detaildasar->kd_detail_dasar);
                $sub->layanan = det_dasar::where('pt_id', 'like', "%" . $cari . "%")->whereNotIn('kd_detail_dasar', $collect)->get();
            }
            array_push($data->getdata, $sub);
        }
        return view('detaildasar.lihat', compact('data'));
    }

    public function alokasi(request $request)
    {
        $data = new \stdClass();
        $cari = $request->cari;
        $data->detaildasar = det_dasar::where('pt_id', 'like', "%" . $cari . "%")
            ->with('dasar')->paginate();
        $data->pet = pt::orderBy('created_at', 'ASC')->get();
        $data->dep = Dep::orderBy('created_at', 'ASC')->get();
        $data->detail_dep = Detail_dep::orderBy('created_at', 'ASC')->get();
        $data->headerCol = count($data->detail_dep);
        $data->header = [];
        $data->layanan = [];
        $data->set = null;


        foreach ($data->dep as $dep) {
            $sub = $dep;
            $sub->child = DB::table('det_dasar')->join('detail_depar', 'detaildep_id', '=', 'kd_detail_dep')->where('kode', $dep->kd_dp)->get();
            array_push($data->header, $sub);
            // dd($sub->child);
        }
        $collect = [];
        foreach ($data->detaildasar as $detaildasar) {
            $sub = new \stdClass();
            if ($detaildasar->detaildep->kode == 'DP001') {
                array_push($collect, $detaildasar->kd_detail_dasar);
                $sub->layanan = det_dasar::join('detail_depar', 'detaildep_id', '=', 'kd_detail_dep')->where('pt_id', 'like', "%" . $cari . "%")->whereNotIn('kd_detail_dasar', $collect)->orderby('detaildep_id')->get();
                $sub->nama_detail_dep = $detaildasar->detaildep->nama_detail_dep;
                array_push($data->layanan, $sub);
            }
        }

        $index = 0;
        foreach ($data->header as $pushdata) {
            foreach ($pushdata->child as $setdata) {
                $data->set[$index]['layanan'] = [];
                $data->set[$index]['beban_id'] = $setdata->beban_id;
                $data->set[$index]['nama_detail_dep'] = $setdata->nama_detail_dep;
                $data->set[$index]['jenis_dp'] = $pushdata->jenis_dp;
                if($data->set[$index]['beban_id']=='Dasar.01'){
                    $dasar_beban = 'jkl';
                }elseif($data->set[$index]['beban_id']=='Dasar.02'){
                    $dasar_beban = 'lh';
                }elseif($data->set[$index]['beban_id']=='Dasar.03'){
                    $dasar_beban = 'jm';
                }

                $data->set[$index]['beban'] =  $setdata->$dasar_beban;
                $get_koslain=0;
                if(isset($data->set[$index-1]['data_koslain'])){
                   foreach($data->set[$index-1]['data_koslain'] as $set_koslain){
                    $get_koslain=$get_koslain+$set_koslain;
                   }
                }
                // $get_koslain = (isset($data->set[$index-1]['data_koslain'])) ? $data->set[$index-1]['data_koslain'] : 0;
                $data->set[$index]['kos_awal'] = $setdata->kos_awal+$get_koslain;
                $kapasitas = 0;
                foreach ($data->layanan as $layanan) {
                    if ($layanan->nama_detail_dep == $setdata->nama_detail_dep) {
                        
                        $data->set[$index]['layanan'] = $layanan->layanan;
                        // $data->set[$index]['beban_id'] = $layanan->beban_id;
                        foreach ($layanan->layanan as $to => $getkap) {
                            $kapasitas = $kapasitas + $getkap->$dasar_beban;           
                        }
                        $data->set[$index]['kapasitas'] = $kapasitas;
                        $cek_kapasitas = (isset($data->set[$index]['kapasitas'])) ? $data->set[$index]['kapasitas'] : 0;
                        $data->set[$index]['BOP'] = $data->set[$index]['kos_awal']/ $cek_kapasitas;
                        $di = $index;
                        $cont = 0;
                        for ($a = 0; $a <= $di; $a++) {
                            $data->set[$index]['koslain'][$a] = [];
                            $cont = $cont + $a;
                        }
                        $cont = $cont + 1;
                        foreach ($layanan->layanan as $ind => $getkap) {
                            array_push($data->set[$index]['koslain'], $data->set[$index]['BOP'] * $getkap->$dasar_beban);
                            if ($ind < $data->headerCol) {
                                $data->set[$index + $ind]['data_koslain'][$index] = $data->set[$index]['BOP'] * $getkap->$dasar_beban;
                            }
                            $cont++;
                        }
                    }
                }
                $index++;
            }
        }
        // dd($data->set);
        // return response()->json($data, 200);
        return view('detaildasar.alokasi', compact('data'));
    }
}
