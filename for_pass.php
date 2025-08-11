<?php include "header.php"; ?>

<head>
    <title>Forgot Password</title>
</head>

<body>
    <div class="container pt-5">
                <h1 align="center " class="mb-3">Forgot Password</h1>
        
        
        <div class="row">
            <div class="col-xl-4 col-md-3 col-sm-12">
                <!-- Placeholder content if needed -->
            </div>
            <div class="col-xl-4 col-md-4 col-12">
                <div class="card">
                    <div class="card-body pt-3">

                        <form id="emailForm" action="operation/for_pass_up.php" method="post">
                            <div class="form-group">
                                <label for="email">E-mail:</label>
                                <input type="text" id="email" name="email" class="form-control" placeholder="Enter E-mail" onchange="get()">
                                 <div id="valid_email"></div>
                            </div>
                            <div class="form-group">
                                <div id="result"><label>Question</label></div>
                                <input type="text" name="ans" id="ans" class="form-control" placeholder="Enter Answer" onchange="match()" ondragenter="match()" onkeypress="handleKeyPress(event)">
                              <div id="valid_ans"></div>
                            </div>

                            <div id="show" style="visibility: hidden ;display:none">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" id="pas" class="form-control" placeholder="Enter Password">
                                </div>
                                <div class="form-group">
                                    <label>Re-Enter Password</label>
                                    <input type="password" id="pas1" class="form-control" placeholder="Re-Enter Password" onkeyup="valid()" name="password1">
                                    <span id="msg"></span>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-outline-primary w-25">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?php include "footer.php"; ?>
<script>
    $('#emailForm').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            ans: {
                required: true,
            },
            password: {
                required: true,
                minlength: 5
            },
            password1: {
                required: true,
                equalTo: "#pas"
            }
        },
        messages: {
            email: {
                required: "Please enter a valid email address",
                email: "Please enter a valid email address"
            },
            ans: {
                required: "Please enter the answer"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            password1: {
                required: "Please re-enter the password",
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
</script>
<script>
    function get() {
        var xhr = new XMLHttpRequest();
        var email = document.getElementById("email").value;
        xhr.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                var que = JSON.parse(this.responseText);
                // console.log(que);
                if(que.length >0)
                {
                var print = document.getElementById('result');
                print.innerHTML = "<label>" + que[0].security_que + "?" + "</label>";
                $("#valid_email").text("");
                }
                else
                {
                $("#valid_email").css("color", "red");
                $("#valid_email").text("Please Enter Correct Email");
                }
            }
        };
        xhr.open("GET", "operation/for_pass.php?email=" + email, true);
        xhr.send();
    }

   function match() {
    var formEl = document.getElementById("emailForm");
    var formData = new FormData(formEl);
    var data1 = Object.fromEntries(formData);
    console.log(data1);
    $.ajax({
        type: "POST",
        url: "operation/for_pass1.php",
        data: data1,
        success: function (response) {
            var que = JSON.parse(response);
            if (que.msg == "data") {
                document.getElementById('show').style.display = 'block';
                document.getElementById('show').style.visibility = 'visible';
                $("#valid_ans").text("");
            } else {
                $("#valid_ans").css("color", "red");
                $("#valid_ans").text("Please Enter correct Answer");
                // alert("Please Enter correct Email and Password");
                document.getElementById('show').style.display = 'none';
                document.getElementById('show').style.visibility = 'hidden';
            }
        },
        error: function (error) {
            console.log(error);
        }
    });
}


    function valid() {
        var pas = $("#pas").val();
        var pas1 = $("#pas1").val();
        var msgElement = $("#msg");

        if (pas == pas1) {
            msgElement.css("color", "green");
            msgElement.html("Password Matched");
            $("#pas1").removeClass('is-invalid');
        } else {
            msgElement.css("color", "red");
            msgElement.html("Passwords do not match");
            $("#pas1").addClass('is-invalid');
        }
    }

    function handleKeyPress(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            match();
        }
    }
</script>
