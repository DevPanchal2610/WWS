<?php
	include"header.php";
	include"sidebar.php";
?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-md-3"></div>
				<div class="col-sm-6 text-center">
					<h1>project</h1>
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
											<th>Project Id</th>
											<th>User Name</th>
											<th>Project Name</th>
											<th>Category</th>
											<th>Min Bid</th>
											<th>Upload Date</th>
											<th>Due Date</th>
											<th>Description</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$con=mysqli_connect('localhost','root','','wws');
										$qu="select * from project where project_id=".$_GET['id'];

										$result=mysqli_query($con,$qu);
										$row=mysqli_fetch_array($result);			
											echo "<tr>";
												echo "<td>${row['project_id']}</td>";
												echo"<td><input type='text' name='pro_name' value='${row['project_name']}' class='border-0'></td>";	
										$qu1="select * from user where user_id=${row['user_id']}";
										$result1=mysqli_query($con,$qu1);
										$row1=mysqli_fetch_array($result1);		
												echo "<td>${row1['user_name']}</td>";
														
										$qu2="select * from category where category_id=${row['category_id']}";
										$result2=mysqli_query($con,$qu2);
										$row2=mysqli_fetch_array($result2);		
												echo "<td>${row2['category_name']}</td>";				
												echo "<td>${row['min_bid']}</td>";
												echo "<td>${row['upload_date']}</td>";
												echo "<td>${row['due_date']}</td>";
												echo "<td>${row['desc']}</td>";
											echo "</tr>";
										
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

<?php include"footer.php";?>