<div class="container bg-light mt-3" id="new_product">
    <div class="p-2 bg-white rounded-4 shadow-sm">
        <div class="text-left px-3 pt-3">
            <h3>Sản Phẩm Mới</h3>
        </div>
        <div class="slider_new_product">
            <?php
            $sql_new_product = "SELECT *
            FROM sanpham
            ORDER BY ThoiGianTao DESC
            LIMIT 10;";

            $result_new_product = mysqli_query($conn, $sql_new_product);

            while ($row_new_product = mysqli_fetch_array($result_new_product)) {
                echo '<div class="p-2 mb-3">
                        <div class="bg-white p-3 border-0 shadow-sm rounded-4">
                            <div class="card-body">
                                <img src="../../../AdminManage/src/Products/' . $row_new_product['AnhSanPham'] . '" alt="" class="img-fluid rounded-4">
                            </div>
                            <div class="card-body mt-3" style="min-height: 50px">
                                <a style="text-decoration: none;" href="Detail_Product.php?product_id=' . $row_new_product['IDSanPham'] . '"><h5 class="card-title text-black">' . $row_new_product['TenSanPham'] . '</h5></a>
                            </div>
                            <div class="row">
                                <div class="col-6 p-2"><button  class="btn btn-light mt-3 w-100">' . $row_new_product['GiaTien'] . 'đ</button></div>
                                <div class="col-3 p-2"><button onclick="addToCart(' . $row_new_product['IDSanPham'] . ')" class="btn btn-warning mt-3 w-100"><i class="fa-solid fa-cart-shopping"></i></button></div>
                                <div class="col-3 p-2"><button onclick="addToLike(' . $row_new_product['IDSanPham'] . ')" class="btn btn-danger mt-3 w-100"><i class="fa-regular fa-heart"></i></button></div>
                            </div>
                        </div>
                    </div>';
            }
            ?>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('.slider_new_product').slick({
            slidesToShow: 4, // Số lượng hiển thị trên màn hình trên 992px
            slidesToScroll: 1,
            autoplay: true, // Bật chế độ autoplay
            autoplaySpeed: 2000, // Thời gian chuyển tiếp giữa các card (3 giây)
            responsive: [{
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3, // Số lượng hiển thị trên màn hình từ 768px đến 992px
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2, // Số lượng hiển thị trên màn hình từ 700px đến 768px
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 700,
                    settings: {
                        slidesToShow: 1, // Số lượng hiển thị trên màn hình từ 480px đến 700px
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1, // Số lượng hiển thị trên màn hình bé hơn 480px
                        slidesToScroll: 1
                    }
                }
            ]
        });
    });
</script>