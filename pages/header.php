<?php 
                            include("./pages/dangnhap.php");
                            include("./pages/dangky.php");
                        ?>


<div id="header">
        <div class="container-fluid mt-2">
            <div class="row mb-2">
                <div class="offset-1 col-2 mt-2">
                    <a href="./index.php">
                        <img id="logobook" src="./images/logobook.jpg" alt="logobook">
                    </a>
                </div>
                <div class="col-5">
                    <form class="d-md-flex" hidden>
                        <div id="header-searchbox" class="input-group mt-3 w-100 border border-info rounded-3" >
                            <input type="text" class="form-control border-0" placeholder="Tìm kiếm tựa sách, tác giả,..." aria-label="Input group example" aria-describedby="btnGroupAddon">
                            <div class="input-group-text border-0 bg-white" id="btnGroupAddon">
                                <i class="fas fa-solid fa-magnifying-glass"></i>
                            </div>
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
                            if(isset($_SESSION['username']) && ($_SESSION['username'] != '')){
                                echo '
                                <div class="col-6 dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-regular fa-user" style="font-size: 30px;"></i> 
                                        <p class="d-md-inline" hidden>'.$_SESSION['username'].'</p>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                        <!-- Đăng nhập -->
                                        <a class="dropdown-item" href="./index.php?quanly=taikhoan">Tài khoản</a>
                                        <!-- Đăng ký -->
                                        <a class="dropdown-item" href="./index.php?quanly=thoat">Đăng xuất</a>
                                    </div>
                                </div>                                 
                                ';
                            }
                            else {
                                echo '
                                <div class="col-4 dropdown">
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
                        
                        <!-- here -->
                        
                    </div>
                </div>
            </div>
            <!-- Navbar -->
            <div class="row">
                <nav class="navbar navbar-expand-lg navbar-light color-53a57f">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse ms-3" id="navbarContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="./index.php?">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./index.php?quanly=gioithieu">Giới thiệu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./index.php?quanly=lienhe">Liên Hệ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Danh Mục Sách
                                    </a>
                                    <ul class="dropdown-menu list-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item" href="./index.php?quanly=danhmuc&id=1">Sách Mới Nhất</a></li>
                                        <li><a class="dropdown-item" href="./index.php?quanly=danhmuc&id=2">Sách Tiếng Anh</a></li>
                                        <li><a class="dropdown-item" href="./index.php?quanly=danhmuc&id=3">Truyện Tiếng Anh</a></li>
                                        <li><a class="dropdown-item" href="./index.php?quanly=danhmuc&id=4">Sách Luyện Thi</a></li>
                                        <li><a class="dropdown-item" href="./index.php?quanly=danhmuc&id=5">Sách Giáo Dục</a></li>
                                    </ul>
                                </li>
                            </ul>
                            <form class="d-md-none" show>
                                <div id="header-searchbox1" class="input-group mt-3 mb-3 w-100 border border-info rounded-3" >
                                    <input type="text" class="form-control border-0" placeholder="Tìm kiếm tựa sách, tác giả,..." aria-label="Input group example" aria-describedby="btnGroupAddon">
                                    <div class="input-group-text border-0 bg-white" id="btnGroupAddon">
                                        <i class="fas fa-solid fa-magnifying-glass"></i>
                                    </div>
                                </div>
                            </form>
                            <div id="phonenumber" class="d-md-flex" hidden>
                                <i class="fa-solid fa-phone mx-2 my-1" style="font-size: 20px;"></i>
                                Hostline: 
                                <a class="nav-link ms-2" href="">0948330411</a>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>  
        </div>
    </div>