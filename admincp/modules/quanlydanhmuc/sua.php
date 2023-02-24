<?php
    if (isset($_GET['id']) && $_GET['id'] != "") {
        $id_dm = $_GET['id'];
    }
    $row = mysqli_query($conn, "select * from danhmucsach where id_dm = $id_dm");
    $row_tmp = mysqli_fetch_array($row);
?>

<div id="main">
    <div class="container">
        <div id="edit_dm" class="col-6 offset-3 mt-5">
            <h2 id="edit_dm-header" class="h4 text-uppercase">Thông tin của danh mục</h2>
            <form class="col-12 rounded px-3 py-2" action="./modules/quanlydanhmuc/xuly.php?id=<?php echo $row_tmp['id_dm'] ?>" method="post" enctype="multipart/form-data">
                <div class="form-group row mb-2">
                    <label class="col-form-label text-right font-weight-bold">Tên danh mục: </label>
                    <div class="my-2">
                        <input class="form-control text-capitalize" type="text" name="tendanhmuc" id="tendanhmuc" value="<?php echo $row_tmp['ten_dm']?>">
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-3 col-form-label text-right font-weight-bold">Tình trạng: </label>
                    <div class="col-4 my-2">
                        <select name="tinhtrang" id="tinhtrang">
                            <?php 
                            if($row_tmp['tinhtrang']==1){
                                echo '
                                <option value="1" selected="selected">Kích hoạt</option>
                                <option value="0">Vô hiệu hóa</option>
                                ';
                            }
                            else{
                                echo '
                                <option value="1" >Kích hoạt</option>
                                <option value="0" selected="selected">Vô hiệu hóa</option>
                                ';
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="">
                        <input name="edit_dm" type="submit" class="btn btn-primary" value="Lưu lại">
                        <input type="reset" class="btn btn-secondary" value="Hủy">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
';