<!DOCTYPE html>
<html>
	<head>
		<?php include('h.php');
		error_reporting(error_reporting() & ~E_NOTICE);
		?>
		<head>
			<body>
				<div class="container">
					<?php include('navbar.php');?>
					<p></p>
					<div class="row">
						<div class="col-md-3">
        <!-- Left side column. contains the logo and sidebar -->
							<?php include('menu_left.php');?>
        <!-- Content Wrapper. Contains page content -->
						</div>
						<div class="col-md-6">
							<a href='product.php?act=add' class='btn btn-info btn-sm'>เพิ่ม</a>
							<p></p>
							
							<?php
							$act = $_GET['act'];
							if($act == 'add'){
							include('manage_add.php');
							}elseif($act == 'edit'){
							include('manage_edit.php');
							}
							else{
							include('manage_list.php');
							}
							?>
			</div>				
		</div>
	</div>
  </body>
</html>