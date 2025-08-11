<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="../../img/logo1.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Admin</span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="../../dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block text-capitalize" style="font-style:bold;font-size: 20px">
          <?php
      $con=mysqli_connect('localhost','root','','wws');
          $qu="select * from admin where admin_id=".$_SESSION['admin_id'];
        $result=mysqli_query($con,$qu);
        $row=mysqli_fetch_array($result);
        echo $row['admin_name'];
        mysqli_close($con);
                                      ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->
        
        <li class="nav-item">
          <a href="../user.php" class="nav-link" id="click_country">
            <p> 
              User
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../admin.php" class="nav-link">
            <p>
              Country
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../state.php" class="nav-link">
            <p>
              State
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../city.php" class="nav-link">
            <p>
              City
            </p>
          </a>
        </li>
         <li class="nav-item">
          <a href="../category.php" class="nav-link">
            <p>
              Category
            </p>
          </a>
        </li>
         <li class="nav-item">
          <a href="../language.php" class="nav-link">
            <p>
              Language
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../bid.php" class="nav-link">
            <p>
              Bid
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../project.php" class="nav-link">
            <p>
              Project
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../feedback.php" class="nav-link">
            <p>
              FeedBack
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../payment.php" class="nav-link">
            <p>
              Payment
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../report.php" class="nav-link">
            <p>
              Report
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../change_pass.php" class="nav-link">
            <p>
              Change Password
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="../logout.php" class="nav-link">
            <p>
              Log Out
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>