@extends('welcome')
@section('content')
<div class="container mb-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Login</h3>
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
                    <form action="{{ URL::to('/Login')}}" id="login" method="POST">
                        <div class="form-floating mb-3" id="regis">
                        </div>
                        {{csrf_field()}}
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputEmail" value="{{ Cookie::get('Email') }}" name="inputEmail" type="email" placeholder="name@example.com" required />
                            <label for="inputEmail">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="inputPassword" value="{{ Cookie::get('Password') }}" name="inputPassword" type="password" placeholder="Password" required />
                            <label for="inputPassword">Password</label>
                        </div>
                        <div class="form-check mb-3">
                            <input class="form-check-input" name="inputRememberPassword" type="checkbox" value="inputRememberPassword" />
                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                            <a class="small" href="Forgot">Forgot Password?</a>
                            <button class="btn btn-primary">Login</button>
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
