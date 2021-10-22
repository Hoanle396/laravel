@extends('welcome')
@section('content')
<section id="load">
    <section class="page-section" id="myDiv">
        <div class="container">
            <div class="row">
                <div class="wpb_column column_container col-lg-3 col-sm-6">
                    <div class="ult-just-icon-wrapper ">
                        <div class="align-icon" style="text-align:center;">
                            <div class="aio-icon-img " style="font-size:100px;display:inline-block;">
                                <img class="img-icon img-fluid" alt="null" src="acesst/image/kienthuc-1-e1610128990263.jpg" data-pin-no-hover="true">
                            </div>
                        </div>
                    </div>
                    <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                            <p style="text-align: center;">
                                <span style="color: #000000;"><strong>Đội ngũ y bác sĩ có <span style="color: #ff0000;">Kiến Thức</span> tốt</strong></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="wpb_column column_container col-lg-3 col-sm-6">
                    <div class="ult-just-icon-wrapper ">
                        <div class="align-icon" style="text-align:center;">
                            <div class="aio-icon-img " style="font-size:100px;display:inline-block;">
                                <img class="img-icon img-fluid" alt="null" src="acesst/image/kynang-e1610098049636.jpg" data-pin-no-hover="true">
                            </div>
                        </div>
                    </div>
                    <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                            <p style="text-align: center;">
                                <span style="color: #000000;"><strong><span style="color: #ff0000;">Kỹ Năng </span>thực hiện có tính tỉ mỉ</strong></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="wpb_column column_container col-lg-3 col-sm-6">
                    <div class="ult-just-icon-wrapper ">
                        <div class="align-icon" style="text-align:center;">
                            <div class="aio-icon-img " style="font-size:100px;display:inline-block;">
                                <img class="img-icon img-fluid" alt="null" src="acesst/image/tantam-e1610098064895.jpg" data-pin-no-hover="true">
                            </div>
                        </div>
                    </div>
                    <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                            <p style="text-align: center;">
                                <span style="color: #000000;"><strong><span style="color: #ff0000;">Tận Tâm </span>đến sức khỏe bệnh nhân</strong></span>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="wpb_column column_container col-lg-3 col-sm-6">
                    <div class="ult-just-icon-wrapper ">
                        <div class="align-icon" style="text-align:center;">
                            <div class="aio-icon-img " style="font-size:100px;display:inline-block;">
                                <img class="img-icon img-fluid" alt="null" src="acesst/image/trachnhiem-e1610098082976.jpg" data-pin-no-hover="true">
                            </div>
                        </div>
                    </div>
                    <div class="wpb_text_column wpb_content_element ">
                        <div class="wpb_wrapper">
                            <p style="text-align: center;">
                                <span style="color: #000000;"><strong>Hoàn thành <span style="color: #ff0000;">Trách Nhiệm </span></strong></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="bg-primary col-12">
            <div class="container"><b class="text-uppercase">Quan Tâm <i class="fas fa-bars ml-1"></i></b></div>
        </div>
        <div class="container mt-5 mb-5">
            <div class="row" data-aos="fade-up" data-aos-anchor-placement="top-center">
                <div class="col-6 col-lg-3 ">
                    <div class="text-center partner__rewiew-option-hotel">
                        <img src="acesst/image/đăng ký tiêm.png" width="50" class="mb-2" height="50" alt="">
                        <p class="mt-2"><b>Đăng kí tiêm</b></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3 ">
                    <div class="text-center">
                        <img src="acesst/image/tra cứu.png" width="50" class="mb-2" height="50" alt="">
                        <p class="mt-2"><b>Tra cứu</b></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3 ">
                    <div class="text-center">
                        <img src="acesst/image/tư vấn.png" width="50" class="mb-2" height="50" alt="">
                        <p class="mt-2"><b>Tư vấn</b></p>
                    </div>
                </div>
                <div class="col-6 col-lg-3 ">
                    <div class="text-center">
                        <img src="acesst/image/quyên góp.png" width="50" class="mb-2" height="50" alt="">
                        <p class="mt-2"><b>Quyên góp</b></p>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6 pr-5 mt-4" data-aos="fade-up-right">
                    <div>
                        <h3>Chương trình tiêm chủng !</h3>
                        <p class="text-muted">Chương trình tiêm chủng covid-19 là tự nguyện được áp dụng với tất cả người dân Việt Nam.Tất cả những người trên 12 tuổi hiện có thể đăng kí. Đối với những cá nhân dưới 18 tuổi không trực tiếp đăng kí thì cha mẹ hoặc người giám hộ có thể thay mặt đăng kí.</p>
                        <a href="{{URL::to('Auth/Service')}}" class=" btn btn-primary mt-3 register">Đăng kí ngay</a>
                    </div>
                </div>
                <div class="col-md-6 pb-4" data-aos="fade-up-left">
                    <div class="myslider">
                        <div class="slide">
                            <div class="col-sm-12">
                                <div class="rounded "><img class="img-fluid rounded" src="acesst/image/Comirnaty.jpg" alt=""></div>
                            </div>
                        </div>

                        <div class="slide">
                            <div class="col-sm-12">
                                <div class="rounded"><img class="img-fluid rounded" src="acesst/image/Comirnaty.jpg" alt=""></div>
                            </div>
                        </div>

                        <div class="slide">
                            <div class="col-sm-12">
                                <div class=" rounded"><img src="acesst/image/Gam-COVID-Vac.jpg" alt="" class="rounded img-fluid"></div>
                            </div>
                        </div>

                        <div class="slide">
                            <div class="col-sm-12">
                                <div class="rounded"><img src="acesst/image/Spikevax.jpg" alt="" class="rounded img-fluid"></div>
                            </div>
                        </div>

                        <div class="slide">
                            <div class="col-sm-12">
                                <div class="rounded"><img src="acesst/image/Vero Cell.jpg" alt="" class=" rounded img-fluid"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mt-3 mb-3 ">
            <div class="pl-3">
                <h3 class="mb-4">Đăng kí với 4 bước đơn giản</h3>
            </div>
            <div class="row">
                <div class="col-sm-6 mb-4" data-aos="fade-down-left">
                    <div class=""><img src="acesst/image/signup.svg" width="400" height="400" alt="" class="img-fluid"></div>
                </div>
                <div class="col-sm-6 mb-4" data-aos="fade-down-right">
                    <div class="row">
                        <div class="col-2 d-flex align-items-center">
                            <div class="w-100">
                                <img class="img-icon img-fluid" alt="null" src="acesst/image/icon1.svg" data-pin-no-hover="true">
                            </div>
                        </div>
                        <div class="col-10">
                            <div>
                                <p class="mb-1 mt-1 text-success">Bước 1 </p>
                                <h5 class=" mb-1">Thông tin cá nhân</h5>
                                <p class="text-muted">Điền các thông tin cá nhân vào biểu mẫu. Sau khi hoàn thành chuyển qua bước 2!</p>
                            </div>
                        </div>
                    </div>

                    <div class="row ">
                        <div class="col-2 d-flex align-items-center">
                            <div class="w-100">
                                <img class="img-icon img-fluid" alt="null" src="acesst/image/icon2.svg" data-pin-no-hover="true">
                            </div>
                        </div>
                        <div class="col-10">
                            <div>
                                <p class="mb-1 mt-1 text-success">Bước 2 </p>
                                <h5 class=" mb-1">Thông tin về tiền sử bệnh</h5>
                                <p class="text-muted">Hệ thống sẽ liệt kê các tiền sự bệnh có liên quan đến việc tiêm vac xin để bạn lựa chọn (có hoặc không)!</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2 d-flex align-items-center">
                            <div class="w-100">
                                <svg width="55" height="55" fill="none">
                                    <path d="M40 22.5v5.85C40 34.775 34.775 40 28.35 40a11.702 11.702 0 01-8.225-3.4L10 26.475A4.998 4.998 0 0113.55 25c1.275 0 2.55.5 3.525 1.475L20 29.4V15h5v2.5c0-1.375 1.125-2.5 2.5-2.5s2.5 1.125 2.5 2.5V20c0-1.375 1.125-2.5 2.5-2.5S35 18.625 35 20v2.5c0-1.375 1.125-2.5 2.5-2.5s2.5 1.125 2.5 2.5z" fill="#4DB5FF"></path>
                                    <path d="M25 0v15H5l-5 5V0h25z" fill="#80EAFF"></path>
                                    <path d="M12.5 10.97l3.424 1.8-.654-3.813 2.77-2.7-3.828-.557-1.713-3.469-1.712 3.47-3.828.555 2.77 2.7-.654 3.814 3.425-1.8z" fill="#4DB5FF"></path>
                                    <path d="M25 15h-5V7.5a2.5 2.5 0 015 0V15z" fill="#37F"></path>
                                </svg>
                            </div>
                        </div>
                        <div class="col-10">
                            <div>
                                <p class="mb-1 mt-1 text-success">Bước 3 </p>
                                <h5 class=" mb-1">Đồng ý tiêm</h5>
                                <p class="text-muted">Xác nhận các điều khoản và đồng ý tiêm chủng!</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-2 d-flex align-items-center">
                            <div class="w-100">
                                <img class="img-icon img-fluid" alt="null" src="acesst/image/icon4.svg" data-pin-no-hover="true">
                            </div>
                        </div>
                        <div class="col-10">
                            <div>
                                <p class="mb-1 mt-1 text-success">Bước 4 </p>
                                <h5 class=" mb-1">Hoàn thành</h5>
                                <p class="text-muted">Hệ thống sẽ gọi cho bạn để xác thực và tiến hành lên danh sách !</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>
<script>
    var myVar;

    function myFunction() {
        document.getElementById("loading").style.display = "block";
        document.getElementById("myDiv").style.display = "none";
        myVar = setTimeout(showPage, 2000);
    }

    function showPage() {
        document.getElementById("loading").style.display = "none";
        document.getElementById("myDiv").style.display = "block";
    }
</script>
@endsection
