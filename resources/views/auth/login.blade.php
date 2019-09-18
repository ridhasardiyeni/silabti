<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>SILABTI-LOGIN</title>

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
<form method="POST" action="{{ route('login') }}">
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
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}"">
                  <label class="label">Username</label>
                  <div class="input-group">
                    <input id="email" type="text" class="form-control" name="email" value="{{ old('email') }}" required autofocus placeholder="NIM / NIP">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                  </div>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
               <!--  <div class="form-group{{ $errors->has('level') ? ' has-error' : '' }}">
                  <label class="label">Level</label>
                    <select name="level" class="form-control">
                        <option value="mahasiswa">Mahasiswa</option>
                        <option value="dosen">Dosen</option>
                        <option value="kalab">Kepala Labor</option>
                        <option value="admin">Admin</option>
                    </select>
                </div> -->
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  <label class="label">Password</label>
                  <div class="input-group">
                    <input id="password" type="password" class="form-control" name="password" required placeholder="******">
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                  </div>
                </div>
              <!--   <div class="form-group{{ $errors->has('captcha') ? ' has-error' : '' }}">
                            <label class="label">{{ __('Captcha') }}</label>
                            <div class="col-md-12">
                              <div class="captcha">
                                 <span>{!!captcha_img('flat')!!}</span>
                              </div>
                            </div>
                            
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
                        </div> -->
                <div class="form-group">
                  <button class="btn btn-success submit-btn btn-block" type="submit">Login</button><br>
                  <center>Have not account yet ?<br>
                  <a href="register">SIGN UP</a></center>
                </div>
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
  <script src="{{asset('js/sweetalert2.all.js')}}"></script>
@include('sweetalert::alert')

  @section('js')

  @show
</body>

</html>