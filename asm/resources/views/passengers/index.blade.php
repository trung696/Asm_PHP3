		<table>
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
                                    <img src="{{ asset($item->plate_image) }}" width="50px;" alt="">
                                </td>
                                <td>{{$item->car_id}}</td>
                                <td>{{$item->travel_time}}</td>

                                <td>
                                    <a href="{{route('passenger.edit', ['id' => $item->id])}}">Sửa</a>
                                    <a href="{{route('passenger.remove', ['id' => $item->id])}}">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
