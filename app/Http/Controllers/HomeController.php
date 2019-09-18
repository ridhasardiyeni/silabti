<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Transaksi;
use App\Trans;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $barang=Barang::get();
        $trans=Trans::get();

        if(Auth::user()->level=='mahasiswa' or Auth::user()->level == 'dosen')
        {
            $datas =Trans::where('user_id', Auth::user()->id)
                              ->where('status','pinjam')
                              ->get();
        }
        else {

             $datas = Trans::where('status','pinjam')->orWhere('status','pending')->orwhere('status','setuju')->orderBy('created_at','desc')->get(); 
        }
       
        return view('home',compact('barang','trans','datas'));
    }
}
