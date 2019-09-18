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

<form action="{{ route('barang.update', $data) }}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        {{ method_field('put') }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Edit Barang <b>{{$data->nama_barang}}</b> </h4>
                      <form class="forms-sample">
                        <div class="form-group{{ $errors->has('nama_barang') ? ' has-error' : '' }}">
                            <label for="nama_barang" class="col-md-4 control-label">Nama Barang</label>
                            <div class="col-md-6">
                                <input id="nama_barang" type="text" class="form-control" name="nama_barang" value="{{ $data->nama_barang }}" required>
                                @if ($errors->has('nama_barang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_barang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Gambar Barang</label>
                            <div class="col-md-6">
                                <img width="200" height="200" @if($data->gbr_barang) src="{{ asset('images/barang/'.$data->gbr_barang) }}" @endif />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gbr_barang">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('merk') ? ' has-error' : '' }}">
                            <label for="merk" class="col-md-4 control-label">Merk / Tipe</label>
                            <div class="col-md-6">
                                <input id="merk" type="text" class="form-control" name="merk" value="{{ $data->merk }}" required>
                                @if ($errors->has('merk'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('merk') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('stok_barang') ? ' has-error' : '' }}">
                            <label for="stok_barang" class="col-md-4 control-label">Stok Barang</label>
                            <div class="col-md-6">
                                <input id="stok_barang" type="number" maxlength="4" class="form-control" name="stok_barang" value="{{ $data->stok_barang }}" required>
                                @if ($errors->has('stok_barang'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('stok_barang') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('satuan') ? ' has-error' : '' }}">
                            <label for="satuan" class="col-md-4 control-label">Satuan</label>
                            <div class="col-md-6">
                                <input id="satuan" type="text" class="form-control" name="satuan" value="{{ $data->satuan }}" required>
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
                            <select class="form-control" name="kondisi_barang" required="">
                                <option value="Baik" {{$data->kondisi_barang === "Baik" ? "selected" : ""}}>Baik</option>
                                <option value="Rusak Ringan" {{$data->kondisi_barang === "Rusak Ringan" ? "selected" : ""}}>Rusak Ringan</option>
                                <option value="Rusak Sedang" {{$data->kondisi_barang === "Rusak Sedang" ? "selected" : ""}}>Rusak Sedang</option>
                            </select>
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                            <label for="keterangan" class="col-md-4 control-label">keterangan</label>
                            <div class="col-md-12">
                                <input id="keterangan" type="text" class="form-control" name="keterangan" value="{{ $data->keterangan }}">
                                @if ($errors->has('keterangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Update
                        </button>
                        <a href="{{route('barang.index')}}" class="btn btn-light pull-right">Back</a>
                    </div
                  </div>
                </div>
              </div>
            </div>

</div>
</form>

@endsection