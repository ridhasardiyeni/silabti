
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

  <div class="col-lg-2">
    <a href="{{ route('trans.create') }}" class="btn btn-success btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Transaksi</a>
  </div>
    <div class="col-lg-12">
                  @if (Session::has('message'))
                  <div class="alert alert-{{ Session::get('message_type') }}" id="waktu2" style="margin-top:10px;">{{ Session::get('message') }}</div>
                  @endif
                  </div>
</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Data Transaksi</h4>
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
                            Peminjam
                          </th>
                          <th>
                            Tgl Pinjam
                          </th>
                         <!--  <th>
                            Barang
                          </th>
                          <th>
                            Jumlah Pinjam
                          </th> -->
                         <th>
                           Status
                         </th>
                         <th>
                           Action
                         </th>
                        </tr>
                      </thead>
                      <?php $i=1?>
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
                            {{$data->tgl_pinjam}}
                          </td>
                          <!--  <td>
                            @foreach($data->detail as $it)
                            {{$it->barang->nama_barang}}<br><br>
                            @endforeach
                          </td>
                           <td>
                            @foreach($data->detail as $it)
                            {{$it->jumlah}}<br><br>
                            @endforeach
                          </td> -->
                          
                           <td>
                          @if($data->status =='pending')
                            <label class="badge badge-danger">Pending</label>
                          @elseif($data->status == 'setuju')
                            <label class="badge badge-primary">Setuju</label>
                          @elseif($data->status =='pinjam')
                            <label class="badge badge-warning">Pinjam</label>
                          @else
                            <label class="badge badge-success">Kembali</label>
                          @endif
                          </td>
                          <td>
                          @if(Auth::user()->level != 'mahasiswa'&&Auth::user()->level != 'dosen')
                          <div class="btn-group dropdown">
                          <button type="button" class="btn btn-success dropdown-toggle btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Action
                          </button>
                          <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 30px, 0px);">
                          
                          @if($data->status == 'pending')
                          <form action="{{ route('trans.update', $data) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin data ini ingin menyetujui peminjaman ?')"> Setuju
                            </button>
                          </form>
                          <form action="{{ route('trans.destroy', $data) }}" class="pull-left"  method="post">
                            {{ csrf_field() }}
                            {{ method_field('delete') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin ingin menghapus data ini?')"> Delete
                            </button>
                          </form>
                          
                           @elseif($data->status == 'setuju')
                          <form action="{{ route('trans.update', $data) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin data ini ingin menyetujui peminjaman ?')"> Pinjam
                            </button>
                          </form>
                          @elseif($data->status == 'pinjam')
                          <form action="{{ route('trans.update', $data) }}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{ method_field('put') }}
                            <button class="dropdown-item" onclick="return confirm('Anda yakin data ini sudah kembali?')"> Sudah Kembali
                            </button>
                          </form>
                         
                          @endif
                            
                          </div>
                        </div>
                        @else
                        -
                         <!--  @if($data->status == 'pinjam')
                          <form action="{{ route('transaksi.update', $data->id) }}" method="post" enctype="multipart/form-data">
                              {{ csrf_field() }}
                              {{ method_field('put') }}
                              <button class="btn btn-info btn-xs" onclick="return confirm('Anda yakin data ini sudah kembali?')">Sudah Kembali
                              </button>
                          </form>
                          @else -->
                          
                          @endif
                        @endif
                          </td>
                         
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
              </div>
            </div>
          </div>
@endsection