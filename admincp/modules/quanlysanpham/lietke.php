<div id="main-sp">
    <div class="container">
        <div class="col-12">
            <div class="row my-2">
                <div class="col-10">
                    <h3 class="text-uppercase my-3">Danh sách sản phẩm</h3>
                </div>
            </div>
            <div class="row mb-4">
                <form class="col-5" role="search" method="post" enctype="multipart/form-data">
                    <div class="input-group d-flex flex-row">
                        <select class="btn dropdown-toggle text-capitalize" id="selector1" name="selector1">
                            <option class="input-group-text" value="*">Tất cả</option>
                            <?php
                            $sql_dm = mysqli_query($conn, "select * from danhmucsach order by id_dm");
                            if (mysqli_num_rows($sql_dm) > 0) {
                                while ($row = mysqli_fetch_assoc($sql_dm)) {
                                    if ($row['tinhtrang'] == 1) {
                                        echo '<option class="input-group-text text-capitalize" value="' . $row['id_dm'] . '">' . $row['ten_dm'] . '</option>';
                                    }
                                }
                            }
                            ?>
                        </select>
                        <input required class="form-control" type="search" placeholder="Tìm sản phẩm"
                            aria-label="Search" name="keyword">
                        <input name="search_book" class="btn btn-success input-group-text" type="submit" value="Tìm">
                    </div>
                </form>
                <div class="col d-flex justify-content-end">
                    <a href="./admin.php?action=them_sp">
                        <button class="btn btn-success text-truncate">
                            <i class="fas fa-solid fa-plus"></i>
                            Thêm sản phẩm
                        </button>
                    </a>
                </div>
            </div>

            <table id="tbl-sp" class="container mb-5">
                <thead>
                    <th>ID</th>
                    <th width="200">Hình ảnh </th>
                    <th>Tên sách</th>
                    <th>Loại sách</th>
                    <th>Giá bán</th>
                    <th>Giá giảm</th>
                    <th>Số lượng</th>
                    <th>Tình trạng</th>
                    <th>Xóa</th>
                    <th>Chỉnh sửa</th>
                </thead>
                <tbody>
                    <?php 
                        $sql_sp = mysqli_query($conn,"select * from sach s join danhmucsach dm on s.id_dm = dm.id_dm order by id_sach;");
                        $i = 1;
                        $modal='';
                        if (mysqli_num_rows($sql_sp) > 0) {
                            while ($row = mysqli_fetch_assoc($sql_sp)) {

                                if ($i % 2 == 0) {
                                    $color = ' color-dbe3eb ';
                                }
                                else {
                                    $color = '';     
                                }
    
                                if($row['tinhtrang'] == 1){
                                    $sl = 'Kích hoạt';
                                }
                                else {
                                    $sl = 'Vô hiệu hóa';
                                }
                                if($row['tinhtrang_dm'] == 1){
                                    echo '
                                    <tr class="'.$color.'">
                                        <td>'.$row['id_sach'].'</td>
                                        <td>
                                            <img class="img-fluid" src="./modules/quanlysanpham/upload/'.$row['hinhanh'].'" alt="'.$row['hinhanh'].'">
                                        </td>
                                        <td class="text-capitalize">
                                            '.$row['ten_sach'].'
                                        </td>
                                        <td class="text-capitalize">
                                            '.$row['ten_dm'].'
                                        </td>
                                        <td>
                                            '.$row['gia'].'
                                        </td>
                                        <td>
                                            '.$row['giagiam'].'
                                        </td>
                                        <td>
                                            '.$row['soluong'].'
                                        </td>
                                        <td>
                                            '.$sl.'
                                        </td>
                                        <td>
                                            <i class="fas fa-remove" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal' . $row['id_sach'] . '"></i>
                                        </td>
                                        <td>
                                            <a href="./admin.php?action=edit_sp&id=' . $row['id_sach'] . '" class="text-dark">
                                                <i class="fas fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    ';
                                    $modal = $modal . '
                                    <!-- Modal-xoa '.$i.'-->
                                    <div class="modal fade" id="exampleModal' . $row['id_sach'] . '" tabindex="-1"
                                        aria-labelledby="exampleModalLabel' . $row['id_sach'] . '" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel' . $row['id_sach'] . '">
                                                        <i class="fas fa-light fa-circle-exclamation"></i>
                                                        Thông báo
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="h3">
                                                        Danh mục
                                                        <strong class="text-capitalize text-decoration-underline"> ' . $row['ten_sach'] . '
                                                        </strong>
                                                        sẽ bị xóa khỏi dữ liệu
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <form action="./modules/quanlysanpham/xuly.php" method="post">
                                                        <input value="' . $row['id_sach'] . '" name="id_sach" hidden>
                                                        <button type="submit" name="xoa_sp" class="btn btn-primary">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ';
                                }    
                                $i++;    
                            }
                        }
                    ?>  
                </tbody>
            </table>
            <?php 
                echo $modal;
            ?>
        </div>
    </div>
</div>