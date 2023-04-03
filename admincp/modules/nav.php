<nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent1" aria-controls="navbarContent1" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarContent1">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" href="./admin.php?action=trangchu&year=<?=date('Y')?>">Trang chủ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./admin.php?action=danhmuc">Quản Lý Danh Mục</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./admin.php?action=sanpham">Quản Lý Sản Phẩm</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./admin.php?action=khachhang">Quản Lý Khách Hàng</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="./admin.php?action=donhang">Quản Lý Đơn Hàng</a>
                </li>
                <li class="">
                    <div class="dropdown">
                        <a class="btn dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Khác
                        </a>

                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="./admin.php?action=ship">Shipping</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
            <?php
                if(isset($_SESSION['adminname']) && ($_SESSION['adminname'] != '')){   
                    echo '
                    <div id="useradmin" class="d-flex justify-content-end dropdown">
                        <a class="nav-link text-dark dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fas fa-regular fa-user" style="font-size: 30px;"></i> 
                            <p class="d-md-inline" hidden>'.$_SESSION['adminname'].'</p>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <!-- Đăng nhập -->
                            <a class="dropdown-item" href="./admin.php?action=taikhoan">Tài khoản</a>
                            <!-- Đăng xuất -->
                            <a class="dropdown-item" href="./admin.php?action=thoat">Đăng xuất</a>
                        </div>
                    </div>                                 
                    ';
                }
            ?>
        </div>
    </div>
</nav>