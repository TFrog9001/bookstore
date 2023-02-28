<div id="main">
    <div class="container">
        <div id="edit_dm" class="col-6 offset-3 mt-5">
            <h2 id="edit_dm-header" class="h4 text-uppercase">Thông tin của danh mục</h2>
            <form class="col-12 rounded px-3 py-2" action="./modules/quanlydanhmuc/xuly.php" method="post" enctype="multipart/form-data">
                <div class="form-group row mb-2">
                    <label class="col-form-label text-right font-weight-bold">Tên danh mục: </label>
                    <div class="my-2">
                        <input class="form-control text-capitalize" type="text" name="tendanhmuc" id="tendanhmuc" placeholder="VD: sách giáo dục">
                    </div>
                </div>

                <div class="form-group row mb-2">
                    <label class="col-3 col-form-label text-right font-weight-bold">Tình trạng: </label>
                    <div class="col-4 my-2">
                        <select name="tinhtrang_dm" id="tinhtrang_dm">
                            <option value="1">Kích hoạt</option>
                            <option value="0">Vô hiệu hóa</option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <div class="">
                        <input name="them_dm" type="submit" class="btn btn-primary" value="Thêm danh mục">
                        <input type="reset" class="btn btn-danger" value="Huỷ">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
';