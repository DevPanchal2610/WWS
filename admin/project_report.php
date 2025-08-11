<?php include "header.php"; ?>
<?php include "sidebar.php"; ?>
<script type="text/javascript" src="p.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-3"></div>
                <div class="col-sm-6 text-center">
                    <h1>Select Date</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <!-- form start -->
                        <form method="post" action="project_report.php">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>From:</label>
                                    <input type="date" class="form-control" name="d_from" required>
                                </div>
                                <div class="form-group">
                                    <label>To:</label>
                                    <input type="date" class="form-control" name="d_to">
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <div id="pr_report">
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
        <section class="content-header">
            <center><h1>Project Report</h1></center>
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-md-3"></div>
                    <div class="col-sm-6 text-center">
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table border=1 id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Project ID</th>
                                            <th>Project Name</th>
                                            <th>User Name</th>
                                            <th>Category</th>
                                            <th>Min Bid</th>
                                            <th>Upload Date</th>
                                            <th>Due Date</th>
                                            <th>Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                      function display($qu)
                      {
                      	 $con = mysqli_connect('localhost', 'root', '', 'wws');
                      	$result = mysqli_query($con, $qu);
                                            while ($row = mysqli_fetch_array($result)) {
                                                echo "<tr>";
                                                echo "<td>${row['project_id']}</td>";
                                                echo "<td>${row['project_name']}</td>";
                                                $qu1 = "SELECT * FROM user WHERE user_id=${row['user_id']}";
                                                $result1 = mysqli_query($con, $qu1);
                                                $row1 = mysqli_fetch_array($result1);
                                                echo "<td>${row1['user_name']}</td>";
                                                $qu1 = "SELECT * FROM category WHERE category_id=${row['category_id']}";
                                                $result1 = mysqli_query($con, $qu1);
                                                $row1 = mysqli_fetch_array($result1);
                                                echo "<td>${row1['category_name']}</td>";
                                                echo "<td>${row['min_bid']}</td>";
                                                echo "<td>${row['upload_date']}</td>";
                                                echo "<td>${row['due_date']}</td>";
                                                echo "<td>${row['description']}</td>";
                                                echo "</tr>";
                                            }
                      }
    if(isset($_POST['d_from']) && isset($_POST['d_to'])) {
    	if($_POST['d_from']!="" && $_POST['d_to']!=""){
        $d_from = $_POST['d_from'];
        $d_to=$_POST['d_to'];
        $qu ="select * from project where upload_date between '$d_from' and '$d_to'";
        display($qu);


    }
        else
        {$d_from = $_POST['d_from'];
        	 // echo "<script>alert('$d_from');</script>";
    $qu="select * from project where upload_date = '$d_from'";
        	 display($qu);
        }

    
    }
    else
    {
    	$qu="select * from project";
    	display($qu);
    }
?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <center>
        <input class="btn btn-danger" type="button" value="Print report" onclick="javascript:Print('pr_report')">
    </center>
</div>
<?php include "footer.php"; ?>
