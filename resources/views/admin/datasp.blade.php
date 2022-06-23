@extends('\layout\viewnavbar')
@section('Judul Halaman', 'Sentracom')
@section('Header', 'Dashboard')
@section('logo_nav')
{{route('dashboard.admin')}}
@endsection
@section('header_set')
<li class="nav-item dropdown header-profile">
<a class="nav-link" href="javascript:void(0)" role="button" data-toggle="dropdown">
<img src="{{asset('assets/images/profile/17.jpg')}}" width="20" alt=""/>
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
						<li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
						<li class="breadcrumb-item active"><a href="javascript:void(0)">Database Sparepart</a></li>
					</ol>
                </div>
                <!-- row -->
                <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="col-md-8">
                        <h4 class="card-title">Data Sparepart</h4>
                        </div>
                        <div class="col-md-2"></div>
                        <div class="col-md-2">
                            <div class="justify-content-end">
                            <button class="btn btn-success" type="button" data-toggle="modal" data-target="#tambah">Tambah</button>
                            </div>
                        </div>
                        <div class="modal fade bd-example-modal-lg" id="tambah" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Edit Sparepart</h5>
                                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{route('admin.updel')}}" method="post" enctype="multipart/form-data">
                                            @csrf
                                    <div class="row">
                                        <div class="col-md-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Nama</label>
                                                <input type="text" name="namaT" class="form-control" value="Nama" required>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Merek</label>
                                                <input type="text" name="merekT" class="form-control" value="Merek" required>
                                            </div>
                                        </div>
                                        <div class="col-md-10 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Harga</label>
                                                <input type="number" name="hargaT" class="form-control" value="Harga" required></input>
                                            </div>
                                        </div>
                                        <div class="col-md-2 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Jumlah</label>
                                                <input type="number" name="jumlahT" class="form-control" value="Jumlah" required></input>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="form-group">
                                                <label class="text-label">Deskripsi</label>
                                                <textarea class="form-control" name="deskripsiT" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12 mb-2">
                                            <div class="form-group">
                                                <div class="custom-file">
                                                    <input type="file" name="gambarT" class="custom-file-input">
                                                    <label class="custom-file-label">Upload Gambar disini</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                        <button class="btn btn-danger" type="submit" value="tambah" name="tambah" >Tambah</button>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        </div>	
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <form action="{{route('admin.updel')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <table id="example5" class="display min-w850">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama</th>
                                        <th>Merek</th>
                                        <th>Harga</th>
                                        <th>Jumlah</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    @foreach($sp as $itm)
                                    <td>{{$itm->id}}</td>
                                    <td>{{$itm->nama}}</td>
                                    <td>{{$itm->merek}}</td>
                                    <td>{{$itm->harga}}</td>
                                    <td>{{$itm->jumlah}}</td>
                                    <td>
                                        <div class="dropdown ml-auto text-right">
                                            <div class="btn-link" data-toggle="dropdown">
                                                <svg width="24px" height="24px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg>
                                            </div>
                                            <div class="dropdown-menu dropdown-menu-right">
                                            <button class="dropdown-item" type="button" data-toggle="modal" data-target="#test_{{$itm->id}}">Edit</button>
                                            <button class="dropdown-item" value="{{$itm->id}}" type="submit" name="delete" >Delete</button>
                                            </form>
                                            </div>
                                        </div>
                                    </td>	
                                    <div class="modal fade bd-example-modal-lg" id="test_{{$itm->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title">Edit Sparepart</h5>
                                                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                                                    </button>
                                                </div>
                                                <form action="{{route('admin.updel')}}" method="post" enctype="multipart/form-data">
                                                    @csrf
                                                <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Nama</label>
                                                            <input type="text" name="nama" class="form-control" value="{{$itm->nama}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Merek</label>
                                                            <input type="text" name="merek" class="form-control" value="{{$itm->merek}}" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-10 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Harga</label>
                                                            <input type="number" name="harga" class="form-control" value="{{$itm->harga}}" required></input>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-2 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Jumlah</label>
                                                            <input type="number" name="jumlah" class="form-control" value="{{$itm->jumlah}}" required></input>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <div class="form-group">
                                                            <label class="text-label">Deskripsi</label>
                                                            <textarea class="form-control" name="deskripsi" rows="5">{{$itm->deskripsi}}</textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12 mb-2">
                                                        <div class="form-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="gambar" class="custom-file-input">
                                                                <label class="custom-file-label">Upload Gambar disini</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger light" data-dismiss="modal">Close</button>
                                                    <button class="btn btn-danger" value="{{$itm->id}}" type="submit" name="update" >Update</button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>											
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
        <!--**********************************
            Content body end
        ***********************************-->
@endsection