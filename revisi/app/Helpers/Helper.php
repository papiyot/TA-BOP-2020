<?php


namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Helper
{
    public static function rp($p)
    {
        return 'Rp. ' . number_format($p,2,'.',',');
    }
    public static function pt($id){
        return DB::table('pt')->where('pt_id', $id)->first();
    }
    public static function getCode($table, $field, $code){
        $data = DB::table($table)->orderBy('created_at', 'DESC')->first();
        if(is_null($data)){
            return $code.'1';
        }
        $code_now = substr($data->$field,strlen($code));
        $code_after = intval($code_now)+1;
        $code_generate = $code.$code_after;
        return $code_generate;
    }
    public static function findku($data, $par1, $par2){
        $nilai = 0;
        foreach($data as $val){
            if($val->pembebanan_id==$par1 && $val->departemen_id==$par2){
                $nilai = $val->hitung_value;
            }
        }
        return $nilai;
     }
     public static function getkapasitas($data, $beban, $ptlist, $count){
         $array = [];
         for($x=0; $x<$count-count($ptlist); $x++){
            array_push($array, null);
         }
         foreach($data as $val){
            foreach($ptlist as $pt){
                if($val->pembebanan_id==$beban && $val->departemen_id==$pt->departemen_id){
                    array_push($array, $val->hitung_value);
                }
            }
        }
        return $array;
     }

     public static function tarifbop($kos, $kos1, $kapasitas){
         return ($kos+array_sum($kos1))/array_sum($kapasitas);
     }

     public static function null($count){
        $array = [];
        for($x=0; $x<$count; $x++){
           array_push($array, null);
        }
        return $array;
     }
}
