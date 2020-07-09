<?php

namespace App;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Model;



class Detail_dep extends Model
{

    use AutoNumberTrait;

    public $incrementing = false;
    protected $primaryKey = 'kd_detail_dep';

    protected $table = 'detail_depar';
    protected $fillable = ['kd_detail_dep', 'kode', 'nama_detail_dep', 'kos_awal'];


    public function getAutoNumberOptions()
    {
        return [
            'kd_detail_dep' => [
                'format' => 'Dt.DP?', // Format kode yang akan digunakan.
                'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }


    public function depa()
    {
        return $this->belongsTo('App\Dep', 'kode','kd_dp');
    }


     public function detdsr()
    {
        return $this->hasOne('App\Det_da', 'detaildep_id','kd_detail_dep');
    }

    
}