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
                                <option value="Afghanistan"> Afghanistan </option>
                                <option value="Albania"> Albania </option>
                                <option value="Algeria"> Algeria </option>
                                <option value="American Samoa"> American Samoa </option>
                                <option value="Andorra"> Andorra </option>
                                <option value="Angola"> Angola </option>
                                <option value="Anguilla"> Anguilla </option>
                                <option value="Antarctica"> Antarctica </option>
                                <option value="Antigua and Barbuda"> Antigua and Barbuda </option>
                                <option value="Argentina"> Argentina </option>
                                <option value="Armenia"> Armenia </option>
                                <option value="Aruba"> Aruba </option>
                                <option value="Australia"> Australia </option>
                                <option value="Austria"> Austria </option>
                                <option value="Azerbaijan"> Azerbaijan </option>
                                <option value="Bahamas"> Bahamas </option>
                                <option value="Bahrain"> Bahrain </option>
                                <option value="Bangladesh"> Bangladesh </option>
                                <option value="Barbados"> Barbados </option>
                                <option value="Belarus"> Belarus </option>
                                <option value="Belgium"> Belgium </option>
                                <option value="Belize"> Belize </option>
                                <option value="Benin"> Benin </option>
                                <option value="Bermuda"> Bermuda </option>
                                <option value="Bhutan"> Bhutan </option>
                                <option value="Bolivia"> Bolivia </option>
                                <option value="Bosnia and Herzegowina"> Bosnia and Herzegowina </option>
                                <option value="Botswana"> Botswana </option>
                                <option value="Bouvet Island"> Bouvet Island </option>
                                <option value="Brazil"> Brazil </option>
                                <option value="British Indian Ocean Territory"> British Indian Ocean Territory </option>
                                <option value="Brunei Darussalam"> Brunei Darussalam </option>
                                <option value="Bulgaria"> Bulgaria </option>
                                <option value="Burkina Faso"> Burkina Faso </option>
                                <option value="Burundi"> Burundi </option>
                                <option value="Cambodia"> Cambodia </option>
                                <option value="Cameroon"> Cameroon </option>
                                <option value="Canada"> Canada </option>
                                <option value="Cape Verde"> Cape Verde </option>
                                <option value="Cayman Islands"> Cayman Islands </option>
                                <option value="Central African Republic"> Central African Republic </option>
                                <option value="Chad"> Chad </option>
                                <option value="Chile"> Chile </option>
                                <option value="China"> China </option>
                                <option value="Christmas Island"> Christmas Island </option>
                                <option value="Cocos (Keeling) Islands"> Cocos (Keeling) Islands </option>
                                <option value="Colombia"> Colombia </option>
                                <option value="Comoros"> Comoros </option>
                                <option value="Congo"> Congo </option>
                                <option value="Congo, the Democratic Republic of the"> Congo, the Democratic Republic of the </option>
                                <option value="Cook Islands"> Cook Islands </option>
                                <option value="Costa Rica"> Costa Rica </option>
                                <option value="Cote d'Ivoire"> Cote d'Ivoire </option>
                                <option value="Croatia (Hrvatska)"> Croatia (Hrvatska) </option>
                                <option value="Cuba"> Cuba </option>
                                <option value="Cyprus"> Cyprus </option>
                                <option value="Czech Republic"> Czech Republic </option>
                                <option value="Denmark"> Denmark </option>
                                <option value="Djibouti"> Djibouti </option>
                                <option value="Dominica"> Dominica </option>
                                <option value="Dominican Republic"> Dominican Republic </option>
                                <option value="East Timor"> East Timor </option>
                                <option value="Ecuador"> Ecuador </option>
                                <option value="Egypt"> Egypt </option>
                                <option value="El Salvador"> El Salvador </option>
                                <option value="Equatorial Guinea"> Equatorial Guinea </option>
                                <option value="Eritrea"> Eritrea </option>
                                <option value="Estonia"> Estonia </option>
                                <option value="Ethiopia"> Ethiopia </option>
                                <option value="Falkland Islands (Malvinas)"> Falkland Islands (Malvinas) </option>
                                <option value="Faroe Islands"> Faroe Islands </option>
                                <option value="Fiji"> Fiji </option>
                                <option value="Finland"> Finland </option>
                                <option value="France"> France </option>
                                <option value="France Metropolitan"> France Metropolitan </option>
                                <option value="French Guiana"> French Guiana </option>
                                <option value="French Polynesia"> French Polynesia </option>
                                <option value="French Southern Territories"> French Southern Territories </option>
                                <option value="Gabon"> Gabon </option>
                                <option value="Gambia"> Gambia </option>
                                <option value="Georgia"> Georgia </option>
                                <option value="Germany"> Germany </option>
                                <option value="Ghana"> Ghana </option>
                                <option value="Gibraltar"> Gibraltar </option>
                                <option value="Greece"> Greece </option>
                                <option value="Greenland"> Greenland </option>
                                <option value="Grenada"> Grenada </option>
                                <option value="Guadeloupe"> Guadeloupe </option>
                                <option value="Guam"> Guam </option>
                                <option value="Guatemala"> Guatemala </option>
                                <option value="Guinea"> Guinea </option>
                                <option value="Guinea-Bissau"> Guinea-Bissau </option>
                                <option value="Guyana"> Guyana </option>
                                <option value="Haiti"> Haiti </option>
                                <option value="Heard and Mc Donald Islands"> Heard and Mc Donald Islands </option>
                                <option value="Holy See (Vatican City State)"> Holy See (Vatican City State) </option>
                                <option value="Honduras"> Honduras </option>
                                <option value="Hong Kong"> Hong Kong </option>
                                <option value="Hungary"> Hungary </option>
                                <option value="Iceland"> Iceland </option>
                                <option value="India"> India </option>
                                <option value="Indonesia"> Indonesia </option>
                                <option value="Iran (Islamic Republic of)"> Iran (Islamic Republic of) </option>
                                <option value="Iraq"> Iraq </option>
                                <option value="Ireland"> Ireland </option>
                                <option value="Israel"> Israel </option>
                                <option value="Italy"> Italy </option>
                                <option value="Jamaica"> Jamaica </option>
                                <option value="Japan"> Japan </option>
                                <option value="Jordan"> Jordan </option>
                                <option value="Kazakhstan"> Kazakhstan </option>
                                <option value="Kenya"> Kenya </option>
                                <option value="Kiribati"> Kiribati </option>
                                <option value="Korea, Democratic People's Republic of"> Korea, Democratic People's Republic of </option>
                                <option value="Korea, Republic of"> Korea, Republic of </option>
                                <option value="Kuwait"> Kuwait </option>
                                <option value="Kyrgyzstan"> Kyrgyzstan </option>
                                <option value="Lao, People's Democratic Republic"> Lao, People's Democratic Republic </option>
                                <option value="Latvia"> Latvia </option>
                                <option value="Lebanon"> Lebanon </option>
                                <option value="Lesotho"> Lesotho </option>
                                <option value="Liberia"> Liberia </option>
                                <option value="Libyan Arab Jamahiriya"> Libyan Arab Jamahiriya </option>
                                <option value="Liechtenstein"> Liechtenstein </option>
                                <option value="Lithuania"> Lithuania </option>
                                <option value="Luxembourg"> Luxembourg </option>
                                <option value="Macau"> Macau </option>
                                <option value="Macedonia, The Former Yugoslav Republic of"> Macedonia, The Former Yugoslav Republic of </option>
                                <option value="Madagascar"> Madagascar </option>
                                <option value="Malawi"> Malawi </option>
                                <option value="Malaysia"> Malaysia </option>
                                <option value="Maldives"> Maldives </option>
                                <option value="Mali"> Mali </option>
                                <option value="Malta"> Malta </option>
                                <option value="Marshall Islands"> Marshall Islands </option>
                                <option value="Martinique"> Martinique </option>
                                <option value="Mauritania"> Mauritania </option>
                                <option value="Mauritius"> Mauritius </option>
                                <option value="Mayotte"> Mayotte </option>
                                <option value="Mexico"> Mexico </option>
                                <option value="Micronesia, Federated States of"> Micronesia, Federated States of </option>
                                <option value="Moldova, Republic of"> Moldova, Republic of </option>
                                <option value="Monaco"> Monaco </option>
                                <option value="Mongolia"> Mongolia </option>
                                <option value="Montserrat"> Montserrat </option>
                                <option value="Morocco"> Morocco </option>
                                <option value="Mozambique"> Mozambique </option>
                                <option value="Myanmar"> Myanmar </option>
                                <option value="Namibia"> Namibia </option>
                                <option value="Nauru"> Nauru </option>
                                <option value="Nepal"> Nepal </option>
                                <option value="Netherlands"> Netherlands </option>
                                <option value="Netherlands Antilles"> Netherlands Antilles </option>
                                <option value="New Caledonia"> New Caledonia </option>
                                <option value="New Zealand"> New Zealand </option>
                                <option value="Nicaragua"> Nicaragua </option>
                                <option value="Niger"> Niger </option>
                                <option value="Nigeria"> Nigeria </option>
                                <option value="Niue"> Niue </option>
                                <option value="Norfolk Island"> Norfolk Island </option>
                                <option value="Northern Mariana Islands"> Northern Mariana Islands </option>
                                <option value="Norway"> Norway </option>
                                <option value="Oman"> Oman </option>
                                <option value="Pakistan"> Pakistan </option>
                                <option value="Palau"> Palau </option>
                                <option value="Panama"> Panama </option>
                                <option value="Papua New Guinea"> Papua New Guinea </option>
                                <option value="Paraguay"> Paraguay </option>
                                <option value="Peru"> Peru </option>
                                <option value="Philippines"> Philippines </option>
                                <option value="Pitcairn"> Pitcairn </option>
                                <option value="Poland"> Poland </option>
                                <option value="Portugal"> Portugal </option>
                                <option value="Puerto Rico"> Puerto Rico </option>
                                <option value="Qatar"> Qatar </option>
                                <option value="Reunion"> Reunion </option>
                                <option value="Romania"> Romania </option>
                                <option value="Russian Federation"> Russian Federation </option>
                                <option value="Rwanda"> Rwanda </option>
                                <option value="Saint Kitts and Nevis"> Saint Kitts and Nevis </option>
                                <option value="Saint Lucia"> Saint Lucia </option>
                                <option value="Saint Vincent and the Grenadines"> Saint Vincent and the Grenadines </option>
                                <option value="Samoa"> Samoa </option>
                                <option value="San Marino"> San Marino </option>
                                <option value="Sao Tome and Principe"> Sao Tome and Principe </option>
                                <option value="Saudi Arabia"> Saudi Arabia </option>
                                <option value="Senegal"> Senegal </option>
                                <option value="Seychelles"> Seychelles </option>
                                <option value="Sierra Leone"> Sierra Leone </option>
                                <option value="Singapore"> Singapore </option>
                                <option value="Slovakia (Slovak Republic)"> Slovakia (Slovak Republic) </option>
                                <option value="Slovenia"> Slovenia </option>
                                <option value="Solomon Islands"> Solomon Islands </option>
                                <option value="Somalia"> Somalia </option>
                                <option value="South Africa"> South Africa </option>
                                <option value="South Georgia and the South Sandwich Islands"> South Georgia and the South Sandwich Islands </option>
                                <option value="Spain"> Spain </option>
                                <option value="Sri Lanka"> Sri Lanka </option>
                                <option value="St. Helena"> St. Helena </option>
                                <option value="St. Pierre and Miquelon"> St. Pierre and Miquelon </option>
                                <option value="Sudan"> Sudan </option>
                                <option value="Suriname"> Suriname </option>
                                <option value="Svalbard and Jan Mayen Islands"> Svalbard and Jan Mayen Islands </option>
                                <option value="Swaziland"> Swaziland </option>
                                <option value="Sweden"> Sweden </option>
                                <option value="Switzerland"> Switzerland </option>
                                <option value="Syrian Arab Republic"> Syrian Arab Republic </option>
                                <option value="Taiwan, Province of China"> Taiwan, Province of China </option>
                                <option value="Tajikistan"> Tajikistan </option>
                                <option value="Tanzania, United Republic of"> Tanzania, United Republic of </option>
                                <option value="Thailand"> Thailand </option>
                                <option value="Togo"> Togo </option>
                                <option value="Tokelau"> Tokelau </option>
                                <option value="Tonga"> Tonga </option>
                                <option value="Trinidad and Tobago"> Trinidad and Tobago </option>
                                <option value="Tunisia"> Tunisia </option>
                                <option value="Turkey"> Turkey </option>
                                <option value="Turkmenistan"> Turkmenistan </option>
                                <option value="Turks and Caicos Islands"> Turks and Caicos Islands </option>
                                <option value="Tuvalu"> Tuvalu </option>
                                <option value="Uganda"> Uganda </option>
                                <option value="Ukraine"> Ukraine </option>
                                <option value="United Arab Emirates"> United Arab Emirates </option>
                                <option value="United Kingdom"> United Kingdom </option>
                                <option value="United States"> United States </option>
                                <option value="United States Minor Outlying Islands"> United States Minor Outlying Islands </option>
                                <option value="Uruguay"> Uruguay </option>
                                <option value="Uzbekistan"> Uzbekistan </option>
                                <option value="Vanuatu"> Vanuatu </option>
                                <option value="Venezuela"> Venezuela </option>
                                <option value="Vietnam" selected> Vietnam </option>
                                <option value="Virgin Islands (British)"> Virgin Islands (British) </option>
                                <option value="Virgin Islands (U.S.)"> Virgin Islands (U.S.) </option>
                                <option value="Wallis and Futuna Islands"> Wallis and Futuna Islands </option>
                                <option value="Western Sahara"> Western Sahara </option>
                                <option value="Yemen"> Yemen </option>
                                <option value="Yugoslavia"> Yugoslavia </option>
                                <option value="Zambia"> Zambia </option>
                                <option value="Zimbabwe"> Zimbabwe </option>
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
@endsection
