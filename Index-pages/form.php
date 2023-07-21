<?php
require('../connection.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        <?php include "../CSS/style.css" ?>
        <?php include "../CSS/form.css" ?>
    </style>

    <?php include('header.php'); ?>

    <section class="admission-form">
        <h3>Application<br>form</h3>
    </section>

    <section>
        <div class="container">
            <form action="" method="POST">
                <div class="form first">
                    <div class="college-choice">

                        <label for="preferred-college">
                            <h2>Preferred College:</h2>
                        </label><br>
                        <select name="college_id" id="college" onchange="this.form.submit()">
                            <option disabled selected hidden value="">Choose College</option>
                            <?php
                            // Generate college select options
                            
                            $collegeQuery = "SELECT * FROM colleges";
                            $collegeResult = mysqli_query($con, $collegeQuery);

                            // Loop through the fetched college data and generate options
                            while ($college = mysqli_fetch_assoc($collegeResult)) {
                                echo '<option value="' . $college['college_id'] . '"' . (isset($_POST['college_id']) && $_POST['college_id'] == $college['college_id'] ? 'selected' : '') . '>' . $college['college_name'] . '</option>';
                            }

                            ?>
                        </select><br><br>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the form has been submitted via POST method

    // Retrieve the submitted values from the form
    $collegeID = isset($_POST['college_id']) ? $_POST['college_id'] : '';
  
$_SESSION['college_id']= $collegeID;

    echo 'College ID: ' . $collegeID . '<br>';
  
}
?>


            <form action="../Std.applicationsInsert.php" method="POST">
                <label for="preferred-course">
                    <h2>Preferred Course:</h2>
                </label><br>
                <select name="course_id" id="course">
                    <option disabled selected hidden value="">Choose Courses</option>
                    <?php
                    // Step 5: Handle college selection and generate course select options
                    if (isset($_POST['college_id'])) {
                        $selectedCollegeID = $_POST['college_id'];

                        // Retrieve related courses from the database
                        $courseQuery = "SELECT courses.course_id, courses.course_name
                                        FROM courses
                                        JOIN course_coll_relation ON courses.course_id = course_coll_relation.course_id
                                        WHERE course_coll_relation.college_id = $selectedCollegeID";
                        $courseResult = mysqli_query($con, $courseQuery);

                        // Generate course select options
                        while ($course = mysqli_fetch_assoc($courseResult)) {
                            echo '<option value="' . $course['course_id'] . '">' . $course['course_name'] . '</option>';
                        }
                    }
                    ?>
                </select><br><br>
        </div>



        <div class="details">
            <h2>PERSONAL DETAILS</h2>

            <div class="field">
                <div class="input-field">
                    <label for="fullName">Full Name</label>
                    <input type="text" name="fullName" placeholder="Enter your name" required><br>
                </div>
                <div class="input-field">
                    <label for="birthDate">Birth Date</label>
                    <input type="date" name="birthDate" required><br>
                </div>
                <div class="input-field">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter your email" required><br>
                </div>
                <div class="input-field">
                    <label for="phoneNumber">Phone no</label>
                    <input type="text" name="phoneNumber" id="number" placeholder="Enter Phone no" require><br>
                </div>
            </div>

            <div class="gender details">
                <label for="gender">Gender</label>
                <input type="radio" name="gender" value="male">Male
                <input type="radio" name="gender" value="female">Female
                <input type="radio" name="gender" value="other">Others<br>
            </div>

            <h2>FAMILY DETAILS</h2>
            <div class="f-details">
                <table border="1px" class="table">
                    <tr>
                        <td rowspan="5" class="father">Father</td>
                        <td>
                            <label>Name</label>
                            <input type="text" name="fatherName" required>
                        </td>
                        <td>
                            <label>Occupation</label>
                            <input type="text" name="fatherOccupation" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Address</label>
                            <input type="text" name="fatherAddress" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Post Code</label>
                            <input type="number" name="fatherPostCode">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Telephone</label>
                            <input type="number" name="fatherTelephone">
                        </td>
                        <td>
                            <label>Mobile</label>
                            <input type="number" name="fatherMobile">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Email</label>
                            <input type="email" name="fatherEmail">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="f-details">
                <table class="table">
                    <tr>
                        <td rowspan="5" class="mother">Mother</td>
                        <td>
                            <label>Name</label>
                            <input type="text" name="motherName" required>
                        </td>
                        <td>
                            <label>Occupation</label>
                            <input type="text" name="motherOccupation" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Address</label>
                            <input type="text" name="motherAddress" required>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Post Code</label>
                            <input type="number" name="motherPostCode">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Telephone</label>
                            <input type="number" name="motherTelephone">
                        </td>
                        <td>
                            <label>Mobile</label>
                            <input type="number" name="motherMobile">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <label>Email</label>
                            <input type="email" name="motherEmail">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="form-section">
                <h2>Educational Background</h2>
                <div class="form-group">
                    <label for="qualification">Highest Qualification</label>
                    <input type="text" name="qualification" id="qualification" required>
                </div>
                <div class="form-group">
                    <label for="institute">Institute Name</label>
                    <input type="text" name="instituteName" id="institute" required>
                </div>
                <div class="form-group">
                    <label for="year">Year of Passing</label>
                    <input type="number" name="yearOfPassing" id="year" required>
                </div>
            </div>

            <div class="advertise details">
                How did you come to know about the Academic program? (Please tick mark in the relevant
                box)<br>
                <label for="option1">Advertisement</label>
                <input type="checkbox" name="advertisement[]" value="Advertisement">
                <label for="option2">Friend</label>
                <input type="checkbox" name="advertisement[]" value="Friend">
                <label for="option3">Education Fair</label>
                <input type="checkbox" name="advertisement[]" value="Education Fair">
                <label for="option4">Internet</label>
                <input type="checkbox" name="advertisement[]" value="Internet">
                <label for="option5">Direct Mail</label>
                <input type="checkbox" name="advertisement[]" value="Direct Mail">
                <label for="option6">Other</label>
                <input type="checkbox" name="advertisement[]" value="Other">
            </div>

            <span class="title">SPECIAL NEEDS(if any)</span>
            <div class="needs">
                Do you require any special arrangements to be made for contact classes/examination
                materials? (eg. Physical disorder, wheelchair user, legally imposed travel restroom)<br>

                <input type="radio" id="yes" name="specialNeeds" value="yes">
                <label for="yes">Yes</label>

                <input type="radio" id="no" name="specialNeeds" value="no">
                <label for="no">No</label><br>

                If yes, please specify your requirements:<br>
                <textarea id="user-input" name="specialNeedsDescription"></textarea>
            </div>

            <span class="title">DECLARATION</span>
            <div class="declare">
                <label>
                    <input type="checkbox" id="declarationCheckbox" required>
                    I,
                </label>
                hereby declare that all the information provided by me in this form is true and accurate to
                the best of my knowledge.
            </div>
            <p id="declarationError" style="display: none; color: red;">Please check the declaration
                checkbox to proceed.</p>


            <span class="title">REASONS FOR APPLICATION</span>
            <div class="reason">
                Please state how this Academic Program of UNI will benefit you in addressing your
                professional application?
                <textarea id="benefit" name="benefit_to_UNI"></textarea>b
            </div>

            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'Student') {
                echo " 
            <input type='submit' value='submit'>";
            } else {
                echo " please login as student";
            }
            ?>
        </div>
        </form>
        </div>
    </section>
</body>

</html>