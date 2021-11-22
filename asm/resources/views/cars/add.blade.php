		<form action="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Biển số xe</label>
                                <input type="text" class="form-control" name="plate_number" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Ảnh biển số</label>
                                <input type="file" class="form-control" name="plate_image" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Chủ sở hữu</label>
                                <input type="text" class="form-control" name="owner" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Phí</label>
                                <input type="number" class="form-control" name="travel_fee" id="">
                            </div>
                        </div>
                        <div class="col-6">
                            <a href="{{route('car.index')}}" class="btn btn-danger">Hủy</a>
                            <button type="submit" class="btn btn-primary">Lưu</button>
                        </div>
                    </div>
                </form>
