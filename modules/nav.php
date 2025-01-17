                 <!-- Navbar -->        
                <nav class="navbar navbar-expand-lg navbar-light color-53a57f sticky-top z-2">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse ms-3" id="navbarContent">
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="./index.php#">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./index.php?quanly=gioithieu">Giới Thiệu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="./index.php?quanly=lienhe">Liên Hệ</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Danh Mục Sách
                                    </a>
                                    <ul class="dropdown-menu list-menu" aria-labelledby="navbarDropdown">
                                        <li><a class="dropdown-item text-capitalize" href="./index.php?quanly=danhmuc&id_dm=all&page=1">Tất cả</a></li>
                                        <?php
                                            $sql_dm = mysqli_query($conn,"select * from danhmucsach order by id_dm");
                                            if (mysqli_num_rows($sql_dm) > 0) {
                                                while($row = mysqli_fetch_assoc($sql_dm)) {
                                                    if($row['tinhtrang_dm']==1){
                                                        echo '<li><a class="dropdown-item text-capitalize" href="./index.php?quanly=danhmuc&id_dm='.$row['id_dm'].'&page=1">'.$row['ten_dm'].'</a></li>';
                                                    }
                                                }
                                            }
                                        ?>
                                        <li><a class="dropdown-item text-capitalize" href="./index.php?quanly=danhmuc&id_dm=other&page=1">Thể loại khác</a></li>
                                    </ul>
                                </li>
                            </ul>
                            
                            <form action="./index.php" method="post" class="d-md-none" show>
                                <div id="header-searchbox" class="input-group mt-3 w-100 border border-info rounded-3" >
                                    <input required type="text" name="key" class="form-control border-0" placeholder="Tìm kiếm tựa sách, tác giả,..." aria-label="Input group example" aria-describedby="btnGroupAddon">
                                    <button name="search" type="submit" class="input-group-text border-0 bg-white" id="btnGroupAddon">
                                        <i class="fas fa-solid fa-magnifying-glass"></i>
                                    </button>
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
           