@extends('admin_layout')
@section('admin_content')

    @foreach($list as $key => $edit)
    <form action="{{route('product.update',$edit->product_id)}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}
        <h2>Cập nhật sản phẩm</h2>
        <br>
        <div class="row" >
            <div class="col-md-8">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="modelName">Tên sản phẩm</label>
                        <input value="{{$edit->product_name}}" type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm">
                        @if ($errors->has('product_name'))
                            <p style="color: red">{{ $errors->first('product_name') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-md-5">
                        <label  for="category" >Danh mục sản phẩm </label>
                        <select name="product_cate" class="form-control">
                            @foreach($cate_product as $key =>$cate)
                                @if($edit->category_id == $cate->cate_pro_id)
                                    <option selected value="{{$cate->cate_pro_id}}">{{$cate->category_product_name}}</option>
                                @else
                                    <option  value="{{$cate->cate_pro_id}}">{{$cate->category_product_name}}</option>
                                @endif
                            @endforeach
                        </select>
                        @if ($errors->has('product_cate'))
                            <p style="color: red">{{ $errors->first('product_cate') }}</p>
                        @endif
                    </div>

                </div>
                <div class="form-row">

                    <div class="form-row col-md-12">
                        <div class="form-group col-md-5">
                            <label for="modelName">mã sản phẩm</label>
                            <input value="{{$edit->product_code}}"  type="text" class="form-control" name="product_code" placeholder="Mã sản phẩm">
                            @if ($errors->has('product_code'))
                                <p style="color: red">{{ $errors->first('product_code') }}</p>
                            @endif
                        </div>
                        <div class="form-group col-md-5">
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
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-5">
                            <label for="price">Giá sản phẩm</label>
                            <input value="{{$edit->product_price}}" type="number" class="form-control" min="1000" name="product_price" placeholder="Giá sản phẩm">

                            @if ($errors->has('product_price'))
                                <p style="color: red">{{ $errors->first('product_price') }}</p>
                            @endif
                        </div>
                        <div class="form-group col-md-5">
                            <label for="price">Giá khuyến mãi sản phẩm</label>
                            <input value="{{$edit->product_price_sale}}" type="number" min="0" class="form-control" name="product_price_sale" placeholder="Giá khuyến mãi">
                            @if ($errors->has('product_price_sale'))
                                <p style="color: red">{{ $errors->first('product_price_sale') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-row col-md-12">
                            <div class="form-group col-md-5">
                                <label for="modelName">Chi tiết sản phẩm</label>
                                <textarea id="editor1" type="text" class="form-control" name="product_content" placeholder="Chi tiết sản phẩm">{{$edit->product_content}}</textarea>
                                @if ($errors->has('product_content'))
                                    <p style="color: red">{{ $errors->first('product_content') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md-5">
                                <label for="salePrice">Ghi chú</label>
                                <textarea id="editor2" type="text" class="form-control" name="product_desc" placeholder="Ghi chú">{{$edit->product_desc}}</textarea>
                                @if ($errors->has('product_desc'))
                                    <p style="color: red">{{ $errors->first('product_desc') }}</p>
                                @endif
                            </div>
                        </div>
                        <div class="form-row col-md-10">
                            <div class="form-group col-md-5">
                                <br>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            <div class="form-group col-md">
                                <label for="quantity">Trạng thái</label>
                                <select class="custom-select" id="inputGroupSelect01" name="product_status">
                                    @if($edit->product_status==0)
                                        <option selected value="0">Ẩn </option>
                                        <option value="1">Hiển thị</option>
                                    @else
                                        <option  value="0">Ẩn </option>
                                        <option selected value="1">Hiển thị</option>
                                    @endif
                                </select>
                                @if ($errors->has('product_status'))
                                    <p style="color: red">{{ $errors->first('product_status') }}</p>
                                @endif
                            </div>
                            <div class="form-group col-md">
                                <label for="exampleFormControlFile1">Ảnh sản phẩm</label>
                                <br>
                                <input type="file" class="form-control-file" name="product_image" >
                                @if ($errors->has('product_image'))
                                    <p style="color: red">{{ $errors->first('product_image') }}</p>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md">
                <img class="img-fluid img-thumbnail" id="imgPreview" src="\product\{{$edit->product_image}}">            </div>
        </div>
        </div>
    </form>
@endforeach
@endsection

