<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SILABTI-REGISTER</title>

  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/mdi/css/materialdesignicons.min.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/iconfonts/puse-icons-feather/feather.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.base.css')}}">
  <link rel="stylesheet" href="{{asset('vendors/css/vendor.bundle.addons.css')}}">
  <link rel="stylesheet" href="{{asset('css/style.css')}}">
  <!-- endinject -->
  <link rel="shortcut icon" href="{{asset('favicon.ico')}}" />
</head>

<body>
<form method="POST" action="{{ route('register') }}">
{{ csrf_field() }}

  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth theme-one">
        <div class="row w-100">
        <div class="col-md-12" style="margin-bottom: 20px;">
        <h2 style="text-align: center;">SILABTI</h2>
        </div>
        <div class="col-lg-4 mx-auto">
            <div class="auto-form-wrapper">

                        <div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="label">{{ __('Nama') }}</label>
                            <div class="input-group">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required>
                                <div class="input-group-append">
                                  <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                  </span>
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                         <div class="form-group row{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label class="label">{{ __('Username') }}</label>
                            <div class="input-group">
                                <input id="username" type="number" class="form-control" name="username" value="{{ old('username') }}" placeholder="NIM / NIP"  required placeholder="NIM / NIP">
                                <div class="input-group-append">
                                  <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                  </span>
                                </div>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                        <div class="form-group row{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="label">{{ __('Email Address') }}</label>
                            <div class="input-group">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>
                                <div class="input-group-append">
                                  <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                  </span>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>  

                       <div class="form-group row{{ $errors->has('level') ? ' has-error' : '' }}">
                            <label class="label">{{ __('Level') }}</label>
                            <select name="level" class="form-control">
                                <option value="mahasiswa">Mahasiswa</option>
                                <option value="dosen">Dosen</option>
                            </select>
                        </div> 
                        <div class="form-group row{{ $errors->has('id_prodi') ? ' has-error' : '' }}">
                            <label class="label">{{ __('Program Studi') }}</label>
                            <select name="id_prodi" class="form-control">
                                <option value="">--Silahkan Pilih Program Studi--</option>
                                <?php $data=App\Prodi::all() ?>
                                @foreach($data as $datas)
                                    <option value="{{$datas->id_prodi}}">{{$datas->nama_prodi}}</option>
                                @endforeach
                            </select>
                        </div>   
                        <div class="form-group row{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="label">{{ __('Password') }}</label>

                            <div class="input-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                <div class="input-group-append">
                                  <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                  </span>
                                </div>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('password-confirm') ? ' has-error' : '' }}">
                            <label class="label">{{ __('Confirm Password') }}</label>

                            <div class="input-group">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                <div class="input-group-append">
                                  <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                  </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row{{ $errors->has('captcha') ? ' has-error' : '' }}">
                            <label class="label">{{ __('Captcha') }}</label>
                            <div class="col-md-12">
                              <div class="captcha">
                                 <span>{!!captcha_img('flat')!!}</span>
                                 <!-- <button type="button" name="refresh" class="btn btn-success btn-refresh">Refresh</button>
                                 <br> -->
                              </div>
                            </div>
                            <br>
                            <div class="input-group">
                                <input id="captcha" type="text" class="form-control mt-2 @error('captcha') is-invalid @enderror" name="captcha" placeholder="Enter Captcha" required>
                                <div class="input-group-append">
                                  <span class="input-group-text">
                                    <i class="mdi mdi-check-circle-outline"></i>
                                  </span>
                                </div>
                                @error('captcha')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-success">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <br><br>
                         <center>Already have an account?<br>
                                <a href="login">SIGN IN</a></center>
            </div>
            <p class="footer-text text-center" style="margin-top: 20px;color: #308ee0">Copyright © {{date('Y')}} silabti.pnp.ac.id - All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends Herziwp@gmail.com -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  </form>
  <script src="{{asset('vendors/js/vendor.bundle.base.js')}}"></script>
  <script src="{{asset('vendors/js/vendor.bundle.addons.js')}}"></script>
</body>

</html>