<<<<<<< HEAD
@extends('admin_layout')
@section('admin_content')
    <form action="{{\Illuminate\Support\Facades\URL::to('admin/save-brand')}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}

        <h2>Thêm thương hiệu</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="modelName">Tên thương hiệu</label>
                        <input type="text" class="form-control" name="brand_name" placeholder="brand name">
                    </div>
                </div>
                @if ($errors->has('brand_name'))
                    <p style="color: red">{{ $errors->first('brand_name') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="price">Logo</label>
                        <input type="file" class="form-control" name="brand_image" placeholder="desc">
                    </div>

                </div>
                @if ($errors->has('brand_image'))
                    <p style="color: red">{{ $errors->first('brand_image') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="price">Ghi chú</label>
                        <input type="text" class="form-control" name="brand_desc" placeholder="desc">
                    </div>

                </div>
                @if ($errors->has('brand_desc'))
                    <p style="color: red">{{ $errors->first('brand_desc') }}</p>
                @endif

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="modelName">Trạng thái</label>
                        <select class="custom-select" id="inputGroupSelect01" name="brand_status">
                            <option></option>
                            <option value="0">Ẩn </option>
                            <option value="1">Hiển thị</option>
                        </select>
                    </div>
                </div>
                @if ($errors->has('brand_status'))
                    <p style="color: red">{{ $errors->first('brand_status') }}</p>
                @endif

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
=======
<?php
>>>>>>> 7f8aed56f1cb2eb03d8445e4a37f5369a39e120f
