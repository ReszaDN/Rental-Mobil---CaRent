<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Struk extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_struk',
        'tgl_kembali',
        'keterlambatan',
        'denda',
        'id_booking',
    ];

    public function booking(){
        return $this->belongsTo(Booking::class, 'id_booking');
    }

    public static function getKodeST()
    {
        $getId = DB::table('struks')->select('id')->get();

        $idM = $getId;

        foreach ($idM as $value);
        if( $idM->count() == 0){
            $idlm = 0;
        }else{
        $idlm = $value->id;
        }
        $idbru = $idlm+1;
        $tgl = date('dmy');

        return $no_booking = 'ST-' . $tgl . 'RD' . $idbru;
    }
}
