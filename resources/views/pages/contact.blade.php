
@extends('layout.layout')
@section('url','https://petnhatrang.com/wp-content/themes/petshop/images/background-banner.jpg')
@section('content')
    <div  class="contact-area pt-100 pb-100">
        <h1 style="text-align:center;margin-bottom: 100px " >Liên hệ</h1>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="contact-info-wrapper text-center mb-30">
                        <div class="contact-info-icon">
                            <i class="ti-location-pin"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Địa điểm của chúng tôi</h4>
                            <p>012 345 678 / 123 456 789</p>
                            <p><a href="#">admin@vnext.vn</a></p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="contact-info-wrapper text-center mb-30">
                        <div class="contact-info-icon">
                            <i class="ti-mobile"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Liên hệ với chúng tôi bất cứ lúc nào</h4>
                            <p>Mobile: 012 345 678</p>
                            <p>Fax: 123 456 789</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="contact-info-wrapper text-center mb-30">
                        <div class="contact-info-icon">
                            <i class="ti-email"></i>
                        </div>
                        <div class="contact-info-content">
                            <h4>Email Hỗ trợ</h4>
                            <p><a href="#">Support24/7@vnext. vn </a></p>
                            <p><a href="#">admin@vnext.vn</a></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="contact-message-wrapper">
                        <h4 class="contact-title">LIÊN LẠC</h4>
                        <div class="contact-message">
                            <form id="contact-form" action="assets/mail.php" method="post">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="name" placeholder="Full Name" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="contact-form-style mb-20">
                                            <input name="email" placeholder="Email Address" type="email">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-form-style mb-20">
                                            <input name="subject" placeholder="Subject" type="text">
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="contact-form-style">
                                            <textarea name="message" placeholder="Message"></textarea>
                                            <button class="submit btn-style" type="submit">SEND MESSAGE</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.3152390382766!2d105.78937111430798!3d21.020068893452255!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab50d9500a4f%3A0x3490fb756ccc73a6!2zMjE5IFAuIFRydW5nIEtpzIFuaCwgWcOqbiBIb8OgLCBD4bqndSBHaeG6pXksIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1603941543129!5m2!1svi!2s" width="1180" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
            </div>
        </div>
    </div>
@endsection
