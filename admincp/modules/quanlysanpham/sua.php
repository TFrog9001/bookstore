<?php
    if (isset($_GET['id']) && $_GET['id'] != "") {
        $id_sach = $_GET['id'];
    }
    $row = mysqli_query($conn, "select * from sach where id_sach = $id_sach");
    $row_tmp = mysqli_fetch_array($row);
?>

<div id="main">
    <div class="container">
        <div id="edit_dm" class="col-8 offset-2 mt-5 mb-5">
            <h2 id="edit_dm-header" class="h4 text-uppercase">thêm sản phẩm sách mới</h2>
            <form class="col-12 rounded px-3 py-2" action="./modules/quanlysanpham/xuly.php?id_sach=<?php echo $row_tmp['id_sach'];?>" method="post" enctype="multipart/form-data">
                <div class="form-group row mb-2">
                    <label class="col-2 pt-3 col-form-label text-right font-weight-bold">Tên sách :</label>
                    <div class="col-10 my-2">
                        <input class="form-control text-capitalize" type="text" name="tensach" id="tensach"
                            value="<?php echo $row_tmp['ten_sach'];?>">
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-2 col-form-label text-right font-weight-bold">Danh mục :</label>
                    <div class="col-4 my-2">
                        <select class="form-control text-capitalize" id="danhmuc" name="danhmuc">
                            <?php
                            $sql_dm = mysqli_query($conn, "select * from danhmucsach order by ten_dm");
                            if (mysqli_num_rows($sql_dm) > 0) {
                                while ($row = mysqli_fetch_assoc($sql_dm)) {
                                    if($row['tinhtrang_dm']==1){
                                        if($row['id_dm'] == $row_tmp['id_dm']){
                                            echo '<option selected="selected" class="input-group-text text-capitalize" value="' . $row['id_dm'] . '">' . $row['ten_dm'] . '</option>';
                                        }
                                        else{
                                            echo '<option class="input-group-text text-capitalize" value="' . $row['id_dm'] . '">' . $row['ten_dm'] . '</option>';
                                        }
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <label class="col-2 col-form-label text-right font-weight-bold mt-2">Tác giả :</label>
                    <div class="col-4 my-2 ms-0">
                        <input class="form-control text-capitalize" type="text" name="tentg" id="tentg"
                            value="<?php echo $row_tmp['ten_tg'];?>">
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-2 pt-3 col-form-label text-right font-weight-bold">Giá sách :</label>
                    <div class="col-4 my-2">
                        <input class="form-control text-capitalize" type="text" name="gia" id="gia"
                            value="<?php echo $row_tmp['gia'];?>">
                    </div>
                    <label class="col-2 pt-3 col-form-label text-right font-weight-bold">Giá giảm :</label>
                    <div class="col-4 my-2">
                        <input class="form-control text-capitalize" type="text" name="giagiam" id="giagiam"
                            value="<?php echo $row_tmp['giagiam'];?>">
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-2 pt-3 col-form-label text-right font-weight-bold">Hình ảnh :</label>
                    <div class="col-10 my-2">
                        <input class="form-control text-capitalize" type="file" name="hinhanh" id="hinhanh" accept="image/png, image/jpg">
                        <img class="w-25" src="./modules/quanlysanpham/upload/<?php echo $row_tmp['hinhanh'];?>" alt="">
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-2 pt-3 col-form-label text-right font-weight-bold">Số lượng :</label>
                    <div class="col-2 my-2">
                        <input class="form-control text-capitalize" type="number" value="<?php echo $row_tmp['soluong'];?>" name="soluong" id="soluong">
                    </div>
                    <label class="offset-2 col-2 pt-3 col-form-label text-right font-weight-bold">Tình trạng :</label>
                    <div class="col-3 my-3">
                        <select class="form-control" name="tinhtrang" id="tinhtrang">
                            <?php 
                                if($row_tmp['tinhtrang'] == 1){
                                    echo '
                                    <option selected="selected" class="input-group-text" value="1">Kích hoạt</option>
                                    <option class="input-group-text" value="0">Vô hiệu hóa</option>
                                    ';
                                }
                                else{
                                    echo '
                                    <option class="input-group-text" value="1">Kích hoạt</option>
                                    <option selected="selected" class="input-group-text" value="0">Vô hiệu hóa</option>
                                    ';
                                }
                            ?>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-2 pt-3 col-form-label text-right font-weight-bold">Mô tả :</label>
                    <div class="col-10 my-2">
                        <textarea class="mytextarea" name="mota" id="mota" cols="60" rows="10">
                            <?php echo $row_tmp['mota']; ?>
                        </textarea>
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <div class="text-center">
                        <input name="edit_sp" type="submit" class="btn btn-primary me-5" value="Lưu lại">
                        <input type="reset" class="btn btn-danger" value="Huỷ">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>