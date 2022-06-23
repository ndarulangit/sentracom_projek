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
    <!-- row -->
    <div class="container-fluid">
        <!-- Add Order -->
        <div class="row">
            <div class="col-xl-9 col-xxl-12">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-body">
                                <div id="donutChart"></div>
                                <div class="d-flex justify-content-between mt-2">
                                    <div class="pr-2">
                                        <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="20" height="8" rx="4" fill="#214BB8"/>
                                        </svg>
                                        <h4 class="fs-18 text-black mb-1 font-w600">{{$sp}}</h4>
                                        <span class="fs-14">Sparepart</span>
                                    </div>
                                    <div class="pr-2">
                                        <svg width="20" height="8" viewBox="0 0 20 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <rect width="20" height="8" rx="4" fill="#45ADDA"/>
                                        </svg>
                                        <h4 class="fs-18 text-black mb-1 font-w600">{{$sv}}</h4>
                                        <span class="fs-14">Service</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@include('sweetalert::alert')
<script>
    var datasp = @json($sp);
    var datasv = @json($sv);
</script>
@endsection

