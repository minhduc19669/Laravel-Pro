@extends('admin_layout')
@section('admin_content')
    @foreach($feedback as $key => $feedback)
    <form method="post" action="{{route('feedback.update',$feedback->id)}}" class="form-inline mt-3">
        @csrf
        <label class="mr-3 mb-3" for="inlineFormCustomSelect">Trạng thái</label>
        <select name="status" class="custom-select mb-3 mr-3" id="inlineFormCustomSelect">
            @if($feedback->status == 0)
            <option selected value="0">Chưa trả lời</option>
                <option value="1">Đã trả lời</option>

            @else
                <option value="0">Chưa trả lời</option>
                <option selected value="1">Đã trả lời</option>
            @endif
        </select>
        <button type="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
    @endforeach
@endsection
