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
<li><a href="{{url('user/checkout')}}">Checkout</a></li>
@endsection
@section('content')
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Sparepart</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Checkout</a></li>
					</ol>
                </div>
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-header"> Invoice <strong>25 / 03 / 2022</strong> <span class="float-right">
                                    <strong>Status: </strong><span class="badge badge-secondary">Pending</span></span> </div>
                            <div class="card-body">
                                <div class="row mb-5">
                                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                        <h6>From:</h6>
                                        <div> <span class="badge badge-primary mb-2">Sentracom</span> </div>
                                        <div>71-101 Szczecin, Poland</div>
                                        <div>Email: info@webz.com.pl</div>
                                        <div>Phone: +48 444 666 3333</div>
                                    </div>
                                    <div class="mt-4 col-xl-3 col-lg-3 col-md-6 col-sm-12">
                                        <h6>To:</h6>
                                        <div> <span class="badge badge-success mb-2">Bob Mart</span> </div>
                                        <div>43-190 Mikolow, Poland</div>
                                        <div>Email: marek@daniel.com</div>
                                        <div>Phone: +48 123 456 789</div>
                                    </div>
                                    <div class="mt-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 d-flex justify-content-lg-end justify-content-md-center justify-content-xs-start">
                                        <div class="row align-items-center">
											<div class="col-sm-9"> 
												<div class="brand-logo mb-3">
													<img class="logo-abbr mr-2" src="{{asset ('assets/images/logo.png')}}" alt="">
													<img class="logo-compact" src="{{asset ('assets/images/logo-text.png')}}" alt="">
												</div>
                                                <span>Transfer sesuai harga : <br><strong class="d-block mt-1">IDR 100,000</strong>
                                                    <strong>=========================</strong></span><br>
                                                <small class="text-muted">No. Rekening = xx xxxxx xxx</small>
                                            </div>
                                            <div class="col-sm-3 m-0"> <img src="{{asset('assets/images/bni.png')}}" class="img-fluid"> </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Item</th>
                                                <th>Description</th>
                                                <th class="right">Harga</th>
                                                <th class="center">Jumlah</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center">1</td>
                                                <td class="left strong">Nama Produk</td>
                                                <td class="left">Kode Device Produk</td>
                                                <td class="right">IDR 100,000</td>
                                                <td class="center">1</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                 <!-- Button trigger modal -->
                                 <button type="button" class="btn btn-xs btn-secondary ml-2" data-toggle="modal" data-target="#exampleModalCenter" style="opacity:50%;"><i class="fa fa-solid fa-plus"></i></button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Tambah Sparepart</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <form class="form-valide" action="#" method="post">
                                                    <div class="form-group row">
                                                        <div class="col-lg-12">
                                                            <input type="text" class="form-control" id="val-laptop" name="val-laptop" style="color:grey;" placeholder="Masukkan (Nama_barang-Kode_barang) disini ...">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <div class="col-lg-8">
                                                            <select class="form-control default-select" id="val-skill" name="val-skill">
                                                                <option value=" " disabled selected>Pilih Part Dibawah Ini</option>
                                                                <option value="Keyboard">Keyboard</option>
                                                                <option value="Lcd">Lcd</option>
                                                                <option value="Motherboard">Motherboard</option>
                                                                <option value="Battery">Battery</option>
                                                                <option value="Ram">Ram</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Next</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <div class="row">
                                    <div class="col-lg-7 mt-3">
                                    <table class="table table-clear">
                                            <tbody>
                                                <tr class="left">
                                                    <div class="input-group">
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input">
                                                            <label class="custom-file-label">Upload Bukti Transfer disini</label>
                                                        </div>
                                                    </div>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="col-lg-4 col-sm-5 ml-auto">
                                        <table class="table table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="left"><strong>Ongkir</strong></td>
                                                    <td class="right"><strong>IDR 14,000</strong></td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong>Total</strong></td>
                                                    <td class="right"><strong>IDR 100,000</strong><br>
                                                </tr>
                                                <tr>
                                                    <td class="left">
                                                    <a class="btn btn-secondary btn-lg" href="javascript:void(0)"><i class="ml-0"></i>Cancel</a>
                                                    </td>
                                                    <td class="right">
                                                        <div class="pt-0">
                                                        <a class="btn btn-primary btn-lg" href="javascript:void(0)"><i class="mr-0"></i>Order</a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
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