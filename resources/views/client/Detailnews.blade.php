@extends('welcome')
@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-lg-8">
            <div class="row" id="item">
                <article>
                    <header class="mb-4">
                        <h1 class="fw-bolder mb-1">{{$news->news_title}}</h1>
                        <div class="text-muted fst-italic mb-2">time :{{$news->created_at}}</div>
                    </header>
                    <figure class="mb-4"><img class="img-fluid rounded" src="{{$news->news_image}}" alt="..." /></figure>
                    <section class="mb-5">
                        <p class="fs-5 mb-4 text-justify">{{$news->news_description}}</p>
                    </section>
                </article>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="card mb-4 ml-5">
                <div class="card-header">Search</div>
                <div class="card-body">
                    <form action="" method="get">
                        <div class="input-group">
                            <input class="form-control" type="text" id="input-search" placeholder="Enter search term..." aria-label="Enter search term..." />
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-search ml-3" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $('#input-search').keyup(function() {
        if ($("#input-search").val() != '') {
            $.ajax({
                url: '{{URL::to("Auth/Tintuc/Search/")}}/' + $("#input-search").val(),
                method: "GET",
                success: function(data) {

                    var item = '';
                    for (var pro of data['data']) {
                        item += '<div class="col-lg-6">';
                        item += ' <div class="card mb-4">';
                        item += '<a href="#!"><img class="card-img-top" src="' + pro.news_image + '" alt="..." /></a>';
                        item += '<div class="card-body">';
                        item += '<div class="small text-muted">' + pro.created_at + '</div>';
                        item += '<h2 class="card-title h4">' + pro.news_title + '</h2>';
                        item += '<a class="btn btn-primary" href="{{URL::to("Auth/Tintuc/")}}/' + pro.news_id + '">Read more →</a>';
                        item += '</div>';
                        item += '</div>';
                        item += '</div>';
                    }
                    $('#item').html(item);
                    console.log(item);
                }
            });
        } else {
            window.location.reload(true);
        }
    });
</script>
@endsection
