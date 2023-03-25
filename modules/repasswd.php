<?php
	@session_start();
	if(isset($_POST['repw'])){
		$username=$_SESSION['username'];
		$password=$_POST['password'];
        $newpasswd=$_POST['newpassword'];
		$sql=mysqli_query($conn,"select * from user where user='$username' and pass='$password' limit 1");
		$count=mysqli_num_rows($sql);
        $row = mysqli_fetch_assoc($sql);
		if($count>0){
            $id_user =  $row['id_user'];
            $sql_sua = "update user set pass='$newpasswd' where id_user = $id_user";
            mysqli_query($conn,$sql_sua);
            echo '
                    <script>
                        window.location.href="./index.php?quanly=taikhoan"
                    </script>
                ';
            exit(); 
		}else{
            include('./modules/nav.php');
            include('./modules/main/taikhoan.php');
			$error = '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Mật khẩu không trung khớp!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            
            $showdn = ' <script>
                            $(document).ready(function(){    
                                $("#repw").modal("show");
                            })    
                        </script>';
            
		}
	}
?>
<!-- Modal-repw -->
<div class="modal fade" id="modal-repw" tabindex="-1" aria-labelledby="modal-repwLabel3" aria-hidden="true">
    <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modal-repwLabel3">
                    <i class="fas fa-light fa-circle-exclamation "></i>
                    Đổi mật khẩu
                </h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Form đăng ký -->
            <form id="signupForm" action="" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form">
                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label" for="password">Mật khẩu cũ</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="password" name="password"
                                    placeholder="Mật khẩu cũ" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label" for="newpassword">Mật khẩu</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="newpassword" name="newpassword"
                                    placeholder="Mật khẩu" />
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label class="col-sm-4 col-form-label" for="confirm_password">Nhập lại mật khẩu</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="confirm_password"
                                    name="confirm_password" placeholder="Nhập lại mật khẩu" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer justify-content-center">
                    <input type="reset" class="btn btn-secondary" data-bs-dismiss="modal" value="Hủy">
                    <input type="submit" class="btn btn-primary" name="repw" value="Thay đổi">
                </div>
            </form>
        </div>
    </div>
</div>