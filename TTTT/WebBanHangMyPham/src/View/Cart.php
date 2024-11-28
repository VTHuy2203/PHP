<?php
include("../DB_Connect.php");
include("../Layouts/Head.php");

//nếu ch có giỏ hàng thì tạo giỏ hàng mới
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

//xóa all sp trong giỏ hàng
if (isset($_POST['del_all_cart']) && ($_POST['del_all_cart'] == 'del_all_cart')) {
    unset($_SESSION['cart']);
    unset($_SESSION['sum_Total']);
}

//xóa sp trong giỏ hàng
if (isset($_GET['del_id']) && ($_GET['del_id'] >= 0)) {
    array_splice($_SESSION['cart'], $_GET['del_id'], 1);
}

//thêm sp vào giỏ
if (isset($_POST['addcart']) && isset($_POST['IDSanPham'])) {

    $sql_getInfAddCart = "SELECT * FROM sanpham where IDSanPham = " . $_POST['IDSanPham'];
    $result_getInfAddCart = mysqli_query($conn, $sql_getInfAddCart);

    $row_getInfAddCart = mysqli_fetch_array($result_getInfAddCart);

    //lấy tt từ form
    $IDSanPham = $row_getInfAddCart['IDSanPham'];
    $tenSanPham = $row_getInfAddCart['TenSanPham'];
    $anhSanPham = $row_getInfAddCart['AnhSanPham'];
    $soLuong = 1;
    $giaTien = $row_getInfAddCart['GiaTien'];

    //check sp thêm vào đã tồn tại ch
    $check_sp = false;
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        if ($_SESSION['cart'][$i][0] == $IDSanPham) {
            $_SESSION['cart'][$i][3] += $soLuong;
            $check_sp = true;
            break;
        }
    }

    if (!$check_sp) {
        //thêm sp mới vào giỏ
        $arr_cart = [$IDSanPham, $tenSanPham, $anhSanPham, $soLuong, $giaTien];

        $_SESSION['cart'][] = $arr_cart;
    }
}

//tất cả sp trong giỏ hàng
$_SESSION['sum_Product'] = 0;
$sum_product = 0;
if (isset($_SESSION['cart']) && (is_array($_SESSION['cart']))) {
    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
        $sum_product += intval($_SESSION['cart'][$i][3]);
    }
}
$_SESSION['sum_Product'] = $sum_product;

//in sp ra giỏ hàng
$_SESSION['sum_Total'] = 0;
function showCart()
{
    if (isset($_SESSION['cart']) && (is_array($_SESSION['cart']))) {
        if (sizeof($_SESSION['cart']) > 0) {
            $sum = 0;
            for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                $tt = intval($_SESSION['cart'][$i][4]) * intval($_SESSION['cart'][$i][3]);

                $sum += $tt;

                echo '<hr class="my-4">

                    <div class="row mb-4 d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                            <img src="../../../AdminManage/src/Products/' . $_SESSION['cart'][$i][2] . '" class="img-fluid rounded-3" style="max-height: 100px">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                            <h6 class="text-black mb-0">' . $_SESSION['cart'][$i][1] . '</h6>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                            <button class="btn btn-link px-2 btn-step" onclick="changeQuantity(this, -1, '.$_SESSION['cart'][$i][0].')">
                                <i class="fas fa-minus"></i>
                            </button>

                            <input id="form1" min="1" name="quantity" value="' . $_SESSION['cart'][$i][3] . '" type="number" class="form-control form-control-sm" />

                            <button class="btn btn-link px-2 btn-step" onclick="changeQuantity(this, 1, '.$_SESSION['cart'][$i][0].')">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                            <h6 class="mb-0">' . $_SESSION['cart'][$i][4] . 'đ</h6>
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                            <a href="Cart.php?del_id=' . $i . '" class="text-muted"><i class="fas fa-times text-danger"></i></a>
                        </div>
                    </div>';
            }
            $_SESSION['sum_Total'] = $sum;
        } else {
            echo '<hr class="my-4">

            <div class="row mb-4 d-flex justify-content-between align-items-center">
                <h6 class="text-red mb-0">Giỏ hàng đang trống</h6>
            </div>';
        }
    } else {
        echo '<hr class="my-4">

            <div class="row mb-4 d-flex justify-content-between align-items-center">
                <h6 class="text-red mb-0">Giỏ hàng đang trống</h6>
            </div>';
    }
}

//cập nhật số lượng sp qua input số lượng
if (isset($_GET['CapNhatSoLuong']) && isset($_GET['IDCapNhatSoLuong'])) {
    if (isset($_SESSION['cart'])) {
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
            if ($_SESSION['cart'][$i][0] == intval($_GET['IDCapNhatSoLuong'])) {
                $_SESSION['cart'][$i][3] = intval($_GET['CapNhatSoLuong']);
                break;
            }
        }
    }
}

?>

<body>
    <!-- header -->
    <?php include("../Layouts/Header_View.php"); ?>
    <!-- end header -->

    <section class="h-custom bg-light">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12">
                    <div class="card card-registration card-registration-2" style="border-radius: 15px;">
                        <div class="card-body p-0">
                            <div class="row g-0">
                                <div class="col-lg-8">
                                    <div class="p-5">
                                        <div class="d-flex justify-content-between align-items-center mb-5">
                                            <h2 class="fw-bold mb-0 text-black">Giỏ Hàng</h2>
                                        </div>

                                        <?php showCart(); ?>

                                        <hr class="my-4">
                                        <form action="Cart.php" method="post">
                                            <button type="submit" name="del_all_cart" value="del_all_cart" class="btn btn-delete-cart-all">Xóa tất cả</button>
                                        </form>
                                        <hr class="my-4">

                                        <div class="pt-5">
                                            <h6 class="mb-0"><a href="index.php" class="text-body"><i class="fas fa-long-arrow-alt-left me-2"></i>Back to shop</a></h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 form-cart-muahang">
                                    <div class="p-5">
                                        <h3 class="fw-bold mb-5 mt-2 pt-1">Thanh Toán</h3>
                                        <hr class="my-4">

                                        <h5 class="text-uppercase mb-3">Hình Thức Thanh Toán</h5>

                                        <div class="mb-4 pb-2">
                                            <select class="select form-control">
                                                <option value="1">Nhận Hàng Thanh Toán</option>
                                            </select>
                                        </div>

                                        <h5 class="text-uppercase mb-3">Mã Giảm Giá</h5>

                                        <div class="mb-5">
                                            <div class="form-outline">
                                                <input type="text" id="form3Examplea2" placeholder="Nhập tại đây..." class="form-control form-control-lg" />
                                            </div>
                                        </div>

                                        <hr class="my-4">

                                        <div class="d-flex justify-content-between mb-5">
                                            <h5 class="text-uppercase">Tổng Tiền</h5>
                                            <h5><?php echo $_SESSION['sum_Total']; ?>đ</h5>
                                        </div>

                                        <?php
                                        if (isset($_SESSION['user'])) {
                                            // echo '<a href="CheckOut.php" type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Mua Hàng</a>';
                                            if (isset($_SESSION['cart']) && (is_array($_SESSION['cart']))) {
                                                if (sizeof($_SESSION['cart']) > 0) {
                                                    echo '<a href="CheckOut.php" type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Mua Hàng</a>';
                                                } else {
                                                    echo '<a href="index.php" type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Thêm sản phẩm để mua hàng</a>';
                                                }
                                            } else {
                                                echo '<a href="index.php" type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Thêm sản phẩm để mua hàng</a>';
                                            }
                                        } else {
                                            echo '<a href="Login.php" type="button" class="btn btn-dark btn-block btn-lg" data-mdb-ripple-color="dark">Đăng nhập để mua hàng</a>';
                                        }
                                        ?>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>