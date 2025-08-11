<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>

<div class="content-wrapper  mb-5">
                <h1 align="center " class="mb-3">Change Password</h1>

    <div class="row">
        <div class="col-xl-4 col-md-3 col-sm-12">
            <!-- Placeholder content if needed -->
        </div>
        <div class="col-xl-4 col-md-4 col-12">
            <div class="card">
                <div class="card-body pt-3">
                    <form id="emailForm" action="operation/update_password.php" method="post">
    <div class="form-group">
        <div id="result"><b>Old Password</b></div>
        <input type="password" name="old_pass" id="old_pass" class="form-control" placeholder="Enter Old Password" onchange="match()" ondragenter="match()" onkeypress="handleKeyPress(event)">
        <div id="valid_ans"></div>
    </div>

    <div id="show" style="display:none;">
        <div class="form-group">
            <label><b>Password</b></label>
            <input type="password" name="password" id="pas" class="form-control" placeholder="Enter New Password">
        </div>
        <div class="form-group">
            <label><b>Re-Enter Password</b></label>
            <input type="password" id="pas1" class="form-control" placeholder="Re-Enter Password" onkeyup="" name="password1">
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

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
   
        function match() {
            var formEl = document.getElementById("emailForm");
            var formData = new FormData(formEl);
            var data1 = Object.fromEntries(formData);

            $.ajax({
                type: "POST",
                url: "operation/validate_old_pass.php",
                data: data1,
                success: function(response) {
                    var que = response;
                    // console.log(que);
                    if (que == "data") {
                        $('#show').show();
                         $("#valid_ans").text("");
                    } else {
                        $("#valid_ans").css("color", "red");
                        $("#valid_ans").text("Please Enter correct Password");
                        $('#show').hide();
                    }
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }


        function handleKeyPress(event) {
            if (event.key === "Enter") {
                event.preventDefault();
                match();
            }
        }
</script>

<?php include "footer.php"; ?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $('#emailForm').validate({
            rules: {
                old_pass: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password1: {
                    required: true,
                    minlength: 6,
                    equalTo: "#pas"
                }
            },
            messages: {
                old_pass: "Please enter your old password",
                password: {
                    required: "Please enter your new password",
                    minlength: "Password must be at least 6 characters long"
                },
                password1: {
                    required: "Please re-enter your new password",
                    minlength: "Password must be at least 6 characters long",
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

