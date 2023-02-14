    <div id="main-product">
        <div class="container">
            <div id="main-breadcrumb" class="border border-light-subtle px-4 my-3 pt-2" aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item"><a href="#">Ten danh muc</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Book's name</li>
                </ol>
            </div>
            <!-- San pham -->
            <div class="row my-3">
                <div class="col-md-5 col-12">
                    <div class="card text-center">
                        <div class="m-2">
                            <img class="img" src="./images/book-img/book1.png" alt="book1">
                        </div>
                        <div class="card-body">
                            <nav class="hinhanhthunho">
                                <div class="d-inline">
                                    <img class="img-fluid w-25 " src="./images/book-img/book1.png" alt="book1">
                                </div>
                                <div class="d-inline">
                                    <img class="img-fluid w-25 " src="./images/book-img/book1.png" alt="book1">
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-12">
                    <div class="tensp row">
                        <h2 class="text-uppercase">Book's Name</h2>
                    </div>
                    <div class="giasp row">
                        <h2 class="text-danger text-uppercase">100.000 VND</h2>
                    </div>
                    <div class="mt-4 row">
                        <div>
                            <div class="d-flex">
                                <label class="text-uppercase d-inline mt-2" for="">Số lượng:</label>
                                <div class="buy-amount d-flex ms-2">
                                    <button class="btn-minus">-</button>         
                                    <input class="text-center border border-light-subtle" type="text" name="amount" id="amount" size="2" value="1">
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
                  <button class="nav-link text-black active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Mô tả</button>
                  <button class="nav-link text-black" id="nav-profile-tab" data-bs-toggle="tab" data-bs-target="#nav-profile" type="button" role="tab" aria-controls="nav-profile" aria-selected="false">Đánh giá (0)</button>
                  <button class="nav-link text-black" id="nav-contact-tab" data-bs-toggle="tab" data-bs-target="#nav-contact" type="button" role="tab" aria-controls="nav-contact" aria-selected="false">TAGS</button>
                </div>
            </nav>
            <div class="tab-content mb-4" id="nav-tabContent">
                <div class="tab-pane fade  show active border border-light-subtle p-3" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <p class="">
                        MÔ TẢ
                    ❌❌❌  Dr.Seus (33 cuốn)
                    ???? ????Đâu là những cuốn sách mà đệ nhất phu nhân Mỹ Melania Trump gửi tặng cho trẻ em nước Mỹ? Xin trả lời, đó là sách của nhà văn Dr Seuss

                    ???????? Để trả lời cho câu hỏi làm thế nào để khơi gợi được niềm đam mê đọc sách của những đứa trẻ ngay từ khi còn bé? Chúng tôi mang tới cho trẻ em Việt Nam những cuốn sách của nhà văn Dr Seuss. Để nói về Dr Seuss thì cũng chỉ cần tóm gọn một câu: “ Nhà văn làm thay đổi giáo dục nước Mỹ”.

                    ???????? Những vấn đề ngây thơ, tò mò, thích sự mới lạ, sẵn sàng chịu thử thách của con trẻ, được Dr Seuss đề cập cũng với một cách ngây thơ, vui nhộn và đáng yêu không kém trong sách của ông.

                    ????❄️ Vì sao mà gã Grinch lại ghét Giáng Sinh? Vì lão từng bị tổn thương bởi sự cô đơn ghẻ lạnh

                    ❤️❄️ Làm thế nào để lão Grinch yêu Giáng Sinh ? Không phải những món quà, những cửa hàng, cửa hiệu mà chính là sự quan tâm, biết chia sẻ và gần gũi của các cô bé, cậu nhỏ trong câu chuyện.
                
                    </p>    
                </div>
                <div class="tab-pane fade border border-light-subtle" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                    <form class="col-12 rounded p-3" method="" >
                        <h2>Đánh giá</h2>
                        <p>Hãy đưa ra nhận xét của bạn:</p>
                        <div class="form-group row mb-2">
                            <label class="col-form-label text-right font-weight-bold">Tên (<strong class="text-danger">*</strong>)</label>
                            <div class="my-2">
                                <input class="form-control" type="text" placeholder="Tên">
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label class="col-form-label text-right font-weight-bold">Email (<strong class="text-danger">*</strong>)</label>
                            <div class="my-2">
                                <input class="form-control" type="text" placeholder="Nhập vào email">
                            </div>
                        </div>

                        <div class="form-group row mb-2">
                            <label class="col-form-label text-right font-weight-bold">Nhận xét của bạn (<strong class="text-danger">*</strong>)</label>
                            <div class="my-2">
                                <textarea class="form-control" name="comnent" id="comment"  rows="7"></textarea>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <div class="">
                                <button type="submit" class="btn btn-danger">Gửi đi</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-pane fade border border-light-subtle" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">

                </div>
            </div>
        </div>
    </div>