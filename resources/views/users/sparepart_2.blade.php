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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Sparepart</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Order Detail</a></li>
					</ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-3 col-lg-6  col-md-6 col-xxl-5 ">
                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade show active" id="first">
                                                <img class="img-fluid" src="{{asset('assets/images/product/1.jpg')}}" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <!--Tab slider End-->
                                    <div class="col-xl-9 col-lg-6  col-md-6 col-xxl-7 col-sm-12">
                                        <div class="product-detail-content">
                                            <!--Product details-->
                                            <div class="new-arrival-content pr">
                                                <h4>Nama Part</h4>
												<div class="d-table mb-2">
													<p class="price float-left d-block">IDR 100,000</p>
                                                </div>
                                                <p>Ketersediaan: <span class="item"> Ada <i
                                                            class="fa fa-shopping-basket"></i></span>
                                                </p>
                                                <p>Product code: <span class="item">0405689</span> </p>
                                                <p class="text-content">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.
                                                    If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't anything embarrassing.</p>
                                                <br><br><br><br>
                                                <div class="shopping-cart float-right pt-3 mr-5">
                                                    <a class="btn btn-primary btn-lg" href="javascript:void(0)"><i
                                                            class="fa fa-shopping-basket mr-2"></i>Chekcout</a>
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
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
@endsection