<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="card  border-0  mt-5">
                    <div class="card-body">
                        <div class="card-header">
                            <h3 class="text-center font-weight-light my-4">Lịch hẹn Y Tế</h3>
                        </div>
                        <div class="mb-3 text-muted">Xin Chào {{$service_fullname}}</div>
                        <div class="mb-3 text-muted">Bạn Có Lịch Hẹn Với Chúng Tôi vào<span class="text-danger bg-light"> {{$join_time}}</span> ngày <span class="text-danger bg-light">{{$join_date}}</span></div>
                        <div class="mb-3 text-muted">Địa Điểm: Trường Đại Học CNTT & TT Việt Hàn</div>
                        <div class="mb-3 text-muted">Ghi chú: <?=$join_description?$join_description:'Lịch hẹn gửi từ hệ thống'?> </div>
                        <div class="mb-3 text-muted">Rất Mong Bạn Đến Đúng Hẹn</div>
                        <div class="mb-3 text-muted">Trân Trọng ,</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
