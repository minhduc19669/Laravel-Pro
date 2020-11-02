
@extends('layout.layout')
@section('title','Về chúng tôi')
@section('url','https://petnhatrang.com/wp-content/themes/petshop/images/background-banner.jpg')
@section('content')
<div class="about-us-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="about-us-img pr-30 wow fadeInLeft">
                            <img alt="" src="{{asset('assets_page/img/banner/banner-4.png')}}">
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 d-flex align-items-center">
                        <div class="about-us-content">
                            <h2>Giới thiệu LOVEPETS</h2>
                            <div class="about-us-list">
                                Pet Mart là hệ thống pet shop thú cưng tại Hà Nội, TP.HCM, Đà Nẵng và Hải Phòng với hơn 18 cửa hàng thú cưng chuyên cung cấp đồ dùng, quần áo, thức ăn, sữa tắm, chuồng, vòng cổ xích và các phụ kiện cho chó, mèo, cá, thỏ, chuột, sóc, bò sát cảnh hàng đầu tại Việt Nam. Địa chỉ tắm spa, chăm sóc, cắt tỉa lông và trông giữ thú cưng chuyên nghiệp.
                                Với chất lượng dịch vụ tốt nhất luôn được khách hàng tin tưởng và là điểm đến tuyệt vời dành cho thú cưng.
                            </div>
                            <div class="about-us-btn">
                                <a class="btn-style" href="{{route('page.contact')}}">Liên hệ ngay cho chúng tôi</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="project-count-area pb-70 pt-100 gray-bg">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="single-count mb-30 text-center">
                            <h2 class="count">5</h2>
                            <span>Năm kinh doanh</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="single-count mb-30 text-center">
                            <h2 class="count">600</h2>
                            <span>Kháng hàng hài lòng</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="single-count mb-30 text-center">
                            <h2 class="count">24</h2>
                            <span>Cửa hàng khắp cả nước</span>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-sm-6 col-12">
                        <div class="single-count mb-30 text-center">
                            <h2 class="count">10</h2>
                            <span>Giải thưởng</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

		<div class="team-ara pt-95 pb-70">
            <div class="container">
                <div class="section-title text-center mb-55">
                    <h2>Chi nhánh</h2>
                    <p>LOVEPETS gồm 4 chi nhánh lớn trên khắp cả nước</p>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <a href="#">
                                    <img src="" alt="">
                                </a>
                                <div class="team-social">
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-pinterest"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4>Hà Nội </h4>
                                <span>Số 219 Trung Kính Yên Hòa Cầu Giấy Hà Nội</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <a href="#">
                                    <img src="assets/img/team/team-2.jpg" alt="">
                                </a>
                                <div class="team-social">
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-pinterest"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4>Đà Nẵng</h4>
                                <span>85 Duy Tân Hòa Thuận Nam Hải Châu Đà Nẵng </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <a href="#">
                                    <img src="assets/img/team/team-3.jpg" alt="">
                                </a>
                                <div class="team-social">
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-pinterest"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4>Cần Thơ</h4>
                                <span>Hẻm tổ 7 Phường An Khánh Bình Thủy Cần Thơ</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="team-wrapper mb-30">
                            <div class="team-img">
                                <a href="#">
                                    <img src="assets/img/team/team-4.jpg" alt="">
                                </a>
                                <div class="team-social">
                                    <a href="#">
                                        <i class="ti-facebook"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-pinterest"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-twitter-alt"></i>
                                    </a>
                                    <a href="#">
                                        <i class="ti-instagram"></i>
                                    </a>
                                </div>
                            </div>
                            <div class="team-content text-center">
                                <h4>Hồ Chí Minh</h4>
                                <span>29 Tân Nhựt Bình Chánh Thành Phố Hồ Chí Minh</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
