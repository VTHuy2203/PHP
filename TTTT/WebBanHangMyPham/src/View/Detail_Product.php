<?php
include("../DB_Connect.php");
include("../Layouts/Head.php");

if (isset($_GET['product_id'])) {

    $product_id = $_GET['product_id'];

    $sql = "SELECT sanpham.IDSanPham, sanpham.TenSanPham, sanpham.IDDanhMuc, sanpham.IDThuongHieu, sanpham.SoLuong, sanpham.GiaTien, sanpham.MoTaChiTiet, sanpham.AnhSanPham, sanpham.NoiBat, sanpham.ThoiGianTao, sanpham.ThoiGianCapNhat, danhmuc.TenDanhMuc, thuonghieu.TenThuongHieu from sanpham
    INNER JOIN danhmuc on sanpham.IDDanhMuc = danhmuc.IDDanhMuc
    INNER JOIN thuonghieu on sanpham.IDThuongHieu = thuonghieu.IDThuongHieu 
    Where sanpham.IDSanPham = '$product_id'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    // Kiểm tra nếu có lỗi trong quá trình truy vấn
    if (!$result) {
        die("Có lỗi xảy ra: " . mysqli_error($conn));
    }
} else {
    header('Location: index.php');
    exit();
}
?>

<body>
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

    <div class="container mt-4">
        <div class="row  py-3">
            <div class="col-md-5 mb-3">
                <div class="card border-0 rounded-4 shadow">
                    <div class="card-img">
                        <img src="../../../AdminManage/src/Products/<?php echo $row['AnhSanPham'] ?>" alt=""
                            class="img-fluid rounded-4 w-100">
                    </div>
                </div>
            </div>
            <div class="col-md-7">
                <div class="card p-3 border-0 rounded-4">
                    <p style="font-weight: 400; font-size: 45px; line-height: 60px;"><?php echo $row['TenSanPham'] ?>
                    </p>
                    <div class="card-body">
                        <div class="card-text" style="font-size: 20px;">
                            <p>Danh mục: <a style="text-decoration: none; font-weight: 600; color: black;"
                                    href="../View/View_Product.php?category_id=<?php echo $row['IDDanhMuc'] ?>"><?php echo $row['TenDanhMuc'] ?></a>
                            </p>
                            <p>Thương Hiệu: <a style="text-decoration: none; font-weight: 600; color: black;"
                                    href="../View/View_Product.php?brand_id=<?php echo $row['IDThuongHieu'] ?>">
                                    <?php echo $row['TenThuongHieu'] ?></a></p>
                        </div>
                        <div class="d-flex mt-4 justify-content-start">
                            <div class="d-flex align-items-center"
                                style="width: 110px; border-radius: 10px; border: 1px solid #2D9596;">
                                <button class="btn btn-link px-2 btn-step" onclick="decreaseQuantity()">
                                    <i class="fas fa-minus"></i>
                                </button>

                                <input id="input-add-cart" min="1" name="quantity" value="1" type="number" class="" />

                                <button class="btn btn-link px-2 btn-step" onclick="increaseQuantity()">
                                    <i class="fas fa-plus"></i>
                                </button>
                            </div>

                            <div class="btn fs-5 bg-light p-2 mx-4 border-0 rounded-4">
                                <?php echo $row['GiaTien'] ?> vnđ
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <button onclick="BuyNow(<?php echo $row['IDSanPham']; ?>)"
                            class="btn-detail-buy btn p-2 fs-5 bg-success bg-gradient text-white border-0">Mua
                            Ngay</button>
                        <button onclick="addToCart(<?php echo $row['IDSanPham']; ?>)"
                            class="btn-detail-add-cart btn btn-info py-2 px-3 mx-2 fs-5 bg-warning bg-gradient text-white border-0"><i
                                class="fa-solid fa-cart-shopping"></i></button>
                        <button onclick="addToLike(<?php echo $row['IDSanPham']; ?>)"
                            class="btn-detail-add-like btn btn-info py-2 px-3 fs-5 bg-danger bg-gradient text-white border-0"><i
                                class="fa-regular fa-heart"></i></i></button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-md-7 motachitiet mb-4">
                <div class="card rounded-4 text-start border-0 shadow">
                    <div class="card-body">
                        <h3 class="card-title">Thông Tin Sản Phẩm</h3>
                        <p class="card-text"><?php echo $row['MoTaChiTiet']; ?></p>

                    </div>
                </div>
            </div>

            <div class="col-md-5">
                <div class="card text-start rounded-4 border-0 shadow">
                    <div class=" card-body">
                        <h3 class="card-title">Bình Luận & Đánh Giá</h3>
                    </div>
                    <div class="" id="setbinhluan">
                    </div>
                    <?php
                    $sql_list_comment = "select * from binhluan where ID_SanPham = '$product_id'";
                    $result_list_comment = mysqli_query($conn, $sql_list_comment);
                    while ($row_list_comment = mysqli_fetch_array($result_list_comment)) {
                        $id_user_comment = $row_list_comment['ID_KhachHang'];
                        $NoiDungBinhLuan_comment = $row_list_comment['NoiDungBinhLuan'];

                        //lấy họ tên ng comment
                        $sql_hoten_comment = "select * from khachhang where ID_KhachHang = '$id_user_comment'";
                        $result_hoten_comment = mysqli_query($conn, $sql_hoten_comment);
                        $row_hoten_comment = mysqli_fetch_array($result_hoten_comment);
                        $hoten_user_comment = $row_hoten_comment['HoVaTen'];

                        if ($row_list_comment['DaMuaHang'] == 1) {
                            echo '<div class="card-body border-0 rounded-4 mx-3 mb-3 bg-light">
                                    <h6 class="card-title">' . $hoten_user_comment . ' <span class="text-success"><i class="fa-solid fa-circle-check"></i> Đã mua hàng</span></h6>
                                    <p class="card-text mx-2 fs-6">' . $NoiDungBinhLuan_comment . '</p>
                                </div>';
                        } else {
                            echo '<div class="card-body border-0 rounded-4 mx-3 mb-3 bg-light">
                                    <h6 class="card-title">' . $hoten_user_comment . '</h6>
                                    <p class="card-text mx-2 fs-6">' . $NoiDungBinhLuan_comment . '</p>
                                </div>';
                        }
                    }

                    //form bình luận
                    if (!isset($_SESSION['user'])) {
                        echo '<div class="card-body border-0 rounded-4 mx-3 mb-3 bg-light">
                                <h6 class="card-title">Vui lòng đăng nhập để bình luận. <a href="Login.php">Đăng nhập tại đây</a></h6>
                            </div>';
                    } else {
                        echo '<div class="card-body border-0 rounded-4 mx-3 mb-3 bg-light">
                                <div class="form-group mb-3">
                                    <textarea id="noidungbinhluan" style="padding: 20px;" class=" shadow-sm form-control border border-success border-opacity-75 rounded-5" rows="5" placeholder="Nội dung..."></textarea>
                                </div>
                                <button onclick="Comment(' . $product_id . ')" style="background-color: #2D9596; color: white;" type="submit" class="btn p-3 border-0 rounded-5 shadow">Bình Luận</button>
                            </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <?php include("../Layouts/Footer.php"); ?>
    <!-- end footer -->

    <!-- js -->
    <script>
        function decreaseQuantity() {
            var inputElement = document.getElementById('input-add-cart');
            var currentValue = parseInt(inputElement.value);

            if (currentValue > 1) {
                inputElement.value = currentValue - 1;
            }
        }

        function increaseQuantity() {
            var inputElement = document.getElementById('input-add-cart');
            var currentValue = parseInt(inputElement.value);

            inputElement.value = currentValue + 1;
        }
    </script>

    <script>
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

        function BuyNow(IDSanPham) {
            $.ajax({
                type: 'POST',
                url: 'Cart.php',
                data: {
                    IDSanPham: IDSanPham,
                    addcart: 'addcart'
                },
                success: function(response) {
                    window.location.href = "Cart.php";
                },
                error: function() {
                    alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
                }
            });
        }

        function Comment(IDSanPham) {
            var noidungbinhluan = document.getElementById('noidungbinhluan').value;

            if (noidungbinhluan == "") {
                alert('Hãy nhập nội dung vào bình luận!');
                return;
            }

            $.ajax({
                type: 'POST',
                url: '../Processing/XuLy_BinhLuan.php',
                data: {
                    IDSanPham: IDSanPham,
                    NoiDungBinhLuan: noidungbinhluan
                },
                success: function(response) {
                    if (response == "error") {
                        alert("Đã xảy ra lỗi!")
                    } else {
                        // hiển thị comment
                        var setbinhluanDiv = document.getElementById("setbinhluan");
                        setbinhluanDiv.innerHTML = response;
                        //xóa text trong textarea
                        var textareaComment = document.getElementById("noidungbinhluan");
                        textareaComment.value = "";
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