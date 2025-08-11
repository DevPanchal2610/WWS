<?php
header('Content-Type: application/json');

if (isset($_GET['state_id'])) {
  $stateId = $_GET['state_id'];

  // Simulating database query; replace this with your actual database query
  $cities = getCitiesFromDatabase($stateId);

  echo json_encode($cities);
} else {
  echo json_encode([]);
}

function getCitiesFromDatabase($stateId) {
  // Simulating database query; replace this with your actual database query
  $cities = [];
$conn = mysqli_connect('localhost', 'root', '', 'wws');
  $sql = "SELECT city_id, city_name FROM city WHERE state_id =" . $stateId;
  $result = mysqli_query($conn, $sql);

  $states = array();

  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $cities[] = $row;
    }
  }


  return $cities;
}
?>
