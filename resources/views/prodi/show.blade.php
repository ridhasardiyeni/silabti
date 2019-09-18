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
                      <h4 class="card-title">Detail Prodi <b>{{$data->nama_prodi}}</b> </h4>
                      <form class="forms-sample">

                        

                        <div class="form-group{{ $errors->has('nama_prodi') ? ' has-error' : '' }}">
                            <label for="nama_prodi" class="col-md-4 control-label">Prodi</label>
                            <div class="col-md-6">
                                <input id="nama_prodi" type="text" class="form-control" name="nama_prodi" value="{{ $data->nama_prodi }}" readonly="">
                                @if ($errors->has('nama_prodi'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('nama_prodi') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <a href="{{route('prodi.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
@endsection