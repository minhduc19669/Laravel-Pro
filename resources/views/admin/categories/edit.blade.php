@extends('admin_layout')
@section('admin_content')
    @foreach($edit as $key => $edit_value)

        <form action="{{\Illuminate\Support\Facades\URL::to('users/update-category/'.$edit_value->id)}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}
        <h2>Sửa  danh mục sản phẩm</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="modelName">Tên danh mục</label>
                        <input value="{{$edit_value->category_name}}" type="text" class="form-control" name="category_name" placeholder="Tên danh mục">
                    </div>
                </div>
                @if ($errors->has('category_name'))
                    <p style="color: red">{{ $errors->first('category_name') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="price">Ghi chú</label>
                        <input value="{{$edit_value->category_desc}}" type="text" class="form-control" name="category_desc" placeholder="Ghi chú">
                    </div>

                </div>
                @if ($errors->has('category_desc'))
                    <p style="color: red">{{ $errors->first('category_desc') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="modelName">Trạng thái</label>
                        <select class="custom-select" id="inputGroupSelect01" name="category_status">
                            @if($edit_value->category_status==0)
                            <option value="0" selected>Ẩn </option>
                            <option value="1">Hiển thị</option>
                            @else
                                <option value="0" >Ẩn </option>
                                <option value="1" selected>Hiển thị</option>
                            @endif
                        </select>
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-4">
                <img class="img-fluid img-thumbnail" id="imgPreview" src="">
            </div>
        </div>
    </form>
    @endforeach




@endsection
