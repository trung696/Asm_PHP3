
        @extends('layouts.main')
        @section('content')
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
