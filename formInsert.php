<?php
require('connection.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $fullName = $_POST['fullName'];
    $birthDate = $_POST['birthDate'];
    $email = $_POST['email'];
    $phoneNumber = $_POST['phoneNumber'];
    $gender = $_POST['gender'];
    $advertisement = isset($_POST['advertisement']) ? $_POST['advertisement'] : array();
    $highestQualification = $_POST['qualification'];
    $instituteName = $_POST['instituteName'];
    $yearOfPassing = $_POST['yearOfPassing'];
    $preferredCollege = $_POST['preferredCollege'];
    $preferredCourse = $_POST['preferredCourse'];
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
    $specialNeeds = isset($_POST['specialNeeds']) ? $_POST['specialNeeds'] : '';
    $specialNeedsDescription = $_POST['specialNeedsDescription'];

    // Insert the form data into the database
    $query = "INSERT INTO `student_application` (`full_name`, `birth_date`,`email`, `phone_number`, `gender`, `advertisement`, `highest_qualification`, `institute_name`, `year_of_passing`, `preferred_college`, `preferred_course`, `father_name`, `father_occupation`, `father_address`, `father_post_code`, `father_telephone`, `father_mobile`, `father_email`, `mother_name`, `mother_occupation`, `mother_address`, `mother_post_code`, `mother_telephone`, `mother_mobile`, `mother_email`, `special_needs`, `special_needs_description`) 
    VALUES ('$fullName', '$birthDate', '$email', '$phoneNumber', '$gender', '" . implode(',', $advertisement) . "', '$highestQualification', '$instituteName', '$yearOfPassing', '$preferredCollege', '$preferredCourse', '$fatherName', '$fatherOccupation', '$fatherAddress', '$fatherPostCode', '$fatherTelephone', '$fatherMobile', '$fatherEmail', '$motherName', '$motherOccupation', '$motherAddress', '$motherPostCode', '$motherTelephone', '$motherMobile', '$motherEmail', '$specialNeeds', '$specialNeedsDescription')";
    if (mysqli_query($co2, $query)) {
        echo "<script>alert('Form data inserted successfully.');
        window.location.href='index.php';</script>";
    } else {
        echo "<script>alert('Error inserting form data: " . mysqli_error($co2) . "');</script>";
    }
} else {
    echo "<script>alert('Invalid request method.');
    window.location.href='index.php';</script>";
}
?>
 