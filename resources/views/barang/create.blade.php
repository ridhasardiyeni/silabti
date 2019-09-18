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
               
                return false
            })
        })
        </script>
@stop

@extends('layouts.app')

@section('content')

<form method="POST" action="{{ route('barang.store') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
<div class="row">
            <div class="col-md-12 d-flex align-items-stretch grid-margin">
              <div class="row flex-grow">
                <div class="col-12">
                  <div class="card">
                    <div class="card-body">
                      <h4 class="card-title">Tambah Barang Baru</h4>
                      
                        <div class="form-group{{ $errors->has('nama_barang') ? ' has-error' : '' }}">
                            <label for="nama_barang" class="col-md-4 control-label">Nama Barang</label>
                            <div class="col-md-6">
                                <input id="nama_barang" type="text" class="form-control" name="nama_barang" value="{{ old('nama_barang') }}" required>
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
                                <img width="200" height="200" />
                                <input type="file" class="uploads form-control" style="margin-top: 20px;" name="gbr_barang">
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('merk') ? ' has-error' : '' }}">
                            <label for="merk" class="col-md-4 control-label">Merk</label>
                            <div class="col-md-6">
                                <input id="merk" type="text" class="form-control" name="merk" value="{{ old('merk') }}" required>
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
                                <input id="stok_barang" type="number" maxlength="4" class="form-control" name="stok_barang" value="{{ old('stok_barang') }}" required>
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
                                <input id="satuan" type="text" class="form-control" name="satuan" value="{{ old('satuan') }}" required>
                                @if ($errors->has('satuan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('satuan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                       
                        <div class="form-group{{ $errors->has('kondisi_barang') ? ' has-error' : '' }}">
                            <label for="kondisi_barang" class="col-md-4 control-label">Kondisi Baru</label>
                            <div class="col-md-6">
                            <select name="kondisi_barang" class="form-control" required="">
                                <option value="">--Silahkan Pilih--</option>
                                <option value="Baik">Baik</option>
                                <option value="Rusak Ringan">Rusak Ringan</option>
                                <option value="Rusak Sedang">Rusak Sedang</option>
                            </select>
                            </div>
                        </div>
                         <div class="form-group{{ $errors->has('keterangan') ? ' has-error' : '' }}">
                            <label for="keterangan" class="col-md-4 control-label">Keterangan</label>
                            <div class="col-md-12">
                                <input id="keterangan" type="text" class="form-control" name="keterangan" value="{{ old('keterangan') }}">
                                @if ($errors->has('keterangan'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('keterangan') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary" id="submit">
                                    Simpan
                        </button>
                        <button type="reset" class="btn btn-danger">
                                    Reset
                        </button>
                        <a href="{{route('barang.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
</form>

@endsection