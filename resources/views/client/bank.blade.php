@extends('welcome')
@section('content')
<div class="container mb-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-bold-light my-4">Hoàn Tất Thanh Toán</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-12 text-center">
                            <?php

                            use Illuminate\Support\Facades\Session;

                            $message = Session::get('message');
                            if (Session::get('message')) {
                                echo '<h4><span class="text-primary">' . $message . '</span></h4>';
                                Session::put("message", null);
                            } else {
                                echo '<h6><span class="text-primary">Bạn vui lòng chuyển tiền theo thông tin dưới đây</span></h6>';
                            }
                            ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3 col-12">
                            <label>Ngân hàng</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{$bank->bank_name}}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <label>Chủ tài Khoản</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{$bank->bank_auth}}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <label>Số tài khoản</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{$bank->bank_number}}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <label>Số tiền</label>
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{Session::get('total')}}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <label>Nội dung</label>
                            <div class="input-group">
                                <input type="text" class="form-control text-uppercase" value="{{Session::get('code')?Session::get('code'):'Có Lỗi Xảy Ra vui Lòng Quay Lại Trang Đặt Hàng'}}" disabled>
                            </div>
                        </div>
                        <div class="mb-3 col-12">
                            <div class="input-group">
                                <input type="button" id="done" class="btn btn-primary form-control" value="Xác Nhận Đã Chuyển Khoản">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $('#done').click(function() {
        alert("Cảm ơn bạn chúng tôi sẽ liên hệ với bạn sớm nhất có thể")
        <?php Session::put("total", null); ?>
        <?php Session::put("code", null); ?>
        setTimeout(function() {
                window.location = "{{URL::to('Auth/Profile')}}";
            }, 3000)
    })
</script>
@endsection
