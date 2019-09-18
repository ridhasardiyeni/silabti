@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').dataTable({
      "iDisplayLength": 10
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')

<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Laporan Transaksi</h4>
                  

                  <div class="row">
                   <div class="col-md-6">
                      <div class="form-group">
                            <label for="">Pilih</label>
                           
                            <select name="Pilih" class="form-control" required="">
                                
                                <option value="semuatransaksi" class="" h>Semua Transaksi</option>
                                <option value="peminjaman">Peminjaman</option>
                                <option value="pengembalian">Pengembalian</option>
                            </select>
                            </div>
                        </div>
                     <div class="form-group">
                       <label for="">Mulai Tanggal</label>
                       <input type="date" name="start_date" class="form-control{{$errors->has('start_date')? 'is-invalid':''}}" id="start_date" value="{{request()->get('start_date')}}">
                     </div>
                     &nbsp&nbsp
                     <div class="form-group">
                       <label for="">Sampai Tanggal</label>
                       <input type="date" name="end_date" class="form-control{{$errors->has('end_date')? 'is-invalid':''}}" id="end_date" value="{{request()->get('end_date')}}">
                     </div>
                     </div>

                     <div class="form-group">
                          <button class="btn btn-primary btn-sm">Cari</button>
                      
                      <div class="btn-group dropdown">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <b><i class="fa fa-download"></i> Export PDF</b>
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                            <a class="dropdown-item" href="{{url('laporan/transaksi/pdf')}}"> Semua Transaksi </a>
                            <a class="dropdown-item" href="{{url('laporan/transaksi/pdf?status=pinjam')}}"> Pempinjaman </a>
                            <a class="dropdown-item" href="{{url('laporan/transaksi/pdf?status=kembali')}}"> Pengembalian </a>
                          </div>
                        </div>
                        </div>
                   </div>
                </div>
                      </div>
                </div>
              </div>
            </div>
          </div>
  
 

@endsection