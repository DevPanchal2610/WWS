<?php include "header.php"; ?>
<!-- jQuery -->

<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script>

<section id="values" class="values">
    <center><h1 class="mt-0 pt-0 mb-3">Give FeedBack</h1></center>
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mt-4 mt-lg-0"></div>
            <div class="col-lg-4 mt-4 mt-lg-0">
               <div class="card">
                    <div class="card-body">
                        <div class="card-img">
                            <img src="img/wws2.png" alt="" class="img-fluid mb-0 pb-0">
                        </div>
                        <div class="">
                            <form id="quickForm" action="operation/add_feedback.php" method="post">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label><b>Feedback :</b></label>
                                        <textarea name="feedback" class="form-control" placeholder="Enter Feedback" maxlength="255"></textarea>

                                    </div>
                                </div>
                                <div class="">
                                    <div class="form-group">
                                        <input type="submit" class="btn btn-outline-primary w-100" name="submit_btn" value="Submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600"></div>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>

<script>
    $(document).ready(function () {
        $('#quickForm').validate({
            rules: {
                feedback: {
                    required: true
                }
            },
            messages: {
                feedback: "Please enter feedback"
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
