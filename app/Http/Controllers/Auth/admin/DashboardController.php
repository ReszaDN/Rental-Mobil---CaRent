<?php

namespace App\Http\Controllers\Auth\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
        return view('admin.dashboard.mobil');
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
