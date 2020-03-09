<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>Surabaya Movie Week</title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('dist/css/adminlte.min.css')}}">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
<div class="modal fade" id="nilai">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Penilaian</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
			 <table class="table table-hover" id="mytable">
       <div class="card">
              <div class="card-body">
                <p class="card-text">
                @if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif
                <form action="{{url('/nilai')}}" method="post">
		            {{ csrf_field() }}
                <div class ="form-group" input type ="text" class="form-control">
                @foreach($profile as $p)
                <input type="hidden" name="id_profil" value="{{ $p->id_profil }}">  
                <input type="hidden" name="nama_kelompok" value="{{ $p->nama_kelompok }}">
                @endforeach
                <input type="hidden" name="id_juri" value="{{ Auth::user()->id }}">
              
		           <label> Kriteria 1 : </label> <input type="number" required="required" name="k1" class="form-control"> <br/>
               <label> Kriteria 2 :  </label> <input type="number" required="required" name="k2" class="form-control"> <br/>
		           <label> Kriteria 3 :  </label> <input type="number" required="required" name="k3" class="form-control"> <br/>
               <label> Kriteria 4 :  </label> <input type="number" required="required" name="k4" class="form-control"> <br/>
	            	<input type="submit" value="Upload Nilai" class="form-control">
                </div>
	            </form>
                </p>
              </div>
            </div>
		  </table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">cancel</button>
			</div>
		</div>
	</div>
</div>
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/') }}" class="nav-link">Home</a>
    </ul>

    <!-- SEARCH FORM -->

  
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->


    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->name }}</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item has-treeview menu-open">
          @if(Auth::user()->status==0)
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Registrasi
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('/user')}}" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Profil Peserta</p>
                </a>
              </li>
              <li class="nav-item">
                <a  id="reg" name="registrasi" data-toggle="modal" data-target="#regis" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Registrasi dan Upload</p>
                </a>
              </li>
            </ul>
          </li>
          @endif
          @if(Auth::user()->status==1)
          <li class="nav-item">
            <a href="{{url('/juri')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Lihat Film
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          @endif
          @if(Auth::user()->status==2)
          <li class="nav-item">
            <a href="{{url('/admin')}}" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Validasi
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          @endif
          <li class="nav-item">
            <a href="{{ route('logout') }}" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
              {{ __('Logout') }}
              </p>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
             @csrf    
             </form>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail film</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            @if(Auth::user()->status==1)
              <li class="breadcrumb-item"><a href="{{url('/juri')}}">Kembali</a></li>
              @endif
              @if(Auth::user()->status==2)
              <li class="breadcrumb-item"><a href="{{url('/admin')}}">Kembali</a></li>
              @endif
              <li class="breadcrumb-item active">Detail film</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <div class="card">
  <div class="card-header">
  @foreach($profile as $p)
  <h2>{{ $p->film }}</h2>
  </div>
  <div class="card-body">
  <div class="row">
    <div class="col-md-4">
    <h3>Poster</h3>
  <img width="220px" src="{{ url('/data_file/'.$p->poster) }}"></br></br>
  <h3>Identitas Sutradara</h3>
  <img width="220px" src="{{ url('/data_foto/'.$p->foto_identitas) }}">
    </div>
    <div class="col-md-4">
<table id="vertical-1" class="table table-bordered table-hover">
<tbody>
<tr>
<th>Nama Kelompok</th><td>{{ $p->nama_kelompok }}</td></tr>
<th>E-mail</th><td>{{ $p->email }}</td></tr>
<th>Nama Sekolah</th><td>{{ $p->nama_sekolah }}</td></tr>
<th>Kota</th><td>{{ $p->kota }}</td></tr>
<th>Nama Sutradara</th><td>{{ $p->nama_sutradara }}</td></tr>
@if(Auth::user()->status==2)
<th>No hp</th><td>{{ $p->hp }}</td></tr>
@endif
<th>Nama Penulis</th><td>{{ $p->nama_penulis }}</td></tr>
<th>Link Trailer</th><td><a href="{{ $p->link }}" target="_blank">{{ $p->link }}</a></td></tr>
</tbody>		
</table>
    
  </div>
  </div>
  @if(Auth::user()->status==1)
    <div class="col-md-4">
    <a  id="reg" name="registrasi" data-toggle="modal" data-target="#nilai"  class="btn btn-warning">Penilaian</a>
    </div>
    @endif
  </br>
  <h3>Film</h3>
  <div class="col-md-1">
  <video id="my-video" class="video-js" controls preload="auto" 
      width="900" height="400" data-setup="{}"  src="{{url('/data_video/'.$p->film)}}" type="video/mp4">
    </video> 
        </div>
  </div>
  </br>
  <h3>Sinopsis</h3>
  {{ $p->sinopsis }}
  @endforeach
  </div>

          <!-- /.card -->
          </div>
          <!-- /.col-md-6 -->
          
                </div>
            </div>
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{asset('plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('dist/js/adminlte.min.js')}}"></script>
</body>
</html>
