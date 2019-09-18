@section('js')
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


var check = function() {
  if (document.getElementById('password').value ==
    document.getElementById('confirm_password').value) {
    document.getElementById('submit').disabled = false;
    document.getElementById('message').style.color = 'green';
    document.getElementById('message').innerHTML = 'matching';
  } else {
    document.getElementById('submit').disabled = true;
    document.getElementById('message').style.color = 'red';
    document.getElementById('message').innerHTML = 'not matching';
  }
}
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
                      <h4 class="card-title">Detail <b>{{$data->username}}</b></h4>
                      
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $data->name }}" required readonly>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="username" class="col-md-4 control-label">Username</label>
                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ $data->username }}" required readonly="">
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $data->email }}" required readonly>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="email" class="col-md-4 control-label">Gambar</label>
                            <div class="col-md-6">
                                <img class="product" width="150" height="200" @if($data->gambar) src="{{ asset('images/user/'.$data->gambar) }}" @endif />
                            </div>
                        </div>
                        @if(Auth::user()->level == 'admin')
                         <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label for="level" class="col-md-4 control-label">Level</label>
                            <div class="col-md-6">
                            <select class="form-control" name="level" required="" readonly>
                                
                                <option value="mahasiswa" @if($data->level == 'mahasiswa') selected @endif>Mahasiswa</option>
                                <option value="dosen" @if($data->level == 'dosen') selected @endif>Dosen</option>
                                <option value="kalab" @if($data->level == 'kalab') selected @endif>Kepala Labor</option>
                                <option value="admin" @if($data->level == 'admin') selected @endif>Admin</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('aktif') ? ' has-error' : '' }}">
                            <label for="aktif" class="col-md-4 control-label">Aktif</label>
                            <div class="col-md-6">
                            <select class="form-control" name="aktif" required="" readonly>
                                <option value="0" @if($data->level == '0') selected @endif>Tidak</option>
                                <option value="1" @if($data->aktif == '1') selected @endif>Ya</option>
                            </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('id_prodi') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label" for="id_prodi">Program Studi</label>
                            <div class="col-md-6">
                            <select name="id_prodi" class="form-control" required="">
                                <?php $prodis=App\Prodi::all() ?>
                                @foreach($prodis as $prodi)
                                    <option 
                                    value="{{$prodi->id_prodi}}"
                                        @if ($prodi->id_prodi === $data->id_prodi)
                                            selected
                                        @endif
                                    >{{$prodi->nama_prodi}}
                                   </option>
                                @endforeach
                            </select>
                            </div>
                        </div> 
                        @endif
                        <a href="{{route('user.index')}}" class="btn btn-light pull-right">Back</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>

</div>
@endsection