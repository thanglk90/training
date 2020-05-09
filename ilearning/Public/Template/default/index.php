<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/a5d8255015.js" crossorigin="anonymous"></script>
    <?php echo $this->title; ?>
    <?php echo $this->_fileCss; ?>
    <?php echo $this->_fileJs; ?>
</head>
<body>
    <div class="site-wrapper">
        <div class="site-header">
            <div class="container-1024">
                <div class="row header_top">
                    <div class="col col-xl-6">
                        <ul class="header_list header_list-quickTest">
                            <li class="header_listItem"><a href="">Thi thử JLPT</a></li>
                            <li class="header_listItem"><a href="">Giáo viên</a></li>
                            <li class="header_listItem"><a href="">Bài viết</a></li>
                            <li class="header_listItem"><a href="">Hỗ trợ</a></li>
                        </ul>
                    </div>
                    <div class="col col-xl-6">
                        <ul class="header_list header_list-userLogin">
                            <li class="header_listItem header_listItem-login"><a href="">Đăng nhập</a></li>
                            <li class="header_listItem header_listItem-register"><a href="#register">Tạo tài khoản</a></li>
                        </ul>
                    </div>
                </div>
                <div class="row header_bottom">
                    <div class="col col-xl-2">
                        <div class="header_brand">
                            <a href="https://dungmori.com/">
                                <img src="./Public/Template/default/images/dungmori.png" alt="website dungmori">
                            </a>                         
                        </div>
                    </div>
                    <div class="col col-xl-10">
                        <ul class="header_list header_list-courses">
                            <li class="header_listItem">
                                <a href="">Khóa N5</a>
                                <span class="sub">miễn phí</span>
                            </li>
                            <li class="header_listItem"><a href="">Khóa N4</a></li>
                            <li class="header_listItem"><a href="">Khóa N3</a></li>
                            <li class="header_listItem"><a href="">Khóa N2</a></li>
                            <li class="header_listItem"><a href="">Khóa N1</a></li>
                            <li class="header_listItem">
                                <a href="">Kaiwa</a>
                                <span class="sub">Mới</span>
                            </li>
                            <li class="header_listItem"><a href="">Khóa EJU</a></li>
                            <li class="header_listItem"><a href="">Lớp OFFLINE</a></li>
                        </ul>
                    </div>
                </div>
            </div>

            

            <div class="header_modal-form">
                <div class="header_modal-form-overlay"></div>
                <div class="header_modal-body">
                    <div class="header_modal-form-popup">
                        <!-- <ul class="header_modal-form-list">
                            <li class="form-login">Đăng nhập</li>
                            <li class="form-register">Tạo tài khoản</li>
                        </ul> -->
                        <div class="header_modal-form-register">
                            <div class="row">
                                <div class="col col-xl-5">
                                    <div class="header_modal-form-register-img">
                                        <img src="./Public/Template/default/images/dungteacher.png" alt="">
                                    </div>
                                </div>
                                <div class="col col-xl-7">
                                    <div class="header_modal-form-register-body">
                                        <div class="row">
                                            <div class="col col-xl-4">
                                                <div class="form-label">Họ và tên</div>
                                            </div>
                                            <div class="col col-xl-8">
                                                <div class="form-input">
                                                    <input type="text" name="realname">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xl-4">
                                                <div class="form-label">Email</div>
                                            </div>
                                            <div class="col col-xl-8">
                                                <div class="form-input">
                                                    <input type="text" name="email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xl-4">
                                                <div class="form-label">Mật khẩu</div>
                                            </div>
                                            <div class="col col-xl-8">
                                                <div class="form-input">
                                                    <input type="text" name="pass">
                                                    <input type="text" name="confirmPass">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xl-4">
                                                <div class="form-label">Số điện thoại</div>
                                            </div>
                                            <div class="col col-xl-8">
                                                <div class="form-input">
                                                    <input type="number" name="mobileNumber">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xl-4">
                                                <div class="form-label">Giới tính</div>
                                            </div>
                                            <div class="col col-xl-8">
                                                <div class="form-input">
                                                    <select name="sex" id="">
                                                        <option value="select">- Chọn giới tính</option>
                                                        <option value="male">Nam</option>
                                                        <option value="female">Nữ</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xl-4">
                                                <div class="form-label">Ngày sinh</div>
                                            </div>
                                            <div class="col col-xl-8">
                                                <div class="form-input">
                                                    <input type="date" name="birthday" id="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xl-4">
                                                <div class="form-label">Trình độ</div>
                                            </div>
                                            <div class="col col-xl-8">
                                                <div class="form-input">
                                                    <select name="level" id="">
                                                        <option value="select">- Chọn trình độ hiện tại</option>
                                                        <option value="beginner">Mới học</option>
                                                        <option value="n5">Đã qua N5</option>
                                                        <option value="n4">Đã qua N4</option>
                                                        <option value="n3">Đã qua N3</option>
                                                        <option value="n2">Đã qua N2</option>
                                                        <option value="n1">Đã qua N1</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xl-4">
                                                <div class="form-label">Quốc gia</div>
                                            </div>
                                            <div class="col col-xl-8">
                                                <div class="form-input">
                                                    <select name="country" id="">
                                                        <option value="select">- Chọn quốc gia</option>
                                                        <option value="vn">Việt Nam</option>
                                                        <option value="jp">Japan</option>
                                                        <option value="other">Khác</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xl-4">
                                                <div class="form-label"></div>
                                            </div>
                                            <div class="col col-xl-8">
                                                <div class="form-input">
                                                    <div class="agree-box">
                                                        <input type="checkbox" name="agree" checked='checked' class="agreeCkb">
                                                        <span>
                                                            Đồng ý với các 
                                                        <a href="https://dungmori.com/trang/dieu-khoan-su-dung">điều khoản sử dụng</a>
                                                         và <a href="https://dungmori.com/trang/chinh-sach-bao-mat">chính sách bảo mật</a> 
                                                         của website DungMori
                                                        </span>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xl-4">
                                                <div class="form-label"></div>
                                            </div>
                                            <div class="col col-xl-8">
                                                <div class="form-input">
                                                    <div class="register-submit-btn">
                                                        <input type="submit" class="register-btn" value="Đăng ký">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col col-xl-4">
                                                <div class="form-label"></div>
                                            </div>
                                            <div class="col col-xl-8">
                                                <span>Hoặc đăng nhập nhanh bằng</span>
                                                <div class="quick-register">
                                                    <div class="fb-register">
                                                        <a href="">
                                                            <i class="fab fa-facebook-f"></i>
                                                            <span>Facebook</span>
                                                        </a>
                                                    </div>
                                                    <div class="gg-register">
                                                        <a href="">
                                                            <i class="fab fa-google-plus-g"></i>
                                                            <span>Goolge</span>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <div class="header_modal-form-login"></div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="site-body"></div>

        <div class="site-footer"></div>
    </div>
</body>
</html>

