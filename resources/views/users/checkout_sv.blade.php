@extends('\layout\viewnavbar')
@section('Judul Halaman', 'Sentracom')
@section('Header', 'Pemesanan')
@section('logo_nav')
{{url('/')}}
@endsection
@section('header_set')
<li class="nav-item dropdown header-profile">
<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
<img src="{{asset('assets/icons/ava.png')}}" width="20" class="img-fluid rounded-circle" alt="">
</a>
<div class="dropdown-menu dropdown-menu-right">
<form action="{{route ('user.logout')}}" method="post">
    @csrf
<button type="submit" class="dropdown-item ai-icon">
<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
<span class="ml-2">Logout </span>
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
@section('dahsboard_nav_profile')
<li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
    <i class="flaticon-381-layer-1"></i>
    <span class="nav-text">Users</span>
</a>
<ul aria-expanded="false">
    <li><a href="{{url('user/profile')}}">Profile</a></li>
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
                <div class="row">
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
                                            <a class="nav-link" data-toggle="tab" href="#profile2">Ordered</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content">
                                        <div class="tab-pane fade show active" id="home1" role="tabpanel">
                                            <div class="table-responsive">
                                                <form action="{{route('user.sv_order')}}" enctype="multipart/form-data" method="post">
                                                    @csrf
                                                <table class="table table-sm mb-0 table-responsive-lg text-black">
                                                    <thead>
                                                        <tr>
                                                            <th class="align-middle">Identitas</th>
                                                            <th class="align-middle pr-2">Tanggal</th>
                                                            <th class="align-middle minw100">Dikirim ke</th>
                                                            <th class="align-middle minw100">Keterangan</th>
                                                            <th class="align-middle text-center">Status</th>
                                                            <th class="align-middle text-center">Harga</th>
                                                            <th class="no-sort"></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="orders">
                                                        @foreach($sv as $data)
                                                        <tr class="btn-reveal-trigger">
                                                                <td class="py-2">
                                                                    <strong class="text-black" style="font-size : 20px;">{{$data->name}}</strong><br /><p>{{$data->email}}<br>{{$data->code}}</p></td>
                                                                <td class="py-2">{{$data->booking}}</td>
                                                                <td class="py-2">{{$data->alamat}}</td>
                                                                <td class="py-2">{{$data->ket}}</td>
                                                                @if($data->status != 'send' && $data->status !='finish')
                                                                <td class="py-2 text-center"><span class="badge badge-secondary">Process<span class="ml-1 fa fa-check"></span></span></td>
                                                                <td class="py-2 text-center">IDR <?php 
                                                                $num = $data->amount;
                                                                $num = sprintf("%.2f", $num);
                                                                echo number_format($num, 2, ".", ",");?>
                                                                @elseif($data->status == 'send')
                                                                <td class="py-2 text-center"><span class="badge badge-warning">{{$data->status}}<span class="ml-1 fa fa-check"></span></span></td>
                                                                <td class="py-2 text-center">IDR <?php 
                                                                $num = $data->amount;
                                                                $num = sprintf("%.2f", $num);
                                                                echo number_format($num, 2, ".", ",");?>
                                                                @elseif($data->status == 'finish')
                                                                <td class="py-2 text-center"><span class="badge badge-success">{{$data->status}}<span class="ml-1 fa fa-check"></span></span></td>
                                                                <td class="py-2 text-center">IDR <?php 
                                                                $num = $data->amount;
                                                                $num = sprintf("%.2f", $num);
                                                                echo number_format($num, 2, ".", ",");?>
                                                                </td>
                                                                <td> <div class="dropdown text-sans-serif"><button class="btn btn-primary tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false"><span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span></button>
                                                                    <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">
                                                                        <div class="py-2"><button class="dropdown-item text-success" value="{{$data->id}}" type="submit" name="order" >Order</button>
                                                                        </div>
                                                                    </div>
                                                                </div></td>
                                                                @endif
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                                </form>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="profile2">
                                            <div class="pt-4">
                                                <div class="col-xl-12">
                                                <table id="example5" class="display min-w850">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama Barang</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach($sv1 as $od)
                                                    @if($od->status == 'complete' || $od->status == 'cancel')
                                                <tr>
                                                    <td>#</td>
                                                    <td>{{$od->code}} {{$od->type}}</td>
                                                    <td>
                                                        @if($od->status == 'cancel')
                                                        <span class="badge light badge-dark">
                                                            <i class="fa fa-circle text-dark mr-1"></i>
                                                            Canceled
                                                        </span>
                                                        </td>
                                                        @elseif($od->status == 'complete')
                                                        <span class="badge light badge-success">
                                                            <i class="fa fa-circle text-success mr-1"></i>
                                                            Completed
                                                        </span>
                                                        </td>
                                                            @endif
                                                </tr>
                                                @endif
                                                @endforeach
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
                </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->
        @include('sweetalert::alert')

@endsection