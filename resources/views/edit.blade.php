<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link href="Home/css/register.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-">
                        <h3>Sửa Sản Phẩm</h3>
                    </div>
                    <div class="col-md-6">
                        <a href="{{route('sanpham.index')}}" class="btn btn-primary float-en">Danh sách sản phẩm</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <form action="{{route('sanpham.update', $sanpham->id)}}" method="POST">
                    @csrf
                    @method('PUT')
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <strong>Tên sản phẩm</strong>
                                <input type="text" name="tensp" value="{{$sanpham->tensp}}" class="form-control" placeholder="Nhập tên sản phẩm">
                            </div>
                            <div class="form-group">
                                <strong>Giá sản phẩm</strong>
                                <input type="number" name="giasp" value="{{$sanpham->giasp}}" class="form-control" placeholder="Nhập giá sản phẩm">
                            </div>
                            <div class="form-group">
                                <strong>Số lượng</strong>
                                <input type="number" name="soluong" value="{{$sanpham->soluong}}" class="form-control" placeholder="Nhập số lượng sản phẩm">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Cật Nhật</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>  