<?php
session_start();
require '../../connection.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['college_id']) && isset($_POST['status'])) {
    $college_id = $_POST['college_id'];
    $new_status = $_POST['status'];

    // Update the student's status in the database
    $update_query = "UPDATE colleges SET status = '$new_status' WHERE college_id= '$college_id'";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        // Status updated successfully
        header('Location: ../admin/registered_colleges.php'); // Redirect back to the student list page
        exit();
    } else {
        // Handle the case of an error during the update
        echo "Error updating status.";
    }
} else {
    // Handle invalid or missing form data
    echo "Invalid request.";
}
?>
