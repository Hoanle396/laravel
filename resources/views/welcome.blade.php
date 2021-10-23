<!DOCTYPE html>
<html lang="en" ">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ĐỒ ÁN CƠ SỞ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link href="{{asset('acesst/css/styles.css')}}" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
</head>

<body onload="myFunction()" >
     <div >
        <img id="loading" style="display: none;" src="{{asset('acesst/image/load.gif')}}" alt="">
    </div>
    <div id="myDiv">
        <div class="header container" id="header-top">
            <a class="navbar-brand " type="button"><i class="fas text-info fa-clock ml-1"> </i> <?php echo date("F d, Y "); ?></a>
            <a class="navbar-toggler float-right" type="button" href="tel:0345648638">+84 345 648 638<i class="fas fa-phone ml-1"></i></a>
        </div>
        <nav class="navbar navbar-expand-lg navbar-light header__produce" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="{{('')}}"><img src="{{asset('acesst/image/image.png')}}" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{URL::to('./')}}"><i class="fas fa-home mr-2"></i>Trang Chủ</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{URL::to('Auth/Product')}}">Sản Phẩm</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{URL::to('Auth/Service')}}">Tư vấn</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{URL::to('Auth/Tintuc')}}">Tin Tức</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{URL::to('Auth/Help')}}">Phản Hồi</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{URL::to('Auth/Profile')}}">Tài Khoản</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <header>
            <div class="row ">
                <div class="col-md-5 pt-5 pb-5" id="vaccine" style="background-color: deepskyblue ;">
                    <div class="text-justify ml-5">
                        <h2 class='text-white text-uppercase'>
                            Đăng kí vaccine covid-19
                        </h2 class='text-white'>
                        <p class='text-white'><i class="fas fa-check"></i>Đăng kí miễn phí trong 5 phút.</p>
                        <p class='text-white'><i class="fas fa-check"></i>Áp dụng với độ tuổi 12 trở lên.</p>
                        <p class='text-white'><i class="fas fa-check"></i>Nhận thông tim tiêm qua cuộc gọi khi đến lượt.</p>
                    </div>
                </div>
                <div class="col-xl-7 pl-0 ml-0 col-md-12" id="chungtay"><img class="pl-0 ml-0 img-fluid " src="{{asset('acesst/image/thietbibaohoyte-banner.png')}}" alt=""></div>
            </div>
        </header>
          @yield('content')
        <footer class="footer" id="fh5co-footer">
            <div class="container">
                <div class="row row-pb-md">
                    <div class="col-sm-12 col-lg-3  mb-4 fh5co-widget">
                        <img src="{{asset('acesst/image/image.png') }}" alt="">
                    </div>
                    <div class="col-6 col-lg-3 col-sm-4 mb-4 active">
                        <ul class="fh5co-footer-links">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Contact</a></li>
                            <li><a href="#">Terms</a></li>
                            <li><a href="#">Meetups</a></li>
                        </ul>
                    </div>

                    <div class="col-6 col-lg-3 col-sm-4 mb-4 active">
                        <ul class="fh5co-footer-links">
                            <li><a href="#">Facebook</a></li>
                            <li><a href="#">Instagram</a></li>
                            <li><a href="#">Youtube</a></li>
                            <li><a href="#">Whatsapp</a></li>
                            <li><a href="#">Linkedin</a></li>
                        </ul>
                    </div>

                    <div class="col-lg-3 col-sm-4 mb-4 active">
                        <ul class="fh5co-footer-links">
                            <li><a href="#">Email: abc@danang.com </a></li>
                            <li><a href="#">SĐT: 0345648638 </a></li>
                            <li><a href="#">Adress:470 Tran Dai Nghia, Quan Ngu Hanh Son</a></li>
                            <li><a href="#">Fax : 0345648638</a></li>
                        </ul>
                    </div>

                </div>

                <div class="row copyright">
                    <div class="col-lg-12 col-sm-12 mb-12 text-center">
                        <p>
                            <small class="block">VIETNAM-KOREA UNIVERSITY OF INFORMATIONAND COMMUNICATION TECHNOLOGY </small> <br>
                            <small class="block">2021 &copy; All Rights Reserved.</small>
                        </p>
                        <ul class="fh5co-social-icons">
                            <li><a href="#"><i class="fab fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                            <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </footer>
    </div>
</body>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->
<script src="{{asset('acesst/js/script.js')}}"></script>
<script>
    AOS.init();
</script>

</html>
