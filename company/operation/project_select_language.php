<?php include"header.php";?>
<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- jquery-validation -->
<script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
<?php 
	if(isset($_POST['submit_btn']))
	{
		$cn = mysqli_connect('localhost', 'root', '', 'wws');
		$id=$_SESSION['id'];
		extract($_POST);
		$_SESSION['p_name']=$project_name;
		$currentDate = date('Y-m-d');
		
	


		if (isset($_SESSION['refresh']) AND isset($_SESSION['project_id'])) 
		{
    		unset($_SESSION['refresh']);
    		$sql="UPDATE `project` SET `project_name`='$project_name',`category_id`='$category',`min_bid`='$min_bid',`user_id`='$id',`upload_date`='$currentDate',`due_date`='$due_date',`description`='$desc' WHERE project_id=".$_SESSION['project_id'];
    		unset($_SESSION['project_id']);
		// echo $sql;
		mysqli_query($cn, $sql);
		mysqli_close($cn);
	   } 
	   else
	    {
		$sql = "insert into project  (`project_name`, `category_id`, `min_bid`, `user_id`, `upload_date`, `due_date`, `description`) values('$project_name',$category,$min_bid,$id,'$currentDate','$due_date','$desc')";
		// echo $sql;
		mysqli_query($cn, $sql);

			$sql = "SELECT MAX(project_id) as 'id' FROM project WHERE project_name='$project_name' AND user_id=$id";
   			 $result = mysqli_query($cn, $sql);
   			 $row = mysqli_fetch_array($result);
			 $_SESSION['project_id']=$row['id'];
		mysqli_close($cn);

	    }


	}
?>
<section id="values" class="values">
	<div class="container" data-aos="fade-up">
		<div class="row">
			<div class="col-lg-2" data-aos="fade-up" data-aos-delay="200">
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
								<th scope="col">Selected language</th>
								<th></th>
							</tr>
						</thead>
						<tbody id="lan">
							
						</tbody>
					</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
<div class="row mt-5">
	<div class="col-lg-1 mt-1 mt-lg-1 " data-aos="fade-up" data-aos-delay="600">
	</div>
    <div class="col-lg-10 mt-10 mt-lg-10 " data-aos="fade-up" data-aos-delay="600">
        <!-- Empty column, adjust as needed -->
        <a href="#" class="btn btn-success mr-4" onclick="goBack()">Previous</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="#" class="btn btn-success" onclick="next()">Next</a>
    </div>
    <div class="col-lg-1 mt-1 mt-lg-1 " data-aos="fade-up" data-aos-delay="600">
	</div>
</div>


</section>

<?php include"footer.php";?>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
	$(document).ready(function () {

    $('.language-link').on('click', function () {
        var languageName = $(this).data('language-name');
        addToDatabase(languageName);
        load_lan();
    });

     $(document).on('click', '.language-delete', function () {
    var languageId = $(this).data('language-name');
    deleteFromDatabase(languageId);
    load_lan();
});           

    function deleteFromDatabase(itemId) {
         $.ajax({
        type: 'POST',
        url: 'del_lan_for_project.php',
        data: {
            itemId: itemId
        },
        dataType: 'json',  // Specify the expected data type
        success: function (response) {
            console.log(response.msg);  // The response is already parsed as JSON
            console.log('hello100');
        },
        error: function (xhr, status, error) {
            console.error('Error adding to database:', error);
        }
    });
    }

   function addToDatabase(itemName) {
    $.ajax({
        type: 'POST',
        url: 'insert_lan_for_project.php',
        data: {
            itemName: itemName
        },
        dataType: 'json',  // Specify the expected data type
        success: function (response) {
            console.log(response.msg);  // The response is already parsed as JSON
            // console.log('hello');
        },
        error: function (xhr, status, error) {
            console.error('Error adding to database:', error);
        }
    });
}


    function load_lan() {
        $.ajax({
            type: 'GET',
            url: "load_lan.php?",
            success: function (response) {
                $('#lan').html(response);
            },
            error: function (xhr, status, error) {
                console.error('Error loading language content:', error);
            }
        });
    }
});
	window.onload = function() {
    var receivedData = sessionStorage.getItem('session');
    // alert(receivedData);
    // Clearing all items from sessionStorage
sessionStorage.clear();

};
	function goBack() {
// 	var data = "1";
// sessionStorage.setItem('session', data);
	<?php $_SESSION['refresh']=1;	?>
  window.history.back();
}
function next()
{ 
	alert('Porject Added Successfully');
	window.location.href="demo.php";
}
</script>

