<?php
    if (isset($_GET['id']) && $_GET['id'] != "") {
        $id_user = $_GET['id'];
    }
    $row = mysqli_query($conn, "select * from user where id_user = $id_user");
    $row_tmp = mysqli_fetch_array($row);
?>

<div id="main">
    <div class="container">
        <div id="edit_dm" class="col-6 offset-3 mt-5 mb-5">
            <h2 id="edit_dm-header" class="h4 text-uppercase">Thông tin khách hàng</h2>
            <form class="col-12 rounded px-3 py-2" action="./modules/quanlyuser/xuly.php?id_user=<?php echo $row_tmp['id_user'];?>" method="post" enctype="multipart/form-data">
                <div class="form-group row mb-2">
                    <label class="col-3 pt-3 col-form-label text-right font-weight-bold">Họ tên :</label>
                    <div class="col-8 my-2">
                        <input class="form-control text-capitalize" type="text" name="name" id="name"
                            value="<?php echo $row_tmp['name'];?>">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-3 pt-3 col-form-label text-right font-weight-bold">Email :</label>
                    <div class="col-8 my-2">
                        <input class="form-control" type="text" name="email" id="email"
                            value="<?php echo $row_tmp['email'];?>">
                    </div>
                </div>
                <div class="form-group row mb-2">
                    <label class="col-3 col-form-label text-right font-weight-bold">Tình trạng :</label>
                    <div class="col-4 my-2">
                        <select class="form-control text-capitalize" id="tinhtrang" name="tinhtrang">
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

                <div class="form-group row mt-4">
                    <div class="text-center">
                        <input name="edit_user" type="submit" class="btn btn-primary me-5" value="Lưu lại">
                        <input type="reset" class="btn btn-danger" value="Huỷ">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>