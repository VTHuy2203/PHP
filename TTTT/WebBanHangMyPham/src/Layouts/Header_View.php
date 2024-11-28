<div class="container-fluid bg-white">
    <div class="container py-3">
        <div class="row">
            <div class="col-md-3" id="header-logo">
                <a href="../View/index.php"><img src="/TTTT/imgs/logo/Mơ_shop__3_-removebg-preview.png"
                        style="height : 100px;" class="img-fluid" alt="logo"></a>
            </div>
            <div class="col-md-7" id="header-search-inf">
                <div class="row" id="none-search-about">
                    <div class="col-md-6">
                        <div class="input-group mt-3">
                            <input id="timkiemsanpham" type="text" class="form-control search-header" placeholder="Tìm"
                                aria-describedby="basic-addon2">
                            <span onclick="TimKiem()" class="input-group-text icon-search-header" id="basic-addon2"><i
                                    class="fa-solid fa-magnifying-glass"></i></span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row mt-3">
                            <div class="col">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="fs-3 color-logo">
                                            <i class="fa-solid fa-phone"></i>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        TƯ VẤN HỖ TRỢ <br>
                                        <strong class="color-logo">0387508193</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="row">
                                    <div class="col-3">
                                        <div class="fs-3 color-logo">
                                            <i class="fa-regular fa-user"></i>
                                        </div>
                                    </div>
                                    <div class="col-9">
                                        <?php
                                        if (isset($_SESSION['user'])) {
                                            echo $_SESSION['user'];
                                        } else {
                                            echo 'VUI LÒNG ';
                                        }
                                        ?>
                                        <br>
                                        <strong class="color-logo">
                                            <?php
                                            if (isset($_SESSION['user'])) {
                                                echo '<form method="POST" action="../View/index.php">
                                                    <input type="hidden" name="KetThucSession" value = "1">
                                                    <a class="color-logo" href="#" onclick="document.forms[0].submit();">Đăng xuất</a>
                                                </form>';
                                            } else {
                                                echo '<a class="color-logo" href="../View/Login.php">Đăng nhập</a>';
                                            }
                                            ?>
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-2 d-flex justify-content-end" id="header-cart-like">
                <div class="row">
                    <div class="col">
                        <a type="button" class="btn position-relative color-logo mt-3" href="Cart.php">
                            <i class="fs-3 fa-solid fa-cart-shopping"></i>
                        </a>
                    </div>
                    <div class="col">
                        <a href="View_ListLike.php" type="button" class="btn position-relative color-logo mt-3">
                            <i class="fs-3 fa-regular fa-heart"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    function TimKiem() {
        var key_search = document.getElementById("timkiemsanpham").value;

        if (key_search == "") {
            alert("Vui Lòng Nhập Từ Khóa!");
        } else {
            window.location.href = "View_Product.php?search_like=" + key_search;
        }
    }
</script>