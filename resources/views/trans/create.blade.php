@section('js')
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script type="text/javascript">
   $(document).on('click', '.pilih', function (e) {
                document.getElementById("nama_barang").value = $(this).attr('data-nama_barang');
                document.getElementById("id_barang").value = $(this).attr('data-id_barang');
                $('#myModal').modal('hide');
            });

             $(function () {
                $("#lookup, #lookup2").dataTable();
            });
         $(document).on('click', '.remove-tr', function(){  
         // $((this).parents('tr').remove();)
          // $(this).parent('div').remove();
          $(this).parent().parent().parent().parent().remove();
        });

    function addItem(){
        let total=$(".item").length+1;
        $('#item-box').append('<div id="item_list_'+total+'" class="item">'+
        '<div id="item_list_1">'+
            '<div class="row col-md-12">'+
                '<div class="col-md-4">'+
                    '<div class="form-group">'+
                        '<div class="input-group">'+
                            '<select name="id_barang[]" class="form-control">'+
                            '<option value="">Pilih Barang</option>'+
                            '@foreach($barangs as $data)'+
                                '<option value="{{$data->id_barang}}">{{$data->nama_barang}} ({{$data->stok_barang}})</option>'+
                            '@endforeach'+
                            '</select>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-2">'+
                    '<div class="form-group">'+
                        
                        '<input id="jlh_pinjam" type="number" maxlength="6" class="form-control" name="jlh_pinjam[]" value="" required placeholder="Masukan Jumlah">'+
                    '</div>'+
                '</div>'+
                '<div class="col-md-2">'+
                    '<button type="button" class="btn btn-danger remove-tr">-</button>'+
                '</div>'+
            '</div>'+
        '</div> </div>');
    }

</script>


@stop
@section('css')

@stop
@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('trans.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Transaksi baru</h4>
                    
                        <div class="form-group{{ $errors->has('kode_transaksi') ? ' has-error' : '' }}">
                            <label for="kode_transaksi" class="col-md-4 control-label">Kode Transaksi</label>
                            <div class="col-md-6">
                                <input id="kode_transaksi" type="text" class="form-control" name="kode_transaksi" value="{{ $kode }}" required readonly="">
                                @if ($errors->has('kode_transaksi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('kode_transaksi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('tgl_pinjam') ? ' has-error' : '' }}">
                            <label for="tgl_pinjam" class="col-md-4 control-label">Tanggal Pinjam</label>
                            <div class="col-md-3">
                                <input id="tgl_pinjam" type="date" class="form-control" name="tgl_pinjam" value="{{ date('Y-m-d', strtotime(Carbon\Carbon::today()->toDateString())) }}" required @if(Auth::user()->level == 'peminjam') readonly @endif>
                                @if ($errors->has('tgl_pinjam'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('tgl_pinjam') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                   <!--  <div class="form-group">
                        <div class="col-md-12">
                            <button type="button" onclick="addItem()" class="btn btn-success"><i class="fa fa-plus"> Tambah Data Barang</i></button>
                        </div>
                    </div> -->
                    
                    <div id="item-box">
                    <div id="item_list_1" class="item">
                        <div class="row col-md-12">
                            <div class="col-md-4">
                                <div class="form-group{{ $errors->has('id_barang') ? ' has-error' : '' }}">
                                    <label for="id_barang" class="col-md-12 control-label">Barang</label>
                                    <div class="input-group">
                                        <!-- <input id="nama_barang" type="text" class="form-control" readonly="" required>
                                        <input id="id_barang" type="text" name="id_barang[]" value="{{ old('id_barang') }}" required readonly="">
                                        <span class="input-group-btn">
                                            <button type="button" class="btn btn-danger btn-secondary" data-toggle="modal" data-target="#myModal"><b>Cari Barang</b> <span class="fa fa-search"></span></button>
                                        </span> -->
                                        <select name="id_barang[]" class="form-control">
                                        <option value="">Pilih Barang</option>
                                        @foreach($barangs as $data)

                                            <option value="{{$data->id_barang}}">{{$data->nama_barang}}  ({{$data->stok_barang}})</option>
                                        @endforeach
                                        </select>
                                    </div>
                                    @if ($errors->has('id_barang'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('id_barang') }}</strong>
                                        </span>
                                    @endif
                                        
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group{{ $errors->has('jlh_pinjam') ? ' has-error' : '' }}">
                                    <label for="jlh_pinjam" class="col-md-12 control-label">Jumlah</label>
                                    <input id="jlh_pinjam" type="number" maxlength="6" class="form-control" name="jlh_pinjam[]" value="{{ old('jlh_pinjam') }}" required placeholder="Masukan Jumlah">
                                    @if ($errors->has('jlh_pinjam'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('jlh_pinjam') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div>
                                
                                <button type="button" onclick="addItem()" class="btn btn-success"><i class="fa fa-plus"></i></button>
                                
                            </div>
                        </div>
                    </div>
                </div>
                     @if(Auth::user()->level=='admin')
                      <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }} " style="margin-bottom: 20px;">
                            <label for="user_id" class="col-md-4 control-label">Peminjam</label>
                            <div class="col-md-6">
                            <select class="form-control" name="user_id" required="">
                                <option value="">(Cari Peminjam)</option>
                                @foreach($users as $user)
                                    <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                    @else
                     <div class="form-group{{ $errors->has('user_id') ? ' has-error' : '' }}">
                            <label for="user_id" class="col-md-4 control-label">Peminjam</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" readonly="" value="{{Auth::user()->name}}" required>
                                <input id="user_id" type="hidden" name="user_id" value="{{ Auth::user()->id }}" required readonly="">
                              
                                @if ($errors->has('user_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('user_id') }}</strong>
                                    </span>
                                @endif
                                 
                            </div>
                        </div>
                    @endif
                        
                        <button type="submit" class="btn btn-primary" id="submit">
                                    Simpan
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>

@endsection