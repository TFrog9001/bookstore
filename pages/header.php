    <div id="header">
        <div class="container-fluid mt-2">
            <div class="row mb-2">
                <div class="offset-1 col-2 mt-2">
                    <img id="logobook" src="./images/logobook.jpg" alt="logobook">
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
                        <div class="col-5">
                            <a class="nav-link ms-3" href="./index.php?quanly=giohang" style="width: 150px;">
                                <i class="fas fa-shopping-cart" style="font-size: 30px;"></i> 
                                <p class="d-md-inline" hidden>Giỏ hàng</p>
                            </a>
                        </div>
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
                        <!-- Modal-đăng nhập -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel1">
                                            <i class="fas fa-light fa-circle-exclamation "></i> 
                                            Đăng nhập
                                        </h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- Form đăng nhập -->
                                    <form  id="signupForm" action="" method="post" >
                                        <div class="modal-body">
                                            <div class="form">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label" for="username">Tên đăng nhập</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" />
                                                    </div>
                                                </div>
                    
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label" for="password">Mật khẩu</label>
                                                    <div class="col-sm-7">
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Hủy</button>
                                            <button  class="btn btn-primary btn-lg" type="submit">Đăng nhập</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- Modal-đăng ký -->
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                            <div class="modal-dialog  modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel2">
                                            <i class="fas fa-light fa-circle-exclamation "></i> 
                                            Đăng ký thành viên
                                        </h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- Form đăng ký -->
                                    <form  id="signupForm" action="" method="post" >
                                        <div class="modal-body">
                                            <div class="form">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label" for="firstname">Họ tên của bạn</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Tên của bạn" />
                                                    </div>
                                                </div>
                    
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label" for="username">Tên đăng nhập</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" />
                                                    </div>
                                                </div>
                    
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label" for="email">Email</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Hộp thư điện tử" />
                                                    </div>
                                                </div>
                    
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label" for="password">Mật khẩu</label>
                                                    <div class="col-sm-7">
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" />
                                                    </div>
                                                </div>
        
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label" for="confirm_password">Nhập lại mật khẩu</label>
                                                    <div class="col-sm-7">
                                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu" />
                                                    </div>
                                                </div>
                                            </div>
                
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Hủy</button>
                                            <button  class="btn btn-primary btn-lg" type="submit">Đăng ký</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
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
                                    <a class="nav-link active" aria-current="page" href="./index.php?quanly=trangchu">Home</a>
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