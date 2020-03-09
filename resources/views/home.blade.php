
<!DOCTYPE html>

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
<body class="hold-transition sidebar-mini">

<div class="modal fade" id="regis">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Registrasi dan Upload</h4>
				<button type="button" class="close" data-dismiss="modal">&times;</button>
			</div>
			<div class="modal-body">
			 <table class="table table-hover" id="mytable">
       <div class="card">
              <div class="card-body">
                <p class="card-text">
                <form action="{{url('/upload')}}" method="post" enctype="multipart/form-data">
		            {{ csrf_field() }}
                <div class ="form-group" input type ="text" class="form-control">		
		           <label> Nama Kelompok : </label> <input type="text" required="required" name="nama_kelompok" class="form-control"> <br/>
               <label> Email Peserta : </label> <input type="email" required="required" name="email" class="form-control"> <br/>
               <label> No Handphone : </label> <input type="text" required="required" name="hp" class="form-control"> <br/>
		           <label> Nama Institusi Sekolah : </label> <input type="text" required="required" name="nama_sekolah" class="form-control"> <br/>
               <label> Kota : </label> <input type="text" required="required" name="kota" class="form-control"> <br/>
               <label> Nama Lengkap Sutradara : </label> <input type="text" required="required" name="nama_sutradara" class="form-control"> <br/>
               <label> Kartu Identitas Sutradara : </label> <input type="file" name="foto_identitas" required="required" class="form-control"></br>
               <label> Nama Penulis Skenario/Naskah : </label> <input type="text" required="required" name="nama_penulis" class="form-control"> <br/>
               <label> Link Trailer Youtube : </label> <input type="text" required="required" name="link" class="form-control"> <br/>
               <label> Poster : </label> <input type="file" name="poster" required="required" class="form-control"></br>
               <label> Film: </label><input type="file" name="film" required="required" class="form-control"></br>
               <label> Sinopsis Film :</label> <textarea required="required" name="sinopsis" class="form-control"></textarea> <br/>
	            	<input type="submit" value="Upload" class="form-control" onclick="myFunction()">
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
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="https://api.whatsapp.com/send?phone=6282139096833"  target="_blank" class="nav-link">Kontak</a>
      </li>
    </ul>


    <!-- Right navbar links -->
    
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
            <h1 class="m-0 text-dark">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
        @if(count($errors) > 0)
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
					{{ $error }} <br/>
					@endforeach
				</div>
				@endif
          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h5 class="card-title">Ketentuan</h5>

                <p class="card-text">
                  Trailer video max termasuk title dan credit: 4 menit</br>
                  Full video max : 15 menit
                </p>

              </div>
            </div>

            
          </div>
          <!-- /.col-md-6 -->
          <div class="col-lg-6">
            <div class="card">
              <div class="card-header">
                <h5 class="m-0">Format Upload Film</h5>
              </div>
              <div class="card-body">
                <p class="card-text">1. Sinopsis Film</br>2. Poster Film</br>3. Format video : .avi, .mp4, .mov</p>
                
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
