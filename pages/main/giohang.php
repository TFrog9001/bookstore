    <div id="main-cart">
        <div class="container">
            <div class="col-12">
                <h2 class="text-uppercase my-4">Giỏ hàng</h2>
                <div>
                    <div class="cart">
                        <div class="cart-thead row py-3 d-sm-flex" hidden>
                            <div style="width: 19%;" class="text-center">Sản phẩm</div>
                            <div style="width: 28%" class="text-center">Tên sách</div>
                            <div style="width: 17%" class="text-center">Đơn giá</div>
                            <div style="width: 18%" class="text-center">Số lượng</div>
                            <div style="width: 5%" class="text-center">Xóa</div>
                            <div style="width: 13%;" class="text-center">Thành tiền</div>
                        </div>
                        <div class="cart-tbody row">
                            <div style="width: 19%" class="image">
                                <img width="120" height="auto" alt="" src="./images/book-img/book1.png">
                            </div>
                            <div style="width: 28%;">
                                <span class="book-name">Book's name</span>
                            </div>
                            <div style="width: 17%" class="d-sm-flex" hidden>
                                <span class="book-price">100.000VND</span>
                            </div>
                            <div style="width: 17%" class="d-sm-flex">
                                <div class="d-flex justify-content-center">
                                    <div class="buy-amount d-flex ms-2">
                                        <button id="btn-minus">-</button>         
                                        <input class="text-center border border-light-subtle" type="text" name="amount" id="amount" size="2" value="1" style="height: 35px;">
                                        <button id="btn-plus">+</button>         
                                    </div>
                                </div>
                            </div>
                            <div style="width: 5%" class="text-center">
                                <i class="fa fa-remove" data-bs-toggle="modal" data-bs-target="#exampleModal3"></i>
                            </div>
                            <div style="width: 13%;" class="d-sm-flex" hidden>
                                100.00VND
                            </div>
                        </div>
                        <form>
                            <div class="cart-tfooter row my-4">
                                <div class="text-end mb-4">
                                    <div class="d-flex justify-content-end mb-4">
                                        <div class="h4 me-4" style="margin-bottom: 0;margin-top: 7px;">
                                            Tổng tiền:
                                        </div>
                                        <div id="total-price" class="text-danger">
                                            100.000VND
                                        </div>
                                    </div>
                                    <button class="btn btn-danger btn-lg" type="submit">Thanh Toán</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Modal-xoa -->
            <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModalLabel3" aria-hidden="true">
                <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel3">
                        <i class="fas fa-light fa-circle-exclamation"></i>
                        Thông báo
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p class="h3">Sản phẩm sẽ bị xóa khỏi giỏ hàng</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                        <button type="button" class="btn btn-primary">Xóa</button>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>