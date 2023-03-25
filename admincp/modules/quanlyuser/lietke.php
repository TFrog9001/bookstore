<div id="main-user">
    <div class="container">
        <div class="col-12">
            <div class="row my-2">
                <div class="col-10">
                    <h3 class="text-uppercase my-3">Danh sách khách hàng</h3>
                </div>
            </div>
            <div class="row mb-4">
                <form class="col-5" role="search" method="post" enctype="multipart/form-data">
                    <div class="input-group d-flex flex-row">
                        <input required class="form-control" type="search" placeholder="Tìm khách hàng"
                            aria-label="Search" name="keyword">
                        <input name="search_book" class="btn btn-success input-group-text" type="submit" value="Tìm">
                    </div>
                </form>
            </div>

            <table id="tbl-user" class="container mb-5">
                <thead>
                    <th>ID</th>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Tình trạng</th>
                    <th>Đơn hàng</th>
                    <th>Xóa</th>
                    <th>Chỉnh sửa</th>
                </thead>
                <tbody>
                    <?php 
                        $sql_sp = mysqli_query($conn,"select * from user");
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
                               
                                    echo '
                                    <tr class="'.$color.'">
                                        <td>'.$row['id_user'].'</td>
                                        <td class="text-capitalize">
                                            '.$row['name'].'
                                        </td>
                                        <td >
                                            '.$row['email'].'
                                        </td>
                                        <td>
                                            '.$sl.'
                                        </td>
                                        <td>
                                            <a href="./admin.php?action=list-dh&id_user=' . $row['id_user'] . '" class="text-dark">     
                                                <i class="fas fa-solid fa-clipboard-list"></i>
                                            </a>
                                        </td>
                                        <td>
                                            <i class="fas fa-remove" data-bs-toggle="modal"
                                                data-bs-target="#exampleModal' . $row['id_user'] . '"></i>
                                        </td>
                                        <td>
                                            <a href="./admin.php?action=edit_user&id=' . $row['id_user'] . '" class="text-dark">
                                                <i class="fas fa-regular fa-pen-to-square"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    ';
                                    $modal = $modal . '
                                    <!-- Modal-xoa '.$i.'-->
                                    <div class="modal fade" id="exampleModal' . $row['id_user'] . '" tabindex="-1"
                                        aria-labelledby="exampleModalLabel' . $row['id_user'] . '" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel' . $row['id_user'] . '">
                                                        <i class="fas fa-light fa-circle-exclamation"></i>
                                                        Thông báo
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <p class="h3">
                                                        Người dùng
                                                        <strong class="text-capitalize text-decoration-underline"> ' . $row['name'] . '
                                                        </strong>
                                                        sẽ bị xóa khỏi dữ liệu
                                                    </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                    <form action="./modules/quanlyuser/xuly.php" method="post">
                                                        <input value="' . $row['id_user'] . '" name="id_user" hidden>
                                                        <button type="submit" name="xoa_user" class="btn btn-primary">Xóa</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    ';  
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