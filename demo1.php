<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body>

        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="btn btn-primary">city</i>
        </a>
        <div class="dropdown-menu">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
               <div class="form-group">
               	<table>
               					<tr>
                            <td>
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
                            <td colspan="2" align="center">
                            <div class="form-group w-50">
                                <label for="city">Select City:</label>
                                <select id="city" name="city" class="form-control">
                                    <option value=''>-- Select City --</option>
                                </select>
                            </div>
                            </td>
                        </tr>
                        </table>
            </div>
            <!-- Message End -->
          </a>
        </div>
  </nav>
  <!-- /.navbar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
</body>
</html>
