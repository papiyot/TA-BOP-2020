<?php

namespace App;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Model;

class Det_dasar extends Model
{
    use AutoNumberTrait;

    public $incrementing = false;
    protected $primaryKey = 'kd_detail_dasar';

    protected $table = 'det_dasar';
    protected $fillable = ['beban_id', 'detaildep_id', 'pt_id', 'jkl','lh','jm'];


    public function getAutoNumberOptions()
    {
        return [
            'kd_detail_dasar' => [
                'format' => 'Dt.Ds?', // Format kode yang akan digunakan.
                'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }


    public function dasar()
    {
        return $this->belongsTo('App\Dasar', 'beban_id');
    }

    public function detaildep()
    {
        return $this->belongsTo('App\Detail_dep', 'detaildep_id');
    }
public function pt()
    {
        return $this->belongsTo('App\Pt', 'pt_id' ,'kd_pt');
    }
    
}