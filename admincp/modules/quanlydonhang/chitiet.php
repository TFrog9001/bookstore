<?php 
	if(isset($_GET['id_cart'])){
		$id_cart = $_GET['id_cart'];
		$sql_cart = mysqli_query($conn,"select * from cart c join user u on c.id_user=u.id_user where c.id_cart='$id_cart' limit 1");
		$row_cart = mysqli_fetch_assoc($sql_cart);
	}
?>
<div class="container">
	<div class="mt-2 mb-3">
		<h3>Thông tin khách hàng</h3>
		<div class="table-responsive">
			<table class="table table-bordered">
				<tbody>
					<tr>
						<td style="width: 175px">Họ và tên</td>
						<td><?=$row_cart['name'] ?></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><?=$row_cart['email'] ?></td>
					</tr>
					<tr>
						<td>Số điện thoại</td>
						<td><?=$row_cart['sdt'] ?></td>
					</tr>
					<tr>
						<td>Địa chỉ</td>
						<td><?=$row_cart['diachi'] ?></td>
					</tr>
					<tr>
						<td>Tin nhắn</td>
						<td>Phí Ship: 30,000VNĐ</td>
					</tr>
					<tr>
						<td>Hình thức thanh toán</td>
						<td><?=$row_cart['thanhtoan'] ?></td>
					</tr>
					<tr>
						<td>Ngày đặt</td>
						<td>
							<?php
								$timestamp=date('G:i:s - d/m/Y',strtotime($row_cart['date']));
								echo $timestamp;
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<br>
		<h3>Chi tiết đơn đặt hàng</h3>
		<div class="table-responsive">
			<table id="tbl-sp" class="container mb-3">
                <thead>
                    <th>ID</th>
                    <th width="300">Hình ảnh </th>
                    <th width="250">Tên sách</th>
                    <th>Giá bán</th>
                    <th>Số lượng</th>
                    <th>Tạm tính</th>
                </thead>
                <tbody>
                    <?php 
                        $sql_sp = mysqli_query($conn,"select * from cart_detail cd join sach s on cd.id_sach = s.id_sach where cd.id_cart = '$id_cart';");
                        $i = 1;
						$tongtien=0;
                        if (mysqli_num_rows($sql_sp) > 0) {
                            while ($row = mysqli_fetch_assoc($sql_sp)) {

                                if ($i % 2 == 0) {
                                    $color = ' color-dbe3eb ';
                                }
                                else {
                                    $color = '';     
                                }

								echo '
								<tr class="'.$color.'">
									<td>'.$row['id_sach'].'</td>
									<td>
										<img class="img-fluid" src="./modules/quanlysanpham/upload/'.$row['hinhanh'].'" alt="'.$row['hinhanh'].'">
									</td>
									<td class="text-capitalize">
										'.$row['ten_sach'].'
									</td>
									<td class="text-capitalize">
										'.number_format ($row['giaban'], $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).'
									</td>
									<td>
										'.$row['soluong_dh'].'
									</td>
									<td>
										'.number_format ($row['giaban']*$row['soluong_dh'], $decimals = 0 , $dec_point = "." , $thousands_sep = "," ).' VND
									</td>
								</tr>
								';
								$tongtien+=$row['giaban']*$row['soluong_dh'];
                                $i++;    
                            }
							
                        }
                    ?>  
					
					<tr class="py-4">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td class="float-end h3">
							Tổng đơn hàng :
						</td>
						<td class="text-center h4 text-danger">
							<?php 
								echo number_format ($tongtien, $decimals = 0 , $dec_point = "." , $thousands_sep = "," )
							?>
							VND
						</td>
					</tr>
                </tbody>
            </table>
			<?php 
				switch($row_cart['tinhtrang_cart']){
					case 0:
						echo '
						<div class="d-flex mb-4">
							<form action="./modules/quanlydonhang/xuly.php" method="post">
								<input type="hidden" name="id_cart" value="'.$id_cart.'">
								<button type="submit" name="xacnhan_dh" class="btn btn-primary me-3">
									<i class="fas fa-solid fa-check"></i> 
									Xác nhận đơn hàng
								</button>
								<button type="submit" name="huy_dh" class="btn btn-danger">
									<i class="fas fa-sharp fa-solid fa-xmark"></i>
									Hủy
								</button>
							</form>
						</div>
						';
						break;
					case 1 :
						echo '
						<div class="btn btn-lg btn-primary ">
							Đã xác nhận
						</div>
						';
						break;
					case 2 :
						echo '
						<div class="btn btn-lg btn-info ">
							Đang giao hàng...
						</div>
						';
						break;
					case 3 :
						echo '
						<div class="btn btn-lg btn-success ">
							Giao hàng thành công!
						</div>
						';
						break;
				}
			?>
			
		</div>
	</div>
</div>