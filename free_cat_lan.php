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
                    <label>Select Category:</label>
                    <input type="text" name="no_of_cat" class="form-control" id="no_cat" onchange="make_cat()">
                  </div>
                  <div class="form-group">
                    <label>Select Category:</label>
                    <select name="category" id="" class="form-control">
                      <option value="">---Select Category---</option>
                      <option value="">Web Development</option>

                    </select>
                  </div>
                  <?php
      $_SESSION['person']=$_POST['no'];
          function data($i){
          $con=mysqli_connect('localhost','root','','wws');
          $qu="select * from category";
          $result=mysqli_query($con,$qu);
          echo" <div class='form-group'>";
          echo"<select name='category${i}' id='' class='form-control'>";
          while($row=mysqli_fetch_array($result))
          {
            echo"<option value='${row['category_id']}'>${row['category_name']}</option>";
            
          }
          echo"</select>";
          echo"</div>";
          }
      ?>
  
    
    <?php
        if(isset($_POST['no']))
        {
          $no=$_POST['no'];
          for($i=1;$i<=$no;$i++)
          { data($i);
          }

        }
    ?>
                <!-- /.card-body -->
                <div class="form-group mt-2 mb-5 text-center">
                <input type="submit" value="Log In" class="btn btn-outline-primary w-100">
              </form>
           <hr style="height:2px;border-width:0;color:gray;background-color:gray">
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
  <script>
      
    
  </script>
