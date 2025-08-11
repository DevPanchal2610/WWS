<?php include"header.php";?>
<?php include"sidebar.php";?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-md-3"></div>
				<div class="col-sm-6 text-center">
					<h1>User</h1>
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
											<th>User Name</th>
											<th>E-mail</th>
											<th>Gender</th>
											<th>Contact</th>
											<th>Address</th>
											<th>User Type</th>
											<th>birth Date</th>
											<th>City</th>
											<th>Is Active</th>
											<th>operation</th>


										</tr>
									</thead>
									<tbody>
										<?php
										$con=mysqli_connect('localhost','root','','wws');
										$qu="select * from user";
										$result=mysqli_query($con,$qu);
										while ($row=mysqli_fetch_array($result))
										{
											echo "<tr>";
												echo "<td>${row['user_name']}</td>";
												echo "<td>${row['email']}</td>";				
												echo "<td>${row['gender']}</td>";
												echo "<td>${row['contact_number']}</td>";
												echo "<td>${row['user_address']}</td>";
												echo "<td>${row['usertype']}</td>";
												echo "<td>${row['dob']}</td>";

										$con1=mysqli_connect('localhost','root','','wws');
										$qu1="select * from city where city_id=${row['city_id']}";
										$result1=mysqli_query($con1,$qu1);
										while ($row1=mysqli_fetch_array($result1))
												echo "<td>${row1['city_name']}</td>";
												echo "<td>${row['is_active']}</td>";

												



												 echo "<td align='center'><a href='operation/user_del.php?id=${row['user_id']}'>delete</a></td>";
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