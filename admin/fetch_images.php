<?php
include 'config.php';
// Assuming you have a database connection established
$offset = $_GET['offset'];
$limit = $_GET['limit'];

$query = "SELECT * FROM profimage LIMIT $limit OFFSET $offset";
$result = mysqli_query($conn, $query);
$images = array();

while ($row = mysqli_fetch_assoc($result)) {
  $images[] = $row;
}

// Return the fetched images as JSON response
header("Content-Type: application/json");
echo json_encode($images);

// Close the database connection
mysqli_close($conn);
?>