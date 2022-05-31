@extends('\layout\viewnavbar')
@section('Judul Halaman', 'Sentracom')
@section('Header', 'Sparepart')
@section('logo_nav')
{{url('/')}}
@endsection
@section('header_set')
<li class="nav-item dropdown header-profile">
<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
<img src="{{asset('assets/images/profile/17.jpg')}}" width="20" alt=""/>
</a>
<div class="dropdown-menu dropdown-menu-right">
<a href="#" class="dropdown-item ai-icon">
<svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
<span class="ml-2">Daftar / Masuk </span>
</a>
<a href="#" class="dropdown-item ai-icon">
<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
<span class="ml-2">Logout </span>
</a>
</div>
</li>
@endsection
@section('dashboard_nav')
<li><a href="{{url('user/service')}}">Service</a></li>
<li><a href="{{url('user/sparepart')}}">Sparepart</a></li>
<li><a class="has-arrow" href="javascript:void()" aria-expanded="false">Checkout</a>
    <ul aria-expanded="false">
        <li><a href="{{url('user/checkout')}}">Service</a></li>
        <li><a href="{{url('user/checkout')}}">Sparepart</a></li>
    </ul>
</li>@endsection
@section('content')
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Sparepart</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Order Form</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-12 col-md-4">
                        <div class="card card-primary">
                            <form action="" method="post">
                                <div class="card-header">
                                    <h4>Cari Sparepart</h4>
                                </div>
                                <div class="card-body">
                                    <label for="">Nama Sparepart</label>
                                    <select name="nama_sparepart" class="form-control">
                                        <option value="0">Pilih Sparepart</option>
                                        <option value="1">Monitor</option>
                                    </select>
                                    <hr>
                                    <div class="class-footer d-flex justify-content-end">
                                        <button class="btn btn-primary">Cari</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12 col-md-8">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Data</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Merek</th>
                                                <th>Harga</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th>1</th>
                                                <th>Monitor</th>
                                                <th>Asus</th>
                                                <th>Rp.1.000.000</th>
                                            </tr>
                                            <tr>
                                                <th>1</th>
                                                <th>Monitor</th>
                                                <th>Asus-12</th>
                                                <th>Rp.1.000.000</th>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="class-footer d-flex justify-content-end">
                                    <button class="btn btn-primary">Pilih</button>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection
