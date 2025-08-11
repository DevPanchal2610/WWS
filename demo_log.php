<?php include "header.php"; ?>
<body>
    <div class="mx-auto w-25 mt-2">
        <div class="card">
            <div class="card-body">
                <div class="card-img">
                    <img src="img/wws2.png" alt="" class="img-fluid mb-0 pb-0" >
                    <h4 class="text-center pt-0 mt-0 pb-3">Welcome back</h4>
                </div>
                <hr>
                <form id="quickForm" action="operation/login.php" method="post">
                    <div class="card-body mb-0 pb-0">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group mb-0">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="terms" class="custom-control-input" id="exampleCheck1">
                                <label class="custom-control-label" for="exampleCheck1">I agree to the <a href="#">terms of service</a>.</label>
                            </div>
                        </div>
                        <div class="form-group mt-2 mb-2 text-center">
                            <input type="submit" value="Log In" class="btn btn-outline-primary w-100">
                        </div>
                        <!-- Forgot Password Link -->
                        <div class="text-right pb-0">
                            <a href="forgot_password.php">Forgot Password?</a>
                        </div>
                    </div>
                </form>
                <hr class="pt-0 mt-0" style="height:2px;border-width:0;color:gray;background-color:gray">
                <div class="text-center">
                    Don't have an account? <a href="registration.php">Registration</a>
                </div>
            </div>
        </div>
    </div>
    <?php 
        if(isset($_SESSION['flag']))
        {
            echo "<script>alert('Please enter valid password and email')</script>";
            unset($_SESSION['flag']);
        }
    ?>
<?php include "footer.php"; ?>
<!-- Page specific script -->
<script>
$(function () {
    $('#quickForm').validate({
        rules: {
            email: {
                required: true,
                email: true,
            },
            password: {
                required: true,
                minlength: 5
            },
            terms: {
                required: true
            },
        },
        messages: {
            email: {
                required: "Please enter an email address",
                email: "Please enter a valid email address"
            },
            password: {
                required: "Please provide a password",
                minlength: "Your password must be at least 5 characters long"
            },
            terms: "Please accept our terms"
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
