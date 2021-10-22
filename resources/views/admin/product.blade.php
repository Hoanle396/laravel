@extends('admin_layout')
@section('layout')
<section id="main-content">
    <section class="wrapper">
        <div class="row">
            <div class="col-md-12 text-center">
                <?php

                use Illuminate\Support\Facades\Session;

                $message = Session::get('message');
                if (Session::get('message')) {
                    echo '<h4><span class="text-primary bg-success">' . $message . '</span></h4>';
                    Session::put("message", null);
                }
                ?>
            </div>
        </div>
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tất Cả Sản Phẩm
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Sản Phẩm</th>
                                <th scope="col">Hình Ảnh</th>
                                <th scope="col">Số Lượng</th>
                                <th scope="col">Giá </th>
                                <th scope="col">Xuất Xứ </th>
                                <th scope="col">Hãng Sản Xuất </th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($product as $id => $a)
                            <tr>
                                <td>{{$a->product_id}}</td>
                                <td style="max-width: 200px;">{{$a->product_name}}</td>
                                <td><img src="{{$a->product_image}}" width="50" height="50" alt=""></td>
                                <td>{{$a->product_discount}}</td>
                                <td>{{$a->product_price}}</td>
                                <td>{{$a->product_origin}}</td>
                                <td>{{$a->product_manufacturer}}</td>
                                <td>
                                    <a type="button" href="{{URL::to('Admin/product/update')}}/{{$a->product_id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>|
                                    <a type="button" onclick="return confirm('Bạn Có Chắc Muốn Xóa Chứ Hành Động Không Thể Phục Hồi')" href="{{URL::to('Admin/product/delete')}}/{{$a->product_id}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        {{$product->links()}}
                    </div>
                </footer>
            </div>
        </div>
    </section>
    @endsection