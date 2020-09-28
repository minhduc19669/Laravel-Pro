@extends('admin_layout')
@section('admin_content')

@foreach($list as $key => $edit)
    <form action="{{\Illuminate\Support\Facades\URL::to('/users/update-product/'.$edit->product_id)}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}
        <h2>Sửa sản phẩm</h2>

        <div class="row">
            <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="modelName">Tên sản phẩm</label>
                        <input value="{{$edit->product_name}}" type="text" class="form-control" name="product_name" placeholder="Product Name">
                        @if ($errors->has('product_name'))
                            <p style="color: red">{{ $errors->first('product_name') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label  for="category" >Danh mục sản phẩm </label>
                        <select name="product_cate" class="form-control">
                            @foreach($cate_product as $key =>$cate)
                                @if($edit->category_id == $cate->id)
                                 <option selected value="{{$cate->id}}">{{$cate->category_name}}</option>
                            @else
                                    <option s value="{{$cate->id}}">{{$cate->category_name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('product_cate'))
                            <p style="color: red">{{ $errors->first('product_cate') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-md-4">
                        <label  for="brand" >Thương hiệu sản phẩm</label>
                        <select name="product_brand" class="form-control">
                            @foreach($brand_product as $key => $brand)
                                @if($brand->id == $edit->brand_id)
                                <option selected value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @else
                                    <option  value="{{$brand->id}}">{{$brand->brand_name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('product_brand'))
                            <p style="color: red">{{ $errors->first('product_brand') }}</p>
                        @endif
                    </div>
                </div>
                <div class="form-row">

                    <div class="form-row col-md-12">
                        <div class="form-group col-md-4">
                            <label for="modelName">mã sản phẩm</label>
                            <input value="{{$edit->product_code}}" type="text" class="form-control" name="product_code" placeholder="Product Code">
                            @if ($errors->has('product_code'))
                                <p style="color: red">{{ $errors->first('product_code') }}</p>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price">Giá sản phẩm</label>
                            <input value="{{$edit->product_price}}" type="number" class="form-control" min="1000" name="product_price" placeholder="Price">

                            @if ($errors->has('product_price'))
                                <p style="color: red">{{ $errors->first('product_price') }}</p>
                            @endif
                        </div>
                        <div class="form-group col-md-4">
                            <label for="price">Giá khuyến mãi sản phẩm</label>

                            <input value="{{$edit->product_price_sale}}" type="number" min="1000" class="form-control" name="product_price_sale" placeholder="Price sale">

                            @if ($errors->has('product_price_sale'))
                                <p style="color: red">{{ $errors->first('product_price_sale') }}</p>
                            @endif
                        </div>

                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                        </div>
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-4">
                                <label for="modelName">Chi tiết sản phẩm</label>
                                <input value="{{$edit->product_content}}" type="text" class="form-control" name="product_content" placeholder="Content">
                                @if ($errors->has('product_content'))
                                    <p style="color: red">{{ $errors->first('product_content') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="salePrice">Ghi chú</label>
                                <input value="{{$edit->product_desc}}" type="text" class="form-control" name="product_desc" placeholder="desc">
                                @if ($errors->has('product_desc'))
                                    <p style="color: red">{{ $errors->first('product_desc') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-4">
                                <label for="quantity">Trạng thái</label>
                                <select class="custom-select" id="inputGroupSelect01" name="product_status">
                                    @if($edit->product_status==0)
                                    <option selected value="0">Ẩn </option>
                                    <option value="1">Hiển thị</option>
                                    @else
                                        <option selected value="0">Ẩn </option>
                                        <option value="1">Hiển thị</option>
                                    @endif
                                </select>
                                @if ($errors->has('product_status'))
                                    <p style="color: red">{{ $errors->first('product_status') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-row col-md-12">

                            <div class="form-group col-md-4">
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="exampleFormControlFile1">Ảnh sản phẩm</label>
                                <br>
                                <input type="file" class="form-control-file" name="product_image" >
                            </div>

                        </div>



                    </div>

                </div>
            </div>
            <div class="col-md-12">
                <img class="img-fluid img-thumbnail" id="imgPreview" src="\product\{{$edit->product_image}}">
            </div>
        </div>
        </div>
    </form>
@endforeach





@endsection

