<?php
include("../DB_Connect.php");
session_start();

if (
    isset($_POST['HoVaTen']) &&
    isset($_POST['Email']) &&
    isset($_POST['Sdt']) &&
    isset($_POST['DiaChi']) &&
    isset($_POST['TenDangNhap']) &&
    isset($_POST['MatKhau']) &&
    $_SERVER['REQUEST_METHOD'] === 'POST'
) {
    $HoVaTen = $_POST['HoVaTen'];
    $Email = $_POST['Email'];
    $Sdt = $_POST['Sdt'];
    $DiaChi = $_POST['DiaChi'];
    $TenDangNhap = $_POST['TenDangNhap'];
    $MatKhau = $_POST['MatKhau'];

    //check tồn tại
    $sql_check = "select * from khachhang where TenDangNhap = '$TenDangNhap'";
    $result_check = mysqli_query($conn, $sql_check);

    if ($result_check && mysqli_num_rows($result_check) > 0)
    {
        echo 'tontai';
        return;
    }

    //thêm user
    $sql_insert_user = "INSERT INTO `khachhang` (`ID_KhachHang`, `TenDangNhap`, `MatKhau`, `HoVaTen`, `Email`, `SDT`, `DiaChi`) 
    VALUES (NULL, '$TenDangNhap', '$MatKhau', '$HoVaTen', '$Email', '$Sdt', '$DiaChi');";

    $result_insert_user = mysqli_query($conn, $sql_insert_user);

    if($result_insert_user)
    {
        echo 'success';
    }
    else{
        echo 'error';
    }

} else {
    echo 'error';
}
?>
