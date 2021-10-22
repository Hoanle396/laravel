@extends('welcome')
@section('content')
<div class="container mb-5 pb-5">
    <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="{{asset('acesst/image/checkout.png') }}" alt="" width="72" height="72">
        <h2>Thanh Toán</h2>
        <p class="lead">Vui lòng điền các thông tin bên dưới để tiếp tục thanh toán.</p>
        <?php

        use Illuminate\Support\Facades\Session;

        $message = Session::get('message');
        if (Session::get('message')) {
            echo '<h4><span class="text-primary">' . $message . '</span></h4>';
            Session::put("message", null);
        }
        ?>
        @if(Session::get('redirect'))
        <?php Session::put('redirect', null); ?>
        <script>
            setTimeout(function() {
                window.location = "{{URL::to('Bank')}}";
            }, 5000)
        </script>
        @endif
    </div>
    <div class="row">
        <div class="col-md-4 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Giỏ Hàng</span>
            </h4>
            <ul class="list-group mb-3">
                <?php $total = 0; ?>
                @foreach(session('cart') as $id => $details)
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">{{ $details['name'] }}</h6>
                        <small class="text-muted">số lượng: {{$details['quantity']}}</small>
                    </div>
                    <span class="text-muted">$ {{$details['price']*$details['quantity']}}</span>
                </li>
                <?php $total += $details['price'] * $details['quantity'] ?>
                @endforeach
                <li class="list-group-item d-flex justify-content-between">
                    <span>Tổng</span>
                    <strong>$ <?=$total ?></strong>
                    <?php if ($message) {
                        Session::put("cart", null);
                    } ?>
                </li>
            </ul>
        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Thanh Toán</h4>
            <form class="needs-validation" action="{{URL::to('Checkout/success')}}" method="post">
                {{csrf_field()}}
                <div class="mb-3">
                    <label for="username">Họ Và Tên</label>
                    <div class="input-group">
                        <input type="text" class="form-control" name="fullname" value="{{$account->user_fullname}}" placeholder="Họ Và tên" required>
                        <div class="invalid-feedback" style="width: 100%;">
                            Bạn Cần Nhập Họ Tên Của Bạn.
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email">Email </label>
                    <input type="email" class="form-control" id="email" name="email" value="{{$account->user_email}}" placeholder="you@example.com" required>
                    <div class="invalid-feedback">
                        Bạn Cần Nhập Email Của Bạn.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Địa Chỉ</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{$account->user_address}}" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                        Bạn Cần Nhập Địa Chỉ Nhập Hàng Của Bạn.
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address2">Địa Chỉ 2 </label>
                    <input type="text" class="form-control" id="address2" name="address2" placeholder="Apartment or suite">
                </div>
                <div class="mb-3">
                    <label for="address"> Số Điện Thoại</label>
                    <input type="text" class="form-control" id="phonenumber" name="phonenumber" value="{{$account->user_phonenumber}}" placeholder="+84" required>
                    <div class="invalid-feedback">
                        Bạn Cần Nhập Số Điện Thoại Của Bạn.
                    </div>
                </div>
                <hr class="mb-4">
                <div class="row">
                    <div class="col-6">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="pay" value="offline">Thanh Toán Khi Nhận Hàng</button>
                    </div>
                    <div class="col-6">
                        <input type="hidden" name="total" value="<?=$total?>">
                        <button class="btn btn-primary btn-lg btn-block" type="submit" name="pay" value="online">Thanh Toán Trực Tuyến</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
