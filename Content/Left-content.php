<div id="danhmucsp">
	<div class="center">
		<h4>SẢN PHẨM</h4>
		<?php
			$sql="SELECT * FROM theloai WHERE dequi=1";
			$result=mysqli_query($con,$sql);
		?>
		<ul>
			<?php
				while($row=mysqli_fetch_array($result)){
			?>
				<li><a href="index.php?madm=<?php echo $row['id_tl']; ?>"><?php echo $row['ten_tl']; ?></a></li>
			<?php
				}
			?>
		</ul>
	</div>
</div>
<div id="phukien">
	<div class="center">
		<h4>PHỤ KIỆN</h4>
		<?php
			$sql="SELECT * FROM theloai WHERE dequi=2";
			$result=mysqli_query($con,$sql);
		?>
		<ul>
			<?php
				while($row=mysqli_fetch_array($result)){
			?>
				<li><a href="index.php?madm=<?php echo $row['id_tl']; ?> "><?php echo $row['ten_tl']; ?></a></li>
			<?php
				}
			?>
		</ul>
	</div>
</div>
<div id="quangcao">
	<div class="center">
	<a href=""><img src="anh/qc1.png" alt="quangcao" title="Quảng cáo"></a>
	</div>
</div>