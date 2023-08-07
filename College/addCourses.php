<?php
session_start();
require '../connection.php';

if (isset($_GET['addid'])) {
    $college_id=$_GET['addid'];
}
    ?>
<html>
<head>
    <title>Add New Course</title>
</head>
<body>
    <!-- Display the form for adding a new course -->
    <form method="post" action="insertCourses.php">
    <input type="hidden" name="college_id" value="<?php echo $college_id; ?>">    
    <label for="course_code">Course Code:</label>
        <input type="text" name="course_code" required><br>

        <label for="course_name">Course Name:</label>
        <input type="text" name="course_name" required><br>

        <label for="begins_at">Begins At:</label>
        <input type="text" name="begins_at" required><br>

        <label for="duration">Duration:</label>
        <input type="text" name="duration" required><br>

        <label for="admission_fee">Admission Fee:</label>
        <input type="text" name="admission_fee" required><br>

        <label for="fee_structure">Fee Structure:</label>
        <input type="text" name="fee_structure" required><br>

        <label for="total_seats">Total Seats:</label>
        <input type="number" name="total_seats" ><br>

        <input type="submit" name="add_course">
    </form>
</body>
</html>
