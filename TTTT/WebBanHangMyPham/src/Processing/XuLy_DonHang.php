<?php 
    include("../DB_Connect.php");
    session_start();

    if(isset($_POST['ID_KhachHang']) &&
        isset($_POST['HoVaTen']) &&
        isset($_POST['Email']) &&
        isset($_POST['Sdt']) &&
        isset($_POST['DiaChi']) &&
        isset($_POST['GhiChu']) &&
        $_SERVER['REQUEST_METHOD'] === 'POST' &&
        isset($_SESSION['cart']) &&
        isset($_SESSION['sum_Total']))
    {
        $ID_KhachHang = $_POST['ID_KhachHang'];
        $HoVaTen = $_POST['HoVaTen'];
        $Email = $_POST['Email'];
        $Sdt = $_POST['Sdt'];
        $DiaChi = $_POST['DiaChi'];
        $GhiChu = $_POST['GhiChu'];

        $TongTien = $_SESSION['sum_Total'];

        $sql_insert_donhang = "INSERT INTO `donhang` (`ID_DonHang`, `ID_KhachHang`, `HoVaTen`, `Email`, `SDT`, `DiaChi`, `TongTien`, `TrangThai`, `GhiChu`) 
        VALUES (NULL, '$ID_KhachHang', '$HoVaTen', '$Email', '$Sdt', '$DiaChi', '$TongTien', '0', '$GhiChu');";

        $result_insert_donhang = mysqli_query($conn, $sql_insert_donhang);

        if ($result_insert_donhang){
            // Lấy id đơn hàng mới được tạo
            $id_donhang = mysqli_insert_id($conn);

            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                $sql_insert_donhang_chitiet = "INSERT INTO `donhangchitiet` (`ID_DonHangChiTiet`, `ID_DonHang`, `ID_SanPham`, `SoLuong`) 
                                VALUES (NULL, '$id_donhang', '".$_SESSION['cart'][$i][0]."', '".$_SESSION['cart'][$i][3]."');";

                mysqli_query($conn, $sql_insert_donhang_chitiet);
            }
        }

        // Xóa thông tin giỏ hàng sau khi đặt hàng thành công
        unset($_SESSION['cart']);

        echo 'success';
    }
    else{
        echo 'error';
    }
?>