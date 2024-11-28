<?php
require_once "../DB_Connect.php";

// Kiểm tra xem ID danh mục đã được truyền vào hay chưa
if (!isset($_GET['brand_id'])) {
    header('Location: Manage_Brand.php');
    exit();
}

$brand_id = $_GET['brand_id'];

// Lấy thông tin danh mục từ CSDL để hiển thị trên thông báo xác nhận xóa
$sql = "SELECT * FROM thuonghieu WHERE IDThuongHieu = '$brand_id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Kiểm tra xem danh mục có tồn tại hay không
if (!$row) {
    header('Location: Manage_Brand.php');
    exit();
}

// Xử lý logic khi người dùng xác nhận xóa
if (isset($_POST['delete'])) {
    // Thực hiện truy vấn xóa danh mục trong CSDL
    $deleteSql = "DELETE FROM thuonghieu WHERE IDThuongHieu = '$brand_id'";
    $deleteResult = mysqli_query($conn, $deleteSql);

    if ($deleteResult) {
        header('Location: Manage_Brand.php');
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
                <h2>Xóa Thương Hiệu</h2>
                <div class="alert alert-danger">
                    <p>Bạn có chắc chắn muốn xóa thương hiệu sau? Bạn sẽ không thể hoàn tác lại thương hiệu đã xóa!!!!</p>
                    <p><strong>Tên thương hiệu:</strong> <?php echo $row['TenThuongHieu']; ?></p>
                </div>

                <form method="POST">
                    <button type="submit" name="delete" class="btn btn-danger">Xóa</button>
                    <a href="Manage_Brand.php" class="btn btn-secondary">Hủy</a>
                </form>
            </div>
            <div class="col-sm-3"></div>
        </div>
    </div>

</body>

</html>
