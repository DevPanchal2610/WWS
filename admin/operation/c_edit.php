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
						<div class="card card-primary">
							<!-- /.card-header -->
							<!-- form start -->
							<form method="post">
								<div class="card-body">
									<div class="form-group">
										<label>Country Name</label>
										<?php
									if(isset($_GET['id']))
									{
										$id=$_GET['id'];
										$con=mysqli_connect('localhost','root','','wws');
										$qu="select * from country where country_id=".$id;
										$result=mysqli_query($con,$qu);
										$row=mysqli_fetch_array($result);
									}
										?>
										<input type="text" class="form-control" placeholder="Enter Country" name="country_name" value="<?php echo $row['country_name']?>" required>
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
	</div>
								<?php
								if(isset($_POST['country_name'])and isset($_GET['id']) )
									{	$id=$_GET['id'];
										$name=$_POST['country_name'];
										$con=mysqli_connect('localhost','root','','wws');
										$qu="update country set country_name='".$name."' where country_id=".$id;
										mysqli_query($con,$qu);
										echo "<script>document.getElementById('click_country').click();</script>";
									}
								?>
<?php include"footer.php";?>