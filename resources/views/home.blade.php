@section('js')
<script type="text/javascript">
  $(document).ready(function() {
    $('#table').DataTable({
      "iDisplayLength": 10
    });

} );
</script>
@stop
@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left" style="background: orange">
                      <i class="mdi mdi-package-variant text-white icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Barang</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$barang->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-3 mb-0">
                    <i class="mdi mdi-package-variant mr-1" aria-hidden="true"></i> Total seluruh barang
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card">
              <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left" style="background: orange">
                      <i class="mdi mdi-tag-text-outline text-white icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Peminjaman</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$trans->where('status', 'pinjam')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-4 mb-0">
                    <i class="mdi mdi-tag-text-outline mr-1" aria-hidden="true"></i> Total seluruh peminjaman
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card" style="border-width: 1">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left" style="background: orange">
                      <i class="mdi mdi-calendar-check text-white icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Pengembalian</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$trans->where('status','kembali')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-4 mb-0">
                    <i class="mdi mdi-calendar-check mr-1" aria-hidden="true"></i> Total seluruh pengembalian
                  </p>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 grid-margin stretch-card" style="border-width: 1">
            <div class="card card-statistics">
                <div class="card-body">
                  <div class="clearfix">
                    <div class="float-left" style="background: orange">
                      <i class="mdi mdi-information-outline text-white icon-lg"></i>
                    </div>
                    <div class="float-right">
                      <p class="mb-0 text-right">Tertunda</p>
                      <div class="fluid-container">
                        <h3 class="font-weight-medium text-right mb-0">{{$trans->where('status','pending')->count()}}</h3>
                      </div>
                    </div>
                  </div>
                  <p class="text-muted mt-4 mb-0">
                    <i class="mdi mdi-information-outline mr-1" aria-hidden="true"></i> Total seluruh transaksi
                  </p>
                </div>
              </div>
            </div>
            
            
            
</div>

<div class="row" >
<div class="col-lg-4">
   
  </div>

<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <!-- <h4 class="card-title">Data Transaksi sedang pinjam</h4> -->
                 
                  <a href="{{ route('trans.create') }}" class="btn btn-success btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Transaksi</a>
                
                  <br><br>
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead class="table-success">
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Kode Transaksi
                          </th>
                          <th>
                            NIM / NIP
                          </th>
                          <th>
                            Peminjam
                          </th>
                          <th>
                            Tanggal Pinjam
                          </th>
                          <th>
                            Status
                          </th>
                          <!-- <th>
                            Action
                          </th> -->
                        </tr>
                      </thead>
                     <?php $i=1 ?>
                      <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <td>
                            {{$i++}}.
                          </td>
                          <td class="py-1">
                          <a href="{{route('trans.show', $data)}}"> 
                            {{$data->kode_transaksi}}
                          </a>
                          </td>
                          <td>
                            {{$data->user->username}}
                          </td>
                          <td>
                            {{$data->user->name}}
                          </td>
                          <td>
                           {{date('d/m/y', strtotime($data->tgl_pinjam))}}
                          </td>
                          
                          <td>
                          @if($data->status == 'pending')
                            <label class="badge badge-danger">Pending</label>
                          @elseif($data->status == 'setuju')
                            <label class="badge badge-primary">Setuju</label>
                          @elseif($data->status == 'pinjam')
                            <label class="badge badge-warning">Pinjam</label>
                          @else
                            <label class="badge badge-success">Kembali</label>
                          @endif
                          </td>
                          <!-- <td>
                          @if(Auth::user()->level != 'mahasiswa'&&Auth::user()->level != 'dosen')
                          <form action="{{ route('trans.update', $data) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            @if($data->status=='pinjam')
                            <button class="btn btn-primary btn-sm" onclick="return confirm('Anda yakin data ini sudah kembali?')">Sudah Kembali
                            </button>
                            @elseif($data->status=='pending')
                            <button class="btn btn-success btn-sm" onclick="return confirm('Anda yakin ingin meminjamkan?')">Pinjam
                            </button>
                            @endif

                          </form>
                          @else
                            -
                          @endif

                          </td> -->
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
