<?php include "header.php"; ?>
<style>
    .custom-card-header {
        background-color: #4472c4;
        color: white;
    }
</style>
<?php
if(isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
    $project_id=$_GET['project_id'];
    $total=$_GET['total'];

    $cn = mysqli_connect('localhost', 'root', '', 'wws');


$sql = "SELECT `user_name`, `email`, `gender`, `contact_number`, `user_address`, `dob`,`city_name`,state_name,country_name, `is_active` FROM `user`,city,state,country WHERE user_id=$user_id And user.city_id=city.city_id and city.state_id=state.state_id And state.country_id=country.country_id;";
$result = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header custom-card-header">
                    <h5 class="card-title">Programmer Profile</h5>
                </div>
                <div class="card-body">
                    <table class="container">
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" id="username" class="form-control" value="<?php echo $row['user_name'];?>" readonly>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" id="email" class="form-control" value="<?php echo $row['email'];?>" readonly>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input type="text" class="form-control" value="<?php echo $row['gender'];?>" readonly>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="mobile" class="form-control" value="<?php echo $row['contact_number'];?>" readonly>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" id="exampleTextarea" rows="1" cols="5" readonly><?php echo $row['user_address'];?></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Country-State-City</label>
                                    <input type="text" class="form-control" value="<?php echo $row['country_name'].",".$row['state_name'].",".$row['city_name'];?>" readonly>
                                </div>

                            </td>
                        </tr>
                        <!-- Hobbies row -->
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Skills in Category </label>
                                    <select class="form-control" multiple readonly>
                                       <?php
                                    		$sql1 = "SELECT * FROM category_user cu,category c WHERE cu.user_id=$user_id and cu.category_id=c.category_id";
												$result1 = mysqli_query($cn, $sql1);

												while($row1 = mysqli_fetch_assoc($result1))
												{
													echo"<option>${row1['category_name']}</option>";
												}
                                    	?>
                                    </select>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Skills in Language</label>
                                    <select class="form-control" multiple readonly>
                                    	<?php
                                    		$sql1 = "SELECT * FROM language_user_detail lu,language l WHERE lu.user_id=$user_id and lu.language_id=l.language_id";
												$result1 = mysqli_query($cn, $sql1);

												while($row1 = mysqli_fetch_assoc($result1))
												{
													echo"<option>${row1['language_name']}</option>";
												}
                                    	?>
                                       
                                    </select>
                                </div>

                            </td>
                        </tr>
                        <tr>
                        	<td align="left"><a href="#" onclick="window.history.back();"class="btn btn-outline-primary custom-card-header" >Previous</a></td>
                        	<td align="right"><a href="operation/assign_project.php?user_id=<?php echo $user_id.'&project_id='.$project_id.'&total='.$total;?>" class="btn btn-outline-primary custom-card-header ">Assign Project</a></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
}
mysqli_close($cn);
 include "footer.php"; ?>
