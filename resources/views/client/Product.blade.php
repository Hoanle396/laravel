@extends('welcome')
@section('content')
<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row">
            <div class="col-8"></div>
            <div class="col-4 mb-3">
                <form method="GET">
                    <div class="input-group">
                        <input class="form-control" id="input-search" type="text" placeholder="Enter search term..." /> <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search ml-3" viewBox="0 0 16 16">
                            <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </div>
                </form>
            </div>
        </div>
        <div id="item" class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            @foreach($all_product as $key=> $product)
            <div class="col-md-3 mb-5">
                <div class="card h-100">
                    <img class="card-img-top" src="{{URL::to('/')}}{{$product->product_image}}" alt="..." />
                    <div class="card-body p-4">
                        <div class="text-center">
                            <h5 class="fw-bolder">{{$product->product_name}}</h5>
                            <div class="d-flex justify-content-center small text-warning mb-2">
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                                <div class="bi-star-fill"></div>
                            </div>
                            <span class="text-muted text-decoration-line-through">$ {{$product->product_price}}</span>
                        </div>
                    </div>
                    <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                        <div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{URL::to('Auth/Product/'.$product->product_id)}}">Xem Chi Tiết</a></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <div class="row">
            <div class="col-md-6"></div>
            <div class="col-md-6">
                {{$all_product->links()}}
            </div>
        </div>
    </div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#input-search').keyup(function() {
        if ($("#input-search").val() != '') {
            $.ajax({
                url: '{{URL::to("Auth/Search/")}}/' + $("#input-search").val(),
                method: "GET",
                success: function(data) {
                    var item = '';
                    for (var pro of data['data']) {
                        item += '<div class="col-md-3 mb-5">';
                        item += '<div class="card h-100">';
                        item += '<img class="card-img-top" src="' + pro.product_image + '" alt="..." />';
                        item += '<div class="card-body p-4">';
                        item += '<div class="text-center">';
                        item += '<h5 class="fw-bolder">' + pro.product_name + '</h5>,'
                        item += '<div class="d-flex justify-content-center small text-warning mb-2">';
                        item += '<div class="bi-star-fill"></div>';
                        item += '<div class="bi-star-fill"></div>';
                        item += '<div class="bi-star-fill"></div>';
                        item += '<div class="bi-star-fill"></div>';
                        item += '<div class="bi-star-fill"></div>';
                        item += '</div>';
                        item += '<span class="text-muted text-decoration-line-through">$ ' + pro.product_price + '</span>';
                        item += '</div>';
                        item += '</div>';
                        item += '<div class="card-footer p-4 pt-0 border-top-0 bg-transparent">';
                        item += '<div class="text-center"><a class="btn btn-outline-dark mt-auto" href="{{URL::to("Auth/Product/")}}' + pro.product_id + '">Xem Chi Tiết</a></div>';
                        item += '</div>';
                        item += '</div>';
                        item += '</div>';
                    }
                    $('#item').html(item);
                }
            });
        } else {
            window.location.reload(true);
        }
    });
</script>
@endsection
