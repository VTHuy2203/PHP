<?php
include("../DB_Connect.php");
include("../Layouts/Head.php");

//  Kiểm tra xem category_id có được truyền từ URL hay không
if (isset($_GET['category_id'])) {
    //tính tổng số lượng sản phẩm
    $category_id = $_GET['category_id'];
    $sql_tong_so_luong_sp = "select count(IDSanPham) as tongsoluongsanpham from sanpham where IDDanhMuc = '$category_id'";
    $result_tong_so_luong_sp = mysqli_query($conn, $sql_tong_so_luong_sp);
    $row_tong_so_luong_sp = mysqli_fetch_assoc($result_tong_so_luong_sp);
    $tongSoLuongSanPham = $row_tong_so_luong_sp['tongsoluongsanpham'];

    //lấy số trang hiện tại và set số sp trên mỗi trang
    $trangHienTai = isset($_GET['page']) ? $_GET['page'] : 1;
    $soSanPhamTrenMoiTrang = 8;

    //tổng số trang
    $tongSoTrang = ceil($tongSoLuongSanPham / $soSanPhamTrenMoiTrang);

    //giới hạn số trang
    if ($trangHienTai > $tongSoTrang) {
        $trangHienTai = $tongSoTrang;
    } else if ($trangHienTai < 1) {
        $trangHienTai = 1;
    }

    //
    $start = ($trangHienTai - 1) * $soSanPhamTrenMoiTrang;

    if($start <0)
    {
        $start = 0;
    }

    $sql_select_product_limit = "SELECT * FROM sanpham WHERE IDDanhMuc ='$category_id' LIMIT $start, $soSanPhamTrenMoiTrang";
    $result_select_product_limit = mysqli_query($conn, $sql_select_product_limit);

}
else if (isset($_GET['brand_id'])) {
    //tính tổng số lượng sản phẩm
    $brand_id = $_GET['brand_id'];
    $sql_tong_so_luong_sp = "select count(IDSanPham) as tongsoluongsanpham from sanpham where IDThuongHieu = '$brand_id'";
    $result_tong_so_luong_sp = mysqli_query($conn, $sql_tong_so_luong_sp);
    $row_tong_so_luong_sp = mysqli_fetch_assoc($result_tong_so_luong_sp);
    $tongSoLuongSanPham = $row_tong_so_luong_sp['tongsoluongsanpham'];

    //lấy số trang hiện tại và set số sp trên mỗi trang
    $trangHienTai = isset($_GET['page']) ? $_GET['page'] : 1;
    $soSanPhamTrenMoiTrang = 8;

    //tổng số trang
    $tongSoTrang = ceil($tongSoLuongSanPham / $soSanPhamTrenMoiTrang);

    //giới hạn số trang
    if ($trangHienTai > $tongSoTrang) {
        $trangHienTai = $tongSoTrang;
    } else if ($trangHienTai < 1) {
        $trangHienTai = 1;
    }

    //
    $start = ($trangHienTai - 1) * $soSanPhamTrenMoiTrang;

    if($start <0)
    {
        $start = 0;
    }

    $sql_select_product_limit = "SELECT * FROM sanpham WHERE IDThuongHieu ='$brand_id' LIMIT $start, $soSanPhamTrenMoiTrang";
    $result_select_product_limit = mysqli_query($conn, $sql_select_product_limit);

}
else if (isset($_GET['search_like'])) {
    //tính tổng số lượng sản phẩm
    $search_like = $_GET['search_like'];
    $sql_tong_so_luong_sp = "select count(IDSanPham) as tongsoluongsanpham from sanpham where TenSanPham LIKE '%$search_like%'";
    $result_tong_so_luong_sp = mysqli_query($conn, $sql_tong_so_luong_sp);
    $row_tong_so_luong_sp = mysqli_fetch_assoc($result_tong_so_luong_sp);
    $tongSoLuongSanPham = $row_tong_so_luong_sp['tongsoluongsanpham'];

    //lấy số trang hiện tại và set số sp trên mỗi trang
    $trangHienTai = isset($_GET['page']) ? $_GET['page'] : 1;
    $soSanPhamTrenMoiTrang = 8;

    //tổng số trang
    $tongSoTrang = ceil($tongSoLuongSanPham / $soSanPhamTrenMoiTrang);

    //giới hạn số trang
    if ($trangHienTai > $tongSoTrang) {
        $trangHienTai = $tongSoTrang;
    } else if ($trangHienTai < 1) {
        $trangHienTai = 1;
    }

    //
    $start = ($trangHienTai - 1) * $soSanPhamTrenMoiTrang;

    if($start <0)
    {
        $start = 0;
    }

    $sql_select_product_limit = "SELECT * FROM sanpham where TenSanPham LIKE '%$search_like%' LIMIT $start, $soSanPhamTrenMoiTrang";
    $result_select_product_limit = mysqli_query($conn, $sql_select_product_limit);

}
else if (isset($_GET['hot_product'])) {
    //tính tổng số lượng sản phẩm
    $sql_tong_so_luong_sp = "select count(IDSanPham) as tongsoluongsanpham from sanpham where NoiBat = '1'";
    $result_tong_so_luong_sp = mysqli_query($conn, $sql_tong_so_luong_sp);
    $row_tong_so_luong_sp = mysqli_fetch_assoc($result_tong_so_luong_sp);
    $tongSoLuongSanPham = $row_tong_so_luong_sp['tongsoluongsanpham'];

    //lấy số trang hiện tại và set số sp trên mỗi trang
    $trangHienTai = isset($_GET['page']) ? $_GET['page'] : 1;
    $soSanPhamTrenMoiTrang = 8;

    //tổng số trang
    $tongSoTrang = ceil($tongSoLuongSanPham / $soSanPhamTrenMoiTrang);

    //giới hạn số trang
    if ($trangHienTai > $tongSoTrang) {
        $trangHienTai = $tongSoTrang;
    } else if ($trangHienTai < 1) {
        $trangHienTai = 1;
    }

    //
    $start = ($trangHienTai - 1) * $soSanPhamTrenMoiTrang;

    if($start <0)
    {
        $start = 0;
    }

    $sql_select_product_limit = "SELECT * FROM sanpham WHERE NoiBat ='1' LIMIT $start, $soSanPhamTrenMoiTrang";
    $result_select_product_limit = mysqli_query($conn, $sql_select_product_limit);

}
else {
    //tính tổng số lượng sản phẩm
    $result_tong_so_luong_sp = mysqli_query($conn, 'select count(IDSanPham) as tongsoluongsanpham from sanpham');
    $row_tong_so_luong_sp = mysqli_fetch_assoc($result_tong_so_luong_sp);
    $tongSoLuongSanPham = $row_tong_so_luong_sp['tongsoluongsanpham'];

    //lấy số trang hiện tại và set số sp trên mỗi trang
    $trangHienTai = isset($_GET['page']) ? $_GET['page'] : 1;
    $soSanPhamTrenMoiTrang = 8;

    //tổng số trang
    $tongSoTrang = ceil($tongSoLuongSanPham / $soSanPhamTrenMoiTrang);

    //giới hạn số trang
    if ($trangHienTai > $tongSoTrang) {
        $trangHienTai = $tongSoTrang;
    } else if ($trangHienTai < 1) {
        $trangHienTai = 1;
    }

    //
    $start = ($trangHienTai - 1) * $soSanPhamTrenMoiTrang;

    $sql_select_product_limit = "SELECT * FROM sanpham LIMIT $start, $soSanPhamTrenMoiTrang";
    $result_select_product_limit = mysqli_query($conn, $sql_select_product_limit);
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

    <div class="container mb-4 bg-white rounded-4 shadow-sm" style="min-height: 300px;">
        <h4 class="pt-4 px-3">Danh Sách Sản Phẩm</h4>
        <div class="row">
            <!-- <div class="p-2 col-xl-3 col-md-4 col-sm-6">
                <div class="bg-white p-3 border-0 shadow-sm rounded-4">
                    <div class="card-body">
                        <img src="../../../AdminManage/src/Products/IMG_Products/Screenshot 2023-11-28 234413.png" alt="" class="img-fluid rounded-4">
                    </div>
                    <div class="card-body mt-3">
                        <h5 class="card-title">Card title</h5>
                    </div>
                    <div class="row">
                        <div class="col-6 p-2"><a href="#" class="btn btn-light mt-3 w-100">1000000d</a></div>
                        <div class="col-3 p-2"><a href="#" class="btn btn-warning mt-3 w-100"><i class="fa-solid fa-cart-shopping"></i></a></div>
                        <div class="col-3 p-2"><a href="#" class="btn btn-danger mt-3 w-100"><i class="fa-regular fa-heart"></i></a></div>
                    </div>
                </div>
            </div> -->

            <?php
            while ($row_select_product_limit = mysqli_fetch_assoc($result_select_product_limit)) {
                echo '<div class="p-2 col-xl-3 col-md-4 col-sm-6">
                    <div class="bg-white p-3 border-0 shadow-sm rounded-4">
                        <div class="card-body">
                            <img src="../../../AdminManage/src/Products/' . $row_select_product_limit['AnhSanPham'] . '" alt="" class="img-fluid rounded-4">
                        </div>
                        <div class="card-body mt-3" style="min-height: 50px">
                            <a style="text-decoration: none;" href="Detail_Product.php?product_id=' . $row_select_product_limit['IDSanPham'] . '"><h5 class="card-title text-black">' . $row_select_product_limit['TenSanPham'] . '</h5></a>
                        </div>
                        <div class="row">
                            <div class="col-6 p-2"><a href="#" class="btn btn-light mt-3 w-100">' . $row_select_product_limit['GiaTien'] . 'đ</a></div>
                            <div class="col-3 p-2"><button onclick="addToCart(' . $row_select_product_limit['IDSanPham'] . ')" class="btn btn-warning mt-3 w-100"><i class="fa-solid fa-cart-shopping"></i></button></div>
                            <div class="col-3 p-2"><a href="#" class="btn btn-danger mt-3 w-100"><i class="fa-regular fa-heart"></i></a></div>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>

        <!-- phân trang -->
        <div class="row mt-3">
            <nav aria-label="Page navigation example" class="d-flex justify-content-center align-items-center">
                <ul class="pagination">
                    <?php
                    // nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
                    if ($trangHienTai > 1 && $tongSoTrang > 1) {
                        echo '<li class="page-item"><a class="page-link" style="color: #2D9596;" href="View_Product.php?page=' . ($trangHienTai - 1) . '">Trang Trước</a></li>';
                    }

                    // Lặp khoảng giữa
                    for ($i = 1; $i <= $tongSoTrang; $i++) {
                        // Nếu là trang hiện tại thì hiển thị thẻ span
                        // ngược lại hiển thị thẻ a
                        if ($i == $trangHienTai) {
                            echo '<li class="page-item"><a class="page-link" style="color: white; background-color: #2D9596;" href="">' . $i . '</a></li>';
                        } else {
                            echo '<li class="page-item"><a class="page-link" style="color: #2D9596;" href="View_Product.php?page=' . $i . '">' . $i . '</a></li>';
                        }
                    }

                    // nếu current_page < $total_page và total_page > 1 mới hiển thị nút prev
                    if ($trangHienTai < $tongSoTrang && $tongSoTrang > 1) {
                        echo '<li class="page-item"><a class="page-link" style="color: #2D9596;" href="View_Product.php?page=' . ($trangHienTai + 1) . '">Trang Tiếp</a></li>';
                    }
                    ?>
                </ul>
            </nav>
        </div>
    </div>

    <!-- footer -->
    <?php include("../Layouts/Footer.php"); ?>
    <!-- end footer -->

    <!-- ajax -->
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
    </script>
</body>

</html>