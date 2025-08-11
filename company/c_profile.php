<?php include "header.php"; ?>
<style>
    .custom-card-header {
        background-color: #4472c4;
        color: white;
    }
</style>
<?php
if(isset($_SESSION['id'])) {
    $user_id = $_SESSION['id'];
    $cn = mysqli_connect('localhost', 'root', '', 'wws');


$sql = "SELECT `user_name`, `email`, `gender`, `contact_number`, `user_address`, `dob`,`city_name`,state_name,country_name, `is_active` FROM `user`,city,state,country WHERE user_id=$user_id And user.city_id=city.city_id and city.state_id=state.state_id And state.country_id=country.country_id;" ;
$result = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header custom-card-header">
                    <h5 class="card-title">Profile</h5>
                </div>
                <div class="card-body">
                    <form action="operation/update_profile.php" method="post">
                        <table class="container">
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $row['user_name'];?>" readonly>
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
                                    <input type="text" class="form-control" name="gender" value="<?php echo $row['gender'];?>" readonly>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="mobile" class="form-control" name="mobile" value="<?php echo $row['contact_number'];?>" readonly>
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" id="exampleTextarea" rows="1" name="add" cols="5"readonly><?php echo $row['user_address'];?> </textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <input type="date" class="form-control" name="city" value="<?php echo $row['dob'];?>" readonly>
                                </div>

                            </td>
                        </tr>
                        
                        <tr>
                            <td colspan="2" >
                                <div class="form-group w-50">
                                   <label>Country-State-City</label>
                                    <input type="text" class="form-control" value="<?php echo $row['country_name'].",".$row['state_name'].",".$row['city_name'];?>" readonly>
                                </div>

                            </td>
                        </tr>
                        </table>
                        <div class="form-group mt-3" align="center">
                            <a href="change_pass.php" class="btn btn-primary custom-card-header w-25 mr-4">Change Password</a>
                            <a href="profile1.php" class="btn btn-primary custom-card-header w-25 ml-4">Edit Profile</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
}
mysqli_close($cn);
 include "footer.php"; ?>