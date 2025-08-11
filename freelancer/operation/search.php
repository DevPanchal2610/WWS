<?php
$conn = mysqli_connect('localhost', 'root', '', 'wws');
// header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['search'])) {
    $searchQuery = $_GET['search'];

    // Perform a database query to find matching project names or category names
     $query = "SELECT project.project_id, project.project_name, project.min_bid, project.due_date, project.description, 'Bid' AS operation, project.category_id
FROM project 
INNER JOIN category ON project.category_id = category.category_id 
WHERE project.project_name LIKE '%$searchQuery%'
UNION
SELECT project.project_id, project.project_name, project.min_bid, project.due_date, project.description, 'Bid' AS operation, category.category_id
FROM project 
INNER JOIN category ON project.category_id = category.category_id 
WHERE category.category_name LIKE '%$searchQuery%' 
UNION
SELECT project.project_id, project.project_name, project.min_bid, project.due_date, project.description, 'Bid' AS operation, category.category_id
FROM project 
INNER JOIN category ON project.category_id = category.category_id
INNER JOIN language_detail ON project.project_id = language_detail.project_id 
INNER JOIN language ON language_detail.language_id = language.language_id 
WHERE language.language_name LIKE '%$searchQuery%'

";

     // $query = "SELECT project.project_name, project.min_bid, project.due_date, project.description, 'Bid' AS operation 
     //      FROM project 
     //      INNER JOIN category ON project.category_id = category.category_id 
     //      WHERE category.category_name LIKE '%$searchQuery%'
     //      UNION
     //      SELECT project.project_name, project.min_bid, project.due_date, project.description, 'Bid' AS operation 
     //      FROM project 
     //      INNER JOIN category ON project.category_id = category.category_id 
     //      WHERE category.category_name LIKE '%$searchQuery%'";


    $result = mysqli_query($conn, $query);

    if ($result) {

        if(mysqli_num_rows($result)>0){
        echo"<tr>";
        echo "<th>Project Name</th>";
        echo "<th>Max Bid</th>";
        echo "<th>Category</th>";
        echo "<th>Language</th>";
        echo "<th>Due date</th>";
        echo "<th>Description</th>";
         echo "<th></th>";
        echo"</tr>";
        while ($row = mysqli_fetch_assoc($result)) {
          $sql4="SELECT * FROM `assign_project` WHERE project_id=".$row['project_id'];
                  $result4=mysqli_query($conn,$sql4);
                  if(!(mysqli_num_rows($result4)>0)){

            echo"<tr>";
          echo "<td>${row['project_name']}</td>";  
          echo "<td>${row['min_bid']}</td>";  
            $sql="select * from category where category_id=".$row['category_id'];
          $result1 = mysqli_query($conn, $sql);
          $row1 = mysqli_fetch_assoc($result1);
          echo "<td>${row1['category_name']}</td>"; 

                            $sql3="SELECT language_name FROM language_detail ld,language l WHERE ld.language_id=l.language_id and project_id=".$row['project_id'];
                $result3=mysqli_query($conn,$sql3);
                  echo"<td>";
                while($row3=mysqli_fetch_array($result3))
                {
                  echo"${row3['language_name']} ";
                }
                  echo"</td>";
          echo "<td>${row['due_date']}</td>"; 
          echo "<td>${row['description']}</td>";
          echo "<td><a href='enter_bid.php?project_id=${row['project_id']}'>Bid</a></td>"; 




          echo"</tr>";
        }
      }
    }else
    {
     echo "<tr><td colspan='7' style='color: red; font-size: larger; text-align: center;'>Search data not found</td></tr>";

    }
       
    } else {
        echo  'Error executing query'.mysqli_error($conn);
    }
} else {
    echo 'Invalid request';
}
?>
