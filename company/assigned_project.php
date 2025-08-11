<?php include"header.php";		
?>
<div class="container">
        <center><h1>Assigned Projects</h1></center>

<table class="table">
						<thead>
							<tr>
								<th>Project Name</th>		
								<th>Category</th>	
								<th>Max Bid</th>
								<!-- <th>User Name</th>	 -->
								<th>Language</th>
								<th>Upload Date</th>
								<th>Due Date</th>
								<th>Description</th>	
							</tr>
						</thead>
						<tbody id="lan">
							<?php 
							  if(isset($_SESSION['id'])){
								$con=mysqli_connect('localhost','root','','wws');
								


								$sql="select * from project where user_id=".$_SESSION['id'];
								$result=mysqli_query($con,$sql);
								while($row=mysqli_fetch_array($result))
								{
									$sql4="SELECT * FROM `assign_project` WHERE project_id=".$row['project_id'];
									$result4=mysqli_query($con,$sql4);
									if(mysqli_num_rows($result4)>0){

									echo"<tr>";
									echo"<td>${row['project_name']}</td>";
									
									$sql1="select * from category where category_id=".$row['category_id'];
								$result1=mysqli_query($con,$sql1);
								$row1=mysqli_fetch_array($result1);
									echo"<td>${row1['category_name']}</td>";

									echo"<td>${row['min_bid']}</td>";

								// 	$sql2="select * from user where user_id=".$row['user_id'];
								// $result2=mysqli_query($con,$sql2);
								// $row2=mysqli_fetch_array($result2);
								// 	echo"<td>${row2['user_name']}</td>";
										$sql3="SELECT language_name FROM language_detail ld,language l WHERE ld.language_id=l.language_id and project_id=".$row['project_id'];
									$result3=mysqli_query($con,$sql3);
										echo"<td>";
									while($row3=mysqli_fetch_array($result3))
									{
										echo"${row3['language_name']} ";
									}
										echo"</td>";
									echo"<td>${row['upload_date']}</td>";
									echo"<td>${row['due_date']}</td>";
									echo"<td>${row['description']}</td>";
									echo"</tr>";
								}

								}

							}

							?>

						</tbody>
					</table>
				</div>







<?php include"footer.php";?>