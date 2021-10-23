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
                    Tất Cả Lịch Hẹn
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Khách Hàng</th>
                                <th scope="col">Email Khách Hàng</th>
                                <th scope="col">Giờ</th>
                                <th scope="col">Ngày</th>
                                <th scope="col">Ghi Chú</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($service as $id => $a)
                            <tr>
                                <td>{{$a->join_id}}</td>
                                <td>{{$a->service_fullname}}</td>
                                <td>{{$a->service_email}}</td>
                                <td>{{$a->join_time}}</td>
                                <td>{{$a->join_date}}</td>
                                <td>{{$a->join_description}}</td>
                                <td>
                                    <a type="button" onclick="return confirm('Bạn Có Chắc Chắn Là Đã Hoàn Thành lịch Hẹn Chứ')" href="{{URL::to('Admin/Service/done')}}/{{$a->service_id}}" class="btn btn-success"><i class="fa fa-check"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        {{$service->links()}}
                    </div>
                </footer>   
            </div>
        </div>
    </section>
    @endsection