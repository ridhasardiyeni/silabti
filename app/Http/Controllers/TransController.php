<?php

namespace App\Http\Controllers;

use App\Trans;
use Illuminate\Http\Request;
use App\User;
use App\Detail;
use App\Barang;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Illuminate\Support\Facades\Log;
use DB;
use RealRashid\SweetAlert\Facades\Alert;;

class TransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->level =='dosen'or Auth::user()->level =='mahasiswa')
        {
            $datas = Trans::where('user_id', Auth::user()->id)->with('detail.barang')
                                ->orderBy('created_at','desc')->get();
        }
        else {

             $datas = Trans::orderBy('created_at','desc')->get();
        }
       
        return view('trans.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $getRow = Trans::orderBy('id_trans', 'DESC')->get();
        $rowCount = $getRow->count();
        
        $lastId = $getRow->first();

        $kode = "P00001";
        
        if ($rowCount > 0) {
            if ($lastId->id_trans < 9) {
                    $kode = "P0000".''.($lastId->id_trans + 1);
            } else if ($lastId->id_trans < 99) {
                    $kode = "P000".''.($lastId->id_trans + 1);
            } else if ($lastId->id_trans < 999) {
                    $kode = "P00".''.($lastId->id_trans + 1);
            } else if ($lastId->id_trans < 9999) {
                    $kode = "P0".''.($lastId->id_trans + 1);
            } else {
                    $kode = "P".''.($lastId->id_trans+ 1);
            }
        }
        $users = User::get();
        $barangs = Barang::where('stok_barang', '>', 0)->get();
        $details =Detail::get();
        $datas = Trans::orderBy('created_at','desc')->get();
        return view('trans.create', compact('kode','barangs','users','datas','details'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $trans = Trans::create([
            'kode_transaksi' => $request->get('kode_transaksi'),
            'tgl_pinjam' => $request->get('tgl_pinjam'),
            'user_id' => $request->get('user_id'),
          ]);

        $x=0;
        foreach($request->input('jlh_pinjam') as $jlhbarang){
            if($jlhbarang!=''){
                Detail::create([
                    'id_trans'=>$trans->id_trans,
                    'jumlah'=>$jlhbarang,
                    'id_barang'=>$request->input('id_barang')[$x],
                ]);
            }

            $x++;
        }
        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('trans.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Trans  $trans
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data= Trans::findOrFail($id);
        $datas= Detail::where('id_trans',$id)->get();
        // $datas = Detail::orderBy('created_at','desc')->get();
        return view('trans.show', compact('data','datas'));
    }
    public function edit($id)
    {
        $datas = Trans::findOrFail($id);
        if((Auth::user()->level == 'mahasiswa'&&'dosen')){
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }
        return view('trans.edit', compact('datas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Trans  $trans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {

        $trans = Trans::find($id);
        $alldetail= Detail::where('id_trans',$id)->get();
        
        if($trans->status=='pending'){
            $trans->status='setuju';
            $trans->save();
            foreach($alldetail as $d){
                $detail=Detail::find($d->id_detail);
                $detail->status="setuju";
                $detail->save();
            }
            alert()->success('Berhasil.','Status berubah menjadi setuju!');
        }
        elseif($trans->status=='setuju'){
            $trans->status='pinjam';
            $trans->save();
            foreach($alldetail as $d){
                $detail=Detail::find($d->id_detail);
                $detail->barang->where('id_barang', $detail->barang->id_barang)
                        ->update([
                            'stok_barang' => ($detail->barang->stok_barang-$detail->jumlah),
                            ]);
                $detail->status="pinjam";
                $detail->save();
            }
            alert()->success('Berhasil.','Status berubah menjadi pinjam!');
        }
        else if($trans->status=='pinjam'){
            $trans->status='kembali';
            $trans->save();
            foreach($alldetail as $d){
                $detail=Detail::find($d->id_detail);
                $detail->barang->where('id_barang', $detail->barang->id_barang)
                        ->update([
                            'stok_barang' => ($detail->barang->stok_barang+$detail->jumlah),
                            ]);
                $detail->status="kembali";
                $detail->save();
            }
            alert()->success('Berhasil.','Status berubah menjadi pinjam!');
            
        }
        return redirect()->route('trans.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Trans  $trans
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Detail::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('trans.index');
    }
}
