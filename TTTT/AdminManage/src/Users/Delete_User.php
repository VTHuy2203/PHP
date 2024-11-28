<?php
require_once "../DB_Connect.php";

// Kiểm tra xem ID user đã được truyền vào hay chưa
if (!isset($_GET['User_id'])) {
    header('Location: Manage_Users.php');
    exit();
}

$User_id = $_GET['User_id'];

// Lấy thông tin user từ CSDL để hiển thị trên thông báo xác nhận xóa
$sql = "SELECT * FROM khachhang WHERE ID_KhachHang = '$User_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Kiểm tra xem user có tồn tại hay không
if (!$row) {
    header('Location: Manage_Users.php');
    exit();
}

// Xử lý logic khi người dùng xác nhận xóa
if (isset($_POST['delete'])) {
    // Thực hiện truy vấn xóa user trong CSDL
    $deleteSql = "DELETE FROM khachhang WHERE ID_KhachHang = '$User_id'";
    $deleteResult = mysqli_query($conn, $deleteSql);

    if ($deleteResult) {
        header('Location: Manage_Users.php');
        exit();
    } else {
        echo "Có lỗi xảy ra: " . mysqli_error($conn);
    }
}
?>

<?php include("../Layouts/headHTML.php"); ?>

<body>
    <div class="container mt-4">
        <div class="row">
            <div class="col-sm-3"></div>
            <div class="col-sm-6">
                <h2>Xóa Khách Hàng</h2>
                <div class="alert alert-danger">
                    <p>Bạn có chắc chắn muốn xóa khách hàng sau? Bạn sẽ không thể hoàn tác lại khách hàng đã xóa!!!!</p>
                    <p><strong>Tên khách hàng:</strong> <?php echo $row['HoVaTen']; ?></p>
                </div>

                <form method="POST">
                    <button type="submit" name="delete" class="btn btn-danger">Xóa</button>
                    <a href="Manage_Users.php" class="btn btn-secondary">Hủy</a>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

</body>

</html>
