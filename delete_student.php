<?php


include('connection.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Create the delete query
    $query = "DELETE FROM `crud_student_details` WHERE id = '$id'";
    
    // Execute the query
    $result = mysqli_query($conn, $query);
    
    if ($result) {
        // Redirect to the main page after deletion
        header("Location: index.php");
    } else {
        echo "Failed to delete record: " . mysqli_error($conn);
    }
} else {
    // If the ID is not set, redirect to the main page
    header("Location: index.php");
}

?>