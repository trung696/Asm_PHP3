@extends('layouts.main')
@section('content')

@if (Session::has('message_delete'))
<p class="text-danger">{{Session::get('message_delete')}}</p>
@endif

<form action="" method="get">
    @csrf
    <div class="row">
        <div class="col-6">
            <div class="form-group">
                <label for="">Từ khóa</label>
                <input type="text" class="form-control" name="keyword" value="{{$searchData['keyword']}}" placeholder="Tìm theo tên sản phẩm">
            </div>
            <div class="form-group">
                <label for="">Vai trò</label>
                <select name="role_id" class="form-control">
                    <option value="">Tất cả</option>
                    @foreach ($roles as $item)
                        <option @if($item->id == $searchData['role_id']) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>
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
        <th>STT</th>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Detail Account</th>
        <th>Avatar</th>
        <th>Role</th>
        <th>
            <a href="{{route('user.add')}}">Add new</a>
        </th>
    </thead>
    <tbody>
        @foreach ($users as $item)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$item->id}}</td>
            <td>{{$item->name}}</td>
            <td>{{$item->email}}</td>
            <td>
                <a href="{{route('users.show', ['user' => $item->id])}}">Chi tiết</a>
            </td>
            <td>
                <img src="{{asset($item->avatar)}}" width="100">
            </td>
            <td>
                {{$item->role->name}}
            </td>
            <td>
                <a href="{{route('user.edit', ['id' => $item->id])}}">Edit Account</a>
                @if (isset(Auth::user()->id) && Auth::user()->id == 1 && Auth::user()->id != $item->id)
                <a href="{{route('user.remove', ['id' => $item->id])}}" onClick="return confirm('Bạn muốn xóa chứ?');">Delete Account</a>
                @else
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
