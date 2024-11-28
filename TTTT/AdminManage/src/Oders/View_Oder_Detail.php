<?php
include("../Layouts/headHTML.php");

include("../DB_Connect.php");

if (isset($_GET['oder_id']) && isset($_GET['view'])) {

    $oder_id = $_GET['oder_id'];

    $sql = "SELECT * from donhang where ID_DonHang = '$oder_id'";

    $result = mysqli_query($conn, $sql);

    $row = mysqli_fetch_array($result);

    // Kiểm tra nếu có lỗi trong quá trình truy vấn
    if (!$result) {
        die("Có lỗi xảy ra: " . mysqli_error($conn));
    }

    $url = 'All_Oders.php';
    if ($_GET['view'] == 'all') {
        $url = 'All_Oders.php';
    } else if ($_GET['view'] == 'approve') {
        $url = 'Approve_Oders.php';
    }else if ($_GET['view'] == 'prepare') {
        $url = 'Prepare_Oders.php';
    }else if ($_GET['view'] == 'shipping') {
        $url = 'Shipping_Oders.php';
    }else if ($_GET['view'] == 'success') {
        $url = 'Success_Oders.php';
    }
} else {
    header('Location: All_Oders.php');
    exit();
}
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("../Layouts/SlideBar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("../Layouts/TopBar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tất Cả Đơn Hàng</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <p class="card-text">Họ Và Tên: <?php echo $row['HoVaTen']; ?></p>
                            <p class="card-text">Email: <?php echo $row['Email']; ?></p>
                            <p class="card-text">Sdt: <?php echo $row['SDT']; ?></p>
                            <p class="card-text">Địa Chỉ: <?php echo $row['DiaChi']; ?></p>
                            <p class="card-text">Trạng Thái:
                                <?php
                                if ($row['TrangThai'] == 0) {
                                    echo 'Cần Duyệt';
                                } else if ($row['TrangThai'] == 1) {
                                    echo 'Chuẩn Bị Hàng';
                                } else if ($row['TrangThai'] == 2) {
                                    echo 'Đang Giao';
                                } else if ($row['TrangThai'] == 3) {
                                    echo 'Giao Thành Công';
                                }
                                ?>
                            </p>
                            <p class="card-text">Ghi Chú: <?php echo $row['GhiChu']; ?></p>
                            <p class="card-text">Tổng Tiền: <?php echo $row['TongTien']; ?></p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive rounded-3 border border-grey border-opacity-25">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">STT</th>
                                            <th scope="col">Ảnh</th>
                                            <th scope="col">Tên sản phẩm</th>
                                            <th scope="col">Số lượng</th>
                                            <th scope="col">Giá tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql_select_oder_detail = "select * from donhangchitiet where ID_DonHang = '$oder_id'";

                                        $result_select_oder_detail = mysqli_query($conn, $sql_select_oder_detail);

                                        $stt = 1;
                                        while ($oder_detail = mysqli_fetch_array($result_select_oder_detail)) {

                                            $id_product = $oder_detail['ID_SanPham'];

                                            $sql_select_product = "select * from sanpham where IDSanPham = '$id_product'";

                                            $result_select_product = mysqli_query($conn, $sql_select_product);

                                            $product_info = mysqli_fetch_array($result_select_product);

                                            echo '<tr>
                                                    <th class="align-middle" scope="row">' . $stt . '</th>
                                                    <td class="align-middle"><img src="../../../AdminManage/src/Products/' . $product_info['AnhSanPham'] . '" class="img-fluid rounded-3" style="max-height: 50px"></td>
                                                    <td class="align-middle">' . $product_info['TenSanPham'] . '</td>
                                                    <td class="align-middle">' . $oder_detail['SoLuong'] . '</td>
                                                    <td class="align-middle">' . $product_info['GiaTien'] . 'đ</td>
                                                </tr>';
                                            $stt++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-body">
                            <a href="<?php echo $url; ?>" class="btn btn-primary">Quay lại</a>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
        </div>
        <!-- End of Page Wrapper -->
        <?php include("../Layouts/Link.php"); ?>
</body>

</html>