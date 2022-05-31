@extends('\layout\viewnavbar')
@section('Judul Halaman', 'Sentracom')
@section('Header', 'Dashboard')
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
<form action="{{route ('user.logout')}}" method="post">
    @csrf
<a href="{{route ('user.logout')}}" class="dropdown-item ai-icon">
<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
<span class="ml-2">Logout </span>
</a>
</form>
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
                <!-- row -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="profile card card-body px-3 pt-3 pb-0">
                            <div class="profile-head">
                                <div class="photo-content">
                                    <div class="cover-photo"></div>
                                </div>
                                <div class="profile-info">
									<div class="profile-photo">
										<img src="{{asset('assets/images/profile/profile.png')}}" class="img-fluid rounded-circle" alt="">
									</div>
									<div class="profile-details">
										<div class="profile-name px-3 pt-2">
											<h4 class="text-primary mb-0">{{$client['name']}}</h4>
											<p>Service and Order</p>
										</div>
										<div class="profile-email px-2 pt-2">
											<h4 class="text-muted mb-0">{{$client['email']}}</h4>
											<p>Email</p>
										</div>
                                        <div class="ml-auto">
                                                <!-- Button trigger modal -->
                                                <button type="button" class="btn btn-primary mb-2" data-toggle="modal" data-target="#editProfile">Edit Profile</button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="editProfile">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Profile</h5>
                                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                <form action="{{route ('post.edit', $id)}}" method="post">
                                                                    @csrf
                                                                    <div class="form-group">
                                                                        <label for="name" class="mb-1 text-grey">Nama Lengkap</label>
                                                                        <input type="text" name="name" id="name" class="form-control" value="{{$client['name']}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="email" class="mb-1 text-grey">Email</label>
                                                                        <input type="email" name="email" id="email" class="form-control" value="{{$client['email']}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nowa" class="mb-1 text-grey">No. Wa</label>
                                                                        <input type="nowa" name="nowa" id="nowa" class="form-control" value="{{$client['Nowa']}}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="alamat" class="mb-1 text-grey">Alamat</label>
                                                                        <input type="alamat" name="alamat" id="alamat" class="form-control" value="{{$client['alamat']}}">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                                                </form>
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
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="profile-tab">
                                    <div class="custom-tab-1">
                                        <ul class="nav nav-tabs">
                                            <li class="nav-item"><a href="#about-me" data-toggle="tab" class="nav-link active show">Tentang Saya</a>
                                            </li>
                                        </ul>
                                        <div class="tab-content">
                                            <div id="about-me" class="tab-pane fade active show">
                                                <div class="profile-personal-info">
                                                    <div class="row mb-2 mt-3">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Owner <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$client['name']}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Email <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$client['email']}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">No. Wa <span class="pull-right">:</span>
                                                            </h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$client['Nowa']}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-2">
                                                        <div class="col-sm-3 col-5">
                                                            <h5 class="f-w-500">Alamat <span class="pull-right">:</span></h5>
                                                        </div>
                                                        <div class="col-sm-9 col-7"><span>{{$client['alamat']}}</span>
                                                        </div>
                                                    </div>
                                                    <div class="row mt-3">
                                                        <div class="col-sm-9 col-7">
														<div class="post-input">
                                                            <a class="btn-social whatsapp" href="javascript:void(0)"><i class="fa fa-whatsapp"></i></a>
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
        @include('sweetalert::alert')

@endsection