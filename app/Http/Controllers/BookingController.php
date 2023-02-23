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

        $idM = Booking::getId();
        foreach ($idM as $value);
        $idlm = $value->id;
        $idbru = $idlm+1;
        $tgl = date('dmy');

        $no_booking = 'BK-' . $tgl . 'YN' . $idbru;

        //Akhit Buat Kode Booking

        //Buat Hitung Total Harga
        $harga = Mobil::where('id', $id)->get()->value('harga');
        $lama = $request['lama_pinjam'];
        $total = $lama * $harga;
        //Akhir Hitung Total Harga
        
        $validatedData['kode_booking'] = $no_booking;
        $validatedData['total_harga'] = $total;
        $validatedData['keterangan'] = "Belum Lunas";
        $validatedData['id_user'] = auth()->user()->id;
        $validatedData['id_mobil'] = $id;

        Booking::create($validatedData);

        return redirect('https://wa.me/#');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
            //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
