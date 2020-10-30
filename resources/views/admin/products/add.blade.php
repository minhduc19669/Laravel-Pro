@extends('admin_layout')
@section('admin_content')
<form action="{{route('product.save')}}" method="post" enctype="multipart/form-data" class="mx-5" >
        {{csrf_field()}}
        <h2>Thêm sản phẩm</h2>
<br>
        <div class="row" >
            <div class="col-md-12">
                <div class="form-row">
                    <div class="form-group col-md-5">
                        <label for="modelName">Tên sản phẩm</label>
                    <input value="{{old('product_name')}}" type="text" class="form-control" name="product_name" placeholder="Tên sản phẩm">
                        @if ($errors->has('product_name'))
                            <p style="color: red">{{ $errors->first('product_name') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-md-5">
                        <label  for="category" >Danh mục sản phẩm </label>
                        <select name="product_cate" class="form-control">
                            @foreach($cate_product as $key => $cate)
                                <option value="{{$cate->cate_pro_id}}">{{$cate->category_product_name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('product_cate'))
                            <p style="color: red">{{ $errors->first('product_cate') }}</p>
                        @endif
                    </div>

                </div>
                <div class="form-row">

                <div class="form-row col-md-12">
                    <div class="col-lg-5">
                        <div class="card-box">

                            <h4 class="header-title mb-4">Image</h4>

                            <input multiple name="product_image[]" value="{{old('product_image')}}" type="file" class="dropify" data-default-file="{{asset('assets/images/small/img-1.jpg')}}"  />
                            @if ($errors->has('product_image'))
                                <p style="color: red">{{ $errors->first('product_image') }}</p>
                            @endif
                        </div>
                    </div><!-- end col -->

                    <div class="form-group col-md-5">
                        <label  for="brand" >Thương hiệu sản phẩm</label>
                        <select name="product_brand" class="form-control">
                            @foreach($brand_product as $key => $cate)
                                <option value="{{$cate->id}}">{{$cate->brand_name}}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('product_brand'))
                            <p style="color: red">{{ $errors->first('product_brand') }}</p>
                        @endif
                    </div>

                </div>
                    <div class="form-row col-md-12">
                        <div class="form-group col-md-5">
                            <label for="quantity">Trạng thái</label>
                            <select class="custom-select" id="inputGroupSelect01" name="product_status">
                                <option value="1">Còn hàng</option>
                                <option value="0">Hết hàng </option>
                            </select>
                            @if ($errors->has('product_status'))
                                <p style="color: red">{{ $errors->first('product_status') }}</p>
                            @endif
                        </div>
                        <div class="form-group col-md-5">
                            <label  for="category" >Thể loại</label>
                            <select name="cate_sub" class="form-control">
                                @foreach($cate_sub as $key => $cate)
                                    <option value="{{$cate->sub_id}}">{{$cate->category_sub_product_name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('cate_sub'))
                                <p style="color: red">{{ $errors->first('cate_sub') }}</p>
                            @endif
                        </div>
                    </div>

                    <div class="form-row col-md-12">
                        <div class="form-group col-md-5">
                            <label for="price">Giá sản phẩm</label>
                            <input value="{{old('product_price')}}" type="number" class="form-control" min="1000" name="product_price" placeholder="Giá sản phẩm">

                            @if ($errors->has('product_price'))
                                <p style="color: red">{{ $errors->first('product_price') }}</p>
                            @endif
                        </div>
                        <div class="form-group col-md-5">
                            <label for="price">Giá khuyến mãi sản phẩm</label>

                            <input value="{{old('product_price_sale')}}" type="number" min="0" class="form-control" name="product_price_sale" placeholder="Giá khuyến mãi">

                            @if ($errors->has('product_price_sale'))
                                <p style="color: red">{{ $errors->first('product_price_sale') }}</p>
                            @endif
                        </div>
                    </div>
                <div class="form-row">
                <div class="form-row col-md-12">
                    <div class="form-group col-md-5">
                        <label for="modelName">Chi tiết sản phẩm</label>
                        <textarea value="{{old('product_content')}}" va id="editor1" type="text" class="form-control" name="product_content" placeholder="Chi tiết sản phẩm">{{old('product_content')}}</textarea>
                        @if ($errors->has('product_content'))
                            <p style="color: red">{{ $errors->first('product_content') }}</p>
                        @endif
                    </div>
                    <div class="form-group col-md-5">
                        <label for="salePrice">Ghi chú</label>
                        <textarea value="{{old('product_desc')}}" id="editor2" type="text" class="form-control" name="product_desc" placeholder="Ghi chú">{{old('product_desc')}}</textarea>
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

                </div>
                </div>
                </div>
            </div>
            <div id="imgPreview" class="col-md-4">
                <img class="img-fluid img-thumbnail" src="">
            </div>
        </div>
        </div>
    </form>
    <script>
        $(document).ready(function(){

        })
    </script>
@endsection

