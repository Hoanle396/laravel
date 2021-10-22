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
                    echo '<h4><span class="text-primary">' . $message . '</span></h4>';
                    Session::put("message", null);
                }
                ?>
            </div>
            <div class="col-lg-12">
                <section class="panel">
                    <header class="panel-heading">
                        Thêm Sản Phẩm
                        <span class="tools pull-right">
                            <a class="fa fa-chevron-down" href="javascript:;"></a>
                        </span>
                    </header>
                    <div class="panel-body">
                        <div class=" form">
                            <form class="cmxform form-horizontal " action="{{URL::to('Admin/add-product')}}" method="post" enctype="multipart/form-data" validate>
                                @csrf
                                <div class="form-group ">
                                    <label for="cname" class="control-label col-lg-3">Tên Sản Phẩm</label>
                                    <div class="col-lg-6">
                                        <input class="input-lg m-bot15 form-control" name="product_name" minlength="2" type="text" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-3">Giá</label>
                                    <div class="col-lg-6">
                                        <input class="form-control input-lg m-bot15" type="number" min="1" name="product_price" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="curl" class="control-label col-lg-3">Xuất Xứ</label>
                                    <div class="col-lg-6">
                                        <input class="form-control input-lg m-bot15" type="text" name="product_origin" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="cemail" class="control-label col-lg-3">Hãng Sản Xuất</label>
                                    <div class="col-lg-6">
                                        <input class="form-control input-lg m-bot15" type="text" name="product_manufacturer" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="curl" class="control-label col-lg-3">Số Lượng</label>
                                    <div class="col-lg-6">
                                        <input class="form-control input-lg m-bot15" type="number" min="1" name="product_discount" required="">
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label for="ccomment" class="control-label col-lg-3">Mô Tả</label>
                                    <div class="col-lg-6">
                                        <textarea class="form-control input-lg m-bot15" id="product_description" name="product_description" style=" resize: none;" required=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile" class="control-label col-lg-3">Hình Ảnh</label>
                                    <div class="col-lg-6">
                                        <input type="file" id="exampleInputFile" name="product_image" accept="image/*" required="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-lg-offset-3 col-lg-6">
                                        <button class="btn btn-primary" type="submit">Save</button>
                                        <button class="btn btn-default" type="button">Cancel</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
                <div class="table-agile-info">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Sản Phẩm Mới
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
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($product as $id => $a)
                                    <tr>
                                        <td>{{$a->product_id}}</td>
                                        <td>{{$a->product_name}}</td>
                                        <td><img src="{{$a->product_image}}" width="50" height="50" alt=""></td>
                                        <td>{{$a->product_discount}}</td>
                                        <td>{{$a->product_price}}</td>
                                        <td>{{$a->product_origin}}</td>
                                        <td>{{$a->product_manufacturer}}</td>
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
            </div>
        </div>
    </section>
    @endsection

    @section('js')
    <script src="//cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="/js/config.js"></script>
    <script type="text/javascript">
        CKEDITOR.replace('product_description');
    </script>
    @endsection