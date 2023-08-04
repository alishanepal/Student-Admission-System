<?php
session_start();
require('../../connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
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

    $record['courses'][] = $courseRecord;
}

// Insert into colleges
$query1 = "INSERT INTO `colleges` (`college_name`, `address`, `phone_number`, `email`, `establishment_date`, `college_type`, `authority_name`,`user_id`) 
VALUES ('$collegeName', '$address', '$phoneNumber', '$email', '$year ', '$collegeType', '$authorityName','{$_SESSION['userid']}')";

 // Execute the query
 if (mysqli_query($con, $query1)) {
    $college_id = mysqli_insert_id($con);

    // Insert into facilities
    $query2 = "INSERT INTO `facilities` (`college_id`, `campus_size`, `number_of_classrooms`, `number_of_labs`, `number_of_libraries`, `number_of_hostels`) 
               VALUES ('$college_id', '$campusSize', '$classrooms', '$laboratories', '$library', '$hostel')";

    mysqli_query($con, $query2);
       // Insert the courses associated with the college
       $courseRecords = $record['courses'];
       foreach ($courseRecords as $courseRecord) {
           $courseCode = $courseRecord['courseCode'];
           $courseName = $courseRecord['courseName'];
           $beginsAt = $courseRecord['beginsAt'];
           $duration = $courseRecord['duration'];
           $admissionFee = $courseRecord['admissionFee'];
           $feeStructure = $courseRecord['feeStructure'];

           // Check if the course with the given course code already exists
           $query = "SELECT * FROM `courses` WHERE `course_code` = '$courseCode'";
           $result = mysqli_query($con, $query);

           if (mysqli_num_rows($result) > 0) {
               // Course already exists, retrieve its course_id
               $row = mysqli_fetch_assoc($result);
               $course_id = $row['course_id'];
           } else {
               // Course doesn't exist, insert it into the courses table
               $query = "INSERT INTO `courses` (`course_code`, `course_name`) 
               VALUES ('$courseCode', '$courseName')";
               mysqli_query($con, $query);

               // Retrieve the newly inserted course's course_id
               $course_id = mysqli_insert_id($con);
           }

           // Insert into course_coll_relation
           $query4 = "INSERT INTO `course_coll_relation` (`begins_at`, `duration`, `admission_fee`, `fee_structure`, `college_id`, `course_id`) 
                      VALUES ('$beginsAt', '$duration', '$admissionFee', '$feeStructure', '$college_id', '$course_id')";

           mysqli_query($con, $query4);
       }
   } else {
       echo "Error inserting record: " . mysqli_error($con);
   }
}
   
   ?>