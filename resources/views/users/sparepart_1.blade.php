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
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Sparepart</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Order Form</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Cari Sparepart</h4>
                                </div>
                                <div class="card-body">
                                    <label for="nama_sparepart">Nama Sparepart</label>
                                    <form action="{{route('user.sp')}}" method="post">
                                        @csrf
                                        <select name="nama_sparepart" id="nama_sparepart" class="form-control">
                                        @if(isset($cr))
                                        <option value="{{$cr}}" selected>{{$cr}}</option>
                                        @else
                                        <option value="" selected disabled>Pilih Sparepart</option>
                                        @endif
                                        @foreach($fltr as $opt)
                                        <option value="{{$opt->nama}}">{{$opt->nama}}</option>
                                        @endforeach
                                    </select>
                                    <hr>
                                    <div class="class-footer d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary">Cari</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @if(isset($fltr2))
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h4>Data</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <form action="{{route('user.order')}}" method="post">
                                            @csrf
                                        <table class="table table-striped">
                                            <thead>
                                                <tr>
                                                    <th></th>
                                                    <th>Jumlah</th>
                                                    <th>Nama</th>
                                                    <th>Merek</th>
                                                    <th>Harga</th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                                <tbody>
                                                    @foreach($fltr2 as $itm)
                                                    <tr>
                                                    <th><input type="checkbox" name="subpro" value="{{$itm->id}}"></th>
                                                    <th>{{$itm->jumlah}}</th>
                                                    <th>{{$itm->nama}}</th>
                                                    <th>{{$itm->merek}}</th>
                                                    <th>IDR{{$itm->harga}}</th>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="class-footer d-flex justify-content-end">
                                        <button type='submit' class="btn btn-primary">Pilih</button>
                                    </div>
                                </form>
                                @endif
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
