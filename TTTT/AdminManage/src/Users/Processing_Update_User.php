<?php
require_once "../DB_Connect.php";

// Kiểm tra form gửi là post
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['User_id'])) {
    // Lấy dữ liệu từ form
    $User_id = $_POST['User_id'];
    $hoVaTen = $_POST['hoVaTen'];
    $email = $_POST['email'];
    $SDT = $_POST['SDT'];
    $diaChi = $_POST['diaChi'];


    // Thực hiện truy vấn để cập nhật thông tin user trong CSDL
    $update_sql = "UPDATE khachhang SET HoVaTen='$hoVaTen', Email='$email', SDT='$SDT', DiaChi='$diaChi'  WHERE ID_KhachHang='$User_id'";

    $result = mysqli_query($conn, $update_sql);

    header('Location: Manage_Users.php');
    exit();
} else {
    header('Location: Manage_Users.php');
    exit();
}

mysqli_close($conn);
?>