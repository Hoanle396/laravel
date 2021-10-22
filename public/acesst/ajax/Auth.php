<?php 
    require_once("../../config/config.php");
    require_once("../../config/function.php");
 $data='fff';
    if($_POST['type'] == 'Login' )
    {
        $username = $_POST['email'];
        $password = $_POST['password'];
        if(!$CMSNT->get_row(" SELECT * FROM `users` WHERE `username` = '$username' "))
        {
            $data= msg_error2('Tên đăng nhập không tồn tại');
        }
        if($CMSNT->get_row(" SELECT * FROM `users` WHERE `username` = '$username' AND `banned` = '1' "))
        {
            $data= msg_error2('Tài khoản này đã bị khóa bởi BQT');
        }
        if(!$CMSNT->get_row(" SELECT * FROM `users` WHERE `username` = '$username' AND `password` = '$password' "))
        {
            $data= msg_error2('Mật khẩu đăng nhập không chính xác');
        }
        $_SESSION['username'] = $username;
        //$data= msg_success('Đăng nhập thành công ', BASE_URL(''), 0);
        $data="test";
     
    }

    echo $data;
    // if($_POST['type'] == 'Register' )
    // {
    //     $username = check_string($_POST['username']);
    //     $password = check_string($_POST['password']);
    //     $email = check_string($_POST['email']);
    //     if(empty($username))
    //     {
    //         msg_error2("Vui lòng nhập tên tài khoản !");
    //     }
    //     if(check_username($username) != True)
    //     {
    //         msg_error2('Vui lòng nhập định dạng tài khoản hợp lệ');
    //     }
    //     if(strlen($username) < 5 || strlen($username) > 64)
    //     {
    //         msg_error2('Tài khoản phải từ 5 đến 64 ký tự');
    //     }
    //     if($CMSNT->get_row(" SELECT * FROM `users` WHERE `username` = '$username' "))
    //     {
    //         msg_error2('Tên đăng nhập đã tồn tại!');
    //     }
    //     if(empty($email))
    //     {
    //         msg_error2("Vui lòng nhập email !");
    //     }
    //     if(check_email($email) != True)
    //     {
    //         msg_error2("Định dạng Email không hợp lệ !");
    //     }
    //     if($CMSNT->get_row(" SELECT * FROM `users` WHERE `email` = '$email' "))
    //     {
    //         msg_error2('Email đã tồn tại trong hệ thống ');
    //     }
    //     if(empty($password))
    //     {
    //         msg_error2("Vui lòng nhập mật khẩu !");
    //     }
    //     if(strlen($password) < 5)
    //     {
    //         msg_error2('Vui lòng đặt mật khẩu trên 4 ký tự');
    //     }
    //     if($CMSNT->num_rows(" SELECT * FROM `users` WHERE `ip` = '".myip()."' ") > 3)
    //     {
    //         msg_error2('Bạn đã đạt giới hạn tạo tài khoản');
    //     }
    //     $create = $CMSNT->insert("users", [
    //         'username'      => $username,
    //         'email'         => $email,
    //         'password'      => TypePassword($password),
    //         'token'         => random('qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM', 64),
    //         'level'         =>'client',
    //         'money'         => 0,
    //         'used_money'    => 0,
    //         'total_money'   => 0,
    //         'banned'        => 0,
    //         'ref'           => $_SESSION['ref'],
    //         'ref_click'     =>0,
    //         'ip'            => myip(),
    //         'time'          => time(),
    //         'createdate'    => gettime()
    //     ]);
    //     if ($create)
    //     {   
    //         $_SESSION['username'] = $username;
    //         msg_success('Tạo tài khoản thành công', BASE_URL(''), 1000);
    //     }
    //     else
    //     {
    //         msg_error2('Vui lòng kiểm tra cấu hình DATABASE');
    //     }
    // }


    // if($_POST['type'] == 'ForgotPassword' )
    // {
    //     $email = check_string($_POST['email']);
    //     if(empty($email))
    //     {
    //         msg_error2("Vui lòng nhập địa chỉ email vào ô trống");
    //     }
    //     if(check_email($email) != True) 
    //     {
    //         msg_error2('Vui lòng nhập địa chỉ email hợp lệ');
    //     }
    //     $row = $CMSNT->get_row(" SELECT * FROM `users` WHERE `email` = '$email' ");
    //     if(!$row)
    //     {
    //         msg_error2('Địa chỉ email không tồn tại trong hệ thống');
    //     }
    //     $otp = random('0123456789QWERTYUIOPASDGHJKLZXCVBNM', '6');
    //     $CMSNT->update("users", array(
    //         'otp' => $otp
    //     ), " `id` = '".$row['id']."' " );
    //     $guitoi = $email;   
    //     $subject = 'XÁC NHẬN KHÔI PHỤC MẬT KHẨU';
    //     $bcc = $CMSNT->site('tenweb');
    //     $hoten ='Client';
    //     $noi_dung = '<h3>Có ai đó vừa yêu cầu khôi phục lại mật khẩu bằng Email này, nếu là bạn vui lòng nhập mã xác minh phía dưới để xác minh tài khoản</h3>
    //     <table>
    //     <tbody>
    //     <tr>
    //     <td style="font-size:20px;">OTP:</td>
    //     <td><b style="color:blue;font-size:30px;">'.$otp.'</b></td>
    //     </tr>
    //     </tbody>
    //     </table>';
    //     sendCSM($guitoi, $hoten, $subject, $noi_dung, $bcc);   
    //     msg_success('Chúng tôi đã gửi mã xác minh vào địa chỉ Email của bạn !', BASE_URL('Auth/ChangePassword'), 4000);
    // }

    // if($_POST['type'] == 'ChangePassword')
    // {
    //     $otp = check_string($_POST['otp']);
    //     $repassword = check_string($_POST['repassword']);
    //     $password = check_string($_POST['password']);
    //     if(empty($otp))
    //     {
    //         msg_error2("Bạn chưa nhập OTP");
    //     }
    //     if(empty($password))
    //     {
    //         msg_error2("Bạn chưa nhập mật khẩu mới");
    //     }
    //     if(empty($repassword))
    //     {
    //         msg_error2("Vui lòng xác minh lại mật khẩu");
    //     }
    //     $row = $CMSNT->get_row(" SELECT * FROM `users` WHERE `otp` = '$otp' ");
    //     if(!$row)
    //     {
    //         msg_error2("OTP không tồn tại trong hệ thống");
    //     }
    //     if($password != $repassword)
    //     {
    //         msg_error2("Nhập lại mật khẩu không đúng");
    //     }
    //     if(strlen($password) < 5)
    //     {
    //         msg_error2('Vui lòng nhập mật khẩu có ích nhất 5 ký tự');
    //     }
    //     $CMSNT->update("users", [
    //         'otp' => NULL,
    //         'password' => TypePassword($password)
    //     ], " `id` = '".$row['id']."' ");
    
    //     msg_success2("Mật khẩu của bạn đã được thay đổi thành công !");
    // }

    // if($_POST['type'] == 'DoiMatKhau')
    // {
    //     if($CMSNT->site('status_demo') == 'ON')
    //     {
    //         msg_error2("Chức năng này không khả dụng trên trang web DEMO!");
    //     }
    //     $repassword = check_string($_POST['repassword']);
    //     $password = check_string($_POST['password']);
    //     if(empty($password))
    //     {
    //         msg_error2("Bạn chưa nhập mật khẩu mới");
    //     }
    //     if(empty($repassword))
    //     {
    //         msg_error2("Vui lòng xác minh lại mật khẩu");
    //     }
    //     if($password != $repassword)
    //     {
    //         msg_error2("Nhập lại mật khẩu không đúng");
    //     }
    //     if(strlen($password) < 5)
    //     {
    //         msg_error2('Vui lòng nhập mật khẩu có ích nhất 5 ký tự');
    //     }
    //     $row = $CMSNT->get_row(" SELECT * FROM `users` WHERE `username` = '".$_SESSION['username']."' ");
    //     if(!$row)
    //     {
    //         msg_error("Vui lòng đăng nhập!", BASE_URL(''), 2000);
    //     }
    //     $CMSNT->update("users", [
    //         'otp' => NULL,
    //         'password' => TypePassword($password)
    //     ], " `id` = '".$row['id']."' ");
    //     msg_success("Mật khẩu của bạn đã được thay đổi thành công !", "", 1000);
    // }