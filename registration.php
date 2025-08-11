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
                    <form id="quickForm" action="registration1.php" method="post">
                        <div class="card-body">
                            <div class="form-group">
                                <label>User Name:</label>
                                <input type="text" name="uname" class="form-control" placeholder="Enter User Name">
                            </div>
                            <div class="form-group">
                                <label>Email address:</label>
                                <input type="email" name="email" id="email" class="form-control" placeholder="Enter email" onkeyup="validateEmail()">
                                <div id="validEmail"></div>
                            </div>
                            <div class="form-group">
                            <center><a href="#" class="aa btn btn-success">Send OTP</a></center>
                        <span id="msg"></span>
                        </div>
                            <div class="form-group" id="pin">
                                
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
                email: {
                    required: true,
                    email: true
                },
                otp: {
                    required: true,
                    minlength: 4, // Assuming a 4-digit OTP
                    digits: true
                }
            },
            messages: {
                uname: "Please enter your username",
                email: "Please enter a valid email address",
                otp: {
                    required: "Please enter the OTP",
                    minlength: "The OTP must be 4 digits",
                    digits: "Please enter only digits"
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


        
        function validateEmail() {
            var email = document.getElementById("email").value;
            var emailMessage = document.getElementById("validEmail");
            var submitButton = document.getElementById("submitButton");

            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var data = JSON.parse(this.responseText);
                    // console.log(data);
                    if (data.msg == "data") {
                        emailMessage.style.color = "red";
                        emailMessage.innerText = "This Email is Already Registered.";
                        submitButton.disabled = true; // Disable the submit button
                    } else {
                        emailMessage.innerText = "";
                        submitButton.disabled = false; // Enable the submit button
                    }
                }
            };
            xhr.open("GET", "operation/val_email.php?email=" + email, true);
            xhr.send();
        }

        function otp()
        {
            var xhr = new XMLHttpRequest();
            var email = document.getElementById("email").value;
            xhr.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var data =this.responseText;
                    console.log(data);
                    $('#msg').html(data);
                }
            };

            xhr.open("GET", "operation/otp.php?email=" + email, true);
            xhr.send();
        }
        $('.aa').on('click', function () {
            document.getElementById('pin').innerHTML="<label>OTP :</label><input type='text' class='form-control' name='otp' id='otp' onchange='otp_val()' placeholder='Enter OTP'>";
            otp();
            
        
        });
      function otp_val()
      {
        var submitButton = document.getElementById("submitButton");
        // alert(document.getElementById('v_otp').value);
        if(document.getElementById('otp').value!=document.getElementById('v_otp').value)
        {
             submitButton.disabled = true;
             alert('Please Enter Valid OTP');

        }
        else{
            submitButton.disabled = false;
        }
      }
    </script>

</body>
