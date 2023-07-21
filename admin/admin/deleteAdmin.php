<?php
require('../../connection.php');

if (isset($_GET['id'])) {
    $adminId = $_GET['id'];

    // Delete the admin record based on the admin_id
    $deleteQuery = "DELETE FROM `admin_login` WHERE `admin_id` = '$adminId'";
    if (mysqli_query($con, $deleteQuery)) {
        // Deletion successful
        // Redirect back to the admin data page
        header("Location: admins_data.php");
        exit;
    } else {
        echo "Failed to delete admin. Please try again.";
    }
} else {
    echo "Invalid admin ID.";
}
?>
