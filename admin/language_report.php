<?php include"header.php";?>
<?php include"sidebar.php";?>
<script type="text/javascript" src="p.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-md-3"></div>
                <div class="col-sm-6 text-center">
                    <h1>Select Language</h1>
                </div>
            </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <!-- general form elements -->
                        <div class="card">
                        
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Select Language</label>
                                       <select name="language_id" class="form-control">
                                                    <?php
                                                        $en = mysqli_connect("localhost", "root", "", "wws") or die(mysqli_error());
                                                        $sql = "SELECT * FROM language";
                                                        $result = mysqli_query($en, $sql);
                                                        if (!$result) {
                                                            die("Error in SQL: " . mysqli_error($en));
                                                        }
                                                        while ($arr = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <option value="<?php echo $arr['language_id']; ?>">
                                                                <?php echo $arr['language_name']; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                    </div>
                                    <center><button type="submit" class="btn btn-primary w-25">Search</button></center>
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
                    <center><h1>Language(<?php if(isset($_POST['language_id'])) {
                                $con=mysqli_connect('localhost','root','','wws');
                                        $qu="select language_name from language where language_id= ".$_POST['language_id'];
                                        $result=mysqli_query($con,$qu);
                                        $row=mysqli_fetch_array($result);
                                        echo $row['language_name'];

                    } ?>) Report</h1>

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <table  border='1' id="example2" class="table table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Language Id</th>
                                            <th>Language name</th>
                                            <th>Project Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        if(isset($_POST['language_id'])) {
                                        $con=mysqli_connect('localhost','root','','wws');
                                        $qu="SELECT 
    ld.language_id, 
    l.language_name, 
    p.project_name
FROM 
    language_detail ld
JOIN 
    project p ON ld.project_id = p.project_id
JOIN 
    language l ON ld.language_id = l.language_id
WHERE 
    ld.language_id = ".$_POST['language_id'];
                                        $result=mysqli_query($con,$qu);
                                        while ($row=mysqli_fetch_array($result))
                                        {
                                            echo "<tr>";
                                                echo "<td>${row['language_id']}</td>";
                                                echo "<td>${row['language_name']}</td>";
                                                echo "<td>${row['project_name']}</td>";
                                            echo "</tr>";
                                        }
                                        unset($_POST);
                                    }
                                        ?>
                                    </tbody>
                                </table>
                                </center>
                            </div>
        <center>
                <input class="btn btn-danger mb-3"  type="button" value="Print report" onclick="javascript:Print('pr_report')">
            </center>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </section>
    </div>
    <?php include"footer.php";?>
