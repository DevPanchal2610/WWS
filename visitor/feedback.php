<?php include"header.php";		
?>
<div class="container">
		<center><h1>FeedBack </h1></center>
<table class="table">
						<thead>
							<tr>
								<th>User Name</th>		
								<th>FeedBack</th>	
								<th>Date</th>
							</tr>
						</thead>
						<tbody id="lan">
							<?php 
								$con=mysqli_connect('localhost','root','','wws');
								$sql="select * from feedback_detail";
								$result=mysqli_query($con,$sql);
								while($row=mysqli_fetch_array($result))
								{
								$sql1="select user_name from user where user_id=${row['user_id']}";
								$result1=mysqli_query($con,$sql1);
								$row1=mysqli_fetch_array($result1);
									echo "<tr>
										<td>${row1['user_name']}</td>
										<td>${row['feedback_detail']}</td>
										<td>${row['feedback_date']}</td>
									</tr>";
								}

							

							?>

						</tbody>
					</table>
				</div>



<?php include"footer.php";?>



