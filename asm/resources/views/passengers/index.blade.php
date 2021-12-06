
        @extends('layouts.main')
        @section('content')
        <form action="" method="get">
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Từ khóa</label>
                <input type="text" class="form-control" name="keyword" value="{{$searchData['keyword']}}" placeholder="Tìm theo tên ">
            </div>

        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="">Tên cột</label>
                <select name="column_names" class="form-control">
                    @foreach ($column_names as $key => $item)
                        <option  @if($key == $searchData['column_names']) selected @endif value="{{$key}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="">Sắp xếp theo</label>
                <select name="order_by" class="form-control">
                    @foreach ($order_by as $key => $item)
                        <option @if($key == $searchData['order_by']) selected @endif value="{{$key}}">{{$item}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <button class="btn btn-primary" type="submit">Tìm kiếm</button>
    </div>
</form>
            <table class="table table-stripped">
                    <thead>
                        <th>ID</th>
                        <th>Tên hành khách</th>
                        <th>Ảnh đại diện</th>
                        <th>Mã xe</th>
                        <th>Giờ khởi hành</th>

                        <th>
                            <a href="{{route('passenger.add')}}">Add new</a>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($passengers as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->name}}</td>
                                <td>
                                    <img src="{{ asset($item->avatar) }}" width="50px;" alt="">
                                </td>
                                <td>{{$item->car_id}}</td>
                                <td>{{$item->travel_time}}</td>

                                <td>
                                    <a href="{{route('passenger.edit', ['id' => $item->id])}}" class="btn btn-primary">Sửa</a>
                                    <a href="{{route('passenger.remove', ['id' => $item->id])}}" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

        @endsection
