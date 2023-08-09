<?php
session_start();
require '../connection.php';

if (isset($_GET['updateid'])) {
    $id = $_GET['updateid'];

    $query = "SELECT ccr.*, c.course_name, c.course_code
              FROM course_coll_relation ccr
              JOIN courses c ON ccr.course_id = c.course_id
              WHERE ccr.relation_id = '$id' ";
              
    $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) > 0) {
            // Fetch the first row as an associative array
            $courseData = mysqli_fetch_assoc($result);
            $course_id=$courseData['course_id'];
            $relation_id=$courseData['relation_id'];

            
        }}
mysqli_close($con);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Course</title>
    <style>
   
   body {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        margin: 0;
        background-color: #f0f0f0;
    }

    form {
    width: 100%;
    height: 45%;
    padding: 61px;
    border: 1px solid #ccc;
    border-radius: 10px;
    background-color: #fff;
}
  label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input {
        width: 100%;
        padding: 10px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 5px;
    }

    button {
        display: block;
        margin: 0 auto;
        padding: 10px 20px;
        background-color: #033b06;
        color: #fff;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button:hover {
        background-color: #044d07;
    }
    </style>
</head>
<body>
    <div class="container">
        <h1>Edit Course</h1>
        <form method="post" action="updateCourses.php">
            <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
            <input type="hidden" name="relation_id" value="<?php echo $relation_id; ?>">

            <label for="course_name">Course Name:</label>
            <?php echo $courseData['course_name']; ?><br>

            <br><label for="course_code">Course Code:</label>
            <?php echo $courseData['course_code']; ?>

            <br><br><label for="begins_at">Begins At:</label>
            <input type="text" name="begins_at" value="<?php echo $courseData['begins_at']; ?>" required>

            <label for="duration">Duration:</label>
            <input type="text" name="duration" value="<?php echo $courseData['duration']; ?>" required>

            <label for="admission_fee">Admission Fee:</label>
            <input type="text" name="admission_fee" value="<?php echo $courseData['admission_fee']; ?>" required>

            <label for="fee_structure">Fee Structure:</label>
            <input type="text" name="fee_structure" value="<?php echo $courseData['fee_structure']; ?>" required>

            <button type="submit" name="update_course">Update</button>
</form>
    </div>
</body>
</html>
