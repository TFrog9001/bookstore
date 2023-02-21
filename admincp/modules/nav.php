<nav class="navbar navbar-expand-lg bg-light sticky-top">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
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
                    <a class="nav-link active" href="./admin.php?action=tintuc">Quản Lý Tin Tức</a>
                </li>
            </ul>
            <form class="d-flex flex-row" role="search">
                <div class="input-group d-flex flex-row">
                    <select class="btn dropdown-toggle" id="selector1" name="selector1">
                        <option class="input-group-text" value="*">Tất cả</option>
                        <?php
                            $sql_dm = mysqli_query($conn, "select * from danhmucsach order by ten_dm");
                            if (mysqli_num_rows($sql_dm) > 0) {
                                while ($row = mysqli_fetch_assoc($sql_dm)) {
                                    echo '<option class="input-group-text" value="'.$row['id_dm'].'">'.$row['ten_dm'].'</option>';
                                }
                            }
                        ?>
                    </select>
                    <input required class="form-control" type="search" placeholder="Tìm sản phẩm" aria-label="Search" name="keyword">
                    <input class="btn btn-success input-group-text" type="submit" value="Tìm">
                </div>
            </form>
        </div>
    </div>
</nav>