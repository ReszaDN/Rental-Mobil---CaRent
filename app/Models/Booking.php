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
        'id_mobil',
        'id_user'
    ];

    public function mobil(){
        return $this->belongsTo(Mobil::class, 'id_mobil');
    }
    public function users(){
        return $this->belongsTo(User::class, 'id_user');
    }

    public static function getId()
    {
        return $getId = DB::table('bookings')->orderBy('id','DESC')->take(1)->get();
    }
    
}
