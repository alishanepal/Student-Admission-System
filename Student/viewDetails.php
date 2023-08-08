<?php
include '../connection.php';
include 'studenTemplate.php';

if (isset($_GET['student_id'])) {
    $studentID = $_GET['student_id'];

    $query = "
        SELECT 
            s.*, 
            fd.*, 
            eb.*, 
            ed.*,
            c.college_name,
            co.course_name
        FROM students AS s
        JOIN family_details AS fd ON s.student_id = fd.student_id
        JOIN educational_background AS eb ON s.student_id = eb.student_id
        JOIN extended_details AS ed ON s.student_id = ed.student_id
        JOIN colleges AS c ON s.college_id = c.college_id
        JOIN courses AS co ON s.course_id = co.course_id
        WHERE s.student_id='$studentID'";

    if ($result = mysqli_query($con, $query)) {
        $student = mysqli_fetch_assoc($result);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Details</title>
</head>
<body>

<h1>My Details</h1>
<?php if (isset($student)) : ?>

        <h2>Basic Information</h2>
        <p>Full Name: <?php echo $student['full_name']; ?></p>
        <p>Birth Date: <?php echo $student['birth_date']; ?></p>
        <p>Email: <?php echo $student['email']; ?></p>
        <p>Phone Number: <?php echo $student['phone_number']; ?></p>
        <p>Gender: <?php echo $student['gender']; ?></p>
        <p>Post Code: <?php echo $student['post_code']; ?></p>
        <p>College Name: <?php echo $student['college_name']; ?></p>
        <p>Course Name: <?php echo $student['course_name']; ?></p>
        
        <h2>Family Details</h2>
        <p>Father's Name: <?php echo $student['father_name']; ?></p>
        <p>Father's Occupation: <?php echo $student['father_occupation']; ?></p>
        <p>Father's Address: <?php echo $student['father_address']; ?></p>
        <p>Father's Mobile: <?php echo $student['father_mobile']; ?></p>
        <p>Father's Email: <?php echo $student['father_email']; ?></p>
        <p>Mother's Name: <?php echo $student['mother_name']; ?></p>
        <p>Mother's Occupation: <?php echo $student['mother_occupation']; ?></p>
        <p>Mother's Address: <?php echo $student['mother_address']; ?></p>
        <p>Mother's Mobile: <?php echo $student['mother_mobile']; ?></p>
        <p>Mother's Email: <?php echo $student['mother_email']; ?></p>
        
    
        <h2>Educational Background</h2>
        <p>Highest Qualification: <?php echo $student['highest_qualification']; ?></p>
        <p>Institute Name: <?php echo $student['institute_name']; ?></p>
        <p>Year of Passing: <?php echo $student['year_of_passing']; ?></p>
     
    
        <h2>Extended Details</h2>
        <p>Advertisement Source: <?php echo $student['advertisement_source']; ?></p>
        <p>Special Needs: <?php echo $student['special_needs']; ?></p>
        <p>Special Needs Description: <?php echo $student['special_needs_description']; ?></p>
        <p>Reasons for Application: <?php echo $student['reasons_for_application']; ?></p>
 



    <?php if (isset($student) && ($student['status'] == 'approved')) : ?>
        <p style="color: green;"><b>You are not allowed to edit the application after it is approved.<b></p>
    <?php elseif (isset($student) && ($student['status'] == 'pending' || $student['status'] == 'rejected')) : ?>
        <button class="button1"><a class="updateBtn" href="../Index-pages/form.php">Edit Application</a></button>
        <button class="button2">
            <a class="deleteBtn" href="deleteForm.php?student_id=<?php echo $studentID; ?>">Delete Application</a>
        </button>
    <?php endif; ?>

<?php else : ?>
    <p>No student information found.</p>
<?php endif; ?>

</body>
</html>