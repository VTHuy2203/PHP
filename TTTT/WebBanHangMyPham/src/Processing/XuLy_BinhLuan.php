<?php
include("../DB_Connect.php");
session_start();

if (
    isset($_SESSION['user']) &&
    isset($_POST['IDSanPham']) &&
    isset($_POST['NoiDungBinhLuan']) &&
    $_SERVER['REQUEST_METHOD'] === 'POST'
) {
    $IDSanPham = $_POST['IDSanPham'];
    $NoiDungBinhLuan = $_POST['NoiDungBinhLuan'];

    //lấy id user
    $name_user = $_SESSION['user'];
    $sql_select_id_user = "select * from khachhang where TenDangNhap = '$name_user'";
    $result_select_id_user = mysqli_query($conn, $sql_select_id_user);
    if ($result_select_id_user) {
        $row_select_id_user = mysqli_fetch_array($result_select_id_user);
        $id_user = $row_select_id_user['ID_KhachHang'];

        //check mua hàng chưa
        $check_muahang = 0;
        $sql_check_muahang = "select * from donhang where ID_KhachHang = '$id_user'";
        $result_check_muahang = mysqli_query($conn, $sql_check_muahang);
        $count_check_muahang = mysqli_num_rows($result_check_muahang);
        $row_check_muahang = mysqli_fetch_array($result_check_muahang);
        if ($count_check_muahang > 0 && $row_check_muahang['TrangThai']==3) {
            $ID_DonHang = $row_check_muahang['ID_DonHang'];
            //check don hang chi tiet
            $sql_check_donhangchitiet = "select * from donhangchitiet where ID_DonHang = '$ID_DonHang' AND ID_SanPham = '$IDSanPham'";
            $result_check_donhangchitiet = mysqli_query($conn, $sql_check_donhangchitiet);
            $count_check_donhangchitiet = mysqli_num_rows($result_check_donhangchitiet);
            if ($count_check_donhangchitiet > 0) {
                $check_muahang = 1;
            }
        }
    } else {
        echo 'error';
        return;
    }

    //thêm comment
    $sql_insert_comment = "INSERT INTO `binhluan` (`ID_BinhLuan`, `ID_KhachHang`, `ID_SanPham`, `NoiDungBinhLuan`, `DaMuaHang`) VALUES (NULL, '$id_user', '$IDSanPham', '$NoiDungBinhLuan', '$check_muahang');";

    $result_insert_comment = mysqli_query($conn, $sql_insert_comment);

    if ($result_insert_comment) {
        //lấy id commnet mới tạo
        $id_comment = mysqli_insert_id($conn);

        $sql_select_comment = "select * from binhluan where ID_BinhLuan = '$id_comment'";
        $result_select_comment = mysqli_query($conn, $sql_select_comment);

        if ($result_select_comment) {
            $row_select_comment = mysqli_fetch_array($result_select_comment);

            $id_user_comment = $row_select_comment['ID_KhachHang'];
            $NoiDungBinhLuan_comment = $row_select_comment['NoiDungBinhLuan'];

            //lấy họ tên ng comment
            $sql_hoten_comment = "select * from khachhang where ID_KhachHang = '$id_user_comment'";
            $result_hoten_comment = mysqli_query($conn, $sql_hoten_comment);
            $row_hoten_comment = mysqli_fetch_array($result_hoten_comment);
            $hoten_user_comment = $row_hoten_comment['HoVaTen'];
            
            if ($row_select_comment['DaMuaHang'] == 1) {
                echo '<div class="card-body border-0 rounded-4 mx-3 mb-3 bg-light">
                        <h6 class="card-title">'.$hoten_user_comment.' <span class="text-success"><i class="fa-solid fa-circle-check"></i> Đã mua hàng</span></h6>
                        <p class="card-text mx-2 fs-6">'.$NoiDungBinhLuan_comment.'</p>
                    </div>';
            }
            else
            {
                echo '<div class="card-body border-0 rounded-4 mx-3 mb-3 bg-light">
                        <h6 class="card-title">'.$hoten_user_comment.'</h6>
                        <p class="card-text mx-2 fs-6">'.$NoiDungBinhLuan_comment.'</p>
                    </div>';
            }
        }
    } else {
        echo 'error';
    }
} else {
    echo 'error';
}
