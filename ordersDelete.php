<?php
// Include your database connection file
session_start();
include "DBConn.php";

// Get the user ID from the URL
$userID = $_GET['id'];

// Prepare and execute the delete query
$sql = "DELETE FROM orders WHERE order_ID = ?";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "i", $userID);
mysqli_stmt_execute($stmt);

// Check if the deletion was successful
if (mysqli_stmt_affected_rows($stmt) > 0) {
    // Redirect back to the main page or display a success message
    header("Location: orders.php");
    exit();
} else {
    echo "Error deleting orders.";
}

mysqli_stmt_close($stmt);
mysqli_close($conn);
?>