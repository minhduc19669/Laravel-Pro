@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Sửa vận chuyển</h4>
    <br>
    <br>
    @foreach($transport as $key => $transport)
    <form method="post" action="{{route('transport.update',$transport->id)}}">
        @csrf
        <div class="form-group row">
            <label class="col-lg-2 control-label " for="address1">Thành phố *</label>
            <div class="col-lg-10">
                <div class="input-group mb-3">
                    <select name="city_receive" class="custom-select" id="city_receive">
                        @foreach($shipping_city as $key => $value)
                            @if($transport->city_id == $value->id)
                            <option selected value="{{$value->id}}">{{$value->name}}</option>
                            @else
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
            @if($errors->first('city_receive'))
                <p class="text-danger">{{ $errors->first('city_receive') }}</p>
            @endif
        </div>
        <div class="form-group row">
            <label class="col-lg-2 control-label " for="address1">Quận/huyện *</label>
            <div class="col-lg-10">
                <div class="input-group mb-3">
                    <select name="district_receive" class="custom-select" id="district_receive">
                        <option value="{{$transport->district_id}}">{{$transport->district->name}}</option>
                    </select>
                </div>
            </div>
            @if($errors->first('district_receive'))
                <p class="text-danger">{{ $errors->first('district_receive') }}</p>
            @endif
        </div>

        <div class="form-group row">
            <label class="col-lg-2 control-label " for="address1">Phí vận chuyển</label>
            <div class="col-lg-10">
                <div class="input-group mb-3">
                    <input value="{{($transport->fee)}}" name="fee"  type="text" class="form-control" id="exampleInputPassword1">
                </div>
            </div>
            @if($errors->first('fee'))
                <p class="text-danger">{{ $errors->first('fee') }}</p>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endforeach
@endsection
