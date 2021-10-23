@extends('welcome')
@section('content')
<section class="page-section mt-5 mb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4" style="height: 400px;">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad" class="active" data-toggle="tab"><i class="fa fa-home"></i> Trang chủ</a>
                                <a href="#orders" data-toggle="tab" class=""><i class="fa fa-cart-arrow-down"></i> Giỏ Hàng</a>
                                <a href="#address-edit" data-toggle="tab" class=""><i class="fa fa-map-marker"></i> Địa Chỉ</a>
                                <a href="#account-info" data-toggle="tab" class=""><i class="fa fa-user"></i> Tài Khoản </a>
                                <a href="#account-change" data-toggle="tab" class=""><i class="fa fa-lock"></i> Đổi Mật Khẩu</a>
                                <a href="Logout"><i class="fa fa-sign-out-alt" aria-hidden="true"></i> Đăng xuất</a>
                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="myaccountContent">
                                <div class="tab-pane fade active show" id="dashboad" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Dashboard</h3>
                                        <div class="welcome">
                                            <p>Xin Chào, <strong>{{$account->user_fullname}}</strong> (nếu không phải <strong>{{$account->user_fullname}}</strong><a href="Logout" class="logout"> Đăng xuất</a>)</p>
                                        </div>

                                        <p class="mb-0">Từ trang tổng quan tài khoản của bạn. bạn có thể dễ dàng kiểm tra và xem các đơn đặt hàng gần đây, quản lý địa chỉ giao hàng và thanh toán cũng như chỉnh sửa mật khẩu và chi tiết tài khoản của mình.</p>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Giỏ Hàng</h3>
                                        <div class="myaccount-table table-responsive text-center">
                                            <table class="table table-bordered">
                                                <thead class="thead-light">
                                                    <tr>
                                                        <th>Sản Phẩm</th>
                                                        <th>Tên Sản Phẩm</th>
                                                        <th>Giá</th>
                                                        <th>Số Lượng</th>
                                                        <th>Thành Tiền</th>
                                                        <th>Thao Tác</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php $total = 0; ?>
                                                    @if(session('cart'))

                                                    @foreach(session('cart') as $id => $details)
                                                    <tr>
                                                        <td><img width="80px" height="100%" src="{{ $details['photo'] }}" /></td>
                                                        <td>{{ $details['name'] }}</td>
                                                        <td>{{ $details['price'] }}</td>
                                                        <td>{{$details['quantity']}}</td>
                                                        <td>{{$details['price']*$details['quantity']}}</td>
                                                        <td><a href="{{URL::to('remove-from-cart/'.$id)}}" class="check-btn sqr-btn "><i class="fa fa-times"></i></a></td>
                                                    </tr>
                                                    <?php $total += $details['price'] * $details['quantity'] ?>

                                                    @endforeach
                                                </tbody>
                                            </table>
                                            <a class="btn btn-success" href="{{URL::to('Checkout')}}">Tổng : $<?= $total ?> Thanh Toán</a>
                                            @else
                                            <tr>
                                                <td colspan="6">Giỏ Hàng Của Bạn Đang Trống</td>
                                            </tr>
                                            </tbody>
                                            </table>
                                            @endif

                                        </div>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <div class="tab-pane fade " id="address-edit" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Địa Chỉ</h3>
                                        <address>
                                            <p><strong>{{$account->user_fullname }}</strong></p>
                                            <p>{{$account->user_address }}</p>
                                            <p>Mobile: {{$account->user_phonenumber }}</p>
                                        </address>
                                        <a href="#address" class="check-btn sqr-btn " data-toggle="modal" data-target="#"><i class="fa fa-edit"></i>Chỉnh Sửa Địa Chỉ </a>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->

                                <div class="tab-pane fade" id="account-info" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Chi Tiết Tài Khoản</h3>
                                        <div class="account-details-form">
                                            <form action="{{URL::to('Auth/Change')}}" method="post">
                                                {{csrf_field()}}
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="first-name" class="required">Họ Tên</label>
                                                            <input type="text" value="{{$account->user_fullname}}" name="name" required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-input-item">
                                                    <label for="email" class="required">Số Điện Thoại</label>
                                                    <input type="text" value="{{$account->user_phonenumber }}" name="phonenumber" required="true">
                                                </div>
                                                <div class="single-input-item">
                                                    <button class="check-btn sqr-btn " type="submit" name="changedetail" value="Lưu thay đổi">Lưu thay đổi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div> <!-- Single Tab Content End -->
                                <div class="tab-pane fade" id="account-change" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Đổi Mật Khẩu</h3>
                                        <div class="account-details-form">
                                            <form action="{{URL::to('Auth/Change')}}" method="post">
                                                {{csrf_field()}}
                                                <div class="single-input-item">
                                                    <label for="current-pwd" class="required">Mật khẩu cũ</label>
                                                    <input type="password" name="currentpwd" required="true">
                                                </div>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="new-pwd" class="required">Mật khẩu mới</label>
                                                            <input type="password" name="newpwd" required="true">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="single-input-item">
                                                            <label for="confirm-pwd" class="required">Nhập lại mật khẩu mới</label>
                                                            <input type="password" name="confirmpwd" required="true">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="single-input-item">
                                                    <button class="check-btn sqr-btn " type="submit" name="changepass" value="Lưu thay đổi">Lưu thay đổi</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="address" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Chỉnh Sửa Địa Chỉ</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{URL::to('Auth/Change')}}" method="post">
                {{csrf_field()}}
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <select name="city" class="form-control form-control-lg" required="true">
                                <option value="">Tỉnh / Thành phố</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <select name="distric" class="form-control form-control-lg" required="true">
                                <option value="">Quận / Huyện</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-floating mt-3">
                        <select name="ward" class="form-control form-control-lg" required="true">
                            <option value="">Phường / Xã</option>
                        </select>
                    </div>
                    <div class="form-floating mt-3">
                        <input class="form-control" name="address" type="text" value="{{$account->user_address }}" required />
                        <label for="address">Địa Chỉ Chi Tiết</label>
                    </div>
                </div>
                <div class="modal-footer single-input-item">
                    <a class="btn btn-secondary" data-dismiss="modal">Đóng</a>
                    <button class="check-btn sqr-btn" type="submit" name="changeaddress" value="Lưu thay đổi">Lưu thay đổi</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var city = $('select[name="city"]')
    var district = $('select[name="distric"]')
    var village = $('select[name="ward"]')

    $(document).ready(function() {
        axios.get('https://vapi.vnappmob.com/api/province/')
            .then(function(response) {
                for (let i = 0; i < response.data.results.length; i++) {
                    city.append(`<option value="${response.data.results[i].province_id}">${response.data.results[i].province_name}</option>`)
                }
            })
            .catch(function(error) {

            })
    });
    city.change(function(e) {
        axios.get(`https://vapi.vnappmob.com/api/province/district/` + e.target.value)
            .then(function(response) {
                district.html(' <option>-- Chọn quận huyện--</option>')
                for (let i = 0; i < response.data.results.length; i++) {
                    district.append(`<option value="${response.data.results[i].district_id}">${response.data.results[i].district_name}</option>`)
                }
            })
            .catch(function(error) {

            })
    });
    district.change(function(e) {
        axios.get(`https://vapi.vnappmob.com/api/province/ward/` + e.target.value)
            .then(function(response) {
                village.html(' <option>-- Chọn phưỡng xã--</option>')
                for (let i = 0; i < response.data.results.length; i++) {
                    village.append(`<option value="${response.data.results[i].ward_name}">${response.data.results[i].ward_name}</option>`)
                }
            })
            .catch(function(error) {

            })
    });
</script>
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
                <h4 class="modal-title">Thông báo</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <p><span class="text-primary">{{Session::get('message')}}</span> {{Session::put('message',null)}}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
            </div>
        </div>
    </div>
</div>
@endsection