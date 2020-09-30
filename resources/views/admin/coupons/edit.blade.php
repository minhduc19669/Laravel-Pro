
@extends('admin_layout')
@section('admin_content')
    <div class="row">
        <div class="col-lg-6">
            <div class="mt-4">
                <h4 class="header-title">*Thêm mã giảm giá</h4>
                <form class="form-horizontal parsley-examples" action="{{route('coupon.update',$coupon->id)}}" method="post">
				@csrf
                    <div class="form-group">
                        <label>Tên mã giảm giá(*)</label>
                    <input value="{{$coupon->coupon_name}}" autofocus required type="text" name="coupon_name" class="form-control"placeholder="Enter a valid coupon">
                    </div>

                    <div class="form-group">
                        <label>Mã giảm giá(*)</label>
                        <div>
                            <input type="text" value={{$coupon->coupon_code}} name="coupon_code" class="form-control" required="" parsley-type="" placeholder="Enter a valid coupon code">
                        </div>


                    </div>
                    <div class="form-group">
                        <label>Số lượng(*)</label>
                    <input value={{$coupon->coupon_number}}  type="text" name="coupon_number" class="form-control" required="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Thời gian(Tính theo ngày *)</label>
                    <input value="{{$coupon->coupon_time}}"  type="text" name="coupon_time" class="form-control" required="" placeholder="">
                    </div>
                    <div class="form-group">
                        <label>Chiết khấu (Tính theo %)</label>
                    <input  type="text" name="coupon_price" class="form-control" required="" placeholder="" value="{{$coupon->coupon_price}}">
                    </div>
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <div>
                            <select class="select2-close-mask" name="coupon_condition">
                            <option
                            @if($coupon->coupon_condition==1)
                                checked
                                @endif
                            value="1">Còn</option>
                                <option @if($coupon->coupon_condition==2)
                                checked
                                @endif value="2">Hết</option>
                            </select><br>
                            <i>(Các trường chứa dấu * là bắt buộc !)</i>
                        </div>
                    </div>
                    <div class="form-group">
                        <div>
                            <button type="submit" class="btn btn-primary waves-effect waves-light mr-1">
                                Tạo mới
                            </button>
                            <button class="btn btn-secondary waves-effect">
                                Trở về
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

@endsection
