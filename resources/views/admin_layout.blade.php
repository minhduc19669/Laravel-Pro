<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Dashboard | Uplon - Responsive Bootstrap 4 Admin Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Responsive bootstrap 4 admin template" name="description">
    <meta content="Coderthemes" name="author">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('assets\images\favicon.ico')}}">
    <!-- App css -->
    <link href="{{asset('assets\css\bootstrap.min.css')}}" rel="stylesheet" type="text/css" id="bootstrap-stylesheet">
    <link href="{{asset('assets\css\icons.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets\css\app.min.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">
    <link href="{{asset('assets\css\style.css')}}" rel="stylesheet" type="text/css" id="app-stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>
<body>
@include('sweetalert::alert')
<!-- Begin page -->
<div id="wrapper">
    <!-- Topbar Start -->
    <div class="navbar-custom">
        <ul class="list-unstyled topnav-menu float-right mb-0">

            <li class="dropdown notification-list dropdown d-none d-lg-inline-block ml-2">
                <a class="nav-link dropdown-toggle mr-0 waves-effect waves-light" data-toggle="dropdown" href="#"
                   role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{asset('assets\images\flags\us.jpg')}}" alt="lang-image" height="12">
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('assets\images\flags\germany.jpg')}}" alt="lang-image" class="mr-1"
                             height="12"> <span class="align-middle">German</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('assets\images\flags\italy.jpg')}}" alt="lang-image" class="mr-1" height="12">
                        <span class="align-middle">Italian</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('assets\images\flags\spain.jpg')}}" alt="lang-image" class="mr-1" height="12">
                        <span class="align-middle">Spanish</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <img src="{{asset('assets\images\flags\russia.jpg')}}" alt="lang-image" class="mr-1"
                             height="12"> <span class="align-middle">Russian</span>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#"
                   role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-bell-outline noti-icon"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="font-16 text-white m-0">
                                    <span class="float-right">
                                        <a href="" class="text-white">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Notification
                        </h5>
                    </div>

                    <div class="slimscroll noti-scroll">

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-success">
                                <i class="mdi mdi-settings-outline"></i>
                            </div>
                            <p class="notify-details">New settings
                                <small class="text-muted">There are new settings available</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-bell-outline"></i>
                            </div>
                            <p class="notify-details">Updates
                                <small class="text-muted">There are 2 new updates available</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-danger">
                                <i class="mdi mdi-account-plus"></i>
                            </div>
                            <p class="notify-details">New user
                                <small class="text-muted">You have 10 unread messages</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-info">
                                <i class="mdi mdi-comment-account-outline"></i>
                            </div>
                            <p class="notify-details">Caleb Flakelar commented on Admin
                                <small class="text-muted">4 days ago</small>
                            </p>
                        </a>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <div class="notify-icon bg-secondary">
                                <i class="mdi mdi-heart"></i>
                            </div>
                            <p class="notify-details">Carlos Crouch liked
                                <b>Admin</b>
                                <small class="text-muted">13 days ago</small>
                            </p>
                        </a>
                    </div>

                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-primary notify-item notify-all">
                        View all
                        <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle  waves-effect waves-light" data-toggle="dropdown" href="#"
                   role="button" aria-haspopup="false" aria-expanded="false">
                    <i class="mdi mdi-email-outline noti-icon"></i>
                    <span class="noti-icon-badge"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-lg">

                    <!-- item-->
                    <div class="dropdown-item noti-title">
                        <h5 class="font-16 text-white m-0">
                                    <span class="float-right">
                                        <a href="" class="text-white">
                                            <small>Clear All</small>
                                        </a>
                                    </span>Messages
                        </h5>
                    </div>

                    <div class="slimscroll noti-scroll">

                        <div class="inbox-widget">
                            <a href="#">
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="{{asset('assets\images\users\avatar-1.jpg')}}"
                                                                     class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">Chadengle</p>
                                    <p class="inbox-item-text text-truncate">Hey! there I'm available...</p>
                                </div>
                            </a>
                            <a href="#">
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="{{asset('')}}assets\images\users\avatar-2.jpg"
                                                                     class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">Tomaslau</p>
                                    <p class="inbox-item-text text-truncate">I've finished it! See you so...</p>
                                </div>
                            </a>
                            <a href="#">
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="{{asset('')}}assets\images\users\avatar-3.jpg"
                                                                     class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">Stillnotdavid</p>
                                    <p class="inbox-item-text text-truncate">This theme is awesome!</p>
                                </div>
                            </a>
                            <a href="#">
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="{{asset('')}}assets\images\users\avatar-4.jpg"
                                                                     class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">Kurafire</p>
                                    <p class="inbox-item-text text-truncate">Nice to meet you</p>
                                </div>
                            </a>
                            <a href="#">
                                <div class="inbox-item">
                                    <div class="inbox-item-img"><img src="{{asset('')}}assets\images\users\avatar-5.jpg"
                                                                     class="rounded-circle" alt=""></div>
                                    <p class="inbox-item-author">Shahedk</p>
                                    <p class="inbox-item-text text-truncate">Hey! there I'm available...</p>

                                </div>
                            </a>
                        </div> <!-- end inbox-widget -->

                    </div>
                    <!-- All-->
                    <a href="javascript:void(0);" class="dropdown-item text-primary notify-item notify-all">
                        View all
                        <i class="fi-arrow-right"></i>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a class="nav-link dropdown-toggle nav-user mr-0 waves-effect waves-light" data-toggle="dropdown"
                   href="#" role="button" aria-haspopup="false" aria-expanded="false">
                   @if(Auth::user()->avatar)
                    <img src="{{asset("storage/images/".Auth::user()->avatar)}}" alt="" class="rounded-circle">
                    @else
                    <img src="https://lh3.googleusercontent.com/proxy/V5nUtAbyab_yqhuEZM0ypjrZdRpcK-k_lh3Z7HQCRZUAAMeT5poS47XKClSPr4JoZOGlFFRVDDFE5hfn4d6rzllbfqOTOGjIs_GfSK8uKs1KioSKRbVsMiZ-9bnJGyJUB9dgdaJg9FBwsftD" alt="" class="rounded-circle">
                    @endif
                    <span class="d-none d-sm-inline-block ml-1 font-weight-medium">{{Auth::user()->name}}
                        </span>
                    <i class="mdi mdi-chevron-down d-none d-sm-inline-block"></i>
                </a>
                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                    <!-- item-->
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow text-white m-0">Welcome !</h6>
                    </div>

                    <!-- item-->
                    <a href="" class="dropdown-item notify-item">
                        <i class="mdi mdi-account-outline"></i>
                        <span>Profile</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-settings-outline"></i>
                        <span>Settings</span>
                    </a>

                    <!-- item-->
                    <a href="javascript:void(0);" class="dropdown-item notify-item">
                        <i class="mdi mdi-lock-outline"></i>
                        <span>Lock Screen</span>
                    </a>

                    <div class="dropdown-divider"></div>

                    <!-- item-->
				<a href="{{route('admin.logout')}}" class="dropdown-item notify-item">
                        <i class="mdi mdi-logout-variant"></i>
                        <span>Logout</span>
                    </a>

                </div>
            </li>

            <li class="dropdown notification-list">
                <a href="javascript:void(0);" class="nav-link right-bar-toggle waves-effect waves-light">
                    <i class="mdi mdi-settings-outline noti-icon"></i>
                </a>
            </li>

        </ul>

        <!-- LOGO -->
        <div class="logo-box">
            <a href="index.html" class="logo text-center logo-dark">
                        <span class="logo-lg">
{{--                            <img src="{{asset('assets\images\logo.png')}}" alt="" height="22">--}}
                           <span class="logo-lg-text-dark">ADMIN</span>
                        </span>
                <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">U</span> -->
                            <img src="{{asset('assets\images\logo-sm.png')}}" alt="" height="24">
                        </span>
            </a>

            <a href="index.html" class="logo text-center logo-light">
                        <span class="logo-lg">
                            <img src="{{asset('assets\images\logo-light.png')}}" alt="" height="22">
                            <!-- <span class="logo-lg-text-dark">Uplon</span> -->
                        </span>
                <span class="logo-sm">
                            <!-- <span class="logo-lg-text-dark">U</span> -->
                            <img src="{{asset('assets\images\logo-sm-light.png')}}" alt="" height="24">
                        </span>
            </a>
        </div>

        <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
            <li>
                <button class="button-menu-mobile waves-effect waves-light">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>

            <li class="d-none d-sm-block">
                <form class="app-search">
                    <div class="app-search-box">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </li>

            <li class="dropdown dropdown-mega d-none d-lg-block">
                <div class="dropdown-menu dropdown-megamenu p-0">
                    <div class="row">
                        <div class="col-sm-5">

                            <div class="p-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5 class="font-16 mt-0"><i class="mdi mdi-toolbox-outline mr-1"></i> UI
                                            Components</h5>
                                        <ul class="list-unstyled megamenu-list">
                                            <li>
                                                <a href="javascript:void(0);">Widgets</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Calendar</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Range Sliders</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Sweet Alerts</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Ratings</a>
                                            </li>

                                            <li>
                                                <a href="javascript:void(0);">Treeview Page</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Tour Page</a>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="col-md-6">
                                        <h5 class="font-16 mt-0"><i class="mdi mdi-flip-horizontal mr-1"></i> Layouts
                                        </h5>
                                        <ul class="list-unstyled megamenu-list">
                                            <li>
                                                <a href="javascript:void(0);">Dark Sidebar</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Small Sidebar</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Sidebar Collapsed</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Unsticky Layout</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Boxed Layout</a>
                                            </li>
                                            <li>
                                                <a href="javascript:void(0);">Topbar Light</a>
                                            </li>
                                        </ul>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="p-4">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="text-center">
                                                    <div>
                                                        <i class="fab fa-bootstrap text-purple h2 mb-0"></i>
                                                    </div>
                                                    <h5 class="font-16">Bootstrap</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-center mt-4 mt-md-0">
                                                    <div>
                                                        <i class="fab fa-npm text-danger h2 mb-0"></i>
                                                    </div>
                                                    <h5 class="font-16">Npm</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-center mt-4 mt-md-0">
                                                    <div>
                                                        <i class="fab fa-sass text-pink h2 mb-0"></i>
                                                    </div>
                                                    <h5 class="font-16">Sass support</h5>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="text-center mt-4">
                                                    <div>
                                                        <i class="fas fa-tablet-alt text-dark h2 mb-0"></i>
                                                    </div>
                                                    <h5 class="font-16">Responsive</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-center mt-4">
                                                    <div>
                                                        <i class="fab fa-gulp text-primary h2 mb-0"></i>
                                                    </div>
                                                    <h5 class="font-16">Gulp Support</h5>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="text-center mt-4">
                                                    <div>
                                                        <i class="far fa-file-code text-warning h2 mb-0"></i>
                                                    </div>
                                                    <h5 class="font-16">Free Landing</h5>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="text-center">
                                        <div class="p-4">
                                            <h4 class="mt-0">Special Discount Sale!</h4>
                                            <h5 class="mt-4">Save up to <span class="text-primary">60%</span> off.</h5>
                                            <p class="text-muted">Get free updates lifetime</p>
                                            <a href="https://1.envato.market/XY7j5" target="_blank"
                                               class="btn btn-primary btn-rounded">Download Now</a>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </li>
        </ul>
    </div>
    <!-- end Topbar -->


    <!-- ========== Left Sidebar Start ========== -->
    <div class="left-side-menu">

        <div class="slimscroll-menu">

            <!--- Sidemenu -->
            <div id="sidebar-menu">
                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Navigation</li>

                        <li>
                            <a href="javascript: void(0);">
                                <i class="mdi mdi-view-dashboard"></i>
                                <span> Slider </span>
                            </a>
                            <ul class="nav-second-level" aria-expanded="false">
                                <li><a href={{route('slide.add')}}>Thêm slide</a></li>
                                <li><a href={{route('slide.list')}}>Liệt kê slide</a></li>
                            </ul>
                        </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-calendar-month"></i>
                            <span> Đơn hàng </span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href={{route('order.list')}}>Quản lí đơn hàng</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-format-underline"></i>
                            <span> Sản phẩm </span>
                            <span style="margin-right: 30px"
                                  class="badge badge-danger badge-pill float-right">New</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('product.add')}}">Thêm sản phẩm</a></li>
                            <li><a href={{route('product.list')}}>Liệt kê sản phẩm</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-book-open-page-variant"></i>
                            <span> Danh mục tin tức </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href={{route('newscategory.add')}} >Thêm danh mục</a></li>
                            <li><a href={{route('newscategory.list')}}>Liệt kê danh mục</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-book-open"></i>
                            <span> Tin tức </span>
                            <span style="margin-right: 30px"
                                  class="badge badge-danger badge-pill float-right">New</span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href={{route('news.add')}} >Thêm tin tức</a></li>
                            <li><a href={{route('news.list')}}>Liệt kê tin tức</a></li>
                        </ul>
                    </li>





                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-puzzle-outline"></i>
                            <span> Danh mục sản phẩm </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('category.add')}}">Thêm danh mục</a></li>
                            <li><a href={{route('category.list')}}>Liệt kê danh mục</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-package-variant-closed"></i>
                            <span> Thương hiệu </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href={{route('brand.add')}}>Thêm thương hiệu</a></li>
                            <li><a href="{{route('brand.list')}}">Liệt kê thương hiệu</a></li>
                        </ul>
                    </li>
                    <li>
                                <a href="javascript: void(0);">
                                    <i class="mdi mdi-file-document-box-check-outline"></i>
                                <span class="badge badge-warning badge-pill float-right">{{$count}}</span>
                                    <span> Mã giảm giá </span>
                                </a>
                                <ul class="nav-second-level" aria-expanded="false">
                                <li><a href="{{route('coupon.create')}}">Quản lí mã giảm giá</a></li>
                                <li><a href="{{route('coupon.list')}}">Danh sách mã giảm giá</a></li>
                                </ul>
                            </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class="mdi mdi-black-mesa"></i>
                            <span> Vận chuyển </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="icons-materialdesign.html">Material Design</a></li>
                            <li><a href="icons-ionicons.html">Ion Icons</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript: void(0);">
                            <i class=" ion ion-logo-android"></i>
                            <span> Quản lí  </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="nav-second-level" aria-expanded="false">
                            <li><a href="{{route('user.list')}}">Quản lí thành viên</a></li>
                        <li><a href="{{ route('role.index') }}">Quản lí chức vụ</a></li>

                        </ul>
                    </li>


                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Sidebar -left -->
    </div>
    <!-- Left Sidebar End -->
    <!-- ============================================================== -->
    <!-- Start Page Content here -->
    <!-- ============================================================== -->
    <div class="content-page">
        <div class="content">
            <!-- Start Content-->
            <div class="container-fluid ">
                <div class="row-1">
                    <div class="col-12">
                        <div class="card-box">
                            <!-- start page title -->
                            <!-- end page title -->
                            @yield('admin_content')
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div> <!-- end container-fluid -->

        </div> <!-- end content -->
        <!-- Footer Start -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        Hello
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->

    </div>


    <!-- ============================================================== -->
    <!-- End Page content -->
    <!-- ============================================================== -->

</div>
<!-- END wrapper -->

<!-- Right Sidebar -->
<div class="right-bar">
    <div class="rightbar-title">
        <a href="javascript:void(0);" class="right-bar-toggle float-right">
            <i class="mdi mdi-close"></i>
        </a>
        <h4 class="font-18 m-0 text-white">Theme Customizer</h4>
    </div>
    <div class="slimscroll-menu">

        <div class="p-4">
            <div class="alert alert-warning" role="alert">
                <strong>Customize </strong> the overall color scheme, layout, etc.
            </div>
            <div class="mb-2">
                <img src="assets\images\layouts\light.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked="">
                <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
            </div>

            <div class="mb-2">
                <img src="assets\images\layouts\dark.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-3">
                <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                       data-bsstyle="assets/css/bootstrap-dark.min.css" data-appstyle="assets/css/app-dark.min.css">
                <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
            </div>

            <div class="mb-2">
                <img src="assets\images\layouts\rtl.png" class="img-fluid img-thumbnail" alt="">
            </div>
            <div class="custom-control custom-switch mb-5">
                <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch"
                       data-appstyle="assets/css/app-rtl.min.css">
                <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
            </div>

            <a href="https://1.envato.market/XY7j5" class="btn btn-danger btn-block mt-3" target="_blank"><i
                    class="mdi mdi-download mr-1"></i> Download Now</a>
        </div>
    </div> <!-- end slimscroll-menu-->
</div>
<!-- /Right-bar -->

<!-- Right bar overlay-->
<div class="rightbar-overlay"></div>

<a href="javascript:void(0);" class="right-bar-toggle demos-show-btn">
    <i class="mdi mdi-settings-outline mdi-spin"></i> &nbsp;Choose Demos
</a>

<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
<!-- Vendor js -->
<script src="{{asset('assets\js\vendor.min.js')}}"></script>

<!--Morris Chart-->
<script src="{{asset('assets\libs\morris-js\morris.min.js')}}"></script>
<script src="{{asset('assets\libs\raphael\raphael.min.js')}}"></script>
<!-- Dashboard init js-->
<script src="{{asset('assets\js\pages\dashboard.init.js')}}"></script>
<!-- App js -->
<script src="{{asset('assets\js\app.min.js')}}"></script>
<script>
    $(function () {
        let id_user = $(".pos");
        id_user.click(function (e) {
            let $this = $(this);
            document.getElementById('user-id').value = $this.attr('data-key');
            console.log($this.attr('data-key'));
        })
    });
</script>
</body>
</html>

