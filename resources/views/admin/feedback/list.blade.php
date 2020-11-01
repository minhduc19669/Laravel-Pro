@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Danh sách phản hồi</h4>
    <div id="datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
        <div class="row"><div class="col-sm-12 col-md-6">

            </div>
            <div class="col-sm-12 col-md-6">
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
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 240px;" aria-label="Office: activate to sort column ascending">tên</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 80px;" aria-label="Age: activate to sort column ascending">email</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 80px;" aria-label="Age: activate to sort column ascending">Tiêu đề</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 240px;" aria-label="Start date: activate to sort column ascending">Nội dung</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 80px;" aria-label="Salary: activate to sort column ascending">Trạng thái</th>
                        <th class="sorting" tabindex="0" aria-controls="datatable" rowspan="1" colspan="1" style="width: 180px;" aria-label="action: activate to sort column ascending">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($feedback as $key => $row)
                        <tr id="item_{{$row->id}}" role="row" class="odd">
                            <td class="" tabindex="0">{{++$key}}</td>
                            <td class="sorting_1">{{$row->name}}</td>
                            <td >{{$row->email }}</td>
                            <td >{{$row->title }}</td>
                            <td >{{$row->content}}</td>
                            @if ($row->status == 0)
                                <td >Chưa trả lời</td>

                            @else

                                <td >Đã trả lời</td>
                            @endif

                            <td ><a href="{{route('feedback.edit',$row->id)}}"><button  class="btn  btn-dark" type="submit">sửa</button></a>  <button  id="delete"  data-id="{{$row->id}}" class="btn  btn-danger delete" type="submit">xóa</button> </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <script type="text/javascript">
            $('#search').on('keyup',function(){
                $value = $(this).val();
                $.ajax({
                    type: 'get',
                    url: '{{route('feedback.search')}}',
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
                        url: 'feedback/delete/'+id,
                        method: 'get',
                        dataType: 'json',
                        type: 'delete',
                        data: {
                            "id": id,
                        },
                        success: function (data) {
                            $('#item_'+id).remove();
                        }
                    })
                }
            });

        </script>
@endsection
