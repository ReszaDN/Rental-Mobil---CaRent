<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;



class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_booking',
        'tgl_pinjam',
        'lama_pinjam',
        'total_harga',
        'keterangan',
        'bukti_byr',
        'id_mobil',
        'id_user'
    ];

    public function mobil(){
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }
    public function users(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public static function getKode()
    {
        $getId = DB::table('bookings')->select('id')->get();

        $idM = $getId;

        foreach ($idM as $value);
        if( $idM->count() == 0){
            $idlm = 0;
        }else{
        $idlm = $value->id;
        }
        $idbru = $idlm+1;
        $tgl = date('dmy');

        return $no_booking = 'BK-' . $tgl . 'YN' . $idbru;
    }
    
}
