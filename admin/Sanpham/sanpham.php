<link rel="stylesheet" href="css/admincentent.css">
<script type="text/javascript" src="js/checkbox.js"></script>
<?php
	include ('../db/ketnoi.php');
	
    $select = "select * from sanpham inner join theloai on sanpham.id_tl=theloai.id_tl";
    $query = mysqli_query($con,$select);
    $dem = mysqli_num_rows($query);
?>
<div class="quanlysp">
	<h3>QUẢN LÝ SẢN PHẨM</h3>
	<a href='?act=themsp' >Thêm sản phẩm</a><br>
	<p>Có tổng <font color=red><b><?php echo $dem ?></b></font> sản phẩm</p>
	<form action="trang1.php?act=xlsp" method="post">
		<div id="checkhd">
			<p>
				<input type="submit" name="xoa" value="Xóa" />
			</p>
		</div>
<table>
    
    <tr class='tieude_hienthi_sp'>
		<td width="30"><input type="checkbox" name="check"  class="checkbox" onclick="checkall('item', this)"></td>
        <td>IDSP</td>
        <td>HÌnh ảnh và Tên SP</td>
        <td>Số lượng</td>
        <td>Đã bán</td>
        <td>Giá</td>
        <td>Danh mục</td>
        <td>Active</td>
    </tr>

    <?php
	
	/*------------Phan trang------------- */ 

		if(!isset($_GET['page'])){  
		$page = 1;  
		} else {  
		$page = $_GET['page'];  
		}  

		$max_results = 6;  
		$from = (($page * $max_results) - $max_results);  
		$sql = mysqli_query($con,"SELECT * FROM sanpham inner join theloai on sanpham.id_tl=theloai.id_tl ORDER by id_sp DESC  LIMIT $from, $max_results"); 



								
    if($dem > 0)
        while ($bien = mysqli_fetch_array($sql))
        {
?>
            <tr class='noidung_hienthi_sp'>
				<td class="masp_hienthi_sp"><input type="checkbox" name="id[]" class="item" class="checkbox" value="<?=$bien['id_sp']?>"/></td>
                <td class="masp_hienthi_sp"><?php  echo $bien['id_sp'] ?></td>
                <td class="img_hienthi_sp">
                    <img src="../uploads/<?php echo $bien['anh_sp'] ?>"  width='60' height='60'><br>
                    <h4><?php echo $bien['ten_sp'] ?></h4>
                </td>
				<td class="sl_hienthi_sp"><?php echo $bien['soluong_sp'] ?></td>
				<td class="sl_hienthi_sp"><?php echo $bien['daban'] ?></td>
                <td class="gia_hienthi_sp"><?php echo number_format($bien['gia_sp']).' VNÐ' ?></td>
                <td  class="madm_hienthi_sp">
									<?=$bien['ten_tl'] ?>
				</td>
                <td class="active_hienthi_sp">
                    <a href='trang1.php?act=suasp&idsp=<?php echo $bien['id_sp']  ?>'><img src="../anh/sua.png" title="Sửa"></a>
				</td>
            </tr>
<?php 
    }
	
    else echo "<tr><td colspan='6'>Không có sản phẩm trong CSDL</td></tr>";
	
?>
</table>
</form>
	<div id="phantrang_sp">
	
	<?php
		$total_results = mysqli_query($con,"SELECT COUNT(*) as Num FROM sanpham");  
		$total_row=mysqli_fetch_assoc($total_results);
			$total_records=$total_row['Num'];
			$total_pages = ceil($total_records / $max_results);   
			if($page > 1){  
			$prev = ($page - 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?act=sp&page=$prev\"><button class='trang'>Trang trước</button></a>&nbsp;";  
			}  
			for($i = 1; $i <= $total_pages; $i++){  
			if(($page) == $i){  
			echo "$i&nbsp;";  
			} else {  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?act=sp&page=$i\"><button class='so'>$i</button></a>&nbsp;";  
			}  
			}  
			if($page < $total_pages){  
			$next = ($page + 1);  
			echo "<a href=\"".$_SERVER['PHP_SELF']."?act=sp&page=$next\"><button class='trang'>Trang sau</button></a>";  
			}  
			echo "</center>"; 
	?>
	</div>
</div>	