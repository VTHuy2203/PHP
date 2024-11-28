<?php
include("../DB_Connect.php");
if (isset($_GET['del_oder_id']) && isset($_GET['view'])) {
    $del_oder_id = $_GET['del_oder_id'];
    $sql_del_oder_id = "delete from donhang where ID_DonHang = '$del_oder_id'";

    $delete_Result = mysqli_query($conn, $sql_del_oder_id);

    if ($delete_Result) {
        if ($_GET['view'] == 'all') {
            header('Location: All_Oders.php');
            exit();
        } else if ($_GET['view'] == 'approve') {
            header('Location: Approve_Oders.php');
            exit();
        }else if ($_GET['view'] == 'prepare') {
            header('Location: Prepare_Oders.php');
            exit();
        }else if ($_GET['view'] == 'shipping') {
            header('Location: Shipping_Oders.php');
            exit();
        }else if ($_GET['view'] == 'success') {
            header('Location: Success_Oders.php');
            exit();
        }
    } else {
        echo "Có lỗi xảy ra: " . mysqli_error($conn);
    }
}
