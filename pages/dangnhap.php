<?php
	@session_start();
	if(isset($_POST['dangnhap'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql=mysqli_query($conn,"select * from user where user='$username' and pass='$password' limit 1");
		$count=mysqli_num_rows($sql);
		if($count>0){
			$_SESSION['username'] = $username;  
            header('location: index.php');          
		}else{
			echo '<p style="text-align:center;width:auto;padding:30px;background:red;color:#fff;font-size:20px;">Email và Tài khoản bị sai</p>';
		}
	}
?>
    
                        <!-- Modal-đăng nhập -->
                        <div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                            <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h3 class="modal-title" id="exampleModalLabel1">
                                            <i class="fas fa-light fa-circle-exclamation "></i> 
                                            Đăng nhập
                                        </h3>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <!-- Form đăng nhập -->
                                    <form  id="signupForm" action="" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form">
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label" for="username">Tên đăng nhập</label>
                                                    <div class="col-sm-7">
                                                        <input type="text" class="form-control" id="username" name="username" placeholder="Tên đăng nhập" />
                                                    </div>
                                                </div>
                    
                                                <div class="mb-3 row">
                                                    <label class="col-sm-4 col-form-label" for="password">Mật khẩu</label>
                                                    <div class="col-sm-7">
                                                        <input type="password" class="form-control" id="password" name="password" placeholder="Mật khẩu" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                            <button class="btn btn-secondary btn-lg" data-bs-dismiss="modal">Hủy</button>
                                            <button  class="btn btn-primary btn-lg" name="dangnhap" type="submit">Đăng nhập</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>