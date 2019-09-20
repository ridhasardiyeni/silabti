@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').dataTable({
      "iDisplayLength": 10
    });
} );
function filterDate(){
      let firstdate=document.getElementById('start-date').value
      let lastdate=document.getElementById('last-date').value
      window.location.href='/silabti/public/laporan/transaksi?start-date='+firstdate+'&end-date='+lastdate
    }
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
            <input type="date" value="{{app('request')->input('start-date')}}" id="start-date" name="start-date" class="form-control{{$errors->has('start-date')? 'is-invalid':''}}" id="start-date" value="{{request()->get('start-date')}}">
          </div>
          &nbsp;&nbsp;
          <div class="form-group">
            <label for="">Sampai Tanggal</label>
            <input type="date" value="{{app('request')->input('end-date')}}" id="last-date" name="end-date" class="form-control{{$errors->has('end-date')? 'is-invalid':''}}" id="end-date" value="{{request()->get('end-date')}}">
          </div>
        </div>
        <div class="form-group">
          <button onclick="filterDate()" class="btn btn-primary btn-sm">Cari</button>
          <div class="btn-group dropdown">
            <button type="button" class="btn btn-primary" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <b><i class="fa fa-download"></i> Export PDF</b>
            </button>
             <!--  <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                <a class="dropdown-item" href="{{url('laporan/transaksi/pdf')}}"> Semua Transaksi </a>
                <a class="dropdown-item" href="{{url('laporan/transaksi/pdf?status=pinjam')}}"> Pempinjaman </a>
                <a class="dropdown-item" href="{{url('laporan/transaksi/pdf?status=kembali')}}"> Pengembalian </a>
              </div> -->
            </div>
          </div>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Kode Transaksi</th>
                <th>User ID</th>
                <th>Tanggal Pinjam</th>
              </tr>
            </thead>
            <tbody>
              @foreach($datas as $d)
              <tr>
                <td>{{$d->kode_transaksi}}</td>
                <td>{{$d->user->username}}</td>
                <td>{{date('d F Y',strtotime($d->tgl_pinjam))}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        </div>
      </div>
    </div>
  </div>
</div>
  </div>
  
 

@endsection