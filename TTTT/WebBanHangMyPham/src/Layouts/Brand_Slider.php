<?php
    include("../DB_Connect.php");
    include("../Layouts/Head.php");
?>


<div class="container bg-light mt-3" id="brand">
    <div class="p-2 bg-white rounded-4 shadow-sm">
        <div class="text-left px-3 pt-3">
            <h3>Thương Hiệu</h3>
        </div>
        <div class="slider_brand">
            <?php
            $sql_brand = "select * from thuonghieu";

            $result_brand = mysqli_query($conn, $sql_brand);

            while ($row_brand = mysqli_fetch_array($result_brand)) {
                echo '<div class="p-2 mb-3">
                        <div class="bg-white p-3 border-0 shadow-sm rounded-4">
                            <div class="card-body">
                                <img src="../../../AdminManage/src/Brands/' . $row_brand['AnhThuongHieu'] . '" alt="" class="img-fluid rounded-4">
                            </div>
                            <div class="card-body mt-3 text-center">
                                <a style="text-decoration: none;" href="../View/View_Product.php?brand_id=' . $row_brand['IDThuongHieu'] . '"><h5 class="card-title text-black">' . $row_brand['TenThuongHieu'] . '</h5></a>
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
        $('.slider_brand').slick({
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