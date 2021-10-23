@extends('welcome')
@section('content')
<div class="container">
    <div class="modal-header">
        <h4 class="modal-title">ĐĂNG KÝ</h4>
    </div>
    <div class="modal-body">
        <div class="progressing hidden"> <i class="fa fa-spinner fa-spin"></i> </div>
        <div class="row">
            <div class="col-md-5">
                <h3>Dịch vụ y tế từ xa dành cho bệnh nhân COVID-19</h3>
            </div>
            <div class="col-md-7 col-offset-5">
                <h5>Vui lòng điền vào thông tin bên dưới</h5>
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
                <form class="form-horizontal" action="{{URL('Auth/service')}}" method="post">
                    {{csrf_field()}}
                    <div class="form-group row form__first-last-name row-eq-height">
                        <div class="col-md-6"> <input type="text" name="firstName" class="form-control" placeholder="Tên" required="true"> </div>
                        <div class="col-md-6"> <input type="text" name="lastName" class="form-control" placeholder="Họ" required="true"> </div>
                    </div>
                    <div class="form-group row form__first-last-name">
                        <div class="col-md-6">
                            <select name="gender" class="form-control">
                                <option value="Nam">Nam</option>
                                <option value="Nữ">Nữ</option>
                            </select>
                        </div>
                        <div class="col-md-6"> <input type="date" name="birthday" class="form-control datepicker--date-of-birth" placeholder="Ngày Sinh" class="datepicker" required="true" style="background:white;"> </div>
                    </div>
                    <div class="form-group row form__first-last-name">
                        <div class="col-md-12">
                            <select name="address" class="form-control">
                                <option value=""> Tỉnh / Thành Phố </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row form__first-last-name">
                        <div class="col-md-6"> <input type="email" name="email" class="form-control" placeholder="Thư điện tử: default@example.com" required="true"> </div>
                        <div class="col-md-6"> <input type="text" name="mobilePhone" class="form-control" placeholder="Điện Thoại Di Động" required="true" pattern=".{10,}" title="Ten or more numbers"> </div>
                    </div>
                    <div class="form-group row form__home-office-phone">
                        <div class="col-md-6"> <input type="text" name="homePhone" class="form-control" placeholder="Điện Thoại Nơi Ở" pattern=".{10,}" title="Ten or more numbers"> </div>
                        <div class="col-md-6"> <input type="text" name="officePhone" class="form-control" placeholder="Điện Thoại Nơi Làm Việc" pattern=".{10,}" title="Ten or more numbers"> </div>
                    </div>
                    <div class="center-content"> <input type="submit" class="btn btn-success" value="Gửi" /> </div>
                </form>
            </div>
        </div>
        <div class="row success-submition hidden">
            <div class="col-md-12">
                <div>
                    <p>Mến Gửi <span class="full-name"></span>,</p>
                    <p>Cảm ơn bạn đã gửi yêu cầu đặt hẹn khám tại </p>
                    <p>Nhân viên phụ trách đặt hẹn của chúng tôi nhận được yêu cầu từ bạn và sẽ gửi email cho bạn để xác nhận cuộc hẹn này <strong>trong vòng hai ngày làm việc</strong>.</p>
                    <p>Xin vui lòng hiểu rằng lịch hẹn này có thể thay đổi tùy theo lịch làm việc còn trống của bác sĩ.</p>
                    <p>Để biết thêm thông tin chi tiết, xin vui lòng liên hệ Dịch vụ đặt hẹn theo số điện thoại <span class="text-primary"> +84 345 648 638 từ 8g00 sáng đến 5g00 chiều từ thứ Hai đến thứ Sáu; và 8g00 sáng đến 12g00 ngày thứ Bảy</span>.</p>
                    <p>Cảm ơn bạn đã tin tưởng chọn <strong>Chúng Tôi</strong> là nơi cung cấp dịch vụ chăm sóc sức khỏe của mình!</p>
                    <p>Trân trọng,</p>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script>
    var city = $('select[name="address"]')

    $(document).ready(function() {
        axios.get('https://vapi.vnappmob.com/api/province/')
            .then(function(response) {
                for (let i = 0; i < response.data.results.length; i++) {
                    city.append(`<option value="${response.data.results[i].province_name}">${response.data.results[i].province_name}</option>`)
                }
            })
            .catch(function(error) {

            })
    });
</script>
@endsection
