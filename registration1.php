<?php include "header.php"; ?>
<style>
.custom-card-header {
background-color: #4472c4;
color: white;
}
</style>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card">
                <div class="card-header custom-card-header">
                    <h5 class="card-title">Make Your Profile</h5>
                </div>
                <div class="card-body">
                    <form id="quickForm" action="operation/signup.php" method="post">
                        <table class="container">
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label for="username">Username</label>
                                        <input type="text" name="uname" class="form-control" value="<?php if(isset($_POST['uname'])){echo $_POST['uname'];}?>" readonly>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" class="form-control" name="email" value="<?php if(isset($_POST['uname'])){echo $_POST['email'];}?>" readonly> <!-- Added name attribute -->
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <input type="text" class="form-control" name="gender">
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label>Mobile</label>
                                        <input type="text" class="form-control" name="cont"> <!-- Changed type to text -->
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                        <label>Address</label>
                                        <textarea class="form-control" id="exampleTextarea" rows="1" name="add"></textarea> <!-- Changed name to address -->
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label>Date Of Birth</label>
                                        <input type="date" class="form-control" name="dob"> <!-- Changed name to dob -->
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
                                <td >
                                    <div class="form-group">
                                        <label for="city">Select City:</label>
                                        <select id="city" name="city" class="form-control">
                                            <option value=''>-- Select City --</option>
                                        </select>
                                    </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                        <label>User Type:</label>
                                        <select name="usertype" class="form-control">
                                            <option value="company">Company</option>
                                            <option value="freelancer">Freelancer</option>
                                        </select>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
                                <label>Security Question:</label>
                                <select name="s_que" class="form-control">
                                    <option value="What is Your Pet Name ?">What is Your Pet Name?</option>
                                    <option value="What is Your Mother Name ?">What is Your Mother Name ?</option>
                                    <option value="What is Your Fav. Teacher Name ?">What is Your Fav. Teacher Name ?</option>
                                    <option value="What is Your Fav. Food ?">What is Your Fav. Food ?</option>
                                    <option value="What is Your Fav. Colour ?">What is Your Fav. Colour ?</option>


                                </select>
                            </div>
                                </td>
                                <td>
                                    <div class="form-group">
                                <label>Security Answer:</label>
                                <input type="text" name="s_ans" class="form-control" placeholder="Enter Security Answer">
                            </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" id="password" placeholder="Password">
</div>
                                </td>
                                <td>
                                    <div class="form-group">
    <label for="exampleInputPassword2">Confirm Password</label>
    <input type="password" name="confirmPassword" class="form-control" id="confirmPassword" placeholder="Confirm Password">
</div>
                                </td>
                            </tr>
                        </table>
                        <div class="form-group mt-3" align="center">
                            <button type="submit" class="btn btn-primary w-25 text-">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include "footer.php"; ?>
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
xhr.open("GET", "operation/getStates.php?country_id=" + countryId, true);
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
xhr.open("GET", "operation/getCities.php?state_id=" + stateId, true);
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
<script>
    $(document).ready(function () {
        $('#quickForm').validate({
            rules: {
                username: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                gender: {
                    required: true
                },
                mobile: {
                    required: true,
                    digits: true
                },
                address: {
                    required: true
                },
                dob: {
                    required: true
                },
                country: {
                    required: true
                },
                state: {
                    required: true
                },
                city: {
                    required: true
                },
                usertype: {
                    required: true
                },
                s_que: {
                    required: true
                },
                s_ans: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                confirmPassword: {
                    required: true,
                    equalTo: "#password"
                }
            },
            messages: {
                username: "Please enter your username",
                email: {
                    required: "Please enter your email",
                    email: "Please enter a valid email address"
                },
                gender: "Please select your gender",
                mobile: {
                    required: "Please enter your mobile number",
                    digits: "Please enter only digits"
                },
                address: "Please enter your address",
                dob: "Please enter your date of birth",
                country: "Please select your country",
                state: "Please select your state",
                city: "Please select your city",
                usertype: "Please select your user type",
                s_que: "Please select a security question",
                s_ans: "Please enter your security answer",
                password: {
                    required: "Please enter a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                confirmPassword: {
                    required: "Please re-enter your password",
                    equalTo: "Passwords do not match"
                }
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>
