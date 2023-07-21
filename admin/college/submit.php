<?php
session_start();

// Retrieve form data
$collegeName = $_POST['collegeName'];
$address = $_POST['address'];
$phoneNumber = $_POST['num'];
$email = $_POST['email'];
$year = $_POST['establishmentDate'];
$collegeType = $_POST['collegeType'];
$numberOfCourses = $_POST['numberOfCourses'];
$campusSize = $_POST['campusSize'];
$classrooms = $_POST['classrooms'];
$laboratories = $_POST['laboratories'];
$library = $_POST['library'];
$hostel = $_POST['hostel'];
$affiliation1 = $_POST['affiliation1'];
$affiliation2 = $_POST['affiliation2'];
$authorityName = $_POST['authority_name'];

// Create a new record array
$record = [
    'collegeName' => $collegeName,
    'address' => $address,
    'phoneNumber' => $phoneNumber,
    'email' => $email,
    'establishmentDate' => $year,
    'collegeType' => $collegeType,
    'numberOfCourses' => $numberOfCourses,
    'campusSize' => $campusSize,
    'classrooms' => $classrooms,
    'laboratories' => $laboratories,
    'library' => $library,
    'hostel' => $hostel,
    'affiliation1' => $affiliation1,
    'affiliation2' => $affiliation2,
    'authorityName' => $authorityName,
    'courses' => array() // Store courses in an array
];

// Retrieve course data
$courseCode = $_POST['courseCode'];
$courseNames = $_POST['courseName'];
$beginsAt = $_POST['beginsAt'];
$duration = $_POST['duration'];
$admissionFees = $_POST['admission_fee'];
$feeStructures = $_POST['feeStructure'];

// Create course records and add them to the record array
for ($i = 0; $i < count($courseCode); $i++) {
    $courseRecord = array(
        'courseCode' => $courseCode[$i],
        'courseName' => $courseNames[$i],
        'beginsAt' => $beginsAt[$i],
        'duration' => $duration[$i],
        'admissionFee' => $admissionFees[$i],
        'feeStructure' => $feeStructures[$i]
    );

    $record['courses'][] = $courseRecord;}
    
// Store the course records in the session
$_SESSION['courses'] = $courseRecords;

// Append the record to the session array
if (!isset($_SESSION['records'])) {
    $_SESSION['records'] = array();
}

// Append the record to the session array
$_SESSION['records'][] = $record;

// Redirect back to the form page
header('Location: ../../index-pages/college_form.php');
exit();
?>
