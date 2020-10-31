@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Danh sách tin tức</h4>
    <a href="{{route('news.add')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row"><div class="col-sm-12 col-md-6">

            </div><div class="col-sm-12 col-md-6">
                <div id="datatable_filter" class="dataTables_filter">
                    <label>Search:
                        <input name="search" id="search" type="search" class="form-control form-control-sm" placeholder="" aria-controls="datatable">
                    </label>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table id="datatable" class="table table-bordered dt-responsive nowrap dataTable no-footer dtr-inline" style="border-collapse: collapse; border-spacing: 0px; width: 100%;" role="grid" aria-describedby="datatable_info">
                    <thead  class="col-sm-12">
                    <tr role="row">
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 10px;" aria-sort="ascending" aria-label="Name: activate to sort column descending">#</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 240px;" aria-label="Position: activate to sort column ascending">Tiêu đề</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 116px;" aria-label="Office: activate to sort column ascending">Danh mục</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 240px;" aria-label="Age: activate to sort column ascending">Nội dung</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 90px;" aria-label="Start date: activate to sort column ascending">Ảnh</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 120px;" aria-label="Salary: activate to sort column ascending">Ghi chú</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 130px;" aria-label="Salary: activate to sort column ascending">Ngày đăng</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 110px;" aria-label="Salary: activate to sort column ascending">Trạng thái</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 220px;" aria-label="action: activate to sort column ascending">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $row)
                    <tr id="item_{{$row->news_id}}">
                        <td style="font-size: 12px">{{++$key}}</td>
                        <td style="font-size: 12px">{{$row->news_title}}</td>
                        <td style="font-size: 12px">{{$row->newCategory->category_news_name}}</td>
                        <td style="font-size: 12px">{{$row->news_content}}</td>
                        <td style="font-size: 12px"><img width="50px" src=" \news\{{$row->news_image}}" alt=""></td>
                        <td style="font-size: 12px">{{$row->news_desc}}</td>
                        <td style="font-size: 12px">{{$row->news_date}}</td>
                        @if ($row->news_status == 0)
                        <td><a href={{route('news.un-active',$row->news_id)}}><button style="font-size: 12px" id="unactive" data-id="'.$row->news_id.'"  class="btn btn-danger"> Ẩn </button></a></td>
                        @else
                        <td><a href={{route('news.active',$row->news_id)}}><button style="font-size: 12px" class="btn btn-primary">Hiện</button></a></td>
                        @endif

                        <td><a href={{route('news.edit',$row->news_id)}}><button style="font-size: 12px" class="btn  btn-dark" type="submit">sửa</button></a>
                            <button style="font-size: 12px" id="delete"  data-id="'.$row->news_id .'" class="btn  btn-danger delete" type="submit">xóa</button> </td>
                    </tr>
                    @endforeach
                   </tbody>
                </table></div></div>
        {!! $data->render() !!}
        <script>
            $('#search').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{route('news.search')}}',
                    data: {
                        'search': $value
                    },
                    success:function(data){
                        $('tbody').html(data);
                    }
                });
            })
            $.ajaxSetup({ headers: { 'csrftoken' : '{{ csrf_token() }}' } });




        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            console.log(id);
            if (confirm('bạn có muốn xóa không?')) {
                $.ajax({
                    url: 'news/remove/'+id,
                    method: 'get',
                    dataType: 'json',
                    type: 'delete',
                    data: {
                        "news_id": id,
                    },
                    success: function (data) {
                        $('#item_'+id).remove();
                    }
                })
            }
        });


    </script>
@endsection
