@extends('\layout\viewnavbar')
@section('Judul Halaman', 'Sentracom')
@section('Header', 'Dashboard')
@section('logo_nav')
{{route('dashboard.admin')}}
@endsection
@section('header_set')
<li class="nav-item dropdown header-profile">
<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
<img src="{{asset('assets/icons/ava.png')}}" width="20" class="img-fluid rounded-circle" alt="">
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
<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <div class="container-fluid">
                <div class="page-titles">
					<ol class="breadcrumb">
						<li class="breadcrumb-item"><a href="javascript:void(0)">Table</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Datatable</a></li>
					</ol>
                </div>
                <!-- row -->
				<div class="d-flex flex-wrap mb-2 align-items-center justify-content-between">
					<div class="mb-3 ml-4 mr-3">
						<span class="fs-14">Directed by Seila</span>
					</div>
					<div class="event-tabs mb-3 mr-3">
						<form action="{{route('filter.admin')}}" method="post">
							@csrf
						<ul class="nav nav-tabs" role="tablist">
							<li class="nav-item mr-3">
								<select class="form-control style-2 default-select" name="tahun">
									<option value="" disabled selected>Tahun</option>
									@foreach ($t as $t)
									<option value="{{$t}}">{{$t}}</option>	
									@endforeach
								</select>
							</li>
							<li class="nav-item mr-3">
								<select class="form-control style-2 default-select" name="bulan">
									<option value="" disabled selected>Bulan</option>
									@for($i=1; $i<=12; $i++)
									<option value="{{$i}}">{{$i}}</option>	
									@endfor
								</select>
							</li>
						</ul>
					</div>
					<div class="d-flex mb-3">
						<button type="submit" name="filter" value="aa" class="btn btn-secondary text-nowrap mr-3"><i class="fa fa-file-text scale3 mr-3"></i>Filter</button>
						<div class="dropdown ml-auto text-right">
							<div class="btn-link" data-toggle="dropdown">
								<button type="button" class="btn btn-primary text-nowrap mr-3"><i class="fa fa-file-text scale3 mr-3"></i>Generate Report</button>
							</div>
							<div class="dropdown-menu dropdown-menu-center">
							<button class="dropdown-item" type="submit" value="sv" name="service" >Service</button>
							<button class="dropdown-item" type="submit" value="sp" name="sparepart" >Sparepart</button>
						</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title">Data Order Sparepart dan Services</h4>
							</div>
							<div class="card-body">
								<div class="table-responsive">
									<table id="example5" class="display min-w850">
										<thead>
											<tr>
												<th>Order ID</th>
												<th>Tanggal</th>
												<th>Nama</th>
												<th>Tipe</th>
												<th>Keterangan</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($all as $itm)
											<tr>
												@if($itm->merek == 'Hardware'||$itm->merek == 'Software')
												<td>#Service-{{$itm->id}}</td>
												@else
												<td>#Sparepart-{{$itm->id}}</td>
												@endif
												<td>{{ date('F d, Y', strtotime($itm->created_at))}}</td>
												<td>{{$itm->name}}</td>
												@if($itm->merek == 'Hardware'||$itm->merek == 'Software')
												<td>Service</td>
												@else
												<td>Sparepart</td>
												@endif
												<td>{{$itm->nama}} ({{$itm->merek}})</td>
												<td>
													@if($itm->status == 'complete')
													<span class="badge light badge-success">
														<i class="fa fa-circle text-success mr-1"></i>
														{{$itm->status}}
													</span>
													@elseif($itm->status == 'cancel')
													<span class="badge light badge-dark">
														<i class="fa fa-circle text-dark mr-1"></i>
														{{$itm->status}}
													</span>
													@elseif($itm->status == 'pending')
													<span class="badge light badge-dark">
														<i class="fa fa-circle text-dark mr-1"></i>
														{{$itm->status}}
													</span>
													@endif
												</td>
											</tr>
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
        <!--**********************************
            Content body end
        ***********************************-->
        @include('sweetalert::alert')

@endsection