@extends('welcome')
@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Tạo Tài Khoản</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-5">
                        <div class="col-12 text-center">
                            <?php
                            use Illuminate\Support\Facades\Session;
                            $message = Session::get('message');
                            if (Session::get('message')) {
                                echo '<h4><span class="text-primary">' . $message . '</span></h4>';
                                Session::put("message", null);
                            }
                            ?>
                        </div>
                    </div>

                    <form action="{{ URL::to('/Register')}}" method="post">
                        {{csrf_field()}}
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" name="inputFirstName" type="text" placeholder="Nhập họ của bạn" required />
                                    <label for="inputFirstName">Họ</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating">
                                    <input class="form-control" name="inputLastName" type="text" placeholder="Nhập tên của bạn" required />
                                    <label for="inputLastName">Tên</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" name="inputEmail" type="email" placeholder="name@example.com" required />
                            <label for="inputEmail">Email</label>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPassword" name="inputPassword" type="password" placeholder="Tạo mật khẩu" required />
                                    <label for="inputPassword">Mật Khẩu</label>
                                    <div id="Password"></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3 mb-md-0">
                                    <input class="form-control" id="inputPasswordConfirm" name="inputPasswordConfirm" type="password" placeholder="Nhập lại mật khẩu" required />
                                    <label for="inputPasswordConfirm">Nhập Lại Mật Khẩu</label>
                                    <div id="PasswordConfirm"></div>
                                </div>
                            </div>
                        </div>
                        <div class="mt-4 mb-0">
                            <div class="d-grid"><button class="btn btn-primary btn-block">Tạo Tài Khoản</button></div>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="Login">Đã có tài khoản ? Đăng Nhập</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#inputPassword').keyup(function() {
            var inputPassword = $('#inputPassword').val();
            if (inputPassword.length < 6) {
                $('#Password').html('<div class="text-danger text-center">Mật Phải Khẩu Từ 6 Kí Tự</div>');
            } else {
                $('#Password').html('<div class="text-success text-center">Mật Khẩu Hợp Lệ</div>');
            }
        });
        $('#inputPasswordConfirm').keyup(function() {
            var inputPassword = $('#inputPassword').val();
            var inputPasswordConfirm = $('#inputPasswordConfirm').val();
            if (inputPasswordConfirm != inputPassword) {
                $('#PasswordConfirm').html('<div class="text-danger text-center">Mật Khẩu Không khớp</div>');
            } else {
                $('#PasswordConfirm').html('<div class="text-success text-center">Mật Khẩu Hợp Lệ</div>');
            }
        });
    });
</script>

@endsection
