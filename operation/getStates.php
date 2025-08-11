<?php
header('Content-Type: application/json');

if (isset($_GET['country_id'])) {
  $countryId = $_GET['country_id'];

  // Simulating database query; replace this with your actual database query
  $states = getStatesFromDatabase($countryId);

  echo json_encode($states);
} else {
  echo json_encode([]);
}

function getStatesFromDatabase($countryId) {
  // Simulating database query; replace this with your actual database query
  $states = [];

  $conn = mysqli_connect('localhost', 'root', '', 'wws');
  $sql = "SELECT state_id, state_name FROM state WHERE country_id =" . $countryId;
  $result = mysqli_query($conn, $sql);

  $states = array();

  if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
      $states[] = $row;
    }
  }

  return $states;
}
?>
