@extends('\layout\viewnavbar')
@section('Judul Halaman', 'Sentracom')
@section('Header', 'Dashboard')
@section('logo_nav')
{{route('dashboard.teknisi')}}
@endsection
@section('header_set')
<li class="nav-item dropdown header-profile">
<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
<img src="{{asset('assets/images/profile/17.jpg')}}" width="20" alt=""/>
</a>
<div class="dropdown-menu dropdown-menu-right">
<form action="{{route ('teknisi.logout')}}" method="post">
    @csrf
<button type="submit" class="dropdown-item ai-icon">
<svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
<span class="ml-2">Logout </span>
</a>
</form>
</div>
</li>
@endsection
@section('dashboard_nav')
<li><a href="{{route('dashboard.teknisi')}}">Service</a></li>
<li><a href="{{route('teknisi.myservice')}}">My Service</a></li>
<li><a href="{{route('teknisi.valid')}}">Valid Service</a></li>
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
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                            <div class="table-responsive">
                                <form action="{{route('teknisi.confirm')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <table id="example5" class="display min-w850">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                            <th>Booking</th>
                                            <th>Keterangan</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($sv as $itm)
                                        <tr>
                                            <td>{{$itm->id}}</td>
                                            <td>{{$itm->name}}</td>
                                            <td>{{$itm->alamat}}</td>
                                            <td>{{$itm->booking}}</td>
                                            <td>{{$itm->code}} ({{$itm->type}} )<p>{{$itm->ket}}</p></td>
                                            @if($itm->status == 'checking')
                                            <td><span class="badge badge-warning">{{$itm->status}}<span class="ml-1 fa fa-check"></span></span></td>
                                            @elseif($itm->status == 'confirm')
                                            <td><span class="badge badge-success">{{$itm->status}}<span class="ml-1 fa fa-check"></span></span></td>
                                            @elseif($itm->status == 'in process')
                                            <td><span class="badge badge-info">{{$itm->status}}<span class="ml-1 fa fa-check"></span></span></td>
                                            @endif
                                            <td>
                                                <div class="dropdown ml-auto text-right">
                                                    <div class="btn-link" data-toggle="dropdown">
                                                        <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                    </div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        @if($itm->status == 'in process')
                                                        <button class="dropdown-item" value="{{$itm->id}}" type="submit" name="ts" >Tambah Sparepart</button>
                                                        @else
                                                        <button class="dropdown-item" value="{{$itm->id}}" type="submit" name="sb">In deeper process</button>
                                                        @endif
                                                        <button class="dropdown-item" type="button" data-toggle="modal" data-target="#editAmount_{{$itm->id}}">Finish</button>
                                                        <button class="dropdown-item" value="{{$itm->id}}" type="submit" name="cc" >Cancel</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </td>	
                                            <div class="modal fade" id="editAmount_{{$itm->id}}">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Validasi Invoice</h5>
                                                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                        </button>
                                                                </div>
                                                                <form action="{{route('teknisi.confirm')}}" method="post" enctype="multipart/form-data">
                                                                                @csrf
                                                                <div class="modal-body">
                                                                    <div class="form-group">
                                                                        <label for="name" class="mb-1 text-grey">Harga</label>
                                                                        <input type="number" name="harga" id="harga" class="form-control">
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                                    <button type="submit" name="cp" class="btn btn-primary" value="{{$itm->id}}" >Complete</button>
                                                                </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>															
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
@endsection
 