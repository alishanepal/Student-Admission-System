<?php
session_start();
require '../connection.php';

$courseData = []; // Initialize an empty array

if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    $query = "SELECT ccr.*, c.course_name, c.course_code
              FROM course_coll_relation ccr
              JOIN courses c ON ccr.course_id = c.course_id
              WHERE ccr.relation_id = $id";
              
    $result = mysqli_query($con, $query);

    if ($result) {
        if (mysqli_num_rows($result) > 0) {
            // Fetch the first row as an associative array
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
    <!-- Display the form for editing the course -->
    <form method="post" action="updateCourses.php">
        <label for="course_name">Course Name:</label>
        <input type="text" name="course_name" value="<?php echo $courseData['course_name']; ?>" required><br>

        <label for="course_code">Course Code:</label>
        <input type="text" name="course_code" value="<?php echo $courseData['course_code']; ?>" required><br>

        <label for="begins_at">Begins At:</label>
        <input type="text" name="begins_at" value="<?php echo $courseData['begins_at']; ?>" required><br>

        <label for="duration">Duration:</label>
        <input type="text" name="duration" value="<?php echo $courseData['duration']; ?>" required><br>

        <label for="admission_fee">Admission Fee:</label>
        <input type="text" name="admission_fee" value="<?php echo $courseData['admission_fee']; ?>" required><br>

        <label for="fee_structure">Fee Structure:</label>
        <input type="text" name="fee_structure" value="<?php echo $courseData['fee_structure']; ?>" required><br>

 
        <input type="submit" name="update_course" value="Update Course">
    </form>
</body>
</html>
