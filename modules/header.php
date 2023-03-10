<div id="header">
    <div class="container-fluid mt-2">
        <div class="row mb-2">
            <div class="offset-1 col-2 mt-2">
                <a href="./index.php">
                    <img id="logobook" src="./images/logobook.jpg" alt="logobook">
                </a>
            </div>
            <div class="col-5">
                <form action="./index.php" method="post" class="d-md-flex" hidden>
                    <div id="header-searchbox" class="input-group mt-3 w-100 border border-info rounded-3">
                        <input required type="text" name="key" class="form-control border-0"
                            placeholder="Tìm kiếm tựa sách, tác giả,..." aria-label="Input group example"
                            aria-describedby="btnGroupAddon">
                        <button name="search" type="submit" class="input-group-text border-0 bg-white"
                            id="btnGroupAddon">
                            <i class="fas fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-4 mt-3">
                <div class="row float-end">
                    <div class="col-6">
                        <a class="nav-link ms-3" href="./index.php?quanly=giohang" style="width: 150px;">
                            <i class="fas fa-shopping-cart" style="font-size: 30px;"></i>
                            <p class="d-md-inline" hidden>Giỏ hàng</p>
                        </a>
                    </div>
                    <?php
                    if (isset($_SESSION['username']) && ($_SESSION['username'] != '')) {
                        echo '
                                <div class="col-6 dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-regular fa-user" style="font-size: 30px;"></i> 
                                        <p class="d-md-inline" hidden>' . $_SESSION['username'] . '</p>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <!-- Đăng nhập -->
                                        <a class="dropdown-item" href="./index.php?quanly=taikhoan">Tài khoản</a>
                                        <!-- Đăng ký -->
                                        <a class="dropdown-item" href="./index.php?quanly=thoat">Đăng xuất</a>
                                    </div>
                                </div>                                 
                                ';
                    } else {
                        echo '
                                <div class="col-6 dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-regular fa-user" style="font-size: 30px;"></i> 
                                        <p class="d-md-inline" hidden>Tài khoản</p>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <!-- Đăng nhập -->
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal1">Đăng nhập</a>
                                        <!-- Đăng ký -->
                                        <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#exampleModal2">Đăng ký</a>
                                    </div>
                                </div>
                                ';
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
    include("./modules/dangnhap.php");
    include("./modules/dangky.php");
?>