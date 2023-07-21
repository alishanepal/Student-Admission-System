<?php
print_r($_POST);

session_start();
      if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
        echo "<div class='username'> 
            <span class='username'>Welcome   {$_SESSION['username']}</span>
            <br>
          </div>";
      }
   



// Retrieve the college ID from the URL parameter
$collegeId = $_GET['college_id'];

// Store the form data in the session
$_SESSION['college_id'] = $collegeId;
$_SESSION['student_name'] = $_POST['name'];

// Start the session

// Retrieve the form data from the session
$collegeId = $_SESSION['college_id'];
$studentName = $_SESSION['student_name'];

// Display the form data
echo "College ID: " . $collegeId . "<br>";
echo "Student's Name: " . $studentName;


?>

