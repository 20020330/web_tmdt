<?php
	if(isset($_POST['id']))
	{
	foreach($_POST['id'] as $mahd)
	{
		$_SESSION['id'][$mahd]=1;
	}

		if(isset($_POST['giaohang']))
		{
			foreach($_SESSION['id'] as $mahd=>$value)
			{
				if ($value==1)
				$sql="update hoadon set trangthai=2 where mahd='$mahd'";
				mysqli_query($con,$sql);
				unset($_SESSION['id']);
				echo "
							<script language='javascript'>
								alert('Đã giao hàng');
								window.open('trang1.php?act=hd','_self', 1);
							</script>
						";
			}
		}
		else if(isset($_POST['huy']))
			{ 
				foreach($_SESSION['id'] as $mahd=>$value)
				{
					if ($value==1)
					$sql="update hoadon set trangthai=3 where mahd='$mahd'";
					mysqli_query($con,$sql);
					unset($_SESSION['id']);
					echo "
							<script language='javascript'>
								alert('Đã huỷ đơn hàng');
								window.open('trang1.php?act=hd','_self', 1);
							</script>
						";
				}
			}
			else
					{
						foreach($_SESSION['id'] as $mahd=>$value)
						{
							if ($value==1)
							$sql="delete from hoadon where mahd='$mahd'";
							mysqli_query($con,$sql);
							$sql1="delete from chitiethoadon where mahd='$mahd'";
							mysqli_query($con,$sql1);
							unset($_SESSION['id']);
							echo "
							<script language='javascript'>
								alert('Xóa thành công');
								window.open('trang1.php?act=hd','_self', 1);
							</script>
						";
						}
			
					}

			}		else echo "
							<script language='javascript'>
								alert('Bạn chưa chọn hóa đơn cần xử lý');
								window.open('trang1.php?act=hd','_self', 1);
							</script>
						";
		
?>