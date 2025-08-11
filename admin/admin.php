<?php include"header.php";?>
<?php include"sidebar.php";?>
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-md-3"></div>
				<div class="col-sm-6 text-center">
					<h1>Country</h1>
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
						<div class="card">
						
							<!-- /.card-header -->
							<!-- form start -->
							<form action="operation/c_insert.php" method="post">
								<div class="card-body">
									<div class="form-group">
										<label>Country Name</label>
										<input type="text" class="form-control" placeholder="Enter Country" name="country_name" required>
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
											<th>Country Id</th>
											<th>Country name</th>
											<th>Operation</th>
										</tr>
									</thead>
									<tbody>
										<?php
										$con=mysqli_connect('localhost','root','','wws');
										$qu="select * from country";
										$result=mysqli_query($con,$qu);
										while ($row=mysqli_fetch_array($result))
										{
											echo "<tr>";
												echo "<td>${row['country_id']}</td>";
												echo "<td>${row['country_name']}</td>";
												echo "<td><a href='operation/c_edit.php?id=${row['country_id']}'>edit</a> | <a href='operation/c_del.php?id=${row['country_id']}'>delete</a></td>";
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