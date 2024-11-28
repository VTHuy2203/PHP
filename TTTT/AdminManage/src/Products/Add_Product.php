<?php
session_start();
include("../Layouts/headHTML.php");
include("../DB_Connect.php");

if (
    $_SERVER['REQUEST_METHOD'] === 'POST'
    && isset($_POST['tenSanPham'])
    && isset($_POST['tenDanhMuc'])
    && isset($_POST['tenThuongHieu'])
    && isset($_POST['soLuong'])
    && isset($_POST['giaTien'])
    && isset($_POST['moTaChiTiet'])
    && isset($_FILES['image'])
) {
    $tenSanPham = $_POST['tenSanPham'];
    $tenDanhMuc = $_POST['tenDanhMuc'];
    $tenThuongHieu = $_POST['tenThuongHieu'];
    $soLuonng = $_POST['soLuong'];
    $giaTien = $_POST['giaTien'];
    $moTaChiTiet = $_POST['moTaChiTiet'];

    $checkIssetIMG = false;
    //check file có phải là ảnh không
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $checkIssetIMG = true;

        $target_dir = "IMG_Products/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);

        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
    }

    if ($checkIssetIMG == false) {
        $target_file = "";
    }

    $sql = "INSERT INTO `sanpham` (`IDSanPham`, `TenSanPham`, `IDDanhMuc`, `IDThuongHieu`, `SoLuong`, `GiaTien`, `NoiBat`, `MoTaChiTiet`, `AnhSanPham`) 
            VALUES (null, '$tenSanPham', '$tenDanhMuc', '$tenThuongHieu', '$soLuonng', '$giaTien', '0', '$moTaChiTiet', '$target_file')";

    $result = mysqli_query($conn, $sql);

    if ($result) {
        $_SESSION['success_message'] = 'Thêm Sản Phẩm thành công!';
        header("Location: Add_Product.php");
        exit();
    } else {
        echo "Có lỗi xảy ra: " . mysqli_error($conn);
    }
}
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <?php include("../Layouts/SlideBar.php"); ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <?php include("../Layouts/TopBar.php"); ?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Thêm Sản Phẩm</h1>

                    <!-- DataTales Example -->
                    <div class="container-fluid shadow mb-4">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <?php if (isset($_SESSION['success_message'])) : ?>
                                    <div class="alert alert-success m-4"><?php echo $_SESSION['success_message']; ?></div>
                                    <?php unset($_SESSION['success_message']); ?>
                                <?php endif; ?>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="m-3 form-group">
                                        <label for="tenSanPham">Tên Sản Phẩm</label>
                                        <input type="text" class="w-100 form-control" name="tenSanPham" id="tenSanPham">
                                    </div>
                                    <div class="m-3 form-group">
                                        <label for="tenDanhMuc" class="form-label">Danh Mục</label>
                                        <select class="form-select form-control w-100" id="tenDanhMuc"
                                            name="tenDanhMuc">
                                            <?php
                                            $sql = "SELECT * FROM danhmuc";
                                            $result = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option value="' . $row['IDDanhMuc'] . '">' . $row['TenDanhMuc'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="m-3 form-group">
                                        <label for="tenThuongHieu" class="form-label">Thương Hiệu</label>
                                        <select class="form-select form-control w-100" id="tenThuongHieu"
                                            name="tenThuongHieu">
                                            <?php
                                            $sql = "SELECT * FROM ThuongHieu";
                                            $result = mysqli_query($conn, $sql);

                                            while ($row = mysqli_fetch_array($result)) {
                                                echo '<option value="' . $row['IDThuongHieu'] . '">' . $row['TenThuongHieu'] . '</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="m-3 form-group">
                                        <label for="soLuong">Số Lượng</label>
                                        <input type="number" class="w-100 form-control" name="soLuong" id="soLuong">
                                    </div>
                                    <div class="m-3 form-group">
                                        <label for="giaTien">Giá Tiền</label>
                                        <input type="number" class="w-100 form-control" name="giaTien" id="giaTien">
                                    </div>
                                    <div class="m-3 form-group">
                                        <label for="moTaChiTiet">Mô Tả Chi Tiết</label>
                                        <textarea name="moTaChiTiet" cols="60" rows="5" class="w-100 form-control"
                                            id="moTaChiTiet"></textarea>
                                    </div>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#moTaChiTiet'), {
                                                ckfinder: {
                                                    uploadUrl: 'File_Upload.php'
                                                }
                                            })
                                            .then(editor => {
                                                console.log(editor);
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>
                                </div>
                                <div class="col-md-5">
                                    <div class="card shadow m-4">
                                        <div class="card-header">
                                            <h7>Thêm Hình Ảnh</h7>
                                        </div>
                                        <img id="imagePreview" src="" alt="Preview Image" class="w-100">
                                        <div class="card-body">
                                            <div class="form-group">
                                                <script>
                                                    function previewImage() {
                                                        var input = document.getElementById('image');
                                                        var imagePreview = document.getElementById('imagePreview');

                                                        if (input.files && input.files[0]) {
                                                            var reader = new FileReader();
                                                            reader.onload = function(e) {
                                                                imagePreview.src = e.target.result;
                                                            };
                                                            reader.readAsDataURL(input.files[0]);
                                                        } else {
                                                            imagePreview.src = "";
                                                        }
                                                    }
                                                </script>
                                                <input type="file" name="image" class="form-control-file" id="image"
                                                    onchange="previewImage()" required>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mb-3">Thêm</button>
                        </form>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            <!-- Scroll to Top Button-->
            <a class="scroll-to-top rounded" href="#page-top">
                <i class="fas fa-angle-up"></i>
            </a>
            <!-- End of Content Wrapper -->
        </div>
        <!-- End of Page Wrapper -->
        <?php include("../Layouts/Link.php"); ?>
</body>

</html>