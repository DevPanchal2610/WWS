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
					<h1>State</h1>
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
										<label>State Name</label>
										<?php
									if(isset($_GET['id']))
									{
										$id=$_GET['id'];
										$con=mysqli_connect('localhost','root','','wws');
										$qu="select * from state where state_id=".$id;
										$result=mysqli_query($con,$qu);
										$row=mysqli_fetch_array($result);
									}
										?>
										<input type="text" class="form-control" placeholder="Enter State" name="state_name" value="<?php echo $row['state_name']?>" required>
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
								if(isset($_POST['state_name'])and isset($_GET['id']) )
									{	$id=$_GET['id'];
										$name=$_POST['state_name'];
										$con=mysqli_connect('localhost','root','','wws');
										$qu="update state set state_name='".$name."' where state_id=".$id;
										mysqli_query($con,$qu);
										echo "<script>document.getElementById('click_state').click();</script>";
									}
								?>
<?php include"footer.php";?>