@extends('admin_layout')
@section('layout')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Order Chưa Xử Lý
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Mã Code</th>
                                <th scope="col">Thời Gian</th>
                                <th scope="col">Hình Thức Thanh Toán</th>
                                <th scope="col">Tổng Tiền</th>
                                <th scope="col">Trạng Thái</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($order as $id => $a)
                            <tr>
                                <td>{{$a->order_id}}</td>
                                <td>{{$a->order_code}}</td>
                                <td>{{$a->order_date}}</td>
                                <td>{{$a->order_pay}}</td>
                                <td>{{$a->order_total}}</td>
                                <td>{{$a->order_status}}</td>
                                <td>
                                    <a type="button" href="{{URL::to('Admin/Order/view')}}/{{$a->order_code}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        {{$order->links()}}
                    </div>
                </footer>
            </div>
        </div>
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tất Cả Order
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Mã Code</th>
                                <th scope="col">Thời Gian</th>
                                <th scope="col">Hình Thức Thanh Toán</th>
                                <th scope="col">Tổng Tiền</th>
                                <th scope="col">Trạng Thái</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($all as $id => $b)
                            <tr>
                                <td>{{$b->order_id}}</td>
                                <td>{{$b->order_code}}</td>
                                <td>{{$b->order_date}}</td>
                                <td>{{$b->order_pay}}</td>
                                <td>{{$b->order_total}}</td>
                                <td>{{$b->order_status}}</td>
                                <td>
                                    <a type="button" href="{{URL::to('Admin/Order/view')}}/{{$b->order_code}}" class="btn btn-primary"><i class="fa fa-eye"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        {{$order->links()}}
                    </div>
                </footer>
            </div>
        </div>
    </section>
    @if(Session::get('message'))
    <script>
        $(document).ready(function() {
            $('#global-modal').modal('show');
        });
    </script>
    @endif
    <div id="global-modal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Thông báo</h4>
                </div>
                <div class="modal-body">
                    <p><span class="text-primary">{{Session::get('message')}}</span> </p>
                    <?php

                    use Illuminate\Support\Facades\Session;

                    Session::put("message", null); ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                </div>
            </div>

        </div>
    </div>
    @endsection
