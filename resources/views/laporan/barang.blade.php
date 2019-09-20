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
                <?php 
                $selMerk = request()->merk;
                $selSatuan = request()->satuan;
                $selKondisi = request()->kondisi;

                if($selMerk && $selSatuan && $selKondisi){
                  $getBarang = \App\Barang::where('merk',$selMerk)
                                          ->where('satuan',$selSatuan)
                                          ->where('kondisi_barang',$selKondisi)
                                          ->get();
                }elseif ($selMerk && $selSatuan) {
                  $getBarang = \App\Barang::where('merk',$selMerk)
                                          ->where('satuan',$selSatuan)
                                          ->get();
                }elseif ($selMerk && $selKondisi) {
                  $getBarang = \App\Barang::where('merk',$selMerk)
                                          ->where('kondisi_barang',$selKondisi)
                                          ->get();
                }elseif ($selSatuan && $selKondisi) {
                  $getBarang = \App\Barang::where('satuan',$selSatuan)
                                          ->where('kondisi_barang',$selKondisi)
                                          ->get();

                }elseif($selMerk){
                  $getBarang = \App\Barang::where('merk',$selMerk)->get();
                }elseif($selSatuan){
                  $getBarang = \App\Barang::where('satuan',$selSatuan)->get();
                }elseif($selKondisi){
                  $getBarang = \App\Barang::where('kondisi_barang',$selKondisi)->get();
                }else{
                  $getBarang = \App\Barang::all();
                }

                $getMerk = \App\Barang::select('merk')->groupBy('merk')->get();
                $getSatuan = \App\Barang::select('satuan')->groupBy('satuan')->get();
                $getKondisi = \App\Barang::select('kondisi_barang')->groupBy('kondisi_barang')->get();
                ?>
                <div class="card-body">
                  <h2 class="card-title">Laporan Data Barang</h2>
                  <select 
                    onchange="document.location.href = '?merk='+this.value+'&satuan={{request()->satuan}}&kondisi={{request()->kondisi}}'">
                    <option value="" selected disabled>merk/type</option>
                    @foreach($getMerk as $merk)
                    <option value="{{isset($merk->merk)?$merk->merk:''}}" {{$selMerk == $merk->merk ? 'selected="selected"':''}}>{{isset($merk->merk)?$merk->merk:''}}</option>
                    @endforeach
                  </select>
                  <select 
                    onchange="document.location.href = '?merk={{request()->merk}}&satuan='+this.value+'&kondisi={{request()->kondisi}}'">
                    <option value="" selected disabled>satuan</option>
                    @foreach($getSatuan as $satuan)
                    <option value="{{isset($satuan->satuan)?$satuan->satuan:''}}" {{$selSatuan == $satuan->satuan ? 'selected="selected"':''}}>{{isset($satuan->satuan)?$satuan->satuan:''}}</option>
                    @endforeach
                  </select>
                  <select 
                    onchange="document.location.href = '?&merk={{request()->merk}}&satuan={{request()->satuan}}&kondisi='+this.value">
                    <option value="" selected disabled>kondisi</option>
                    @foreach($getKondisi as $kondisi)
                    <option value="{{isset($kondisi->kondisi_barang)?$kondisi->kondisi_barang:''}}" {{$selKondisi == $kondisi->kondisi_barang ? 'selected="selected"':''}}>{{isset($kondisi->kondisi_barang)?$kondisi->kondisi_barang:''}}</option>
                    @endforeach
                  </select>

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
                      @foreach($getBarang as $data)
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