<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Pt extends Model
{
	 use AutoNumberTrait;

    protected $primaryKey = 'kd_pt';
    public $incrementing = false;

     protected $table= 'pt';
     protected $fillable = ['nama_pt', 'alamat_pt','noTelp_pt'];
 
 public function getAutoNumberOptions()
    {
        return [
            'kd_pt' => [
                'format' => 'PT.?', // Format kode yang akan digunakan.
                'length' => 2 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
public function detdasar()
    {
        return $this->hasMany('App\Det_dasar', 'pt_id');
    }

}
