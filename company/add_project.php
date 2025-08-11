<?php include "header.php"; ?>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script>


<section id="values">
    <div class="container">
        <center><h1>Add Project</h1></center>
        <div class="row">
            <div class="col-lg-4 mt-4 mt-lg-0">
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0" >
               <div class="card">
                        <div class="card-body">
                            <div class="card-img">
                                <img src="img/wws2.png" alt="" class="img-fluid mb-0 pb-0">
                            </div>
                            <div class="">
                                <form id="quickForm" action="operation/project_select_language.php" method="post">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label><b>Name</b></label>
                                            <input type="text" name="project_name" class="form-control" placeholder="Enter Name of Project">
                                        </div>
                                        <div class="form-group">
                                            <label for="category"><b>Select Category:</b></label>
                                            <select id="category" class="form-control" name="category">
                                                <option value="">--Select Category--</option>
                                                <?php
                                                $_SESSION['p_id']=1;
                                                $con = mysqli_connect('localhost', 'root', '', 'wws');
                                                $qu = "SELECT * FROM category";
                                                $result = mysqli_query($con, $qu);
                                                while ($row = mysqli_fetch_array($result)) {
                                                    echo "<option value='${row['category_id']}'>${row['category_name']}</option> ";
                                                }
                                                mysqli_close($con);
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label><b>Description</b></label>
                                            <textarea name="desc" class="form-control" placeholder="Enter description"></textarea>
                                            <!-- <input type="text" name="desc" class="form-control" placeholder="Enter description"> -->
                                        </div>
                                        <div class="form-group">
                                            <label><b>Maximum Bid</b></label>
                                            <input type="text" name="min_bid" class="form-control" placeholder="Enter Maximum Bid">
                                        </div>
                                        <div class="form-group">
                                            <label><b>Due date</b></label>
                                            <input type="date" name="due_date" class="form-control">
                                        </div>
                                    </div>
                                    <div class="">
                                    <div class="form-group">
                                        <input type="submit" class=" btn btn-outline-primary w-100" name="submit_btn">
                                    </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0" >
                

            </div>
        </div>
    </div>
    
</section>

<?php include "footer.php"; ?>
<script>
    $(document).ready(function () {
        $('#quickForm').validate({
            rules: {
                project_name: {
                    required: true
                },
                category: {
                    required: true
                },
                desc: {
                    required: true
                },
                min_bid: {
                    required: true,
                    digits: true
                },
                due_date: {
                    required: true
                }
            },
            messages: {
                project_name: "Please enter project name",
                category: "Please select a category",
                desc: "Please enter description",
                min_bid: {
                    required: "Please enter minimum bid",
                    digits: "Please enter a valid number"
                },
                due_date: "Please select due date"
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
