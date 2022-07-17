@extends('\layout\viewnavbar')
@section('Judul Halaman', 'Sentracom')
@section('Header', 'Sparepart')
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
</li>@endsection
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
    <div class="content-body">
        <div class="container-fluid">
            <div class="page-titles">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0)">Layout</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">Blank</a></li>
                </ol>
            </div>
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
            @foreach($fltr2 as $itm)
            @if($itm->jumlah != 0)
            <div class="col-lg-12 col-xl-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row m-b-30">
                            <div class="col-md-5 col-xxl-12">
                                <div class="new-arrival-product mb-4 mb-xxl-4 mb-md-0">
                                    <div class="new-arrivals-img-contnent">
                                    <img src="{{asset('image/'.$itm->gambar)}}" width="200" alt="">                                                                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 col-xxl-12">
                                <div class="new-arrival-content position-relative">
                                <form action="{{route('user.order')}}" method="post">
                                    @csrf
                                    <h4><a href="javascript::void(0)">{{$itm->nama}} {{$itm->merek}}</a></h4>
                                    <p class="price">IDR<?php 
                                    $num = sprintf("%.2f", $itm->harga);
                                    echo number_format($num, 2, ".", ",");?></p>
                                    <p>Jumlah Tersedia: <span class="item"> {{$itm->jumlah}} <i class="fa fa-check-circle text-success"></i></span></p>
                                    <p>Produk kode: <span class="item">xx-{{$itm->id}}</span> </p>
                                    <p>Brand: <span class="item">{{$itm->merek}}</span></p>
                                    <p class="text-content">{{$itm->deskripsi}}</p>
                                    <input type="hidden" value="{{$itm->id}}" name="id"></input>
                                    <div class="shopping-cart float-right">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-shopping-basket mr-2"></i>Chekcout</button>
                                    </div>
                                </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endif
            </div>
        </div>
    </div>
@include('sweetalert::alert')

@endsection