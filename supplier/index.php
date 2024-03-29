<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
<div style="height:50px;"></div>
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"> Jobs
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addproduct"><i class="fa fa-plus-circle"></i> Add Jobs</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                <thead>
                    <tr>
                        <th> Jobs </th>
                        <th> Salary per month </th>
						<th> Duration of contract in months </th>
						
						<th>Action</th>
                    </tr>
                </thead>
                <tbody>
				<?php
					$pq=mysqli_query($conn,"select * from product left join category on category.categoryid=product.categoryid where supplierid='".$_SESSION['id']."'");
					while($pqrow=mysqli_fetch_array($pq)){
						$pid=$pqrow['productid'];
					?>
						<tr>
							<td><?php echo $pqrow['product_name']; ?></td>
							<td><?php echo $pqrow['product_price']; ?></td>
							<td><?php echo $pqrow['product_qty']; ?></td>
							
							<td>
								<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#editprod_<?php echo $pid; ?>"><i class="fa fa-edit"></i> Edit</button>
								<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delproduct_<?php echo $pid; ?>"><i class="fa fa-trash"></i> Delete</button>
								<?php include('product_button.php'); ?>
							</td>
						</tr>
					<?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('add_modal.php'); ?>
<script src="custom.js"></script>
</body>
<div class="foot">
<footer>

</footer>
<style> .foot{text-align: center; border: 2px solid black;}</style>
</div>
</html>
