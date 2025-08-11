<?php include"header.php";?>
<?php include"sidebar.php";?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-md-3"></div>
				<div class="col-sm-6 text-center">
					<h1>Payment</h1>
				</div>
			</div>
			</div><!-- /.container-fluid -->
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<table id="example2" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>payment Id</th>
											<th>User Name</th>
											<th>Project Name</th>
											<th>payment Date</th>
											<th>payment Total</th>
											<th>Amount</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$con=mysqli_connect('localhost','root','','wws');
										$qu="select * from payment_detail";
										$result=mysqli_query($con,$qu);
										while ($row=mysqli_fetch_array($result))
										{
											echo "<tr>";
												echo "<td>${row['payment_id']}</td>";
										$qu1="select * from user where user_id=${row['user_id']}";
										$result1=mysqli_query($con,$qu1);
										$row1=mysqli_fetch_array($result1);		
												echo "<td>${row1['user_name']}</td>";

										$qu1="select * from project where project_id=${row['project_id']}";
										$result1=mysqli_query($con,$qu1);
										$row1=mysqli_fetch_array($result1);
										
												echo"<td>${row1['project_name']}</td>";			
												echo "<td>${row['payment_mode']}</td>";
												echo "<td>${row['payment_date']}</td>";
												echo "<td>${row['total_payment']}</td>";
												

												/*echo "<td><a href='operation/lan_edit.php?id=${row['payment_id']}'>edit</a> | <a href='operation/lan_del.php?id=${row['payment_id']}'>delete</a></td>";*/
											echo "</tr>";
										}
										?>
									</tbody>
								</table>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
				</div>
			</div>
		</section>
	</div>
	<?php include"footer.php";?>