<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\Helper;
use DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class MasterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home()
    {
        return view('pages.home');
    }

    public function view($table, $id = null)
    {
        $field_id = $table . '_id';
        
        $data =  new \stdClass();
        $data->action = 'Tambah';
        $data->class = 'block-mode-hidden';
        $data->edit = null;
        $data->list = DB::table($table);
        if($table=='pt' || $table=='departemen' || $table=='users' ){
            $data->list = $data->list->where('pt_id', Auth::user()->pt_id);
        }
        $data->list = $data->list->get();
        $data->pt = DB::table('pt')->get();
        $data->pembebanan = DB::table('pembebanan')->get();
        $data->count = count($data->list);
        if ($id != null) {
            $data->action = 'Edit';
            $data->class = '';
            $data->edit = DB::table($table)->where($field_id, $id)->first();
        }
        return view('pages.' . $table,  compact('data'));
    }

    public function store($table, $code, Request $request)
    {
        $field_id = $table . '_id';
        if (is_null($request[$field_id])) {
            $request->request->add([$field_id => Helper::getCode($table, $field_id, $code)]);
        }
        if (isset($request['pt_id'])) {
            $request->request->add(['pt_id' => Auth::user()->pt_id]);
        }
        if ($request[$table . '_nama'] != $request[$table . '_nama_old']) {
            $cek = DB::table($table)->where($table . '_nama', $request[$table . '_nama'])->count();
            if ($cek != 0) {
                return Redirect()->back()->withInput()->with('status', 'Data Sudah Ada');
            }
        }
        $save = DB::table($table)->updateOrInsert(
            [$field_id => $request[$field_id]],
            $request->except('_token', $table . '_nama_old')
        );
        return redirect('master/' . $table);
    }


    public function delete($table, $id = null)
    {
        $field_id = $table . '_id';
        $delete_data = DB::table($table)->where($field_id, $id)->delete();
        return redirect('master/' . $table);
    }

    public function hitung()
    {
        $data =  new \stdClass();
        $data->departemen = DB::table('departemen')->where('pt_id', Auth::user()->pt_id)->get();
        $data->pembebanan = DB::table('pembebanan')->get();
        $data->hitung = DB::table('hitung')->join('departemen', 'departemen.departemen_id', '=', 'hitung.departemen_id')->where('pt_id', Auth::user()->pt_id)->orderby('hitung_id')->get();
        return view('pages.hitung',  compact('data')); 
    }

    public function hitung_store(Request $request){
        $col = array();
        $inc = 1;
        foreach($request->hitung as $ind => $set){
            foreach($set as $key => $value){
                $data =  array();
                $data['hitung_id'] = Helper::getCode('hitung', 'hitung_id', 'HT-');
                $data['hitung_value'] = $value;
                $data['pembebanan_id'] = $key;
                $data['departemen_id'] = $ind;
                $data['created_at'] = Carbon::parse(Carbon::now())->addSeconds($inc)->format('Y-m-d H:i:s');;
                array_push($col, $data);
                $save = DB::table('hitung')->updateOrInsert(
                    ['pembebanan_id' => $data['pembebanan_id'], 'departemen_id' => $data['departemen_id']],
                    $data
                );
                    $inc++;
            }
        }
        // return $col;
        return redirect('masters/hitung');
    }

    public function anggaran()
    {
        $data =  new \stdClass();
        $data->alokasi = null;
        $data->pt = Helper::pt(Auth::user()->pt_id);
        $alokasi = [];
        $collect = [];
        $data->departemen = DB::table('departemen')->where('pt_id', Auth::user()->pt_id)->orderby('departemen_type')->get();
        $data->pembebanan = DB::table('pembebanan')->get();
        $data->hitung = DB::table('hitung')->join('departemen', 'departemen.departemen_id', '=', 'hitung.departemen_id')->where('pt_id', Auth::user()->pt_id)->orderby('hitung_id')->get();
        foreach($data->departemen as $index => $departemen){
            array_push($collect, $departemen->departemen_id);
            if($departemen->departemen_type=='jasa'){
                $get = DB::table('departemen')->where('pt_id', Auth::user()->pt_id)->whereNotIn('departemen_id', $collect)->get();
                array_push($alokasi, $get);
            }
        }
        $data->alokasi = $alokasi;
        // return response()->json($data);
        return view('pages.anggaran',  compact('data')); 
    }

    public function bop()
    {
        $data =  new \stdClass();
        $data->alokasi = null;
        $data->pt = Helper::pt(Auth::user()->pt_id);
        $alokasi = [];
        $collect = [];
        $data->group = [];
        array_push($data->group, [ 'name' => 'jasa', 'child' => DB::table('departemen')->where('pt_id', Auth::user()->pt_id)->where('departemen_type', 'jasa')->join('pembebanan', 'pembebanan_id', '=', 'beban')->get()] );
        array_push($data->group, [ 'name' => 'produksi', 'child' => DB::table('departemen')->where('pt_id', Auth::user()->pt_id)->where('departemen_type', 'produksi')->join('pembebanan', 'pembebanan_id', '=', 'beban')->get()] );
        $data->departemen = DB::table('departemen')->where('pt_id', Auth::user()->pt_id)->orderby('departemen_type')->get();
        $data->pembebanan = DB::table('pembebanan')->get();
        $data->hitung = DB::table('hitung')->join('departemen', 'departemen.departemen_id', '=', 'hitung.departemen_id')->where('pt_id', Auth::user()->pt_id)->orderby('hitung_id')->get();
        foreach($data->departemen as $index => $departemen){
            array_push($collect, $departemen->departemen_id);
            $cast =  new \stdClass();  
            if($departemen->departemen_type=='jasa'){
                $get = DB::table('departemen')->where('pt_id', Auth::user()->pt_id)->whereNotIn('departemen_id', $collect)->get();
                array_push($alokasi, $get);
                $cast = $data->group[0]['child'][$index];
                $cast->alokasi =  $get;
                $cast->kos_lain =  [];
                $cast->kapasitas = Helper::getkapasitas($data->hitung, $cast->pembebanan_id, $get, count($data->departemen));
                $cast->bop = Helper::tarifbop($cast->departemen_kosawal, $cast->kos_lain, $cast->kapasitas);
                $cast->result = Helper::null($index);
                $data->group[0]['child'][$index] = $cast; 
            }
        }
        foreach($data->departemen as $index => $departemen){
            array_push($collect, $departemen->departemen_id);
            $cast =  new \stdClass();  
            if($departemen->departemen_type=='jasa'){
                $cast = $data->group[0]['child'][$index];
                $cast->result = [];
                foreach($cast->kapasitas as $inx => $res){
                    $quick = ($res==null)? null : $cast->bop*$res;
                        array_push($cast->result, $quick);
                    if($inx < count($data->group[0]['child'])){
                        $oi = $inx;
                        array_push($data->group[0]['child'][$oi]->kos_lain, $quick);
                        $cast->bop = Helper::tarifbop($cast->departemen_kosawal, $cast->kos_lain, $cast->kapasitas);
                    }
                }
                
                $data->group[0]['child'][$index] = $cast; 
            }
        }
        
        $data->alokasi = $alokasi;
        // return response()->json($data);
        return view('pages.bop',  compact('data')); 
    }
    
}
