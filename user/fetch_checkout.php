<?php
	include('session.php');
	if(isset($_POST['check'])){
		?>
		<table width="100%" class="table table-striped table-bordered table-hover">
			<thead>
				<th></th>
				<th>Job Name</th>
				<th>No. of Positions</th>
				<th>Salary</th>
				
			</thead>
			<tbody>
			<form method="POST" action="">
			<?php
				$total=0;
				$query=mysqli_query($conn,"select * from cart left join product on product.productid=cart.productid where userid='".$_SESSION['id']."'");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><button type="button" class="btn btn-danger btn-sm remove_prod" value="<?php echo $row['productid']; ?>"><i class="fa fa-trash fa-fw"></i> Remove</button></td>
						<td><?php echo $row['product_name']; ?></td>
						<td><?php echo $row['product_qty']; ?></td>
						<td align="right"><?php echo number_format($row['product_price'],2); ?></td>
						
					</tr>
					<?php
				}
			?>
			</form>
			</tbody>
		</table>
		<?php
	}


?>