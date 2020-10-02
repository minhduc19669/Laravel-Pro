@extends('admin_layout')
@section('admin_content')
    <form action="{{\Illuminate\Support\Facades\URL::to('/users/save-news')}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}
        <h2>Thêm tin tức</h2>
        <div class="row">
            <div class="col-md-12">
                <div class="form">
                    <div class="form-group col-md-8">
                        <label for="modelName">Tiêu đề</label>
                        <input type="text" class="form-control" name="news_title" placeholder="Tiêu đề">
                        @if ($errors->has('news_title'))
                            <p style="color: red">{{ $errors->first('news_title') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-md-8">
                        <label  for="category" >Danh mục tin tức</label>
                        <select name="news_cate" class="form-control">
                            @foreach($news_cate as $key => $cate)

                                <option value="{{$cate->id}}">{{$cate->category_news_name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('news_cate'))
                            <p style="color: red">{{ $errors->first('news_cate') }}</p>
                        @endif
                    </div>
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-4">
                            <label for="modelName">Lượt xem</label>
                            <input min="0" type="number" class="form-control" name="news_view" placeholder="Lượt xem">
                            @if ($errors->has('news_view'))
                                <p style="color: red">{{ $errors->first('news_view') }}</p>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price">Ngày đăng </label>
                            <input type="date" class="form-control" min="1000" name="news_date" placeholder="Ngày đăng">

                            @if ($errors->has('news_date'))
                                <p style="color: red">{{ $errors->first('news_date') }}</p>
                            @endif
                        </div>
                    </div>
                    <div class="form">
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-8">
                                <label for="modelName">Nội dung</label>
                                <textarea id="editor1" type="text" class="form-control" name="news_content" placeholder="Nội dung"></textarea>
                                @if ($errors->has('news_content'))
                                    <p style="color: red">{{ $errors->first('news_content') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-8">
                                <label for="salePrice">Ghi chú</label>

                                <textarea id="editor2" type="text" class="form-control" name="news_desc" placeholder="desc"></textarea>
                                @if ($errors->has('news_desc'))
                                    <p style="color: red">{{ $errors->first('news_desc') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form">
                            <div class="form-group col-md">
                                <label for="exampleFormControlFile1">Ảnh sản phẩm</label>
                                <br>
                                <input type="file" class="form-control-file" name="news_image" >
                                @if ($errors->has('news_image'))
                                    <p style="color: red">{{ $errors->first('news_image') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label for="quantity">Trạng thái</label>
                                <select class="custom-select" id="inputGroupSelect01" name="news_status">

                                    <option aria-checked="true" value="0">Ẩn </option>
                                    <option value="1">Hiển thị</option>
                                </select>
                                @if ($errors->has('news_status'))
                                    <p style="color: red">{{ $errors->first('news_status') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md">
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </div>
                    </div>

                </div>

            </div>
            <div class="col-md-4">
                <img class="img-fluid img-thumbnail" id="imgPreview" src="">
            </div>
        </div>
        </div>
    </form>






@endsection

