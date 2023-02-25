<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mobil;
use App\Models\Booking;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Mobil $id)
    {
        //
        return view('booking', [
            'car' => $id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        //
        $validatedData = $request->validate([
            "tgl_pinjam" => 'required',
            "lama_pinjam" => 'required', 
        ]);

        //Awal Buat Kode Booking
        $idM = Booking::getKode();
        //Akhir Buat Kode Booking

        // Buat Hitung Total Harga
        $harga = Mobil::where('id', $id)->get()->value('harga');
        $lama = $request['lama_pinjam'];
        $total = $lama * $harga;
        //Akhir Hitung Total Harga
        
        $validatedData['kode_booking'] = $idM;
        $validatedData['total_harga'] = $total;
        $validatedData['keterangan'] = "Belum Lunas";
        $validatedData['bukti_byr'] = "bukti_bayar/no-image-icon-23485.png";
        $validatedData['id_user'] = auth()->user()->id;
        $validatedData['id_mobil'] = $id;

        Booking::create($validatedData);

        return redirect('/list-booking');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showBK()
    {
            //
            return view('bookingList', [
                'bookings'=> Booking::latest()->where('id_user', auth()->user()->id)->get()
            ]);

    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function bayarBK(Booking $kode)
    {
        //
        return view ('bayar', [
            'bk' => $kode
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function prosesBayar(Request $request, $kode)
    {
        //


        if($request->file('gambar')){
            $validateData['bukti_byr'] = $request->file('gambar')->store('bukti_bayar');
        }

        Booking::where('kode_booking', $kode)->update($validateData);

        return redirect('/list-booking')->with('success', 'Tunggu Konfirmasi dari admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
