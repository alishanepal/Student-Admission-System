<?php
require('../connection.php');
session_start();



// Step 2: Retrieve the user's data from the database based on the user_id
$userID = $_SESSION['userid'];
$userQuery = "
            SELECT 
                s.*, 
                fd.*, 
                eb.*, 
                ed.*
            FROM students AS s
            JOIN family_details AS fd ON s.student_id = fd.student_id
            JOIN educational_background AS eb ON s.student_id = eb.student_id
            JOIN extended_details AS ed ON s.student_id = ed.student_id
            WHERE user_id = '$userID'";
$userResult = mysqli_query($con, $userQuery);

if (mysqli_num_rows($userResult) > 0) {
    $userData = mysqli_fetch_assoc($userResult);

    // Now, you can use the $userData array to set the default values for the form fields.
    $status = $userData['status'];
    $collegeID=$userData['college_id'];
    $courseID=$userData['course_id'];
    $studentID=$userData['student_id'];
    $fullName = $userData['full_name'];
    $birthDate = $userData['birth_date'];
    $email = $userData['email'];
    $phoneNumber = $userData['phone_number'];
    $gender = $userData['gender'];
    $postCode = $userData['post_code'];
    $status=   $userData['status'];
    $fatherName = $userData['father_name'];
    $fatherOccupation = $userData['father_occupation'];
    $fatherAddress = $userData['father_address'];
    $fatherMobile = $userData['father_mobile'];
    $fatherEmail = $userData['father_email'];
    $motherName = $userData['mother_name'];
    $motherOccupation = $userData['mother_occupation'];
    $motherAddress = $userData['mother_address'];
    $motherMobile = $userData['mother_mobile'];
    $motherEmail = $userData['mother_email'];
    $qualification = $userData['highest_qualification'];
    $instituteName = $userData['institute_name'];
    $yearOfPassing = $userData['year_of_passing'];
    $advertisement = $userData['advertisement_source'];
    $specialNeeds = $userData['special_needs'];
    $specialNeedsDescription = $userData['special_needs_description'];
    $benefitToUNI = $userData['reasons_for_application'];
 } ?>

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
                        <option disabled selected hidden value="    ">Choose College</option>
                        <?php
                        // Generate college select options
                        $collegeQuery = "SELECT * FROM colleges";
                        $collegeResult = mysqli_query($con, $collegeQuery);

                        // Loop through the fetched college data and generate options
                        while ($college = mysqli_fetch_assoc($collegeResult)) {
                            $selected = (isset($_POST['college_id']) && $_POST['college_id'] == $college['college_id']) ? 'selected' : '';
                            echo '<option value="' . $college['college_id'] . '" ' . $selected . '>' . $college['college_name'] . '</option>';
                        }
                        ?>
                    </select><br><br>
            </form>
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Check if the form has been submitted via POST method
            
                // Retrieve the submitted values from the form
                $collegeID = isset($_POST['college_id']) ? $_POST['college_id'] : '';

                $_SESSION['college_id'] = $collegeID;

                echo 'College ID: ' . $collegeID . '<br>';

            }
            ?>


            <form action="../std_appl_insert.php" method="POST">
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



        <!-- Rest of the code... -->

        <div class="details">
            <h2>PERSONAL DETAILS</h2>

            <input type="hidden" name="student_id" value="<?php echo $studentID; ?>">
    
            <div class="field">
                <div class="input-field">
                    <label for="fullName">Full Name</label>
                    <input type="text" name="fullName" placeholder="Enter your name" required
                        value="<?php echo isset($fullName) ? $fullName : ''; ?>"><br>
                </div>
                <div class="input-field">
                    <label for="birthDate">Birth Date</label>
                    <input type="date" name="birthDate" required
                        value="<?php echo isset($birthDate) ? $birthDate : ''; ?>"><br>
                </div>
                <div class="input-field">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="Enter your email" required
                        value="<?php echo isset($email) ? $email : ''; ?>"><br>
                </div>
                <div class="input-field">
                    <label for="phoneNumber">Phone no</label>
                    <input type="text" name="phoneNumber" id="number" placeholder="Enter Phone no" required
                        value="<?php echo isset($phoneNumber) ? $phoneNumber : ''; ?>"><br>
                </div>
                <div class="input-field">
                    <label for="postCode">Post Code</label>
                    <input type="text" name="postcode" id="postcode" placeholder="postcode"
                        value="<?php echo isset($postcode) ? $postcode : ''; ?>"><br>
                </div>
               

            <!-- Rest of the code... -->

            <div class="gender details">
                <label for="gender">Gender</label>
                <input type="radio" name="gender" value="male" <?php echo (isset($gender) && $gender === 'male') ? 'checked' : ''; ?>>Male
                <input type="radio" name="gender" value="female" <?php echo (isset($gender) && $gender === 'female') ? 'checked' : ''; ?>>Female
                <input type="radio" name="gender" value="other" <?php echo (isset($gender) && $gender === 'other') ? 'checked' : ''; ?>>Others<br>
            </div>

            <!-- Rest of the code... -->


            <h2>FAMILY DETAILS</h2>
            <div class="f-details">
                <table border="1px" class="table">
                    <tr>
                        <td rowspan="5" class="father">Father</td>
                        <td>
                            <label>Name</label>
                            <input type="text" name="fatherName" required
                                value="<?php echo isset($fatherName) ? $fatherName : ''; ?>">
                        </td>
                        <td>
                            <label>Occupation</label>
                            <input type="text" name="fatherOccupation" required
                                value="<?php echo isset($fatherOccupation) ? $fatherOccupation : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Address</label>
                            <input type="text" name="fatherAddress" required
                                value="<?php echo isset($fatherAddress) ? $fatherAddress : ''; ?>">
                        </td>
                        <td>
                            <label>Mobile</label>
                            <input type="number" name="fatherMobile"
                            value="<?php echo isset($fatherMobile) ? $fatherMobile : ''; ?>">
                        </td>
                    </tr>

                    <tr>
                        <td colspan="2">
                            <label>Email</label>
                            <input type="email" name="fatherEmail"
                                value="<?php echo isset($fatherEmail) ? $fatherEmail : ''; ?>">
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
                            <input type="text" name="motherName" required
                                value="<?php echo isset($motherName) ? $motherName : ''; ?>"> 
                        </td>
                        <td>
                            <label>Occupation</label>
                            <input type="text" name="motherOccupation" required
                                value="<?php echo isset($motherOccupation) ? $motherOccupation : ''; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <label>Address</label>
                            <input type="text" name="motherAddress" required
                                value="<?php echo isset($motherAddress) ? $motherAddress : ''; ?>">
                        </td>
                        <td>
                            <label>Mobile</label>
                            <input type="number" name="motherMobile"
                                value="<?php echo isset($motherMobile) ? $motherMobile : ''; ?>">
                        </td>

                    </tr>
                    
                    <tr>
                        <td colspan="2">
                            <label>Email</label>
                            <input type="email" name="motherEmail"
                                value="<?php echo isset($motherEmail) ? $motherEmail : ''; ?>">
                        </td>
                    </tr>
                </table>
            </div>

            <div class="form-section">
                <h2>Educational Background</h2>
                <div class="form-group">
                    <label for="qualification">Highest Qualification</label>
                    <input type="text" name="qualification" id="qualification" required
                        value="<?php echo isset($qualification) ? $qualification : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="institute">Institute Name</label>
                    <input type="text" name="instituteName" id="institute" required
                        value="<?php echo isset($instituteName) ? $instituteName : ''; ?>">
                </div>
                <div class="form-group">
                    <label for="year">Year of Passing</label>
                    <input type="number" name="yearOfPassing" id="year" required
                        value="<?php echo isset($yearOfPassing) ? $yearOfPassing : ''; ?>">
                </div>
            </div>

            <div class="advertise details">
                How did you come to know about the Academic program? (Please tick mark in the relevant box)<br>
                <label for="option1">Advertisement</label>
                <input type="checkbox" name="advertisement[]" value="Advertisement" <?php echo (isset($advertisement) && strpos($advertisement, 'Advertisement') !== false) ? 'checked' : ''; ?>>
                <label for="option2">Friend</label>
                <input type="checkbox" name="advertisement[]" value="Friend" <?php echo (isset($advertisement) && strpos($advertisement, 'Friend') !== false) ? 'checked' : ''; ?>>
                <label for="option3">Education Fair</label>
                <input type="checkbox" name="advertisement[]" value="Education Fair" <?php echo (isset($advertisement) && strpos($advertisement, 'Education Fair') !== false) ? 'checked' : ''; ?>>
                <label for="option4">Internet</label>
                <input type="checkbox" name="advertisement[]" value="Internet" <?php echo (isset($advertisement) && strpos($advertisement, 'Internet') !== false) ? 'checked' : ''; ?>>
                <label for="option5">Direct Mail</label>
                <input type="checkbox" name="advertisement[]" value="Direct Mail" <?php echo (isset($advertisement) && strpos($advertisement, 'Direct Mail') !== false) ? 'checked' : ''; ?>>
                <label for="option6">Other</label>
                <input type="checkbox" name="advertisement[]" value="Other" <?php echo (isset($advertisement) && strpos($advertisement, 'Other') !== false) ? 'checked' : ''; ?>>
            </div>

            <span class="title">SPECIAL NEEDS(if any)</span>
            <div class="needs">
                Do you require any special arrangements to be made for contact classes/examination
                materials? (eg. Physical disorder, wheelchair user, legally imposed travel restroom)<br>

                <input type="radio" id="yes" name="specialNeeds" value="yes" <?php echo (isset($specialNeeds) && $specialNeeds === 'yes') ? 'checked' : ''; ?>>
                <label for="yes">Yes</label>

                <input type="radio" id="no" name="specialNeeds" value="no" <?php echo (isset($specialNeeds) && $specialNeeds === 'no') ? 'checked' : ''; ?>>
                <label for="no">No</label><br>

                If yes, please specify your requirements:<br>
                <textarea id="user-input"
                    name="specialNeedsDescription"><?php echo isset($specialNeedsDescription) ? $specialNeedsDescription : ''; ?></textarea>
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
            <p id="declarationError" style="display: none; color: red;">Please check the declaration checkbox to
                proceed.</p>

            <span class="title">REASONS FOR APPLICATION</span>
            <div class="reason">
                Please state how this Academic Program of UNI will benefit you in addressing your
                professional application?
                <textarea id="benefit"
                    name="benefit_to_UNI"><?php echo isset($benefitToUNI) ? $benefitToUNI : ''; ?></textarea>
            </div>

            <?php
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true && isset($_SESSION['usertype']) && $_SESSION['usertype'] == 'Student') {
    if (mysqli_num_rows($userResult) <= 0) {
        // If the form has not been submitted, show the "Submit" button
        echo "<input type='submit' name='submit' value='submit'>";
    } elseif ($status === 'pending' || $status === 'removed') {
            // If the form has been submitted and status is pending or removed, show the "Update" button
            echo "<input type='submit' name='update' value='Update'>";
        } elseif ($status === 'approved') {
            // If the form has been submitted and status is accepted, show a message
            echo "This form has already been accepted.";
        }
    
} else {
    // If not logged in as a student, show a message
    echo "Please log in as a student.";
}
?>



        </div>
        </form>
        </div>
    </section>
</body>

</html>