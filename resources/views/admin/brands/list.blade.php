
@extends('admin_layout')
@section('admin_content')
    <h4 class="header-title">Thương hiệu</h4>
    <a href="{{route('brand.add')}}"><i class="ion ion-md-add"></i><span>Thêm mới</span></a>
    <input width="50px" type="text" name="search" id="search" class="form-control" placeholder="Tìm kiếm" />
    <div class="table-responsive">
        <table class="table mb-0">
            <thead>
            <tr>
                <th>#</th>
                <th>Tên</th>
                <th>Logo</th>
                <th>Ghi chú</th>
                <th>Trạng thái</th>
                <th>Hành động</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
    <script>
        $(document).ready(function(){
            fetch_customer_data();
            function fetch_customer_data(query = '')
            {
                $.ajax({
                    url:"{{ route('brand.search') }}",
                    method:'GET',
                    data:{query:query},
                    dataType:'json',
                    success:function(data)
                    {
                        $('tbody').html(data.table_data);
                        $('#total_records').text(data.total_data);
                    }
                })
            }

            $(document).on('keyup', '#search', function(){
                var query = $(this).val();
                fetch_customer_data(query);
            });
        });
        $(document).on('click', '#delete', function() {
            var id = $(this).data('id');
            console.log(id);
            if (confirm('bạn có muốn xóa không?')) {
                $.ajax({
                    url: 'brand/remove/'+id,
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
        // $(document).on('click', '#unactive', function() {
        //     var id = $(this).data('id');
        //     var slide_status =$(this).data('slide_status')
        //     var query = $(this).val();
        //     console.log(id);
        //     $.ajax({
        //         url: 'slide/un-active/'+id,
        //         method: 'get',
        //         dataType: 'json',
        //         type: 'unactive',
        //         data: {
        //             "id": id,
        //             'slide_status': slide_status,
        //         },
        //         success: function (data) {
        //         }
        //
        //     })
        //
        // });

    </script>
@endsection


