<?php

require '../connection.php';
include('header.php');

$userID = $_SESSION['userid'];
// Fetch data from colleges, facilities, courses, and course_coll_relation tables
$query = "
    SELECT 
        c.*, 
        f.*, 
        cr.*, 
        cc.*
    FROM colleges AS c
    JOIN facilities AS f ON c.college_id = f.college_id
    JOIN course_coll_relation AS cr ON c.college_id = cr.college_id
    JOIN courses AS cc ON cr.course_id = cc.course_id
    WHERE user_id = '$userID'"; 

$collegeResult = mysqli_query($con, $query);

if (mysqli_num_rows($collegeResult) > 0) {
    $userData = mysqli_fetch_assoc($collegeResult);


    $collegeName = $userData['college_name'];
    $address = $userData['address'];
    $phoneNumber = $userData['phone_number'];
    $email = $userData['email'];
    $establishmentDate = $userData['establishment_date'];
    $collegeType = $userData['college_type'];
    $couesesNo=$userData['courses_no'];
    $campusSize = $userData['campus_size'];
    $classrooms = $userData['number_of_classrooms'];
    $laboratories = $userData['number_of_labs'];
    $library = $userData['number_of_libraries'];
    $hostel = $userData['number_of_hostels'];
    //  $affiliation1 = $userData['affiliation1'];
    // $affiliation2 = $userData['affiliation2'];
    $authorityName =$userData['authority_name'];

    $courseCollData = array();
    while ($row = mysqli_fetch_assoc($collegeResult)) {
        $courseCollData[] = array(
            'course_code' => $userData['course_code'],
            'course_name' => $userData['course_name'],
            'begins_at' => $userData['begins_at'],
            'duration' => $userData['duration'],
            'admission_fee' => $userData['admission_fee'],
            'fee_structure' => $userData['fee_structure']
        );
    }

    
    }?>

<!DOCTYPE html>
<html>

<head>
    <title>College applicationForm</title>
    <link rel="stylesheet" href="../CSS/college_form.css">
    <link rel="stylesheet" href="../Css/style.css">

</head>
<section class="admission-form">
        <h3>College Registration<br>form</h3>
    </section>

    <section>
        <form id="collegeAffiliationForm" action="../admin/college/insert_college.php" method="POST"><br><br>
            <h1 align="center">College application Form</h1>
            <div class="inform details">
                <span class="title">
                    <h3>College Information</h3>
                </span>
                <div class="info">
                    <div class="info-field">
                        <label for="college">Name of the institution</label>
                        <input type="text" id="collegeName" name="collegeName" required
value="<?php echo isset($collegeName) ? $collegeName: ''; ?>"><br>

                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required
                        value="<?php echo isset($address) ? $address: ''; ?>"><br>

                        <div class="contact details">
                            <label for="num">Phone Number</label>
                            <input type="text" id="num" name="num" required
                            value="<?php echo isset($phoneNumber) ? $phoneNumber: ''; ?>"><br>

                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required
                            value="<?php echo isset($email) ? $email: ''; ?>"><br>
                        </div>

                        <label for="establishmentDate">Date of establishment: </label>
                        <input type="date" id="establishmentDate" name="establishmentDate" required
                        value="<?php echo isset($establishmentDate) ? $establishmentDate: ''; ?>"><br>

                        <label for="collegeType">College Type</label>
                        <select name="collegeType" id="collegeType">
                            <option value="private">Private institution</option>
                            <option value="government">Government</option>
                            <option value="non-profit">Non-profit organization</option>
                        </select>

                    </div>

                    <div class="courses">
                        <h2>Courses Provided</h2>
                        <label for="numberOfCourses">Number of Courses:</label>
                        <input type="number" id="numberOfCourses" name="numberOfCourses" min="1" required 
                        value="<?php echo isset($couesesNo) ? $couesesNo: ''; ?>"><br><br>

                        <div id="courseTable"></div>
                    </div>

                    <div class="facility">
                        <h2>Infrastructure and Facilities</h2>

                        <label for="campusSize">Campus Size:</label>
                        <input type="text" id="campusSize" name="campusSize"
                        value="<?php echo isset($campusSize) ? $campusSize: ''; ?>"><br>

                        <label for="classrooms">Number of Classrooms:</label>
                        <input type="text" id="classrooms" name="classrooms"
                        value="<?php echo isset($classrooms) ? $classrooms: ''; ?>"><br>

                        <label for="laboratories">Number of Laboratories:</label>
                        <input type="text" id="laboratories" name="laboratories"
                        value="<?php echo isset($laboratories) ? $laboratories: ''; ?>"><br>
                        
                        <label for="library">Number of Libraries:</label>
                        <input type="text" id="library" name="library"
                        value="<?php echo isset($library) ? $library: ''; ?>"><br>

                        <label for="hostel">Number of Hostel:</label>
                        <input type="text" id="hostel" name="hostel"
                        value="<?php echo isset($hostel) ? $hostel: ''; ?>"><br>
                    </div>

                    <div class="record details">

                        <!-- <h1>Affiliation</h1> -->
                        <!-- <p>The college is affiliated with the following universities and institutions:</p> -->

                        <!-- <label for="affiliation1">Affiliation 1:</label> -->
                        <!-- <input type="text" id="affiliation1" name="affiliation1" required -->
                        <!-- value="<?php echo isset($affiliation1) ? $affiliation1: ''; ?>"><br> -->
                        <!-- <label for="affiliation2">Affiliation 2:</label> -->
                        <!-- <input type="text" id="affiliation2" name="affiliation2" -->
                        <!-- value="<?php echo isset($affiliation2) ? $affiliation2: ''; ?>"><br> -->
                    <!-- </div> -->

                    <span class="title">Declaration and Signature</span>
                    <div class="declare details">
                        <p>
                            <label>
                                <input type="checkbox" id="declarationCheckbox" required>
                                I,
                            </label>
                            <input type="text" placeholder="Authorrity_Name" name="authority_name">
                            hereby declare that the information provided in this document is accurate and authentic to
                            the best of my knowledge.
                        </p>
                        <p id="declarationError" style="display: none; color: red;">Please tick the checkbox to proceed.
                        </p>
                    </div>

                    <?php

                    if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'College') {
                        echo " 
                        <input type='submit' value='Submit' onclick='return validateForm()'>";
                    } else {
                        echo " <b>please login as College to submit the form</b>";
                    }
                    ?>

        </form>
    </section>
 
    <script>
       document.addEventListener('DOMContentLoaded', function () {
    var numberOfCoursesInput = document.getElementById('numberOfCourses');
    var courseTableDiv = document.getElementById('courseTable');

    numberOfCoursesInput.addEventListener('change', function () {
        var numberOfCourses = parseInt(this.value);
        courseTableDiv.innerHTML = ''; // Clear previous course table

        var table = document.createElement('table');
        table.classList.add('course-table');
        var headerRow = table.insertRow();
        headerRow.innerHTML = '<th>Course_Code</th><th>Course_Name</th><th>Begins_At</th><th>Duration</th><th>Admission_fees</th><th>Fee_Structure</th>';

        for (var i = 1; i <= numberOfCourses; i++) {
            var row = table.insertRow();
            row.innerHTML =
            '<td><input type="text" name="courseCode[]" placeholder="Course code" required></td>' +
            '<td><input type="text" name="courseName[]" placeholder="Course Name" required></td>' +
            '<td><input type="text" name="beginsAt[]" placeholder="Begins_At" required></td>' +
            '<td><input type="text" name="duration[]" placeholder="Duration" required></td>' +
            '<td><input type="text" name="admission_fee[]" placeholder="admission_fee" required></td>' +
            '<td><input type="text" name="feeStructure[]" placeholder="Fee_per_sem" required></td>';
        }

        courseTableDiv.appendChild(table);
    });
});
    </script>
</body>

</html>