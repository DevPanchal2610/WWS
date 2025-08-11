<?php include "header.php"; ?>
<body>
    <div class="mx-auto w-25 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="card-img">
                    <img src="img/wws2.png" alt="" class="img-fluid mb-0 pb-0">
                    <h4 class="text-center pt-0 mt-0 pb-3">Welcome</h4>
                </div>
                <hr>
                <div class="">
                    <form id="quickForm" action="operation/signup.php" method="post">
                        <div class="card-body">
                                <input type="hidden" name="uname" value="<?php if(isset($_POST['uname'])){echo $_POST['uname'];}?>">
                                <input type="hidden" name="email" value="<?php if(isset($_POST['uname'])){echo $_POST['email'];}?>" >
                            <div class="form-group">
                                <label>Gender :</label>
                                <input type="text" name="gender" class="form-control" placeholder="Enter Gender">
                            </div>
                            <div class="form-group">
                                <label>Contact Number:</label>
                                <input type="text" name="cont" class="form-control" placeholder="Enter Contact Number">
                            </div>
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
                            <div class="form-group">
                                <label for="state">Select State:</label>
                                <select id="state" onchange="loadCities()" class="form-control" name="state">
                                    <option value=''>-- Select State --</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="city">Select City:</label>
                                <select id="city" name="city" class="form-control">
                                    <option value=''>-- Select City --</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Address:</label>
                                <textarea name="add" class="form-control" maxlength="255"
                                    placeholder="Enter Address"></textarea>
                            </div>
                            <div class="form-group">
                                <label>date of birth :</label>
                                <input type="date" name="dob" class="form-control" id="dob">
                            </div>
                            <div class="form-group">
                                <label>User Type:</label>
                                <select name="usertype" class="form-control">
                                    <option value="company">Company</option>
                                    <option value="freelancer">Freelancer</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Security Question:</label>
                                <textarea name="s_que" class="form-control" maxlength="255"
                                    placeholder="Enter Question"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Security Answer:</label>
                                <input type="text" name="s_ans" class="form-control" placeholder="Enter Security Answer">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1"
                                    placeholder="Password">
                            </div>
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                    <label class="custom-control-label" for="exampleCheck1">I agree to the <a
                                            href="#">terms of service</a>.</label>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <button type="submit" id="submitButton" class="btn btn-outline-primary w-100">Submit</button>
                        </div>
                    </form>
                    <hr style="height:2px;border-width:0;color:gray;background-color:gray">
                    <div class="text-center">
                        do you have an account? <a href="index.php">Login</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="plugins/jquery/jquery.min.js"></script>
    <script src="plugins/jquery-validation/jquery.validate.min.js"></script>
    <script src="plugins/jquery-validation/additional-methods.min.js"></script>
    <script>
       $('#quickForm').validate({
            rules: {
                uname: {
                    required: true
                },
                gender: {
                    required: true
                },
                cont: {
                    required: true,
                    digits: true
                },
                add: {
                    required: true
                },
                dob: {
                    required: true
                },
                s_que: {
                    required: true
                },
                s_ans: {
                    required: true
                },
                email: {
                    required: true,
                    email: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                terms: {
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
                }
            },
            messages: {
                uname: "Please enter your username",
                gender: "Please enter your gender",
                cont: {
                    required: "Please enter your contact number",
                    digits: "Please enter only digits"
                },
                add: "Please enter your address",
                dob: "Please enter your date of birth",
                s_que: "Please enter your security question",
                s_ans: "Please enter your security answer",
                email: "Please enter a valid email address",
                password: {
                    required: "Please enter a password",
                    minlength: "Your password must be at least 6 characters long"
                },
                terms: "Please agree to the terms of service",
                country: "Please select a country",
                state: "Please select a state",
                city: "Please select a city"
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                if (element.attr("name") == "country") {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                } else if (element.attr("name") == "state") {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                } else if (element.attr("name") == "city") {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                } else {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                }
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });


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
</body>
