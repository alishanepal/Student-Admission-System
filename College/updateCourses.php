<?php
session_start();
require '../connection.php';

if (isset($_POST['update_course'])) {
    $relation_id = $_POST['relation_id'];
   
    $begins_at = $_POST['begins_at'];
    $duration = $_POST['duration'];
    $admission_fee = $_POST['admission_fee'];
    $fee_structure = $_POST['fee_structure'];

    // Update in the course_coll_relation table
    $update_relation_query = "UPDATE course_coll_relation
                              SET begins_at = '$begins_at', duration = '$duration', 
                                  admission_fee = '$admission_fee', fee_structure = '$fee_structure'
                              WHERE relation_id ='$relation_id'";

if (mysqli_query($con, $update_relation_query)) {
    echo "<script>
    alert('No update data received.');
    window.location.href='collegeDashboard.php';
    </script>";
} else {
    echo "<script>
    alert('No update data received.');
    window.location.href='collegeDashboard.php';
    </script>";}

} else {
    echo "<script>
    alert('query error.');
    window.location.href='collegeDashboard.php';
    </script>";
    
}

mysqli_close($con);
?>
