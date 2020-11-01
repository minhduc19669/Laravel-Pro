@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Chào mừng đến với trang quản trị dành cho Admin !</h4>
            </div>
        </div>
    <div class="col-md-6 col-xl-3">
        <div class="card-box tilebox-one">
            <i class="icon-layers float-right m-0 h2 text-muted"></i>
            <h6 class="text-muted text-uppercase mt-0">Orders</h6>
            <h3 class="my-3" >{{$countOrder}}</h3>
            <span class="badge badge-success mr-1"> +11% </span> <span class="text-muted">From previous period</span>
        </div>
    </div>
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-paypal float-right m-0 h2 text-muted"></i>
                <h6 class="text-muted text-uppercase mt-0">Products</h6>
                <h3 class="my-3">{{$products}}</h3>
                <span class="badge badge-danger mr-1"> -29% </span> <span class="text-muted">From previous period</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-chart float-right m-0 h2 text-muted"></i>
                <h6 class="text-muted text-uppercase mt-0">News</h6>
                <h3 class="my-3">{{$news}}</h3>
                <span class="badge badge-pink mr-1"> 0% </span> <span class="text-muted">From previous period</span>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="icon-rocket float-right m-0 h2 text-muted"></i>
                <h6 class="text-muted text-uppercase mt-0">Mail</h6>
                <h3 class="my-3" >{{$feedback}}</h3>
                <span class="badge badge-warning mr-1"> +89% </span> <span class="text-muted">Last year</span>
            </div>
        </div>

    </div>
@endsection
