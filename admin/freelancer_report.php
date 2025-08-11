<?php include"header.php";?>
<?php include"sidebar.php";?>
<script type="text/javascript" src="p.js"></script>

<?php
echo "Today " . date("Y/m/d") . date("l");
?>
<div class="content-wrapper">
<div id="pr_report">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<section class="content-header">
					<center><h1>Programmer Report</h1></center>
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
								<table border=1 id="example2" class="table table-bordered table-hover">
									<thead>
										<tr>
											<th> User id </th> 
											<th> User name </th>
											<th> City name </th>
											<th> E-mail</th>
											<th> Address </th>
											<th> Contact number  </th> 
											<th> Gender </th>
											<th> User type </th>
											<th> DOB </th> 
										</tr>
									</thead>
									<tbody>
										<?php $en= mysqli_connect("localhost","root","","wws") or die (myslqi_error());
				$sql="select u.user_id,u.user_name,c.city_name,u.email,u.user_address,u.contact_number,u.gender,u.usertype,u.dob from user u,city c,state s,country co where c.state_id=s.state_id && co.country_id=s.country_id && u.city_id=c.city_id && usertype='freelancer'";
				$result= mysqli_query($en,$sql);

				while($row = mysqli_fetch_array($result))
				{
					echo"<tr>";
					echo"<td> ${row['user_id']} </td>";
					echo"<td> ${row['user_name']}</td>";
					echo"<td> ${row['city_name']}</td>";
					echo"<td> ${row['email']}</td>";
					echo"<td> ${row['user_address']} </td>";
					echo"<td> ${row['contact_number']}</td>";
					echo"<td> ${row['gender']} </td>";
					echo"<td> ${row['usertype']}</td>";
					echo"<td> ${row['dob']} </td>";
					
					
					echo"</tr>";
				}

				
				mysqli_close($en);
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
			<center>
				<input class="btn btn-danger"  type="button" value="Print report" onclick="javascript:Print('pr_report')">
			</center>
</div>
	<?php include"footer.php";?>




				