<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Trans;
use App\Detail;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use PDF;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }

    public function barang()
    {
    	$datas= Barang::get();
        return view('laporan.barang',compact('datas'));
    }

    public function barangPdf(Request $request)
    {
        $barang = Barang::query();

        if($request->get('kondisi_barang'))
        {
            if($request->get('kondisi_barang') == 'baik') {
                $barang->where('kondisi_barang', 'baik');
            } elseif($request->get('kondisi_barang') == 'rusak ringan') {
                $barang->where('kondisi_barang', 'rusak ringan');
            }else{
                $barang->where('kondisi_barang', 'rusak sedang');
            }

        }
        $datas = $barang->get();
        $pdf = PDF::loadView('laporan.barang_pdf', compact('datas'));
        return $pdf->download('laporan_barang_'.date('Y-m-d_H-i-s').'.pdf');
    }

    public function trans(Request $request){

       
        if($request->query('start-date')!='' && $request->query('end-date')!='') {
         // return $request->query('end_date');
            $start_date = Carbon::parse($request->query('start-date'))->format('Y-m-d');
            $end_date = Carbon::parse($request->query('end-date'))->format('Y-m-d');
            $datas = Trans::where('tgl_pinjam','>=',$start_date)->where('tgl_pinjam','<=',$end_date)->get();
            // return $start_date;
        }else{
            $datas = Trans::get();
        }

        return view('laporan.transaksi',array('datas'=>$datas));

    }

    public function transPdf(Request $request)
    {
        $trans = Detail::query();

        if($request->get('status'))
        {
            if($request->get('status') == 'pinjam') {
                $trans->where('status', 'pinjam');
            } else {
                $trans->where('status', 'kembali');
            }
        }
        $datas = $trans->get();
        $pdf = PDF::loadView('laporan.transaksi_pdf', compact('datas'));
        return $pdf->download('laporan_transaksi_'.date('Y-m-d_H-i-s').'.pdf');
    }

///laporan

    public function index(){
        if(!empty($request->start_date)&& !empty($request->end_date)) {
            $this->validate($request,[
                'start_date'=> 'nullable|date',
                'end_date' =>'nullable|date'
                ]);


        $start_date = Carbon::parse($request->start_date)->format('Y-m-d').'00:00:01';
        $end_date = Carbon::parse($request->end_date)->format('Y-m-d').'23:59:59';

        $detail = $detail->whereBetween('created_at',[$start_date, $end_date])->get();
        }else{
            $detail = $detail->take(10)->skip(0)->get();
        }
    }

    
}
