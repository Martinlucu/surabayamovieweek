<?php
if (Auth::user()->status==0) {
      header("Location: " . URL::to('/home'), true);
      exit();
}
if (Auth::user()->status==2) {
      header("Location: " . URL::to('/home'), true);
      exit();
}
?>
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
            <h1 class="m-0 text-dark">Film Peserta</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{url('/juri')}}">Kembali</a></li>
              <li class="breadcrumb-item active">Film Peserta</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
        <div class="card">
  <div class="card-header">
  <h2>Daftar Film</h2>
  </div>
  <div class="card-body">
  <table id="example2" class="table table-bordered table-hover">
  <a  href="{{url('/full')}}"  class="btn btn-warning">Data yang sudah dinilai</a>

<thead>
<tr><th><center>Poster dan Trailer</center></th><th><center>Aksi</center></th></tr>
</thead>
<tbody>
</tbody>
@foreach($profile as $p)
		<tr>
    @if($p->status=='1')
    <input type="hidden" name="id_profil" value="{{ $p->id_profil }}">
			<td><a href="{{ $p->link }}" target="_blank"><img width="150px" src="{{ url('/data_file/'.$p->poster) }}"></a></td>			
			<td><a href="{{url('/detail/'.$p->id_profil)}}">Detail dan Penilaian</a></td>
      @endif
		</tr>
		@endforeach
</table>
Halaman : {{ $profile->currentPage() }} <br/>
{{ $profile->links() }}
</div>
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
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
