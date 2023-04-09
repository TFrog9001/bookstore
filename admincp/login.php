<!DOCTYPE html>
<html lang="en">


<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <script src="https://cdn.tiny.cloud/1/m6lvsjao8ve1aqa2vydo7qp6mq07skyhz6zugf3nu5ssnk6n/tinymce/6/tinymce.min.js"
    referrerpolicy="origin"></script>
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <link rel="stylesheet" href="./css/style_admin.css">
  <link rel="shortcut icon" type="image/png" href="../images/logobook - Sao chép.ico">

  <title>Đăng nhập vào trang quản lý</title>


</head>

<body style="background-color: #53a57f;">
<?php
	@session_start();
    include("./config/config.php");
	if(isset($_POST['dangnhap'])){
		$username=$_POST['username'];
		$password=$_POST['password'];
		$sql=mysqli_query($conn,"select * from admin where username='$username' and password='$password' limit 1");
		$count=mysqli_num_rows($sql);
        $row = mysqli_fetch_assoc($sql);
		if($count>0){
            $_SESSION['id_admin'] = $row['id_admin'];
			$_SESSION['adminname'] = $username;  
            if(isset($_SESSION['error'])){
                unset($_SESSION['error']);
            }
            header('location: admin.php');          
            
		}else{
            $_SESSION['error'] = '
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Tài khoản hoặc mật khẩu không đúng!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            ';
            header('location: login.php');
		}
	}
?>
<div class="modal fade show d-block" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLabel1">
                    <i class="fas fa-light fa-circle-exclamation "></i>
                    Đăng nhập vào trang quản lý
                </h3>
            </div>
            <?php if(isset($_SESSION['error'])) {echo $_SESSION['error'];} ?>
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
</body>
    <script src="https://code.jquery.com/jquery-3.6.3.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</html>