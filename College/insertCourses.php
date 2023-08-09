<?php
session_start();
require('../connection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $college_id=$_POST['college_id'];
    $courseCode = $_POST['course_code'];
$courseName = $_POST['course_name'];
$beginsAt = $_POST['begins_at'];
$duration = $_POST['duration'];
$admissionFee = $_POST['admission_fee'];
$feeStructure = $_POST['fee_structure'];
//$totalSeats=$_POST['total_seats'];



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
           echo "<script>alert('Form successfully submitted.'); window.location.href = '../../Index-pages/index.php';</script>";
   
       
        }
        else {
       echo "Error inserting record: " . mysqli_error($con);
   }

   
?>