		<table>
                    <thead>
                        <th>ID</th>
                        <th>Biển số xe</th>
                        <th>Ảnh biển số</th>
                        <th>Chủ sở hữu</th>
                        <th>Phí</th>
                        <th>
                            <a href="{{route('car.add')}}">Add new</a>
                        </th>
                    </thead>
                    <tbody>
                        @foreach ($cars as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->plate_number}}</td>
                                <td>
                                    <img src="{{ asset($item->plate_image) }}" width="50px;" alt="">
                                </td>
                                <td>{{$item->owner}}</td>
                                <td>{{$item->travel_fee}}</td>
                                <td>
                                    <a href="{{route('car.edit', ['id' => $item->id])}}">Sửa</a>
                                    <a href="{{route('car.remove', ['id' => $item->id])}}">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
