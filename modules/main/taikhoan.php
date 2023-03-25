<?php
$sql_user = mysqli_query($conn, "select * from user where id_user = $_SESSION[id_user]");
$row = mysqli_fetch_assoc($sql_user);
?>
<div class="container">
    <div class="mt-2 mb-5 row">
        <h3>Thông tin khách hàng</h3>
        <div class="offset-3 col-5 mt-2 table-responsive">
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td style="width: 175px">Họ và tên</td>
                        <td>
                            <?= $row['name'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td style="width: 175px">Username</td>
                        <td>
                            <?= $row['user'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>
                            <?= $row['email'] ?>
                        </td>
                    </tr>
                    <tr>
                        <td>Mật khẩu</td>
                        <td>
                            <!-- <input class="form-control" type="password" value="<?= $row['pass'] ?>">
                            <br> -->
                            <a class="" data-bs-toggle="modal" data-bs-target="#modal-repw">Đổi mật khẩu?</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
