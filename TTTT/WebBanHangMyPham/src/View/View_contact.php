<?php

//-------------------------TRANG LIÊN HỆ-------


include("../DB_Connect.php");
include("../Layouts/Head.php");

?>

<body class="bg-light">
    <!-- link scrip -->
    <?php include("../Layouts/Link.php"); ?>

    <!-- Banner header -->
    <?php include("../Layouts/Banner_Header.php"); ?>
    <!-- end Banner header -->

    <!-- header -->
    <?php include("../Layouts/Header_View.php"); ?>
    <!-- end header -->

    <!-- Navbar -->
    <?php include("../Layouts/Navbar.php"); ?>
    <!-- End Navbar -->

    <div class="container my-4 bg-white border-0 rounded-4 shadow">
        <div class="card text-start border-0">
            <div class="card-body">
                <h4 class="p-2">Địa Chỉ</h4>
                <p class="card-text fs-6 px-3"><i class="fa-solid fa-location-dot"></i> Địa chỉ: Thôn Tân Lập, xã Ealy,
                    huyện Sông Hinh, tỉnh Phú Yên </p>
                <p class="card-text fs-6 px-3"><i class="fa-solid fa-mobile-screen-button"></i> Số Điện Thoại:
                    0559110474</p>
                <br>
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1155.9152030894595!2d108.76858692440464!3d12.970594883728253!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x316e2db938b58e4b%3A0x4066f8c7d376433f!2zVuG6rXQgTGnhu4d1IFjDonkgROG7sW5nIFPGoW4gVHJhbmc!5e0!3m2!1svi!2s!4v1731262878177!5m2!1svi!2s"
                    width="800" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>
        </div>

        <div class="card border-0 text-start">
            <div class="card-body">
                <form>
                    <h4 class="p-2 mb-3">Liên Hệ Với Chúng Tôi</h4>

                    <div class="form-group m-3">
                        <input style="padding: 20px; height: 50px;" type="text"
                            class=" shadow-sm form-control border border-success border-opacity-75 rounded-5"
                            placeholder="Tên của bạn...">
                    </div>

                    <div class="form-group m-3">
                        <input style="padding: 20px; height: 50px;" type="text"
                            class=" shadow-sm form-control border border-success border-opacity-75 rounded-5"
                            placeholder="Email của bạn...">
                    </div>

                    <div class="form-group m-3">
                        <textarea style="padding: 20px;"
                            class=" shadow-sm form-control border border-success border-opacity-75 rounded-5" rows="5"
                            placeholder="Nội dung..."></textarea>
                    </div>

                    <button style="background-color: #2D9596; color: white;" type="submit"
                        class="btn mx-3 p-3 border-0 rounded-5 shadow">Gửi tin nhắn</button>

                </form>
            </div>
        </div>

    </div>

    <!-- footer -->
    <?php include("../Layouts/Footer.php"); ?>
    <!-- end footer -->

    <!-- js -->

</body>

</html>