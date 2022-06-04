@extends('\layout\viewnavbar')
@section('Judul Halaman', 'Sentracom')
@section('Header', 'Service')
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
        <li><a href="{{url('user/checkout_sv')}}">Service</a></li>
        <li><a href="{{url('user/checkout_sp')}}">Sparepart</a></li>
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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Service</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Order Form</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Detail Order</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-validation">
                                    <form class="form-valide" action="{{route ('user.service.post')}}" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-xl-8">
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="code">Kode Laptop / Nama Laptop
                                                    </label>
                                                    <div class="col-lg-8">
                                                    <input type="text" class="form-control" id="code" name="code" style="color:grey;" placeholder="Masukkan (Nama_barang-Kode_barang) disini ...">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="type">Jenis Service
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <select class="form-control default-select" id="type" name="type">
                                                            <option value=" " disabled selected>Pilihlah Dibawah Ini</option>
                                                            <option value="Software">Software</option>
                                                            <option value="Hardware">Hardware</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="mdate">Booking Tanggal
                                                    </label>
                                                    <div class="col-lg-6">
                                                        <input type="text" name="mdate" class="form-control" placeholder="Booking Tanggal disini ..." id="mdate" style="color:grey;">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-lg-4 col-form-label" for="ket">Keterangan
                                                    </label>
                                                    <div class="col-lg-8">
                                                        <textarea class="form-control" id="ket" name="ket" rows="5" style="color:grey;" placeholder="Masukkan Keterangan Lengkap.."></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-right">
                                                <button type="submit" class="btn btn-lg btn-primary">Checkout</button>
                                            </div>

                                        </div>
                                    </form>
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
        @include('sweetalert::alert')

@endsection