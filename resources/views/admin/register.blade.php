@extends('\layout\viewnavbar')
@section('Judul Halaman', 'Sentracom')
@section('Header', 'Dashboard')
@section('logo_nav')
{{route('dashboard.admin')}}
@endsection
@section('header_set')
<li class="nav-item dropdown header-profile">
<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
<img src="{{asset('assets/images/profile/17.jpg')}}" width="20" alt=""/>
</a>
<div class="dropdown-menu dropdown-menu-right">
<form action="{{route ('admin.logout')}}" method="post">
    @csrf
<button type="submit" class="dropdown-item ai-icon">
<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
<span class="ml-2">Logout </span>
</button>
</form>
</div>
</li>
@endsection
@section('dashboard_nav')
<li><a href="{{route('data.admin')}}">Database Sparepart</a></li>
<li><a href="{{route('history.admin')}}">Catatan/History</a></li>
<li><a href="{{route('confirm.admin')}}">Konfirmasi Orderan</a></li>
<li><a href="{{route('tracking.admin')}}">Tracking Orderan</a></li>

@endsection
@section('dahsboard_nav_profile')
<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
    <i class="flaticon-381-layer-1"></i>
    <span class="nav-text">Registrasi</span>
</a>
<ul aria-expanded="false">
    <li><a href="{{route('register.admin')}}">Teknisi</a></li>
</ul>
</li>
@endsection
@section('content')
<div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Database Sparepart</a></li>
                </ol>
            </div>
            <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Daftarkan Teknisi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{route('admin.regTek')}}" method="post">
                            @csrf
                        <div class="row">
                            <div class="col-lg-9 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control" placeholder="Masukkan nama disini" required>
                                </div>
                            </div>
                            <div class="col-lg-9 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Email</label>
                                    <input type="email" name="email" class="form-control" id="inputGroupPrepend2" aria-describedby="inputGroupPrepend2" placeholder="teknisi@example.com" required>
                                </div>
                            </div>
                            <div class="col-lg-9 mb-2">
                                <div class="form-group">
                                    <label class="text-label">Password</label>
                                    <input type="text" name="phoneNumber" class="form-control" placeholder="Password" required>
                                </div>
                            </div>
                            <div class="col-lg-9"></div>
                            <div class="col-lg-3 mb-2">
                                <button name="daftarkan" type="submit" class="btn btn-lg btn-primary">Daftarkan</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
</div>
@include('sweetalert::alert')

@endsection