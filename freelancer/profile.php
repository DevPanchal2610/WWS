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
                    <h2 class="card-title">Profile</h2>
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
                            <td align="center" colspan="2"><a href="user_cate1.php" class="text-capitalize btn btn-outline-primary custom-card-header mr-5">edit category & language</a>
                                <a href="change_pass.php" class="btn btn-primary custom-card-header ml-5 mr-5">Change Password</a>
                             <a href="profile1.php" class="btn btn-primary custom-card-header ml-5">Edit Profile</a>
                            </td>
                        </tr>
                            <!-- Other fields omitted for brevity -->
                        </table>
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
<script>
    function loadStates() {
            var stateDropdown = document.getElementById("state");
            stateDropdown.innerHTML = "<option value=''>-- Select State --</option>";
            var countryId = document.getElementById("country").value;
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var states = JSON.parse(this.responseText);
                    populateStates(states);
                }
            };

            xhr.open("GET", "../operation/getStates.php?country_id=" + countryId, true);
            xhr.send();
        }

        function populateStates(states) {
            var stateDropdown = document.getElementById("state");

            for (var i = 0; i < states.length; i++) {
                var option = document.createElement("option");
                option.value = states[i].state_id;
                option.text = states[i].state_name;
                stateDropdown.appendChild(option);
            }
        }

        function loadCities() {
            var stateId = document.getElementById("state").value;
            var cityDropdown = document.getElementById("city");
            cityDropdown.innerHTML = "<option value=''>-- Select City --</option>";
            var xhr = new XMLHttpRequest();

            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var cities = JSON.parse(this.responseText);
                    populateCities(cities);
                }
            };

            xhr.open("GET", "../operation/getCities.php?state_id=" + stateId, true);
            xhr.send();
        }

        function populateCities(cities) {
            var cityDropdown = document.getElementById("city");

            for (var i = 0; i < cities.length; i++) {
                var option = document.createElement("option");
                option.value = cities[i].city_id;
                option.text = cities[i].city_name;
                cityDropdown.appendChild(option);
            }
        }

</script>