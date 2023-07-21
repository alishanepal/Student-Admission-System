<?php
require('connection.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $collegeid = $_SESSION['college_id'];
    $courseid = $_POST['course_id'];
    $fullName = $_POST['fullName'];
    $birthDate = $_POST['birthDate'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];
    $fatherName = $_POST['fatherName'];
    $fatherOccupation = $_POST['fatherOccupation'];
    $fatherAddress = $_POST['fatherAddress'];
    $fatherPostCode = $_POST['fatherPostCode'];
    $fatherTelephone = $_POST['fatherTelephone'];
    $fatherMobile = $_POST['fatherMobile'];
    $fatherEmail = $_POST['fatherEmail'];
    $motherName = $_POST['motherName'];
    $motherOccupation = $_POST['motherOccupation'];
    $motherAddress = $_POST['motherAddress'];
    $motherPostCode = $_POST['motherPostCode'];
    $motherTelephone = $_POST['motherTelephone'];
    $motherMobile = $_POST['motherMobile'];
    $motherEmail = $_POST['motherEmail'];
    $qualification = $_POST['qualification'];
    $instituteName = $_POST['instituteName'];
    $yearOfPassing = $_POST['yearOfPassing'];
    $advertisement = implode(', ', $_POST['advertisement']);
    $specialNeeds = $_POST['specialNeeds'];
    $specialNeedsDescription = $_POST['specialNeedsDescription'];
    $benefitToUNI = $_POST['benefit_to_UNI'];

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

        // Prepare the INSERT statement
        $insertQuery = "INSERT INTO student_application (college_id, course_id, full_name, birth_date, email, phone_number, gender, father_name, father_occupation, father_address, father_post_code, father_telephone, father_mobile, father_email, mother_name, mother_occupation, mother_address, mother_post_code, mother_telephone, mother_mobile, mother_email, qualification, institute_name, year_of_passing, advertisement, special_needs, special_needs_description, benefit_to_UNI)
         VALUES ('$collegeID', '$courseID', '$fullName', '$birthDate', '$email', '$phoneNumber', '$gender', '$fatherName', '$fatherOccupation', '$fatherAddress', '$fatherPostCode', '$fatherTelephone', '$fatherMobile', '$fatherEmail', '$motherName', '$motherOccupation', '$motherAddress', '$motherPostCode', '$motherTelephone', '$motherMobile', '$motherEmail', '$qualification', '$instituteName', '$yearOfPassing', '$advertisement', '$specialNeeds', '$specialNeedsDescription', '$benefitToUNI')";

        // Execute the INSERT statement
        $result = mysqli_query($con, $insertQuery);

        // Check if the insertion was successful
        if ($result) {
            // Insertion successful
            echo "Form data inserted successfully!";
        } else {
            // Insertion failed
            echo "Error inserting form data: " . mysqli_error($con);
        }
    } else {
        // College doesn't exist
        echo "Invalid college name. Please choose a valid college.";
    }
}
?>