<?php

namespace App\Http\Controllers;

use App\Barang;
use App\User;
use Carbon\Carbon;
use Session;
use Illuminate\Support\Facades\Redirect;
use Auth;
use DB;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }
    public function index()
    {
        
       $datas= Barang::orderBy('created_at','desc')->get();
        return view('barang.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->level == 'mahasiswa'&&'dosen'&&'kalab') {
            Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
            return redirect()->to('/');
        }

        return view('barang.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->file('gbr_barang') == '') {
            $gbr_barang = "";

        } else {
            $file = $request->file('gbr_barang');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('gbr_barang')->move("images/barang", $fileName);
            $gbr_barang = $fileName;
            
        }

        Barang::create([
                'nama_barang' => $request->get('nama_barang'),
                'gbr_barang' => $gbr_barang,
                'merk' => $request->get('merk'),
                'stok_barang' => $request->get('stok_barang'),
                'satuan' => $request->get('satuan'),
                'kondisi_barang' => $request->get('kondisi_barang'),
                'keterangan'=> $request->get('keterangan')
                
            ]);

        alert()->success('Berhasil.','Data telah ditambahkan!');
        return redirect()->route('barang.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(Auth::user()->level == 'mahasiswa'&&'dosen'&&'kalab') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Barang::findOrFail($id);

        return view('barang.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(Auth::user()->level == 'mahasiswa'&&'dosen'&&'kalab') {
                Alert::info('Oopss..', 'Anda dilarang masuk ke area ini.');
                return redirect()->to('/');
        }

        $data = Barang::findOrFail($id);
        return view('barang.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $barang = Barang::findOrFail($id);

        if($request->file('gbr_barang')) 
        {
            $file = $request->file('gbr_barang');
            $dt = Carbon::now();
            $acak  = $file->getClientOriginalExtension();
            $fileName = rand(11111,99999).'-'.$dt->format('Y-m-d-H-i-s').'.'.$acak; 
            $request->file('gbr_barang')->move("images/barang", $fileName);
            $barang->gbr_barang = $fileName;
        }
        $barang->nama_barang = $request->input('nama_barang');
        $barang->merk = $request->input('merk');
        $barang->stok_barang = $request->input('stok_barang');
        $barang->satuan = $request->input('satuan');
        $barang->kondisi_barang = $request->input('kondisi_barang');
        $barang->keterangan = $request->input('keterangan');
        $barang -> update();
        alert()->success('Berhasil.','Data telah diubah!');
        return redirect()->route('barang.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Barang  $barang
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Barang::find($id)->delete();
        alert()->success('Berhasil.','Data telah dihapus!');
        return redirect()->route('barang.index');
    }

    public function barang(){
        $datas = \App\Barang::where('id_barang','>','0')->get();
         return $datas;
    }

    
}
