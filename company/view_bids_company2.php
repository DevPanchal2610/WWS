<?php include"header.php";		
								
?>
<div class="container">
	<div class=" mx-auto">
		<?php
				$con=mysqli_connect('localhost','root','','wws');
				$project_id=$_GET['project_id'];
				$sql1="select project_name from project where project_id=".$project_id;
				$result1=mysqli_query($con,$sql1);
				$row1=mysqli_fetch_array($result1);
		?>
	<center><h1>Bids For <?php echo $row1['project_name'];?></h1></center>
<table class="table">
						<thead>
							<tr>
								<th>User Name</th>	
								<th>Bid Date</th>	
								<th>Bid total</th>
								<th>Days</th>
							</tr>
						</thead>
						<tbody id="lan">
							<?php 
								$sql="SELECT bd.* FROM bid_detail bd, project p WHERE bd.project_id=p.project_id and p.user_id=".$_SESSION['id']." and bd.project_id=$project_id";
								$result=mysqli_query($con,$sql);
								while($row=mysqli_fetch_array($result))
								{
									echo"<tr>";
									$sql2="select * from user where user_id=".$row['user_id'];
								$result2=mysqli_query($con,$sql2);
								$row2=mysqli_fetch_array($result2);

        						    echo "<td><a href='profile.php?user_id=${row['user_id']}&project_id=$project_id&total=${row['bid_total']}'>${row2['user_name']}</a></td>"; 
									// echo"<td>${row['project_id']}</td>";
									/*$sql3="select * from project where project_id=".$row['project_id'];
								$result3=mysqli_query($con,$sql3);
								$row3=mysqli_fetch_array($result3);
									echo"<td>${row3['project_name']}</td>";*/
									echo"<td>${row['bid_date']}</td>";
									echo"<td>${row['bid_total']}</td>";
									echo"<td>${row['days']}</td>";

									echo"</tr>";

								}

							?>

						</tbody>
					</table>
	</div>
</div>







<?php include"footer.php";?>