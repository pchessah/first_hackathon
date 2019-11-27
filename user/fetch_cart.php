<?php
	include('session.php');
	if(isset($_POST['fcart'])){
		$query=mysqli_query($conn,"select * from `cart` left join product on product.productid=cart.productid where userid='".$_SESSION['id']."'");
		if (mysqli_num_rows($query)<1){
			echo "You have not applied a job <br><br>";
		}
		else{
		while($row=mysqli_fetch_array($query)){
			?>
			<div class="row">
				
				<div class="col-lg-1" style="text-align:center; position:relative; top:40px; left:10px;">
					<span class="pull-right"><strong><?php echo $row['qty']; ?></strong></span>
				</div>
				<div class="col-lg-1">
					<button type="button"class="btn btn-primary btn-sm add_qty" value="<?php echo $row['productid']; ?>"><i class="fa fa-plus fa-fw"></i></button> 
				</div>
				
				<div class="col-lg-7">
					<span style="font-size:75px; position:relative; left:10px; top:30px;"><?php echo $row['product_name']; ?></span>
				</div>
			</div>
			<?php
		}
		}
	}

?>