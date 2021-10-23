@extends('admin_layout')
@section('layout')
<section id="main-content">
    <section class="wrapper">
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Tất Cả user
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Khách Hàng</th>
                                <th scope="col">Email</th>
                                <th scope="col">Địa Chỉ</th>
                                <th scope="col">Số Điện Thoại</th>
                                <th scope="col">Trạng Thái</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($auth as $id => $a)
                            <tr>
                                <td>{{$a->user_id}}</td>
                                <td>{{$a->user_fullname}}</td>
                                <td>{{$a->user_email}}</td>
                                <td style="max-width: 200px;">{{$a->user_address}}</td>
                                <td>{{$a->user_phonenumber}}</td>
                                <td>{{$a->user_status}}</td>
                                <td>
                                    <a type="button" onclick="return confirm('Bạn Có Chắc Muốn Xóa Chứ')" href="{{URL::to('Admin/service/update')}}/{{$a->service_id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>|
                                    <a type="button" onclick="return confirm('Bạn Có Chắc Muốn Xóa Chứ Hành Động Không Thể Phục Hồi')" href="{{URL::to('Admin/Service/delete')}}/{{$a->service_id}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        {{$auth->links()}}
                    </div>
                </footer>
            </div>
        </div>
        <div class="table-agile-info">
            <div class="panel panel-default">
                <div class="panel-heading">
                    User baned
                </div>
                <div class="table-responsive">
                    <table class="table table-striped b-t b-light">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên Khách Hàng</th>
                                <th scope="col">Email</th>
                                <th scope="col">Địa Chỉ</th>
                                <th scope="col">Số Điện Thoại</th>
                                <th scope="col">Trạng Thái</th>
                                <th scope="col">Thao Tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($baned as $id => $b)
                            <tr>
                                <td>{{$b->user_id}}</td>
                                <td>{{$b->user_fullname}}</td>
                                <td>{{$b->user_email}}</td>
                                <td style="max-width: 200px;">{{$b->user_address}}</td>
                                <td>{{$b->user_phonenumber}}</td>
                                <td>{{$b->user_status}}</td>
                                <td>
                                    <a type="button" onclick="return confirm('Bạn Có Chắc Muốn Xóa Chứ')" href="{{URL::to('Admin/service/update')}}/{{$a->service_id}}" class="btn btn-primary"><i class="fa fa-edit"></i></a>|
                                    <a type="button" onclick="return confirm('Bạn Có Chắc Muốn Xóa Chứ Hành Động Không Thể Phục Hồi')" href="{{URL::to('Admin/Service/delete')}}/{{$a->service_id}}" class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <footer class="panel-footer">
                    <div class="row">
                        {{$baned->links()}}
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