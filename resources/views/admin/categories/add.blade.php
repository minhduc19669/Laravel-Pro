@extends('admin_layout')
@section('admin_content')
    <form action="{{\Illuminate\Support\Facades\URL::to('users/save-category')}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}

        <h2>Thêm danh mục sản phẩm</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="modelName">Tên danh mục</label>
                        <input type="text" class="form-control" name="category_name" placeholder="Tên danh mục">
                    </div>
                </div>
                @if ($errors->has('category_name'))
                    <p style="color: red">{{ $errors->first('category_name') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="price">Ghi chú</label>
                        <input type="text" class="form-control" name="category_desc" placeholder="Ghi chú">
                    </div>

                </div>
                @if ($errors->has('category_desc'))
                    <p style="color: red">{{ $errors->first('category_desc') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="modelName">Trạng thái</label>
                        <select class="custom-select" id="inputGroupSelect01" name="category_status">
                            <option></option>
                            <option value="0">Ẩn </option>
                            <option value="1">Hiển thị</option>
                        </select>
                        @if ($errors->has('category_status'))
                            <p style="color: red">{{ $errors->first('category_status') }}</p>
                        @endif
                    </div>

                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-4">
                <img class="img-fluid img-thumbnail" id="imgPreview" src="">
            </div>
        </div>

    </form>
    <?php
    $message = Session::get('message');
    if ($message){
        echo'<span class="text-alert">',$message,'</span>' ;
        Session::put('message',null);
    }

    ?>


@endsection
