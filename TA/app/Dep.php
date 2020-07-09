<?php

namespace App;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Model;


class Dep extends Model
{

    protected $primaryKey = 'kd_dp';
    public $incrementing = false;

    use AutoNumberTrait;

    protected $table = 'departemen';

    protected $fillable = ['kd_dp', 'jenis_dp'];

    public function getAutoNumberOptions()
    {
        return [
            'kd_dp' => [
                'format' => 'DP?', // Format kode yang akan digunakan.
                'length' => 3 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }


    public function detail()
    {
        return $this->hasMany('App\Detail_dep', 'kode');
    }
}