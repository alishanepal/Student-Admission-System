<?php
session_start();
require '../connection.php';

if (isset($_GET['deleteid'])) {

    $relation_id=$_GET['deleteid'];
    $delete_relation_query = "DELETE FROM course_coll_relation WHERE relation_id = $relation_id";
    $delete_relation_result = mysqli_query($con, $delete_relation_query);

    if ($delete_relation_result) {
      
    echo "<script>
    alert('course deleted successfully received.');
    window.location.href='collegeDashboard.php';
    </script>";
    
    } else {
        echo "Update query execution error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>
