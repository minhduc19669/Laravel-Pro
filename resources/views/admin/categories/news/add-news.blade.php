@extends('admin_layout')
@section('admin_content')
    <form action="{{route('category.save-news')}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}

        <h2>Thêm danh mục tin tức</h2>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="modelName">Mã</label>
                        <input type="number" min="1" class="form-control" name="cate_news_id" placeholder="Mã danh mục">
                    </div>
                </div>
                @if ($errors->has('cate_news_id'))
                    <p style="color: red">{{ $errors->first('cate_news_id') }}</p>
                @endif
                                <div class="form-row">
                                    <div class="form-group col-md-8">
                                        <label for="modelName">Tên danh mục tin tức</label>
                                        <input type="text" class="form-control" name="category_news_name" placeholder="Tên danh mục tin tức">
                                    </div>
                                </div>
                                @if ($errors->has('category_news_name'))
                                    <p style="color: red">{{ $errors->first('category_news_name') }}</p>
                                @endif
                <div class="form-row">
                    <div class="form-group col-md-8">
                        <label for="price">Chú thích danh mục tin tức</label>
                        <textarea  name="category_news_desc" id="editor2" rows="10" cols="80"></textarea>
                    </div>
                </div>
                @if ($errors->has('category_news_desc'))
                    <p style="color: red">{{ $errors->first('category_news_desc') }}</p>
                @endif

                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="col-md-4">
                <img class="img-fluid img-thumbnail" id="imgPreview" src="">
            </div>
        </div>

    </form>



@endsection
