<?php
session_start();
$cn = mysqli_connect('localhost', 'root', '', 'wws');
$sql = "Select * from language_user_detail where user_id=".$_SESSION['id'];
$result = mysqli_query($cn, $sql);
while ($row = mysqli_fetch_array($result)) {
echo "<tr>";
    $sql1="select * from language where language_id=".$row['language_id'];
    $result1=mysqli_query($cn,$sql1);
    $row1=mysqli_fetch_array($result1);
    echo "<td>".($row1['language_name']) . "</td>";
    echo "<td><a href='#' aria-label='Close' class='language-delete btn-close' data-language-name='" . $row['language_id'] . "'></a></td>";
echo "</tr>";
}

?>