<?php 
include ("../Connection/db_connect.php");

// Get the owner ID from the session
$owner_id = $_SESSION['id'];

$query = "SELECT b.id, b.name, b.description, b.location, bi.image_path
          FROM businesses b
          LEFT JOIN business_images bi ON b.id = bi.business_id
          WHERE b.owner_id = ?"; 

// Prepare the statement
if ($stmt = $conn->prepare($query)) {
    // Bind the owner ID to the query
    $stmt->bind_param("i", $owner_id);

    // Execute the statement
    $stmt->execute();

    // Get the result
    $result = $stmt->get_result();

} else {
    echo "Error: " . $conn->error;
}
?>
