@extends('\layout\viewnavbar')
@section('Judul Halaman', 'Sentracom')
@section('Header', 'Pemesanan')
@section('logo_nav')
{{url('/')}}
@endsection
@section('header_set')
<li class="nav-item dropdown header-profile">
<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
<img src="{{asset('assets/images/profile/17.jpg')}}" width="20" alt=""/>
</a>
<div class="dropdown-menu dropdown-menu-right">
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
</li>
@endsection
@section('content')
 <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Pemesanan</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">List Order</a></li>
					</ol>
                </div>

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Nav tabs -->
                            <div class="custom-tab-1">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#home1">Checkout</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" data-toggle="tab" href="#profile1">Tracking</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                        <div class="table-responsive">
                                            <form action="{{route('user.sp.order')}}" method="post">
                                                @csrf
                                            <table class="table table-sm mb-0 table-responsive-lg text-black">
                                                <thead>
                                                    <tr>
                                                        <th class="align-middle">Identitas</th>
                                                        <th class="align-middle minw100">Dikirim ke</th>
                                                        <th class="align-middle minw100">Barang</th>
                                                        <th class="align-middle text-center">Status</th>
                                                        <th class="align-middle text-center">Harga</th>
                                                        <th class="no-sort"></th>
                                                    </tr>
                                                </thead>
                                                <tbody id="orders">
                                                    @foreach($sp as $data)
                                                    <tr class="btn-reveal-trigger">
                                                        <td class="py-2">
                                                        <strong class="text-black" style="font-size : 20px;">{{$data->name}}</strong><br /><p>{{$data->email}}</p></td>
                                                        <td class="py-2">{{$data->alamat}}</td>
                                                        <td class="py-2">{{$data->nama}} {{$data->merek}}</td>
                                                        <td class="py-2 text-center"><span class="badge badge-secondary">{{$data->status}}<span class="ml-1 fa fa-check"></span></span></td>
                                                        <td class="py-2 text-center">IDR {{($data->harga)*($data->jumlah)}}
                                                            </td>
                                                        <td class="py-2 text-right">
                                                            </td>
                                                        <td><input type="checkbox" name="cekot[]" value={{$data->id}}></td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="pt-3"><button type="submit" class="btn btn-lg btn-primary">Order</button></div>
                                        </form>
                                    </div>
                                    <div class="tab-pane fade" id="profile1">
                                        <div class="pt-4">
                                            <h4>This is profile title</h4>
                                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                            </p>
                                            <p>Raw denim you probably haven't heard of them jean shorts Austin. Nesciunt tofu stumptown aliqua, retro synth master cleanse. Mustache cliche tempor.
                                            </p>
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