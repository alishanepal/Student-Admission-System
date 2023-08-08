<?php
require('connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    
    $collegeid = $_SESSION['college_id'];
    $studentID=$_POST['student_id'];
    $courseid = $_POST['course_id'];
    $fullName = $_POST['fullName'];
    $birthDate = $_POST['birthDate'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];
    $fatherName = $_POST['fatherName'];
    $fatherOccupation = $_POST['fatherOccupation'];
    $fatherAddress = $_POST['fatherAddress'];
    $fatherMobile = $_POST['fatherMobile'];
    $fatherEmail = $_POST['fatherEmail'];
    $motherName = $_POST['motherName'];
    $motherOccupation = $_POST['motherOccupation'];
    $motherAddress = $_POST['motherAddress'];
    $motherMobile = $_POST['motherMobile'];
    $motherEmail = $_POST['motherEmail'];
    $qualification = $_POST['qualification'];
    $instituteName = $_POST['instituteName'];
    $yearOfPassing = $_POST['yearOfPassing'];
    $advertisement = implode(', ', $_POST['advertisement']);
    $specialNeeds = $_POST['specialNeeds'];
    $specialNeedsDescription = $_POST['specialNeedsDescription'];
    $benefitToUNI = $_POST['benefit_to_UNI'];


    if (isset($_POST['submit'])) {
    // Retrieve college_id from colleges table based on college name
    $collegeQuery = "SELECT college_id FROM colleges WHERE college_id = '$collegeid'";
    $collegeResult = mysqli_query($con, $collegeQuery);

    $courseQuery = "SELECT course_id FROM courses WHERE course_id = '$courseid'";
    $courseResult = mysqli_query($con, $courseQuery);

    // Check if the college exists
    if (mysqli_num_rows($collegeResult) > 0 && mysqli_num_rows($courseResult) > 0) {
        $collegeRow = mysqli_fetch_assoc($collegeResult);
        $collegeID = $collegeRow['college_id'];
        $courseRow = mysqli_fetch_assoc($courseResult);
        $courseID = $courseRow['course_id'];
        

        $query1 = "INSERT INTO students (college_id, course_id, user_id, full_name, birth_date, email, phone_number, gender)
        VALUES ('$collegeID', '$courseID', '{$_SESSION['userid']}','$fullName', '$birthDate', '$email', '$phoneNumber', '$gender')";
mysqli_query($con, $query1);

// Get the auto-generated student ID from the last insert operation
$studentID = mysqli_insert_id($con);

// Insert data into the "family_details" table using the retrieved student ID
$query2 = "INSERT INTO family_details (student_id, father_name, father_occupation, father_address,
                                   father_mobile, father_email, mother_name, mother_occupation, mother_address,
                                   mother_mobile, mother_email)
                                   VALUES ('$studentID', '$fatherName', '$fatherOccupation', '$fatherAddress',
                                   '$fatherMobile', '$fatherEmail', '$motherName', '$motherOccupation',
                                   '$motherAddress', '$motherMobile', '$motherEmail')"; 
mysqli_query($con, $query2);

// Insert data into the "educational_background" table using the retrieved student ID
$query3 = "INSERT INTO educational_background (student_id, highest_qualification, institute_name, year_of_passing)
        VALUES ('$studentID', '$qualification', '$instituteName', '$yearOfPassing')";
mysqli_query($con, $query3);

// Insert data into the "extended_details" table using the retrieved student ID
$query4 = "INSERT INTO extended_details (student_id, advertisement_source, special_needs,
                                      special_needs_description, reasons_for_application)
        VALUES ('$studentID', '$advertisement', '$specialNeeds', '$specialNeedsDescription', '$benefitToUNI')";
mysqli_query($con, $query4);

// Close the database connection
mysqli_close($con);

echo "
<script>
alert('Form inserted successfully');
window.location.href='Index-pages/form.php';
</script>";
// Redirect or show a success message to the user
}
    }


elseif (isset($_POST['update'])){

        $query1 = "UPDATE students SET full_name = '$fullName', birth_date = '$birthDate', email = '$email',
        phone_number = '$phoneNumber', gender = '$gender' WHERE student_id = '$studentID'";
mysqli_query($con, $query1);

// Update data in the "family_details" table
$query2 = "UPDATE family_details SET father_name = '$fatherName', father_occupation = '$fatherOccupation',
        father_address = '$fatherAddress', father_mobile = '$fatherMobile', father_email = '$fatherEmail',
        mother_name = '$motherName', mother_occupation = '$motherOccupation', mother_address = '$motherAddress',
        mother_mobile = '$motherMobile', mother_email = '$motherEmail' WHERE student_id = '$studentID'";
mysqli_query($con, $query2);

// Update data in the "educational_background" table
$query3 = "UPDATE educational_background SET highest_qualification = '$qualification', institute_name = '$instituteName',
        year_of_passing = '$yearOfPassing' WHERE student_id = '$studentID'";
mysqli_query($con, $query3);

// Update data in the "extended_details" table
$query4 = "UPDATE extended_details SET advertisement_source = '$advertisement', special_needs = '$specialNeeds',
        special_needs_description = '$specialNeedsDescription', reasons_for_application = '$benefitToUNI'
        WHERE student_id = '$studentID'";
mysqli_query($con, $query4);

mysqli_close($con);

echo "
<script>
alert('Form updated successfully');
window.location.href='Index-pages/form.php';
</script>";
}}
?>