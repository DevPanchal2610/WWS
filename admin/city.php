<?php include"header.php";?>
<?php include"sidebar.php";?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-md-3"></div>
				<div class="col-sm-6 text-center">
					<h1>City</h1>
				</div>
			</div>
			</div><!-- /.container-fluid -->
		</section>
		<!-- Main content -->
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<!-- left column -->
					<div class="col-md-3"></div>
					<div class="col-md-6">
						<!-- general form elements -->
						<div class="card card-primary">
						
							<!-- /.card-header -->
							<!-- form start -->
							<form action="operation/city_insert.php" method="post">
								<div class="card-body">
									<div class="form-group">
										<label>City Name</label>
										<input type="text" class="form-control" placeholder="Enter City" name="city_name" required>
									</div>
									<div class="form-group">
										<select name="c_id" class="custom-select">
												<?php
										$con=mysqli_connect('localhost','root','','wws');
										$qu="select * from state";
										$result=mysqli_query($con,$qu);
										while ($row=mysqli_fetch_array($result))
										{
											echo "<option value='${row['state_id']}''>${row['state_name']}</option>	";
										}
										?>	
										</select>
									</div>

								</div>
								<!-- /.card-body -->
								<div class="card-footer">
									<button type="submit" class="btn btn-primary">Submit</button>
								</div>
							</form>
						</div>
						<!-- /.card -->
					</div>
				</div>
			</div>
		</section>
		<section class="content">
			<div class="container-fluid">
				<div class="row">
					<div class="col-12">
						<div class="card">
							<div class="card-body">
								<table id="example2" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th>city Id</th>
											<th>city name</th>
											<th>Operation</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$con=mysqli_connect('localhost','root','','wws');
										$qu="select * from city";
										$result=mysqli_query($con,$qu);
										while ($row=mysqli_fetch_array($result))
										{
											echo "<tr>";
												echo "<td>${row['city_id']}</td>";
												echo "<td>${row['city_name']}</td>";
												echo "<td><a href='operation/city_edit.php?id=${row['city_id']}'>edit</a> | <a href='operation/city_del.php?id=${row['city_id']}'>delete</a></td>";
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

