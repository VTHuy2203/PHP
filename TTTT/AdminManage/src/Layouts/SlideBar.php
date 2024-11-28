<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color: #2D9596;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="../Oders/All_Oders.php">
        <div class="sidebar-brand-icon ">
            <img src="/TTTT/imgs/logo/logoadmin.png" alt="" style="width: 100px;">
        </div>
        <div class="sidebar-brand-text mx-3">MƠ SHOP</div>
    </a>


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Quản Lý
    </div>

    <!-- Nav Item - Đơn Hàng -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-cog"></i>
            <span>Đơn Hàng</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Đơn Hàng</h6>
                <a class="collapse-item" href="../Oders/All_Oders.php">Danh Sách Đơn Hàng</a>
                <a class="collapse-item" href="../Oders/Approve_Oders.php">Đơn Hàng Cần Duyệt</a>
                <a class="collapse-item" href="../Oders/Prepare_Oders.php">Đơn Hàng Đang Chuẩn bị</a>
                <a class="collapse-item" href="../Oders/Shipping_Oders.php">Đơn Hàng Đang Giao</a>
                <a class="collapse-item" href="../Oders/Success_Oders.php">Đơn Hàng Thành Công</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Sản Phẩm -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class="fas fa-fw fa-cog"></i>
            <span>Sản Phẩm</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Sản Phẩm</h6>
                <a class="collapse-item" href="../Products/Add_Product.php">Thêm Sản Phẩm</a>
                <a class="collapse-item" href="../Products/Manage_Product.php">Danh Sách Sản Phẩm</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Thương Hiêu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThuongHieu"
            aria-expanded="true" aria-controls="collapseThuongHieu">
            <i class="fas fa-fw fa-cog"></i>
            <span>Thương Hiệu</span>
        </a>
        <div id="collapseThuongHieu" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Thương Hiệu</h6>
                <a class="collapse-item" href="../Brands/Add_Brand.php">Thêm Thương Hiệu</a>
                <a class="collapse-item" href="../Brands/Manage_Brand.php">Quản Lý Thương Hiệu</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Danh Mục -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-Danh-Muc"
            aria-expanded="true" aria-controls="collapse-Danh-Muc">
            <i class="fas fa-fw fa-cog"></i>
            <span>Danh Mục</span>
        </a>
        <div id="collapse-Danh-Muc" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Danh Mục</h6>
                <a class="collapse-item" href="../Categorys/Add_Category.php">Thêm Danh Mục</a>
                <a class="collapse-item" href="../Categorys/Manage_Category.php">Quản Lý Danh Mục</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Tin Tức Bài viết -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-TinTuc-BaiViet"
            aria-expanded="true" aria-controls="collapse-TinTuc-BaiViet">
            <i class="fas fa-fw fa-cog"></i>
            <span>Tin Tức & Bài Viết</span>
        </a>
        <div id="collapse-TinTuc-BaiViet" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Tin Tức & Bài Viết</h6>
                <a class="collapse-item" href="../News_Posts/Add_News_Posts.php">Thêm tin tức & bài viết</a>
                <a class="collapse-item" href="../News_Posts/Manage_News_Posts.php">Quản Lý tin tức & bài viết</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - tài khoản -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-Khach-Hang"
            aria-expanded="true" aria-controls="collapse-Khach-Hang">
            <i class="fas fa-fw fa-cog"></i>
            <span>Khách Hàng</span>
        </a>
        <div id="collapse-Khach-Hang" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Khách Hàng</h6>
                <a class="collapse-item" href="../Users/Manage_Users.php">Quản Lý khách hàng</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - bình luận -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse-Binh-Luan"
            aria-expanded="true" aria-controls="collapse-Binh-Luan">
            <i class="fas fa-fw fa-cog"></i>
            <span>Bình Luận</span>
        </a>
        <div id="collapse-Binh-Luan" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Bình Luận</h6>
                <a class="collapse-item" href="../Comments/Manage_Comments.php">Quản Lý Bình Luận</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->