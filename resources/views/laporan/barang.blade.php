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

</div>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h2 class="card-title">Laporan Data Barang</h2>

  <div class="col-md-2 pull-left">
    <a href="{{ url('laporan/barang/pdf') }}" class="btn btn-primary btn-rounded btn-fw"><b><i class="fa fa-download"></i> Export PDF</a></b>
  </div>
 
                            

  <br>
<div class="row" style="margin-top: 20px;">
<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title pull-left">Data Barang</h4>
                  
                  <div class="table-responsive">
                    <table class="table table-condensed" id="table">
                      <thead class="table-light">
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
          
                </div>
              </div>
            </div>
          </div>
@endsection