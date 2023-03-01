<?php
    
    if(isset($_GET['id_sach']) && $_GET['id_sach'] != ''){
        $id_sach = $_GET['id_sach'];
        $sql_ct = mysqli_query($conn,"select * from sach s join danhmucsach dm on s.id_dm = dm.id_dm having s.id_sach = $id_sach");
        $row = mysqli_fetch_array($sql_ct);  
        // echo mysqli_num_rows($sql_ct);
        
        $gia = number_format ( $row['gia'] , $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND'; 
    }

?>
<div id="main-product">
    <div class="container">
        <div id="main-breadcrumb" class="border border-light-subtle px-4 my-3 pt-2" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item text-capitalize"><a href="#">Home</a></li>
                <li class="breadcrumb-item text-capitalize"><a href="#"><?php echo $row['ten_dm']?></a></li>
                <li class="breadcrumb-item text-capitalize active" aria-current="page"><?php echo $row['ten_sach']?></li>
            </ol>
        </div>
        <!-- San pham -->
        <div class="row my-3">
            <div class="col-md-5 col-12">
                <div class="card text-center">
                    <div class="m-2">
                        <img class="img" src="./admincp/modules/quanlysanpham/upload/<?php echo $row['hinhanh']?>" alt="<?php echo $row['hinhanh']?>">
                    </div>
                    <div class="card-body">
                        <nav class="hinhanhthunho">
                            <div class="d-inline">
                                <img class="img-fluid w-25 " src="./admincp/modules/quanlysanpham/upload/<?php echo $row['hinhanh']?>" alt="<?php echo $row['hinhanh']?>">
                            </div>
                            
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-md-7 col-12">
                <div class="tensp row">
                    <h2 class="text-uppercase"><?php echo $row['ten_sach']?></h2>
                </div>
                <div class="giasp row">
                    <h2 class="text-danger text-uppercase"><?php echo $gia?></h2>
                </div>
                <div class="mt-4 row">
                    <div>
                        <div class="d-flex">
                            <label class="text-uppercase d-inline mt-2" for="">Số lượng:</label>
                            <div class="buy-amount d-flex ms-2">
                                <button class="btn-minus">-</button>
                                <input class="text-center border border-light-subtle" type="text" name="amount"
                                    id="amount" size="2" value="1">
                                <button class="btn-plus">+</button>
                            </div>
                        </div>
                        <div class="d-flex mt-5">
                            <button class="btn btn-lg btn-danger">Mua hàng</button>
                            <button class="btn btn-lg btn-primary text-white ms-2">Thêm vào giỏ</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Mota -->
        <nav>
            <div class="nav nav-tabs bg-info-subtle" id="nav-tab" role="tablist">
                <button class="nav-link text-black active" id="nav-home-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Mô
                    tả</button>
                <button class="nav-link text-black" id="nav-profile-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile"
                    aria-selected="false">Đánh giá (0)</button>
                <button class="nav-link text-black" id="nav-contact-tab" data-bs-toggle="tab"
                    data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact"
                    aria-selected="false">TAGS</button>
            </div>
        </nav>
        <div class="tab-content mb-4" id="nav-tabContent">
            <div class="tab-pane fade  show active border border-light-subtle p-3" id="nav-home" role="tabpanel"
                aria-labelledby="nav-home-tab">
                <div class="">
                    <?php echo $row['mota']?>
                </div>
            </div>
            <div class="tab-pane fade border border-light-subtle" id="nav-profile" role="tabpanel"
                aria-labelledby="nav-profile-tab">
                <form class="col-12 rounded p-3" method="">
                    <h2>Đánh giá</h2>
                    <p>Hãy đưa ra nhận xét của bạn:</p>
                    <div class="form-group row mb-2">
                        <label class="col-form-label text-right font-weight-bold">Tên (<strong
                                class="text-danger">*</strong>)</label>
                        <div class="my-2">
                            <input class="form-control" type="text" placeholder="Tên">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-form-label text-right font-weight-bold">Email (<strong
                                class="text-danger">*</strong>)</label>
                        <div class="my-2">
                            <input class="form-control" type="text" placeholder="Nhập vào email">
                        </div>
                    </div>

                    <div class="form-group row mb-2">
                        <label class="col-form-label text-right font-weight-bold">Nhận xét của bạn (<strong
                                class="text-danger">*</strong>)</label>
                        <div class="my-2">
                            <textarea class="form-control" name="comnent" id="comment" rows="7"></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="">
                            <button type="submit" class="btn btn-danger">Gửi đi</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="tab-pane fade border border-light-subtle" id="nav-contact" role="tabpanel"
                aria-labelledby="nav-contact-tab">

            </div>
        </div>
    </div>
</div>