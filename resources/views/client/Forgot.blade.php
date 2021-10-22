@extends('welcome')
@section('content')
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Password Recovery</h3>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-12 text-center">
                            <?php

                            use Illuminate\Support\Facades\Session;

                            $message = Session::get('message');
                            if (Session::get('message')) {
                                echo '<h6><span class="text-primary">' . $message . '</span></h6>';
                                Session::put("message", null);
                            }
                            ?>
                        </div>
                    </div>
                    <div class="small mb-3 text-muted">Nhập Email Và Chúng Tôi Sẽ Gửi Mật Khẩu Mới Đến Email Của Bạn!</div>
                    <form action="{{URL::to('Auth/Forgoted')}}" method="get">
                        <div class="form-floating mb-3">
                            <input class="form-control" name="inputEmail" id="inputEmail" type="email" placeholder="name@example.com" />
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <a class="small" href="Login">Return to login</a>
                            <button class="btn btn-primary" type="submit">Reset Password</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="Register">Need an account? Sign up!</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
