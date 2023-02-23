<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Mobil;

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware('AdminMiddle');
    }
   
    public function index()
    {
        return view('admin.dashboard.home');
    }

    public function listMobil()
    {
        return view('admin.dashboard.mobil', [
            'cars' => Mobil::all()
        ]);


    }

    public function formTambah()
    {
        return view('admin.dashboard.TambahMobil');
    }

    public function ProsesTambah(Request $request)
    {   

        $validateData = $request->validate([
            'jenis_mobil' => 'required',
            'kapasitas' => 'required',
            'gambar' => 'image|file|max:1024',
            'harga' => 'required'
        ]);

        if($request->file('gambar')){
            $validateData['gambar'] =$request->file('gambar')->store('car-images');
        }


        Mobil::create($validateData);

        return redirect('/admin-list-mobil');
    }

    public function Pengambilan()
    {
        return view('admin.dashboard.pengambilan');
    }

    public function Pengembalian()
    {
        return view('admin.dashboard.pengembalian');
    }


    public function listKonsumen()
    {
        return view('admin.dashboard.konsumen');
    }

    public function listBooking()
    {
        return view('admin.dashboard.booking');
    }
    
    public function cetak()
    {
        return view('admin.dashboard.cetak');
    }

}
