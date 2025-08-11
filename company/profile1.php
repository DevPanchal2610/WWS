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


$sql = "SELECT `user_name`, `email`, `gender`, `contact_number`, `user_address`, `dob`,`city_id`, `is_active` FROM `user`WHERE user_id=" . $user_id ;
$result = mysqli_query($cn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header custom-card-header">
                    <h5 class="card-title">User Profile</h5>
                </div>
                <div class="card-body">
                    <form action="operation/update_profile.php" method="post">
                        <table class="container">
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="username" class="form-control" value="<?php echo $row['user_name'];?>">
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
                                    <input type="text" class="form-control" name="gender" value="<?php echo $row['gender'];?>">
                                </div>
                            </td>
                            <td>
                            <input type="hidden" value="<?php echo $row['city_id'];?>" name="city1">
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input type="mobile" class="form-control" name="mobile" value="<?php echo $row['contact_number'];?>">
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea class="form-control" id="exampleTextarea" rows="1" name="add" cols="5"><?php echo $row['user_address'];?></textarea>
                                </div>
                            </td>
                            <td>
                                <div class="form-group">
                                    <label>Date Of Birth</label>
                                    <input type="date" class="form-control" name="dob" value="<?php echo $row['dob'];?>">
                                </div>

                            </td>
                        </tr>
                        <tr>
                            <td>
                            <div class="form-group">
                                <label for="country">Select Country:</label>
                                <select id="country" onchange="loadStates()" class="form-control" name="country">
                                    <option value="">--Select Country--</option>
                                    <?php
                                    $con = mysqli_connect('localhost', 'root', '', 'wws');
                                    $qu = "SELECT * FROM country";
                                    $result = mysqli_query($con, $qu);
                                    while ($row = mysqli_fetch_array($result)) {
                                        echo "<option value='${row['country_id']}'>${row['country_name']}</option> ";
                                    }
                                    mysqli_close($con);
                                    ?>
                                    <!-- Add more countries as needed -->
                                </select>
                            </div>
                            </td>
                            <td>
                            <div class="form-group">
                                <label for="state">Select State:</label>
                                <select id="state" onchange="loadCities()" class="form-control" name="state">
                                    <option value=''>-- Select State --</option>
                                </select>
                            </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2" align="center">
                            <div class="form-group w-50">
                                <label for="city">Select City:</label>
                                <select id="city" name="city" class="form-control">
                                    <option value='tmp'>-- Select City --</option>
                                </select>
                            </div>
                            </td>
                        </tr>
                        </table>
                        <div class="form-group mt-3" align="center">
                            <button type="submit" class="btn btn-primary custom-card-header w-25 text-">Update</button>
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