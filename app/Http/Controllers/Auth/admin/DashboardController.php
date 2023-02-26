<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Mobil;
use App\Models\Booking;
use App\Models\User;
use App\Models\Struk;

class DashboardController extends Controller
{

    public function __construct(){
        $this->middleware('AdminMiddle');
    }
   
    public function index()
    {
        return view('admin.dashboard.home',[
            'user' => User::count(),
            'booking' => Booking::where('keterangan', 'Belum Lunas')->count(),
            'mobil' => Mobil::count(),
            'keluar' => Booking::where('status_mobil', 'Keluar')->count()
        ]);
    }

    //Awal Kelola Mobil
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

    public function deleteMobil(Mobil $id)
    {
        Mobil::destroy($id->id);

        return redirect('/admin-list-mobil');
    }

    //Akhir Kelola Mobil

    //Awal Tahap Pengambilan

    public function Pengambilan()
    {
        $bookings = Booking::latest()->where('keterangan', "Lunas");

        if(request('search')){
            $bookings->where('kode_booking', 'like', '%' . request('search') . '%');
        }

        return view('admin.dashboard.pengambilan', [
            "bookings" => $bookings->paginate(5)           
        ]);
    }

    public function prosesPengambilan(Request $request, $id){

        //Awal Buat Kode Struk
        $idM = Struk::getKodeST();
        //Akhir Buat Kode Struk

        $validateData["kode_struk"] = $idM;
        $validateData["keterlambatan"] = 0;
        $validateData["denda"] = 0;
        $validateData["id_booking"] = $id;

        Struk::create($validateData);

        $updateData['status'] = "Accepted";
        $updateData['status_mobil'] = "Keluar";

        Booking::where('id', $id)->update($updateData);

        return redirect("/admin-pengambilan");

    }

    //Akhir Tahap Pengambilan


    //Awal Tahap Pengembalian

    public function Pengembalian()
    {
        $bookings = Booking::latest()->where('status', "Accepted");

        if(request('search')){
            $bookings->where('kode_booking', 'like', '%' . request('search') . '%');
        }

        return view('admin.dashboard.pengembalian', [
            "bookings" => $bookings->paginate(5)
        ]);
    }

    public function prosesPengembalian(Request $request, $id)
    {
        
        //Proses Update Tabel Booking: Status Mobil = Keluar->Kembali
        $updateBooking['status_mobil'] = "Kembali";
        Booking::where('id', $id)->update($updateBooking);
        
        //Akhir Proses Update Tabel Booking

        
        
        //Awal Proses Update Tabel Struk
            date_default_timezone_set('Asia/Jakarta');
            $tgl_kembali = date('Y-m-d');
            
            //Awal Hitung Denda
            $idMobil = Booking::where('id', $id)->get()->value('id_mobil'); //Mengambil id_mobil dari tabel booking
            $harga = Mobil::where('id', $id)->get()->value('harga'); //Mengambil data harga berdasarkan id_mobil
            $tgl_pinjam = Booking::where('id', $id)->get()->value('tgl_pinjam'); //Mengambil data tgl Pinjam
            $lama_pinjam = Booking::where('id', $id)->get()->value('lama_pinjam'); //mengambil data lama pinjam
            $tgl_estimasi = date('d-m-Y', strtotime('+' . $lama_pinjam . 'days', strtotime($tgl_pinjam))); //Menjumlahkan tanggal estimasi pengembalian dari tgl_pinjam dengan lama_pinjam
            $tgl1 = strtotime($tgl_kembali); //convert date to time
            $tgl2 = strtotime($tgl_estimasi); // convert date to time
            
            $days = (int)(($tgl1 - $tgl2)/86400);//Mengitung selisih hari

            $denda = $harga * $days;//Menghitung denda perhari berdasarkan harga sewa unit mobil

            //Akhir Hitung Denda

            $updateStruk['tgl_kembali'] = $tgl_kembali;
            $updateStruk['keterlambatan'] = $days;
            $updateStruk['denda'] = $denda;

            Struk::where('id', $id)->update($updateStruk);
            
            return redirect('/admin-pengembalian');

        
        //Akhir Proses Update Tabel Struk
        
    }

    //Akhir Tahap Pengembalian


    //Kelola konsumen
    public function listKonsumen()
    {
        return view('admin.dashboard.konsumen',[
            'users' => User::all()
        ]);
    }

    public function deleteKonsumen(User $id)
    {
        User::destroy($id->id);

        return redirect('/admin-list-konsumen');
    }

    //Akhir Kelola konsumen


    //Proses Booking

    public function listBooking()
    {
        return view('admin.dashboard.booking',[
            "bookings" => Booking::all()->where('keterangan', "Belum Lunas")
        ]);
    }

    public function info(Booking $id)
    {
        return view('admin.dashboard.pembayaran', [
            "bk" => $id
        ]);
    }

    public function acceptBK(Request $request, $id)
    {
        $validateData['keterangan'] = "Lunas";
        $validateData['status'] = "Delay";
        
        Booking::where('id', $id)->update($validateData);
        
        return redirect('/admin-list-booking');
    }

    // Akhir proses booking
    
    public function cetak(Request $request, $id)
    {
        return view('admin.dashboard.cetak',[
            "st" => Struk::where('id_booking', $id)->first()
        ]);
    }

}
