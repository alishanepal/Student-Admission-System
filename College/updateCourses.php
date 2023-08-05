<?php
session_start();
require '../connection.php';

$courseData = [];

if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    $query = "SELECT ccr.*, c.course_name, c.course_code
              FROM course_coll_relation ccr
              JOIN courses c ON ccr.course_id = c.course_id
              WHERE ccr.relation_id = $id";

    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            $courseData = mysqli_fetch_assoc($result);
        } else {
            echo "No results found.";
        }
        mysqli_free_result($result);
    } else {
        echo "Query execution error: " . mysqli_error($con);
    }
} else {
    echo "No update ID provided.";
}

if (isset($_POST['update_course'])) {
    $course_name = $_POST['course_name'];
    $course_code = $_POST['course_code'];
    $begins_at = $_POST['begins_at'];
    $duration = $_POST['duration'];
    $admission_fee = $_POST['admission_fee'];
    $fee_structure = $_POST['fee_structure'];

    // Update in the courses table
    $update_courses_query = "UPDATE courses
                             SET course_name = '$course_name', course_code = '$course_code'
                             WHERE course_id = {$courseData['course_id']}";

    $update_courses_result = mysqli_query($con, $update_courses_query);

    // Update in the course_coll_relation table
    $update_relation_query = "UPDATE course_coll_relation
                              SET begins_at = '$begins_at', duration = '$duration', 
                                  admission_fee = '$admission_fee', fee_structure = '$fee_structure'
                              WHERE relation_id = {$courseData['relation_id']}";

    $update_relation_result = mysqli_query($con, $update_relation_query);

    if ($update_courses_result && $update_relation_result) {
        echo "Course information updated successfully.";
        // You might want to redirect or take other actions here
    } else {
        echo "Update query execution error: " . mysqli_error($con);
    }
}

mysqli_close($con);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
    <!-- Add your CSS styling here -->
    <style>
        /* ... your CSS styles ... */
    </style>
</head>
<body>
    <form method="post">
        <!-- ... input fields ... -->
        <input type="submit" name="update_course" value="Update Course">
    </form>
</body>
</html>
