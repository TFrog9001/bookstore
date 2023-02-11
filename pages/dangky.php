<?php
	if(isset($_POST['gui'])){
		$tenkh=$_POST['name'];
        $username=$_POST['username'];
		$email=$_POST['email'];
		$pass=$_POST['password'];
		$sql_dangky=mysqli_query($conn,"insert into user (name, email, user, pass) value('$tenkh','$email','$username','$pass')");
		    
        if($sql_dangky){
            echo '<h3 style="margin-left:5px;">Bạn đã đăng ký thành công</h3>';
            echo '<a href="?quanly=dangnhap" style="margin:20px;text-decoration:none;">Quay lại để đăng nhập mua hàng</a>';
        }
	}
?>                   
                    
                    
                    <!-- Modal-đăng ký -->
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                            <div class="modal-dialog  modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel2">
                                            <i class="fas fa-light fa-circle-exclamation "></i> 
                                            Đăng ký thành viên
                                        </h3>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- Form đăng ký -->
                                    <form  id="signupForm" action="" method="post" >
                                        <div class="modal-body">
                                            <div class="form">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label" for="name">Họ tên của bạn</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" id="name" name="name" placeholder="Tên của bạn" />
                                                    </div>
                                                </div>
                    
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label" for="username">Tên đăng nhập</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" />
                                                    </div>
                                                </div>
                    
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label" for="email">Email</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" id="email" name="email" placeholder="Hộp thư điện tử" />
                                                    </div>
                                                </div>
                    
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label" for="password">Mật khẩu</label>
                                                    <div class="col-sm-7">
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" />
                                                    </div>
                                                </div>
        
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label" for="confirm_password">Nhập lại mật khẩu</label>
                                                    <div class="col-sm-7">
                                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" placeholder="Nhập lại mật khẩu" />
                                                    </div>
                                                </div>
                                            </div>
                
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Hủy</button>
                                            <button  class="btn btn-primary btn-lg" name="gui" type="submit">Đăng ký</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>