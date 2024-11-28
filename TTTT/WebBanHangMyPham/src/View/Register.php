<?php
include("../Layouts/Head.php");

include("../DB_Connect.php");


?>

<body>
    <?php
    include("../Layouts/Header_View.php");
    include("../Layouts/Link.php");
    ?>
    <section class="vh-100 bg-light">
        <div class="container pt-5">
            <div class="row d-flex justify-content-center pt-5">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">

                            <div class="col-md-6 p-3">
                                <div class="pt-3 px-3">
                                    <h5>Thông tin</h5>
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="form-register-name">Họ và tên</label>
                                    <input type="text" id="form-register-name" class="form-control form-control-lg" />
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="form-register-email">Email</label>
                                    <input type="email" id="form-register-email" class="form-control form-control-lg" />
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="form-register-phone">Số điện thoại</label>
                                    <input type="text" id="form-register-phone" class="form-control form-control-lg" />
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="form-register-address">Địa chỉ</label>
                                    <input type="text" id="form-register-address" class="form-control form-control-lg" />
                                </div>
                            </div>
                            <div class="col-md-6 p-3">
                                <div class="pt-3 px-3">
                                    <h5>Tài khoản</h5>
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="form-register-nameUser">Tên đăng nhập</label>
                                    <input type="text" id="form-register-nameUser" class="form-control form-control-lg" />
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="form-register-pass">Mật khẩu</label>
                                    <input type="password" id="form-register-pass" class="form-control form-control-lg" />
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="form-register-passAgain">Nhập lại mật khẩu</label>
                                    <input type="password" id="form-register-passAgain" class="form-control form-control-lg" />
                                </div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="pb-3 px-3">
                                <button onclick="register()" class="btn btn-dark btn-lg btn-block px-3 mx-3">Đăng ký</button>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="pb-3 px-3">
                                <p href="" class="mx-3">Bạn đã có tài khoản! <a href="Login.php" class="text-decoration-underline">Đăng nhập tại đây.</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ajax -->
    <script>
        function register() {
            var name = document.getElementById("form-register-name").value;
            var email = document.getElementById("form-register-email").value;
            var phone = document.getElementById("form-register-phone").value;
            var address = document.getElementById("form-register-address").value;
            var nameUser = document.getElementById("form-register-nameUser").value;
            var pass = document.getElementById("form-register-pass").value;
            var passAgain = document.getElementById("form-register-passAgain").value;

            // check nhập lại mật khẩu
            if (!pass == passAgain) {
                alert('Mật khẩu nhập lại không đúng!');
                return;
            }

            // check có nhập đủ thông tin
            if (name == "" &&
                email == "" &&
                phone == "" &&
                address == "" &&
                nameUser == "" &&
                pass == "" &&
                passAgain == "") {
                alert('Vui lòng nhập đầy đủ thông tin!');
                return;
            }

            //check email
            var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(email)) {
                alert("Địa chỉ email không hợp lệ!");
                return;
            }

            //check sdt
            var phoneRegex = /^(0|\+84)(9\d|8[1-9]|7[0-9]|5[6-9]|3[2-9]|2\d)\d{7}$/;
            if (!phoneRegex.test(phone)) {
                alert("Số điện thoại không hợp lệ!");
                return;
            }
            
            //truyền thông tin qua xử lý đăng ký
            $.ajax({
                type: 'POST',
                url: '../Processing/XuLy_DangKy.php',
                data: {
                    HoVaTen: name,
                    Email: email,
                    Sdt: phone,
                    DiaChi: address,
                    TenDangNhap: nameUser,
                    MatKhau: pass
                },
                success: function(response) {
                    if (response == "success") {
                        window.location.href = "Login.php";
                        alert('Đăng ký thành công!');
                    } else if (response == "error") {
                        alert('Đăng ký không thành công! Vui lòng thử lại');
                    }
                    else if (response == "tontai") {
                        alert('Tên đăng nhập đã tồn tại! Vui lòng thử lại');
                    }
                },
                error: function() {
                    alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
                }
            });
        }
    </script>
</body>

</html>