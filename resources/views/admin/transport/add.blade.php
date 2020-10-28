@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Thêm vận chuyển</h4>
    <br>
    <br>
    <form method="post" action="{{route('transport.save')}}">
        @csrf
        <div class="form-group row">
            <label class="col-lg-2 control-label " for="address1">Thành phố *</label>
            <div class="col-lg-10">
                <div class="input-group mb-3">
                    <select name="city_receive" class="custom-select" id="city_receive">
                        <option selected>--Tỉnh\Thành phố--</option>
                        @foreach($shipping_city as $key => $value)
                            <option value="{{$value->id}}">{{$value->name}}</option>
                        @endforeach
                    </select>
                </div>
                @if($errors->first('city_receive'))
                    <p class="text-danger">{{ $errors->first('city_receive') }}</p>
                @endif
            </div>

        </div>
        <div class="form-group row">
            <label class="col-lg-2 control-label " for="address1">Quận/huyện *</label>
            <div class="col-lg-10">
                <div class="input-group mb-3">
                    <select name="district_receive" class="custom-select" id="district_receive">
                        <option value="" selected>--Quận\huyện--</option>
                        <option value=""></option>
                    </select>
                </div>
                @if($errors->first('district_receive'))
                    <p class="text-danger">{{ $errors->first('district_receive') }}</p>
                @endif
            </div>

        </div>

        <div class="form-group row">
            <label class="col-lg-2 control-label " for="address1">Phí vận chuyển</label>
            <div class="col-lg-10">
                <div class="input-group mb-3">
                    <input value="{{old('fee')}}" name="fee" type="text" class="form-control" id="exampleInputPassword1">
                </div>
                @if($errors->first('fee'))
                    <p class="text-danger">{{ $errors->first('fee') }}</p>
                @endif
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@endsection
