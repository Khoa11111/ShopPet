<@extends('layout')
@section('content')
    <!-- Topbar Start -->
    @include('topbar')
    <!-- Topbar End -->


    <!-- Navbar Start -->
    @include('navbar')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-m-6">
                        <h3>Sản phẩm</h3>
                    </div>
                    <div class="col-m-6">
                        <a href="{{route('sanpham.create')}}" class="btn btn-primary float-end">Thêm mới</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('thongbao'))
                    <div class="alert alert-success">
                        {{Session::get('thongbao')}}
                    </div>
                @endif
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá tiền</th>
                            <th>Số lượng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sanpham as $item)
                            <tr>
                                <td>{{++$i}}</td>
                                <td>{{$item->tensp}}</td>
                                <td>{{$item->giasp}} VND</td>
                                <td>{{$item->soluong}}</td>
                                <td>
                                    <form action="{{route('sanpham.destroy',$item->id)}}" method="POST">
                                        <a href="{{route('sanpham.edit',$item->id)}}" class="btn btn-info">Sửa</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class='btn btn-danger'>Xóa</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
@endsection
