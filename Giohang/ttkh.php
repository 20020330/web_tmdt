<script language="javascript">
function kiemtra()
{
if(a.hoten.value=="")
{
alert("Bạn chưa điền tên")
a.hoten.focus();
return false;

}

if(a.dienthoai.value=="")
{
alert("Bạn chưa điền SĐT<br> hãy điền số điện thoại để chúng tôi liên lạc lại với bạn")
a.dienthoai.focus();
return false;
}
if(a.diachi.value=="")
{
alert("Bạn chưa điền địa chỉ")
a.diachi.focus();
return false;
}

if(a.hoten.value!="" && a.dienthoai.value!=""&&a.diachi.value!="")
{
a.submit();	
}
}

</script>

<div class="thongtinkhachhang">
	<h3>Thông tin thanh toán</h3>
	<form action="index.php?act=cart&action=insert" method="POST" id="a" onsubmit="return kiemtra();">
		<table>
			<?php 
			if(isset($_SESSION['idnd'])){


				$sql=mysqli_query($con,"select * from khachhang where id_kh='".$_SESSION['idnd']."'");
				$row=mysqli_fetch_array($sql);
				}
				if(isset($_SESSION['username'])==0){
					echo '<meta http-equiv="refresh" content="0;index.php?act=dk">';?>
				
				<?php }else{
			?>
			<tr><td colspan="2" align="center" style="">Thông tin khách hàng</td></tr>
			<tr><td class="tieude">Tên khách hàng</td><td><input type="text" name="hoten" value="<?php echo $row['ten'] ?>"/></td></tr>
			<tr><td class="tieude">Địa chỉ giao hàng</td><td><input type="text" name="diachi" value="<?php echo $row['diachi'] ?>"/></td></tr>
			<tr><td class="tieude">Số điện thoại</td><td><input type="text" name="dienthoai" value="0<?php echo $row['phone'] ?>"/></td></tr>
			<tr><td class="tieude">Email</td><td><input type="text" name="email" value="<?php echo $row['email'] ?>"/></td></tr>

			<tr><td colspan="2" align="center" style="">Phương thức thanh toán</td></tr>
			<tr><td class="tieude">Phương thức: </td><td>
				<select name="phuongthuc">
					<option value="">Chọn phương thức thanh toán</option>
					<option value="1">Qua bưu điện</option>
					<option value="2">Qua thẻ ATM</option>
					<option value="3">Thanh toán trực tiếp</option>

				</select>
			</td></tr>
			<tr><td colspan="2" class="submit"><center><input type="submit" value="Đặt hàng"/></center></td></tr>
			<?php }?>
		</table>
	</form>
</div>

