<?php include"header.php";?>
<?php include"sidebar.php";?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-md-3"></div>
				<div class="col-sm-6 text-center">
					<h1>Feedback</h1>
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
											<th>Feedback Id</th>
											<th>User Name</th>
											<th>Feedback Detail</th>
											<th>Feedback Date</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$con=mysqli_connect('localhost','root','','wws');
										$qu="select * from feedback_detail";
										$result=mysqli_query($con,$qu);
										while ($row=mysqli_fetch_array($result))
										{
											echo "<tr>";
												echo "<td>${row['feedback_id']}</td>";
										$qu1="select * from user where user_id=${row['user_id']}";
										$result1=mysqli_query($con,$qu1);
										$row1=mysqli_fetch_array($result1);		
												echo "<td>${row1['user_name']}</td>";							
												echo"<td>${row['feedback_detail']}</td>";						
												echo "<td>${row['feedback_date']}</td>";
												/*echo "<td><a href='operation/lan_edit.php?id=${row['feedback_id']}'>edit</a> | <a href='operation/lan_del.php?id=${row['feedback_id']}'>delete</a></td>";*/
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