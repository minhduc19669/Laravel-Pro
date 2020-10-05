
@extends('admin_layout')
@section('admin_content')
    @foreach($list as $key => $edit)
    <form action="{{\Illuminate\Support\Facades\URL::to('users/update-brand/'.$edit->id)}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}

        <h2>Cập nhật thương hiệu</h2>
        <br>
        <div class="row">
            <div class="col-md-8">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="modelName">Tên thương hiệu</label>
                        <input value="{{$edit->brand_name}}" type="text" class="form-control" name="brand_name" placeholder="Tên thương hiệu">
                    </div>
                </div>
                @if ($errors->has('brand_name'))
                    <p style="color: red">{{ $errors->first('brand_name') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="price">Logo</label>
                        <input value="{{$edit->brand_image}}"  type="file" class="form-control" name="brand_image" placeholder="desc">
                    </div>

                </div>
                @if ($errors->has('brand_image'))
                    <p style="color: red">{{ $errors->first('brand_image') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="price">Ghi chú</label>
                        <textarea id="editor1" type="text" class="form-control" name="brand_desc" placeholder="Ghi chú">{{$edit->brand_desc}}</textarea>
                    </div>

                </div>
                @if ($errors->has('brand_desc'))
                    <p style="color: red">{{ $errors->first('brand_desc') }}</p>
                @endif

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="modelName">Trạng thái</label>
                        <select class="custom-select" id="inputGroupSelect01" name="brand_status">
                       @if($edit->brand_status == 0)
                            <option value="0" selected>Ẩn </option>
                            <option value="1">Hiển thị</option>
                            @else
                                <option value="0" selected>Ẩn </option>
                                <option value="1">Hiển thị</option>
                            @endif
                        </select>
                    </div>
                </div>
                @if ($errors->has('brand_status'))
                    <p style="color: red">{{ $errors->first('brand_status') }}</p>
                @endif

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-4">
                <img class="img-fluid img-thumbnail" id="imgPreview" src="/brand/{{$edit->brand_image}}">
            </div>
        </div>
    </form>
    @endforeach



@endsection
