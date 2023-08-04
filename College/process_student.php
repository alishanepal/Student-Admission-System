<?php
session_start();
require '../connection.php'; // Include your database connection script

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['student_id']) && isset($_POST['status'])) {
    $student_id = $_POST['student_id'];
    $new_status = $_POST['status'];

    // Update the student's status in the database
    $update_query = "UPDATE students SET status = '$new_status' WHERE student_id = '$student_id'";
    $update_result = mysqli_query($con, $update_query);

    if ($update_result) {
        // Status updated successfully
        header('Location: students_application.php'); // Redirect back to the student list page
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
