<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>WWS</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <!-- Favicons -->
    <link rel="icon" type="image/x-icon" href="../img/logo1.png">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
    <!-- Vendor CSS Files -->
    <link rel="stylesheet" href="assets/css/bootstrap4.min.css">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
    <!-- =======================================================
    * Template Name: FlexStart
    * Updated: Sep 18 2023 with Bootstrap v5.3.2
    * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
    <style>
      #profile 
      {
         color: #4472c4 !important;
     }
     .btn-primary1
     {
      background:  #4472c4 !important;
      color: white;
     }

    </style>
  </head>
  <body>  
        <i class="bi bi-list mobile-nav-toggle">
        </i>
<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- jquery-validation -->
<script src="../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../plugins/jquery-validation/additional-methods.min.js"></script>
<script>
	function load_cate() {
// Load the content of the third box using AJAX or any other method you prefer
// Replace the URL with the actual URL to fetch the updated content
$.ajax({
type: 'GET',
url: 'operation/load_cate.php',
success: function (response) {
// Update the content of the third box with the new data
$('#cate').html(response);
},
error: function (xhr, status, error) {
console.error('Error loading third box content:', error);
}
});
}
	function load_lan() {
// Load the content of the third box using AJAX or any other method you prefer
// Replace the URL with the actual URL to fetch the updated content
$.ajax({
type: 'GET',
url: 'operation/load_lan.php',
success: function (response) {
// Update the content of the third box with the new data
$('#lan').html(response);
},
error: function (xhr, status, error) {
console.error('Error loading third box content:', error);
}
});
}
$(document).ready(function () {
$('.category-link').on('click', function () {
var categoryName = $(this).data('category-name');
addToDatabase('category', categoryName);
});
$(document).on('click', '.category-delete', function () {
var categoryId = $(this).data('category-name');
// alert(categoryId);
deleteFromDatabase('category', categoryId);
});
$(document).on('click', '.language-delete', function () {
var languageId = $(this).data('language-name');
// alert(languageId);
deleteFromDatabase('language',languageId);
});
$('.language-link').on('click', function () {
var languageName = $(this).data('language-name');
addToDatabase('language', languageName);
});
function deleteFromDatabase(type, itemId) {
$.ajax({
type: 'POST',
url: 'operation/skill_del.php',
data: {
type: type,
itemId: itemId
},
success: function (response) {
// alert(response.msg);
// if (response.msg == 'success') {
	if(type=='category')
	{
		load_cate();
	}
	else if(type=='language')
	{
		load_lan();
	}
  // Refresh the third box after deletion
// }
},
error: function (xhr, status, error) {
console.error('Error deleting from database:', error);
}
});
}
function addToDatabase(type, itemName) {
$.ajax({
type: 'POST',
url: 'operation/update_database.php',
data: {
type: type,
itemName: itemName
},
success: function (response) {
// alert(response.msg);
if(response.msg=='cate')
{
	load_cate();
} 
else if (response.msg=='lan') {
	load_lan();
	
}
// Log the parsed JSON response to the console for debugging
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
window.onload = function() {
      load_lan();
      load_cate();
    };
</script>
<section id="values" class="values">
	<div class="container" data-aos="fade-up">
		<h2 class="text-center mb-4">Select Your Skills</h2>
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
								echo "<td>". ucfirst($row['language_name']) . "</td>";
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
					
					<!--  -->
					<div class="container">
						<div class="row">
							<div class="col">
								<table class="table">
						<thead>
							<tr>
								<th scope="col">Category</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="cate">
							
						</tbody>
					</table>
							</div>
							<div class="col">
								<table class="table">
						<thead>
							<tr>
								<th scope="col">Language</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="lan">
							
						</tbody>
					</table>
							</div>
						</div>
					</div>
				</div>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<a href="profile.php" class="btn btn-primary w-25 mt-3 ml-5" onclick="alert('Profile Updated succssfully');">Next</a>
			</div>
		</div>
	</div>
</section>

</body>
<script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</html>