<?php
include("../DB_Connect.php");
include("../Layouts/Head.php");

if (isset($_SESSION['user'])) {
    $sql_inf_user = "select * from khachhang where TenDangNhap = '" . $_SESSION['user'] . "'";

    $result = mysqli_query($conn, $sql_inf_user);

    $row_inf_user = mysqli_fetch_array($result);

    $ID_KhachHang = $row_inf_user['ID_KhachHang'];
    $TenDangNhap = $row_inf_user['TenDangNhap'];
    $HoVaTen = $row_inf_user['HoVaTen'];
    $Email = $row_inf_user['Email'];
    $SDT = $row_inf_user['SDT'];
    $DiaChi = $row_inf_user['DiaChi'];
}
?>

<body>
    <?php
    include("../Layouts/Header_View.php");
    include("../Layouts/Link.php");
    ?>
    <section class="vh-100 bg-light">
        <div class="container pt-5">
            <div class="row d-flex justify-content-center pt-5">
                <div class="col col-xl-10">
                    <div class="card" style="border-radius: 1rem;">
                        <div class="row g-0">

                            <div class="col-md-5 p-3">
                                <div class="pt-3 px-3">
                                    <h5>Thông tin người mua</h5>
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="form-checkout-name">Họ và tên</label>
                                    <input type="text" id="form-checkout-name" class="form-control form-control-lg" value="<?php echo $HoVaTen; ?>" />
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="form-checkout-email">Email</label>
                                    <input type="email" id="form-checkout-email" class="form-control form-control-lg" value="<?php echo $Email; ?>" />
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="form-checkout-phone">Số điện thoại</label>
                                    <input type="text" id="form-checkout-phone" class="form-control form-control-lg" value="<?php echo $SDT; ?>" />
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="form-checkout-adress">Địa chỉ</label>
                                    <input type="text" id="form-checkout-adress" class="form-control form-control-lg" value="<?php echo $DiaChi; ?>" />
                                </div>
                                <div class="p-3">
                                    <label class="form-label" for="form-checkout-note">Ghi Chú</label>
                                    <input type="text" id="form-checkout-note" class="form-control form-control-lg"/>
                                </div>
                                <div class="p-3">
                                    <input type="hidden" id="form-checkout-id" class="form-control form-control-lg" value="<?php echo $ID_KhachHang; ?>" />
                                </div>
                            </div>
                            <div class="col-md-7 p-3">
                                <div class="pt-3 px-3">
                                    <h5>Danh sách sản phẩm mua</h5>
                                </div>
                                <div class="table-responsive rounded-3 border border-grey border-opacity-25 p-3 mt-4">
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
                                            if (isset($_SESSION['cart']) && (is_array($_SESSION['cart']))) {
                                                if (sizeof($_SESSION['cart']) > 0) {
                                                    for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
                                                        $stt = $i + 1;
                                                        echo '<tr>
                                                                <th class="align-middle" scope="row">' . $stt . '</th>
                                                                <td class="align-middle"><img src="../../../AdminManage/src/Products/' . $_SESSION['cart'][$i][2] . '" class="img-fluid rounded-3" style="max-height: 50px"></td>
                                                                <td class="align-middle">' . $_SESSION['cart'][$i][1] . '</td>
                                                                <td class="align-middle">' . $_SESSION['cart'][$i][3] . '</td>
                                                                <td class="align-middle">' . $_SESSION['cart'][$i][4] . 'đ</td>
                                                            </tr>';
                                                    }
                                                } else {
                                                    echo '<tr>
                                                                <td colspan="5" class="align-middle">Vui lòng thêm sản phẩm để mua hàng</td>
                                                        </tr>';
                                                }
                                            } else {
                                                echo '<tr>
                                                                <td colspan="5" class="align-middle">Vui lòng thêm sản phẩm để mua hàng</td>
                                                    </tr>';
                                            }
                                            ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th scope="col">Tổng tiền</th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"></th>
                                                <th scope="col"><?php echo $_SESSION['sum_Total'] ?>đ</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row g-0">
                            <div class="pb-4 px-3">
                                <button onclick="MuaHang()" class="btn btn-success btn-lg btn-block px-3 mx-3">Mua Hàng</button>
                                <a href="Cart.php" class="btn btn-danger btn-lg btn-block px-3">Hủy</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ajax -->
    <script>
        // Xử lý sự kiện nhấp vào nút "mua hang"
        function MuaHang() {
            var ID_KhachHang = document.getElementById("form-checkout-id").value;
            var HoVaTen = document.getElementById("form-checkout-name").value;
            var Email = document.getElementById("form-checkout-email").value;
            var Sdt = document.getElementById("form-checkout-phone").value;
            var DiaChi = document.getElementById("form-checkout-adress").value;
            var GhiChu = document.getElementById("form-checkout-note").value;

            console.log(ID_KhachHang);
            console.log(HoVaTen);
            console.log(Email);

            $.ajax({
                type: 'POST',
                url: '../Processing/XuLy_DonHang.php',
                data: {
                    ID_KhachHang: ID_KhachHang,
                    HoVaTen: HoVaTen,
                    Email: Email,
                    Sdt: Sdt,
                    DiaChi: DiaChi,
                    GhiChu: GhiChu
                },
                success: function(response) {
                    if(response=="success")
                    {
                        window.location.href = "Cart.php";
                        alert('Mua hàng thành công!');
                    }
                    else if(response=="error")
                    {
                        window.location.href = "Cart.php";
                        alert('Mua hàng không thành công! Vui lòng thử lại');
                    }
                },
                error: function() {
                    alert('Đã xảy ra lỗi. Vui lòng thử lại sau.');
                }
            });
        }
    </script>
</body>

</html>