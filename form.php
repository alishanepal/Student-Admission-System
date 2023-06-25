<?php
require('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <style>
        <?php include "CSS/style.css" ?>
        <?php include "CSS/form.css" ?>
    </style>

    <?php include('header.php'); ?>

    <section class="admission-form">
        <h3>Application<br>form</h3>
    </section>

    <section>
        <div class="container">
            <form action="formInsert.php" method="POST" action="formInsert.php">
                <div class="form first">
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
                                <input type="text" name="phoneNumber" id="number" placeholder="Enter Phone no"
                                    require><br>
                            </div>
                        </div>

                        <div class="gender details">
                            <label for="gender">Gender</label>
                            <input type="radio" name="gender" value="male">Male
                            <input type="radio" name="gender" value="female">Female
                            <input type="radio" name="gender" value="other">Others<br>
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

                        <div class="college-choice">
                            <h2>Preferred College & Course</h2>
                            <label for="preferred-college">Preferred College:</label><br>
                            <select id="preferred-college" name="preferredCollege" required>
                                <option value="" disabled selected>Select your preferred college</option>
                                <option value="college1">College 1</option>
                                <option value="college2">College 2</option>
                                <option value="college3">College 3</option>
                                <option value="college4">College 4</option>
                                <option value="college5">College 5</option>
                            </select><br><br>

                            <label for="preferred-course">Preferred Course:</label><br>
                            <select id="preferred-course" name="preferredCourse" required>
                                <option value="" disabled selected>Select your preferred course</option>
                                <option value="course1">Course 1</option>
                                <option value="course2">Course 2</option>
                                <option value="course3">Course 3</option>
                                <option value="course4">Course 4</option>
                                <option value="course5">Course 5</option>
                            </select><br><br>
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
                            <textarea id="benefit" name="benefit_to_UNI"></textarea>
                        </div>

                        <input type="submit" value="Submit" onclick="return validateForm()">

                    </div>
            </form>
        </div>
    </section>
</body>

</html>