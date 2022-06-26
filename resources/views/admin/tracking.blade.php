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
<div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Database Sparepart</a></li>
                </ol>
            </div>
            <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Konfirmasi Order</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{route('admin.tracking')}}" method="post">
                            @csrf
                            <table id="example5" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>Nama</th>
                                        <th>Alamat</th>
                                        <th>Nama Barang</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($itm as $itm)
                                <tr>
                                    <td>#O-{{$itm->id}}</td>
                                    <td>{{$itm->name}} <p>{{$itm->email}}</p></td>
                                    <td>{{$itm->alamat}}</td>
                                    <td>{{$itm->nama}} {{$itm->merek}}</td>
                                    <td>
                                        @if($itm->status == 'confirm')
                                        <span class="badge light badge-success">
                                            <i class="fa fa-circle text-dark mr-1"></i>
                                            Confirmed
                                        </span>
                                        </td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                <button class="dropdown-item" value="{{$itm->id}}" type="submit" name="send" >Send</button>
                                                <button class="dropdown-item" value="{{$itm->id}}" type="submit" name="complete" >Complete</button>
                                                <button class="dropdown-item" value="{{$itm->id}}" type="submit" name="cancel" >Cancel</button>
                                                </div>
                                            </div>
                                        @elseif($itm->status == 'send')
                                        <span class="badge light badge-warning">
                                            <i class="fa fa-circle text-warning mr-1"></i>
                                            Sending
                                        </span>
                                        </td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                <button class="dropdown-item" value="{{$itm->id}}" type="submit" disabled name="send" >Send</button>
                                                <button class="dropdown-item" value="{{$itm->id}}" type="submit" name="complete" >Complete</button>
                                                <button class="dropdown-item" value="{{$itm->id}}" type="submit" name="cancel" >Cancel</button>
                                                </div>
                                            </div>
                                        @elseif($itm->status == 'cancel')
                                        <span class="badge light badge-dark">
                                            <i class="fa fa-circle text-dark mr-1"></i>
                                            Canceled
                                        </span>
                                        </td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                <button class="dropdown-item" value="{{$itm->id}}" type="submit" disabled name="send" >Send</button>
                                                <button class="dropdown-item" value="{{$itm->id}}" type="submit" disabled name="complete" >Complete</button>
                                                <button class="dropdown-item" value="{{$itm->id}}" type="submit" disabled name="cancel" >Cancel</button>
                                                </div>
                                            </div>
                                        @elseif($itm->status == 'complete')
                                        <span class="badge light badge-success">
                                            <i class="fa fa-circle text-success mr-1"></i>
                                            Completed
                                        </span>
                                        </td>
                                        <td>
                                            <div class="dropdown ml-auto text-right">
                                                <div class="btn-link" data-toggle="dropdown">
                                                    <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                                </div>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                <button class="dropdown-item" value="{{$itm->id}}" type="submit" disabled name="send" >Send</button>
                                                <button class="dropdown-item" value="{{$itm->id}}" type="submit" disabled name="complete" >Complete</button>
                                                <button class="dropdown-item" value="{{$itm->id}}" type="submit" disabled name="cancel" >Cancel</button>
                                                </div>
                                            </div>
                                            @endif
                                    </td>												
                                </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div>
</div>
@endsection