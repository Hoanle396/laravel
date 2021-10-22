@extends('welcome')
@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 my-5">

        <div class="row gx-4 gx-lg-5 align-items-center">

            <div class="col-md-6"><img class="card-img-top mb-5 mb-md-0" src="{{URL::to('/')}}{{$product->product_image}}" alt="..." /></div>
            <div class="col-md-6">
                <div class="small mb-1">SKU: {{$product->product_id}}</div>
                <h1 class="display-5 fw-bolder">{{$product->product_name}}</h1>
                <div class="fs-5 mb-5">
                    <span class="text-decoration-line-through">$ {{$product->product_price}}</span>
                </div>
                <?=$product->product_description?>
                <p class="lead">Xuất Xứ: {{$product->product_origin}}</p>
                @if(Session::get('success'))
                    <h4 class="small mb-1 text-success">{{Session::get('success')}}</h4>
                    @endif
                <div class="d-flex">

                    <a class="btn btn-outline-dark flex-shrink-0" href="{{ URL::to('add-to-cart/'.$product->product_id) }}">
                        <i class="fa fa-shopping-cart me-1"></i>
                        Thêm Vào Giỏ Hàng
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Related items section-->
<section class="py-5 bg-light">
    <div class="container px-4 px-lg-5 mt-5">
        <h2 class="fw-bolder mb-4">Sản Phẩm Cùng Hãng</h2>
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($like as $key=> $likes)
            <div class="col mb-5">
                <div class="card h-100">
                    <!-- Product image-->
                    <img class="card-img-top" src="{{$likes->product_image}}" alt="..." />
                    <!-- Product details-->
                    <div class="card-body p-4">
                        <div class="text-center">
                            <!-- Product name-->
                            <h5 class="fw-bolder">{{$likes->product_name}}</h5>
                            <!-- Product price-->
                            {{$likes->product_price}}
                        </div>
                    </div>
                    <!-- Product actions-->
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{URL::to('Auth/Product/'.$likes->product_id)}}">Xem Chi Tiết</a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
<!-- Footer-->
@endsection
