<?php

namespace App;
use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Model;

class Dasar extends Model
{
    use AutoNumberTrait;
    protected $table ='dasar';
    protected $primaryKey = 'kd_dasar';
    public $incrementing = false;


    protected $fillable = [ 'nama_dasar'];

    public function getAutoNumberOptions()
    {
        return [
            'kd_dasar' => [
                'format' => 'Dasar.?', // Format kode yang akan digunakan.
                'length' => 2 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
