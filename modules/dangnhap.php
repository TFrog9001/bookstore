<?php
	@session_start();
	if(isset($_POST['dangnhap'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql=mysqli_query($conn,"select * from user where user='$username' and pass='$password' limit 1");
		$count=mysqli_num_rows($sql);
        $row = mysqli_fetch_assoc($sql);
		if($count>0){
            $_SESSION['id_user'] = $row['id_user'];
			$_SESSION['username'] = $username;  
           
            header('location: index.php');          

		}else{
            include('./modules/nav.php');
            include('./modules/main/index.php');
			$error = '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Tài khoản hoặc mật khẩu không đúng!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            
            $showdn = ' <script>
                            $(document).ready(function(){    
                                $("#exampleModal1").modal("show");
                            })    
                        </script>';
            
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
            <?php if(isset($error)) echo $error; ?>
            <!-- Form đăng nhập -->
            <form id="signupForm" action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label" for="username">Tên đăng nhập</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" id="username" name="username"
                                    placeholder="Tên đăng nhập" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label" for="password">Mật khẩu</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Mật khẩu" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <input type="reset" class="btn btn-secondary btn-lg" data-bs-dismiss="modal" value="Hủy">
                    <input type="submit" class="btn btn-primary btn-lg" name="dangnhap" value="Đăng nhập">
                </div>
            </form>
        </div>
    </div>
</div>