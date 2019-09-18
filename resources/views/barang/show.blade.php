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
                      <h4 class="card-title">Detail Barang <b>{{$data->nama_barang}}</b> </h4>
                      <form class="forms-sample">

                        <div class="form-group">
                            <div class="col-md-6">
                                <img width="250" height="300" @if($data->gbr_barang) src="{{ asset('images/barang/'.$data->gbr_barang) }}" @endif />
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('nama_barang') ? ' has-error' : '' }}">
                            <label for="nama_barang" class="col-md-4 control-label">Nama Barang</label>
                            <div class="col-md-6">
                                <input id="nama_barang" type="text" class="form-control" name="nama_barang" value="{{ $data->nama_barang }}" readonly="">
                                @if ($errors->has('nama_barang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_barang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group{{ $errors->has('merk') ? ' has-error' : '' }}">
                            <label for="merk" class="col-md-4 control-label">Merk</label>
                            <div class="col-md-6">
                                <input id="merk" type="text" class="form-control" name="merk" value="{{ $data->merk }}" readonly>
                                @if ($errors->has('merk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('merk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('satuan') ? ' has-error' : '' }}">
                            <label for="satuan" class="col-md-4 control-label">Satuan</label>
                            <div class="col-md-6">
                                <input id="satuan" type="text" class="form-control" name="satuan" value="{{ $data->satuan }}" readonly>
                                @if ($errors->has('satuan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('satuan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                         <div class="form-group{{ $errors->has('kondisi_barang') ? ' has-error' : '' }}">
                            <label for="kondisi_barang" class="col-md-4 control-label">Kondisi Barang</label>
                            <div class="col-md-6">
                            <select class="form-control" name="kondisi_barang" disabled="">
                                <option value="Baik" {{$data->kondisi_barang === "Baik" ? "selected" : ""}}>Baru</option>
                                <option value="Rusak Ringan" {{$data->kondisi_barang === "Rusak Ringan" ? "selected" : ""}}>Rusak Ringan</option>
                                <option value="Rusak Sedang" {{$data->kondisi_barang=== "Rusak Sedang" ? "selected" : ""}}>Rusak Sedang</option>
                            </select>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                            <label for="keterangan" class="col-md-4 control-label">Keterangan</label>
                            <div class="col-md-12">
                                <input id="keterangan" type="text" class="form-control" name="keterangan" value="{{ $data->keterangan }}" disabled="true">
                                @if ($errors->has('keterangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                @endif

                            </div>
                        </div>


                        <a href="{{route('barang.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
@endsection