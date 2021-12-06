		@extends('layouts.main')
        @section('content')
            		<form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Biển số xe</label>
                                <input type="text" class="form-control" name="plate_number" id="" value="{{$car->plate_number}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Ảnh đại diện</label>
                                <img src="{{asset($car->plate_image)}}" alt="" width="100" height="100">
                                <input type="file" class="form-control" name="plate_image" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Chủ sở hữu</label>
                                <input type="text" class="form-control" name="owner" id="" value="{{$car->owner}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Phí di chuyển</label>
                                <input type="number" class="form-control" name="travel_fee" id="" value="{{$car->travel_fee}}">
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="{{route('car.index')}}" class="btn btn-danger">Hủy</a>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>

        @endsection
