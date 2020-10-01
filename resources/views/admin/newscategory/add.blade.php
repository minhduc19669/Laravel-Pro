@extends('admin_layout')
@section('admin_content')
    <form action="{{\Illuminate\Support\Facades\URL::to('users/save-newscategory')}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}

        <h2>Thêm danh mục tin tức</h2>
        <div class="row">
            <div class="col-md-8">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="modelName">Tên danh mục</label>
                        <input type="text" class="form-control" name="news_cate_title" placeholder="newscategory title">
                    </div>
                </div>
                @if ($errors->has('news_cate_title'))
                    <p style="color: red">{{ $errors->first('news_cate_title') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="price">Ghi chú</label>
                        <textarea type="text" class="form-control" name="news_cate_desc" placeholder="desc"></textarea>
                    </div>

                </div>
                @if ($errors->has('news_cate_desc'))
                    <p style="color: red">{{ $errors->first('news_cate_desc') }}</p>
                @endif
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="modelName">Trạng thái</label>
                        <select class="custom-select" id="inputGroupSelect01" name="news_cate_status">

                            <option value="0">Ẩn </option>
                            <option value="1">Hiển thị</option>
                        </select>
                        @if ($errors->has('news_cate_status'))
                            <p style="color: red">{{ $errors->first('news_cate_status') }}</p>
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


@endsection
