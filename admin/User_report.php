<?php include"header.php";?>
<?php include"sidebar.php";?>
<script type="text/javascript" src="p.js"></script>

<?php
echo "Today " . date("Y/m/d") . date("l");
?>
<div class="content-wrapper">
<div id="pr_report">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<!-- Content Header (Page header) -->
	<section class="content-header">
					<center><h1>User Report</h1></center>
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-md-3"></div>
				<div class="col-sm-6 text-center">
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
								<table border="1" id="example2" class="table table-bordered table-hover">
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
											echo "</tr>";
										}
										?>
									</tbody>
								</table>
							</div>
							</div>
							<!-- /.card-body -->
						</div>
						<!-- /.card -->
					</div>
				</div>
			</div>
			<center>
				<input class="btn btn-danger"  type="button" value="Print report" onclick="javascript:Print('pr_report')">
			</center>
		</section>
	</div>
	<?php include"footer.php";?>

