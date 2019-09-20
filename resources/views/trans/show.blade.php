@section('js')

<script type="text/javascript">

$(document).ready(function() {
    $(".users").select2();
});

</script>

<script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
        </script>
@stop

@extends('layouts.app')

@section('content')

<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                    
                      <h4 class="card-title">Detail Transaksi Peminjaman <b>{{$data->kode_transaksi}}</b></h4>
                      
                      <form class="forms-sample">

                        <table>
                           <tr>
                               <td width="130">Nama</td>
                               <td width="20"> : </td>
                               <td> {{$data->user->name}} </td>
                           </tr>
                           <tr>
                               <td>NIM / NIP</td>
                               <td>:</td>
                               <td>{{$data->user->username}}</td>
                           </tr>
                           <tr>
                               <td>Prodi</td>
                               <td>:</td>
                               <td>{{$data->user->prodi->nama_prodi}}</td>
                           </tr>
                           <tr>
                               <td>Tanggal Pinjam</td>
                               <td>:</td>
                               <td>{{$data->tgl_pinjam}}</td>
                           </tr>
                        </table>
                    <br>
                  <div class="table-responsive">
                    <table class="table table-condensed" id="table">
                      <thead class="table-success">
                        <tr>
                          <th>
                            No.
                          </th>
                          <th>
                            Nama Barang
                          </th>
                          <th>
                            Jumlah Pinjam
                          </th>
                          @if(Auth::user()->level=='admin')
                          <th>Action</th>
                          @endif
                        </tr>
                      </thead>
                      <?php $i=1?>
                      <tbody>
                      @foreach($datas as $data)

                        <tr>
                          <td>
                            {{$i++}}.
                          </td>
                          
                          <td>
                            {{$data->barang->nama_barang}}
                          </td>
                          <td>
                            {{$data->jumlah}} {{$data->barang->satuan}}
                           </td>
                           @if(Auth::user()->level=='admin')
                           <td>
                           <form action="{{route('trans.destroy', $data->id_detail)}}" method="post"> 
                          
                          @csrf
                          
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')"><i class="mdi mdi-close"></i></button>

                        </form>
                           </td>
                           @endif
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
               {{--  {!! $datas->links() !!} --}}
                </div>
                    
                    </div>
                    <a href="{{route('trans.index')}}" class="btn btn-primary pull-right">Back</a>
                  </div>
                </div>
              </div>


</div>
@endsection