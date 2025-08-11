<?php include"header.php";?>
<body>
  <div class="mx-auto w-25 mt-2">
    <div class="card">
      <!-- <div class="card-header">
        
      </div> -->
      <div class="card-body">
        <div class="card-img">
          <img src="img/wws2.png" alt="" class="img-fluid mb-0 pb-0" >
          <h4 class="text-center pt-0 mt-0 pb-3">Welcome back</h4>
        </div>
        <hr>
        <!-- <div  class="border-white w-25"><hr>or</div> -->
        <div class="">
          <!-- form start -->
          <form id="quickForm" action="operation/login.php" method="post">
            <div class="card-body">
              <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
              </div>
            </div>
            <!-- /.card-body -->
            <div class="form-group mt-2 mb-5 text-center">
              <input type="submit" value="Log In" class="btn btn-outline-primary w-100">
              <!-- Forgot Password Link -->
              <div class="text-center pt-2">
                <a href="for_pass.php">Forgot Password?</a>
              </div>
            </form>
            <hr style="height:2px;border-width:0;color:gray;background-color:gray">
            <div class="text-center">
              don't have an account? <a href="registration.php">Registration</a>
            </div>
          </div>
          <!-- img-link for playstore and appstore -->
          <!-- <img src="img/playstore.png" alt="" class="img-fluid w-50"><img src="img/playstore.png" alt="" class="img-fluid w-50"> -->
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->
    <?php
    if(isset($_SESSION['flag']))
    {
    echo "<script>alert('please enter valid pass and email')</script>";
    unset($_SESSION['flag']);
    }
    ?>
    <?php include"footer.php";?>
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
    },
    messages: {
    email: {
    required: "Please enter a email address",
    email: "Please enter a valid email address"
    },
    password: {
    required: "Please provide a password",
    minlength: "Your password must be at least 5 characters long"
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