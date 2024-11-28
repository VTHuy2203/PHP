<?php
include("../DB_Connect.php");
include("../Layouts/Head.php");

if (isset($_POST['KetThucSession'])) {
    session_destroy();
    header("Location: index.php");
    exit();
}
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

    <!-- Slider Banner -->
    <?php include("../Layouts/SliderBanner.php"); ?>
    <!-- End Slider Banner -->

    <!-- Category slider -->
    <?php include("../Layouts/CategorySlider.php"); ?>
    <!-- End Category slider -->

    <!-- Top Product -->
    <?php include("../Layouts/Top_Product.php"); ?>
    <!-- end Top Product -->

    <!-- New product -->
    <?php include("../Layouts/New_Product.php"); ?>
    <!-- End New product -->

    <!-- tin tức bài viết -->
    <?php include("../Layouts/News_Posts.php"); ?>
    <!-- End tin tức bài viết -->

    <!-- thương hiệu -->
    <?php include("../Layouts/Brand_Slider.php"); ?>
    <!-- End thương hiệu -->

    <!-- Contact -->
    <?php include("../Layouts/Form_Contact.php"); ?>
    <!-- end Contact -->

    <!-- footer -->
    <?php include("../Layouts/Footer.php"); ?>
    <!-- end footer -->

    <script>
    // Xử lý sự kiện nhấp vào nút "Add to Cart"
    function addToCart(IDSanPham) {
        $.ajax({
            type: 'POST',
            url: 'Cart.php',
            data: {
                IDSanPham: IDSanPham,
                addcart: 'addcart'
            },
            success: function(response) {
                console.log(response);
                alert('Sản phẩm đã được thêm vào giỏ hàng.');
            },
            error: function() {
                alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
            }
        });
    }

    //thêm vào ds yêu thích
    function addToLike(IDSanPham) {
        $.ajax({
            type: 'POST',
            url: '../Processing/XuLy_YeuThich.php',
            data: {
                IDSanPham: IDSanPham
            },
            success: function(response) {
                if (response == "tontai") {
                    alert('Bạn đã thêm vào danh sách yêu thích rồi!');
                } else if (response == "success") {
                    alert('Thêm vào danh sách yêu thích thành công');
                } else if (response == "xoathanhcong") {
                    alert('Xóa khỏi danh sách yêu thích thành công');
                } else if (response == "chuadangnhap") {
                    alert('Vui lòng đăng nhập!!!');
                }
            },
            error: function() {
                alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
            }
        });
    }
    </script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API = Tawk_API || {},
        Tawk_LoadStart = new Date();
    (function() {
        var s1 = document.createElement("script"),
            s0 = document.getElementsByTagName("script")[0];
        s1.async = true;
        s1.src = 'https://embed.tawk.to/6593dc2c0ff6374032bb249e/1hj4p84ci';
        s1.charset = 'UTF-8';
        s1.setAttribute('crossorigin', '*');
        s0.parentNode.insertBefore(s1, s0);
    })();
    </script>
    <!--End of Tawk.to Script-->

</body>

</html>