@extends('layouts.main')
@section('content')

<form action="" method="POST" enctype="multipart/form-data" class="col-6">
    @csrf
    <div>
        <label for="">Họ tên</label>
        <input type="text" name="name" value="{{$user->name}}" id="" class="form-control">
    </div>
    <div>
        <label for="">Email</label>
        <input type="email" name="email" value="{{$user->email}}" id="" class="form-control">
    </div>
    <div>
        <label for="">Avatar</label>
        <input type="file" name="avatar" id="" class="form-control">
        <img src="{{asset($user->avatar)}}" width="100">
    </div>
    <div>
        @if (isset(Auth::user()->id) && Auth::user()->role_id == 1  )
        <label for="">Vai trò</label>
        <select name="role_id" class="form-control" class="form-control">
            @foreach ($roles as $item)
                <option @if($item->id == $user->role_id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
            @endforeach
        </select>

        @endif

    </div>

    <div>
        <button type="submit" class="btn btn-primary">Lưu</button>
    </div>
</form>

@endsection
