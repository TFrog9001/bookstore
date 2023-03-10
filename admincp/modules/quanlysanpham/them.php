<div id="main">
    <div class="container">
        <div id="edit_dm" class="col-8 offset-2 mt-5 mb-5">
            <h2 id="edit_dm-header" class="h4 text-uppercase">thêm sản phẩm sách mới</h2>
            <form class="col-12 rounded px-3 py-2" action="./modules/quanlysanpham/xuly.php" method="post" enctype="multipart/form-data">
                <div class="form-group row mb-2">
                    <label class="col-2 pt-3 col-form-label text-right font-weight-bold">Tên sách :</label>
                    <div class="col-10 my-2">
                        <input class="form-control text-capitalize" type="text" name="tensach" id="tensach"
                            placeholder="VD: SCHOLASTIC IN ACTION">
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-2 col-form-label text-right font-weight-bold mt-2">Danh mục :</label>
                    <div class="col-4 my-2">
                        <select class="form-control text-capitalize" id="danhmuc" name="danhmuc">
                            <?php
                            $sql_dm = mysqli_query($conn, "select * from danhmucsach order by ten_dm");
                            if (mysqli_num_rows($sql_dm) > 0) {
                                while ($row = mysqli_fetch_assoc($sql_dm)) {
                                    if($row['tinhtrang_dm']==1){
                                        echo '<option class="input-group-text text-capitalize" value="' . $row['id_dm'] . '">' . $row['ten_dm'] . '</option>';
                                    }
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <label class="col-2 col-form-label text-right font-weight-bold mt-2">Tác giả :</label>
                    <div class="col-4 my-2 ms-0">
                        <input class="form-control text-capitalize" type="text" name="tentg" id="tentg"
                            placeholder="VD: Nam Cao">
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-2 pt-3 col-form-label text-right font-weight-bold">Giá sách :</label>
                    <div class="col-4 my-2">
                        <input class="form-control text-capitalize" type="text" name="gia" id="gia"
                            placeholder="100.000">
                    </div>
                    <label class="col-2 pt-3 col-form-label text-right font-weight-bold">Giá giảm :</label>
                    <div class="col-4 my-2">
                        <input class="form-control text-capitalize" type="text" name="giagiam" id="giagiam"
                            placeholder="100.000">
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-2 pt-3 col-form-label text-right font-weight-bold">Hình ảnh :</label>
                    <div class="col-10 my-2">
                        <input class="form-control text-capitalize" type="file" name="hinhanh" id="hinhanh" accept="image/png, image/jpg">
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-2 pt-3 col-form-label text-right font-weight-bold">Số lượng :</label>
                    <div class="col-2 my-2">
                        <input class="form-control text-capitalize" type="number" value="1" name="soluong" id="soluong">
                    </div>
                    <label class="offset-2 col-2 pt-3 col-form-label text-right font-weight-bold">Tình trạng :</label>
                    <div class="col-3 my-3">
                        <select class="form-control" name="tinhtrang" id="tinhtrang">
                            <option class="input-group-text" value="1">Kích hoạt</option>
                            <option class="input-group-text" value="0">Vô hiệu hóa</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-2 pt-3 col-form-label text-right font-weight-bold">Mô tả :</label>
                    <div class="col-10 my-2">
                        <textarea class="mytextarea" name="mota" id="mota" cols="60" rows="10"></textarea>
                    </div>
                </div>

                <div class="form-group row mt-4">
                    <div class="text-center">
                        <input name="them_sp" type="submit" class="btn btn-primary me-5" value="Thêm sản phẩm">
                        <input type="reset" class="btn btn-danger" value="Huỷ">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>