<div class="row"> 
<br><br><br><br><br><br>
<ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                @if(Auth::user()->gambar == '')

                  <img class="img-xs rounded-circle" src="{{asset('images/user/default.png')}}" alt="profile image">
                @else

                  <img class="img-xs rounded-circle" src="{{asset('images/user/'. Auth::user()->gambar)}}" alt="profile image">
                @endif
                </div>
                <div class="text-wrapper">
                  <p class="profile-name">{{Auth::user()->name}}</p>
                  <div>
                    <small class="designation text-muted" style="text-transform: uppercase;letter-spacing: 1px;">{{ Auth::user()->level }}</small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            </div>
          </li>
          <li class="nav-item "> 
            <a class="nav-link" href="{{route('home')}}">
              <i class="menu-icon mdi mdi-home-variant"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          @if(Auth::user()->level == 'admin')
          <li class="nav-item">
            <a class="nav-link " data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Master Data</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                
                <li class="nav-item">
                  <a class="nav-link" href="{{route('user.index')}}">Data User</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{route('prodi.index')}}">Data Prodi</a>
                </li>
                
                <li class="nav-item">
                  <a class="nav-link" href="{{route('mahasiswa.index')}}">Data Mahasiswa</a>
                </li>
                 <li class="nav-item">
                  <a class="nav-link"href="{{route('dosen.index')}}">Data Dosen</a>
                </li>
              </ul>
            </div>
          </li>
          @endif
            <li class="nav-item">
                  <a class="nav-link" href="{{route('barang.index')}}">
                    <i class="menu-icon mdi mdi-package-variant"></i>
                    <span class="menu-title">Barang</span>
                  </a>
                </li>
          
          <li class="nav-item">
            <a class="nav-link" href="{{route('trans.index')}}">
              <i class="menu-icon mdi mdi-chart-histogram"></i>
              <span class="menu-title">Transaksi</span>
            </a>
          </li>
          @if(Auth::user()->level!='mahasiswa' && Auth::user()->level!='dosen')
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-laporan" aria-expanded="false" aria-controls="ui-laporan">
              <i class="menu-icon mdi mdi-table"></i>
              <span class="menu-title">Laporan</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-laporan">
              <ul class="nav flex-column sub-menu">
               
                 <li class="nav-item">
                  <a class="nav-link" href="{{url('laporan/barang')}}">Barang</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="{{url('laporan/transaksi')}}">Transaksi</a>
                </li>
              </ul>
            </div>
          </li>
          @endif
        </ul>
        </div>