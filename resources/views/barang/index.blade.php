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
    @if(Auth::user()->level=='admin')
    <a href="{{ route('barang.create') }}" class="btn btn-success btn-rounded btn-fw"><i class="fa fa-plus"></i> Tambah Barang</a>
    @endif
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
                  <h4 class="card-title pull-left">Data Barang</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-striped" id="table">
                      <thead>
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Nama Barang
                          </th>
                         
                          <th>
                            Merk / Tipe
                          </th>
                          <th>
                            Stok Barang
                          </th>
                          <th>
                            Satuan
                          </th>
                          <th>
                            Kondisi Barang
                          </th>
                          <th>
                            Keterangan
                          </th>
                          <th>
                            Action
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php $i=0; ?>
                      @foreach($datas as $data)
                        <tr>
                          <td>
                             <b>{{++$i}}.</b>
                          </td>
                          <td class="py-1">
                          @if($data->gbr_barang)
                            <img src="{{url('images/barang/'. $data->gbr_barang)}}" alt="image" style="margin-right: 10px;" />
                          @else
                            <img src="{{url('images/barang/default.png')}}" alt="image" style="margin-right: 10px;" />
                          @endif
                          <a href="{{route('barang.show',$data)}}"> 
                            {{$data->nama_barang}}
                          </a>
                          </td>
                          <td>
                          
                            {{$data->merk}}
                          
                          </td>

                          <td>
                            {{$data->stok_barang}}
                          </td>
                          <td>
                            {{$data->satuan}}
                          </td>
                          <td>
                            {{$data->kondisi_barang}}
                          </td>
                          <td>
                            {{$data->keterangan}}
                          </td>
                          <td>
                          @if(Auth::user()->level=='admin')
                          <form action="{{route('barang.destroy', $data)}}" method="post"> 
                          <a class="btn btn-sm btn-success" class="fas fa-edit" href="{{route('barang.show', $data)}}"><i class="fa big-icon fas fa-eye"></i></a>
                          <a class="btn btn-sm btn-warning" href="{{route('barang.edit', $data)}}"><i class="fa big-icon fas fa-edit"></i></a>
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="fa big-icon fas fa-trash"></i></button>
                        </form>
                        @else
                          -
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