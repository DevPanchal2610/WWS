<?php include "header.php";
  echo"<center><h1>All Projects</h1></center>";
$conn=mysqli_connect('localhost','root','','wws');
$query="select * from project p,category c where c.category_id=p.category_id;";
$result = mysqli_query($conn, $query);
        echo"<center class='mx-5'>";
      
      echo"<table class='table w-5'>";
        echo"<thead>";
        echo"</thead>";
        echo"<tbody>";
          
        
    if ($result) {
        echo"<tr>";
        echo "<th>Company Name</th>";
        echo "<th>Project Name</th>";
        echo "<th>MiniMum Bid</th>";
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

                    $sql10="select user_name from user where user_id=(select user_id from project where project_id=${row['project_id']})";
                  $result10=mysqli_query($conn,$sql10);
                  $row10=mysqli_fetch_array($result10);

            echo"<tr>";
                  echo"<td>${row10['user_name']}</td>";
          echo "<td>${row['project_name']}</td>";  
          echo "<td>${row['min_bid']}</td>"; 
          echo "<td>${row['category_name']}</td>"; 
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
       
    } else {
        echo  'Error executing query';
    }

       echo"</tbody>";

      echo"</table>";
      echo"</center>";

    ?>

<?php include "footer.php";?>
