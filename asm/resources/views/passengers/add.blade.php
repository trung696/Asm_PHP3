		@extends('layouts.main')
@section('content')
        <form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row ">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Tên hành khách</label>
                                <input type="text" class="form-control" name="name" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Ảnh đại diện</label>
                                <input type="file" class="form-control" name="avatar" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Mã xe</label>
                                <input type="text" class="form-control" name="car_id" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Giờ khởi hành</label>
                                <input type="datetime-local" class="form-control" name="travel_time" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="{{route('car.index')}}" class="btn btn-danger">Hủy</a>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
@endsection
