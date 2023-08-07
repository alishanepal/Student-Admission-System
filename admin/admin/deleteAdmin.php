<?php
require('../../connection.php');

if (isset($_GET['id'])) {
    $adminId = $_GET['id'];

    // Delete the admin record based on the admin_id
    $deleteQuery = "DELETE FROM `admin_login` WHERE `admin_id` = '$adminId'";
    if (mysqli_query($con, $deleteQuery)) {
        echo "
                <script>alert(' deleted Successfully');
                window.location.href='adminDashboard.php';
                </script>";
        exit;
    } else {
        echo "Failed to delete admin. Please try again.";
    }
} else {
    echo "Invalid admin ID.";
}
?>
