@extends('admin_layout')
@section('admin_content')

@foreach($news as $key => $edit)
    <form action="{{\Illuminate\Support\Facades\URL::to('/users/update-news/'.$edit->news_id)}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}
        <h2>Sửa tin tức</h2>

        <div class="row">
            <div class="col-md">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="modelName">Tiêu đề</label>
                        <input value="{{$edit->news_title}}" type="text" class="form-control" name="news_title" placeholder="Title">
                        @if ($errors->has('news_title'))
                            <p style="color: red">{{ $errors->first('news_title') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label  for="category" >Danh mục tin tức</label>
                        <select name="news_cate" class="form-control">
                            @foreach($news_cate as $key => $cate)
                                @if($edit->news_cate_id == $cate->id)
                                <option selected value="{{$cate->id}}">{{$cate->news_cate_title}}</option>
                                @else
                                    <option value="{{$cate->id}}">{{$cate->news_cate_title}}</option>

                                @endif


                            @endforeach
                        </select>
                        @if ($errors->has('news_cate'))
                            <p style="color: red">{{ $errors->first('news_cate') }}</p>
                        @endif
                    </div>

                </div>
                <div class="form-row">

                    <div class="form-row col-md-12">
                        <div class="form-group col-md-4">
                            <label for="modelName">Lượt xem</label>
                            <input min="0" value="{{$edit->news_view}}" type="number" class="form-control" name="news_view" placeholder="views">
                            @if ($errors->has('news_view'))
                                <p style="color: red">{{ $errors->first('news_view') }}</p>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price">Ngày đăng </label>
                            <input value="{{$edit->news_date}}" type="date" class="form-control" min="1000" name="news_date" placeholder="Date">

                            @if ($errors->has('news_date'))
                                <p style="color: red">{{ $errors->first('news_date') }}</p>
                            @endif
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        </div>
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-4">
                                <label for="modelName">Nội dung</label>
                                <input value="{{$edit->news_content}}" type="text" class="form-control" name="news_content" placeholder="Content">
                                @if ($errors->has('news_content'))
                                    <p style="color: red">{{ $errors->first('news_content') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="salePrice">Ghi chú</label>
                                <input value="{{$edit->news_desc}}" type="text" class="form-control" name="news_desc" placeholder="desc">
                                @if ($errors->has('news_desc'))
                                    <p style="color: red">{{ $errors->first('news_desc') }}</p>
                                @endif
                            </div>

                        </div>
                        <div class="form-row col-md-9">

                            <div class="form-group col-md">
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="form-group col-md">
                                <label for="exampleFormControlFile1">Ảnh sản phẩm</label>
                                <br>
                                <input type="file" class="form-control-file" name="news_image" >

                            </div>
                            <div class="form-group col-md-3">
                                <label for="quantity">Trạng thái</label>
                                <select class="custom-select" id="inputGroupSelect01" name="news_status">
                                    @if($edit->news_status == 0)
                                        <option selected value="0">Ẩn </option>
                                        <option value="1">Hiển thị</option>
                                    @else
                                        <option value="0">Ẩn </option>
                                        <option selected value="1">Hiển thị</option>

                                    @endif


                                </select>
                                @if ($errors->has('news_status'))
                                    <p style="color: red">{{ $errors->first('news_status') }}</p>
                                @endif
                            </div>
                        </div>



                    </div>

                </div>
            </div>
            <div class="col-md-4">
                <img class="img-fluid img-thumbnail" id="imgPreview" src="\news\{{$edit->news_image}}">
            </div>
        </div>
        </div>
    </form>
@endforeach





@endsection

