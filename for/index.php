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
                                <input type="text" id="email" name="email" class="form-control" placeholder="Enter E-mail" onchange="get()" onkeypress="handleKeyPress(event)">
                                 <div id="valid_email"></div>
                            </div>

                            <div id="show" style="display:none">
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
                minlength: 6
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
                minlength: "Your password must be at least 6 characters long"
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
                if (que.length > 0) {
                    $('#result').html("<label>" + que[0].security_que + "?" + "</label>");
                    $("#valid_email").text("");
                    $('#show').show();
                } else {
                    $("#valid_email").css("color", "red");
                    $("#valid_email").text("Please Enter Correct Email");
                    $('#show').hide();
                }
            }
        };
        xhr.open("GET", "operation/for_pass.php?email=" + email, true);
        xhr.send();
    }

    function handleKeyPress(event) {
        if (event.key === "Enter") {
            event.preventDefault();
            get();
        }
    }
</script>
