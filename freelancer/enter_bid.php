<?php
// Start or resume the session


// Include header and establish database connection
include "header.php";
$conn = mysqli_connect('localhost', 'root', '', 'wws');

// Check if connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if user is logged in
if(isset($_SESSION['id'])) {
    // Check if project_name parameter is set in URL
    if (isset($_GET['project_id'])) {
        $project_id = $_GET['project_id'];
        // Perform database query to retrieve project details based on project_id
        $query = "SELECT project_id, project_name, min_bid, due_date, description FROM project WHERE project_id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $project_id);
        $stmt->execute();
        $result = $stmt->get_result();
        // Check if project exists
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
?>
            <div class="mx-auto w-25 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="card-img">
                            <img src="../img/wws2.png" alt="" class="img-fluid mb-0 pb-0">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['project_name']; ?></h5>
                            <p class="card-text">Max Bid: <?php echo $row['min_bid']; ?></p>
                            <p class="card-text">Due Date: <?php echo $row['due_date']; ?></p>
                            <p class="card-text">Description: <?php echo $row['description']; ?></p>
                            <!-- Add more fields if necessary -->
                            <form id="bidForm" method="post" action="add_bid.php">
                                <input type="hidden" name="project_id" id="proj_id" value="<?php echo $row['project_id']; ?>">
                                <input type="hidden" name="user_id" value="<?php echo $_SESSION['id']; ?>">

                                <div class="form-group">
                                    <label for="bid_total">Add Bid</label>
                                    <input type="number" name="bid_total" class="form-control" id="bid_total" placeholder="Enter Bid Total" oninput="validate_bid_amt()"><span id='alert'></span>
                                </div>
                                <div class="form-group">
                                    <label for="days">Days to Complete</label>
                                    <input type="text" name="days" class="form-control" id="days" placeholder="Enter Days to Complete">
                                </div>
                                <!-- You can add more fields if necessary -->
                                <button type="submit" id="submit-button" class="btn btn-primary">Add Bid</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<?php
        } else {
            echo "Project not found.";
        }
    } else {
        echo "Project name parameter not provided.";
    }
} else {
    echo "Please log in to add a bid.";
}

// Include footer and close database connection
include "footer.php";
mysqli_close($conn);
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function () {
    // Add custom method to validate bid amount as a positive number
    $.validator.addMethod("positiveNumber", function(value, element) {
        return this.optional(element) || value > 0;
    }, "Bid amount must be a positive number.");

    // Initialize form validation
    $('#bidForm').validate({
        rules: {
            bid_total: {
                required: true,
                number: true,
                positiveNumber: true
            },
            days: {
                required: true,
                digits: true // Ensure days input is a positive integer
            }
        },
        messages: {
            bid_total: {
                required: "Please enter bid amount.",
                number: "Please enter a valid number for bid amount."
            },
            days: {
                required: "Please enter days to complete.",
                digits: "Please enter a valid number of days."
            }
        },
        errorElement: 'span', // Define the error element as 'span'
        errorPlacement: function (error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error); // Append error message next to the input field
        },
        highlight: function (element, errorClass, validClass) {
            $(element).addClass('is-invalid'); // Apply 'is-invalid' class to highlight invalid input
        },
        unhighlight: function (element, errorClass, validClass) {
            $(element).removeClass('is-invalid'); // Remove 'is-invalid' class on valid input
        },
        submitHandler: function(form) {
            // Submit the form if it passes validation
            form.submit();
        }
    });
});

function validate_bid_amt() {
    var xhr = new XMLHttpRequest();
    var bid_amt = document.getElementById('bid_total').value;
    var project_id = document.getElementById('proj_id').value;
    var params = 'bid_amt=' + encodeURIComponent(bid_amt) + '&project_id=' + encodeURIComponent(project_id);
    var submitButton = document.getElementById('submit-button');
    var print = document.getElementById('alert');
    print.classList.add('text-danger');
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200) {
                // Request was successful
                var out= JSON.parse(xhr.responseText); 

                if(out.message == 'null')
                {
                    print.innerText ="";
                    submitButton.disabled = false;
                }
                else
                {
                    print.innerText = out.message;
                    submitButton.disabled = true;
                }
            } else {
                // Request failed
                alert('hello');
                console.error('Request failed with status:', xhr.status);
            }
        }
    };

    xhr.open('POST', 'operation/validate_bid_amt.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.send(params);
}
</script>
