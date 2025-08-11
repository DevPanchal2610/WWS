<?php include "header.php"; ?>

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script>
<script>
$(document).ready(function () {
    $('.category-link').on('click', function () {
        var categoryName = $(this).data('category-name');
        addToDatabase('category', categoryName);
    });

    $('.language-link').on('click', function () {
        var languageName = $(this).data('language-name');
        addToDatabase('language', languageName);
    });

    function addToDatabase(type, itemName) {
        $.ajax({
            type: 'POST',
            url: 'update_database.php',
            data: {
                type: type,
                itemName: itemName
            },
            success: function (response) {
                console.log(response.msg);  // Log the parsed JSON response to the console for debugging
                // console.log(response.msg); 

                // Update the content of the third box or perform other actions as needed
            },
            error: function (xhr, status, error) {
                // Handle errors here
                console.error('Error adding to database:', error);
            }
        });
    }
});

</script>

<section id="values" class="values">
    <div class="container" data-aos="fade-up">
        <div class="row">
            <div class="col-lg-4" data-aos="fade-up" data-aos-delay="200">
                <div class="box">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Select Category</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cn = mysqli_connect('localhost', 'root', '', 'wws');
                            $sql = "Select * from category";
                            $result = mysqli_query($cn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . ucfirst($row['category_name']) . "</td>";
                                echo "<td><a href='#' class='category-link' data-category-name='" . $row['category_id'] . "'>+</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="400">
                <div class="box">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Select Language</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $cn = mysqli_connect('localhost', 'root', '', 'wws');
                            $sql = "Select * from language";
                            $result = mysqli_query($cn, $sql);
                            while ($row = mysqli_fetch_array($result)) {
                                echo "<tr>";
                                echo "<td>" . ucfirst($row['language_name']) . "</td>";
                                echo "<td><a href='#' class='language-link' data-language-name='" . $row['language_id'] . "'>+</a></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="col-lg-4 mt-4 mt-lg-0" data-aos="fade-up" data-aos-delay="600">
                <div class="box">
                    <!-- The content of the third box where the added items will be displayed -->
                </div>
            </div>
        </div>
    </div>
</section>

<?php include "footer.php"; ?>
