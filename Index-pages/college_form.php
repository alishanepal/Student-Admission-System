<!DOCTYPE html>
<html>

<head>
    <title>College affiliation Form</title>
    <link rel="stylesheet" href="college_form.css">
    <style>
        <?php include "../CSS/college_form.css" ?>
    </style>
</head>

<body>
    <?php include('header.php'); ?>

    <section>
        <form id="collegeAffiliationForm" action="../admin/college/insert_college.php" method="POST"><br><br>
            <h1 align="center">College affiliation Form</h1>
            <div class="inform details">
                <span class="title">
                    <h3>College Information</h3>
                </span>
                <div class="info">
                    <div class="info-field">
                        <label for="college">Name of the institution</label>
                        <input type="text" id="collegeName" name="collegeName" required><br><br>

                        <label for="address">Address</label>
                        <input type="text" id="address" name="address" required><br><br>

                        <div class="contact details">
                            <label for="num">Phone Number</label>
                            <input type="text" id="num" name="num" required><br><br>

                            <label for="email">Email Address</label>
                            <input type="email" id="email" name="email" required><br><br>
                        </div>

                        <label for="establishmentDate">Date of establishment: </label>
                        <input type="date" id="establishmentDate" name="establishmentDate" required><br><br>

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
                        <input type="number" id="numberOfCourses" name="numberOfCourses" min="1" required><br><br>

                        <div id="courseTable"></div>
                    </div>

                    <div class="facility">
                        <h2>Infrastructure and Facilities</h2>

                        <label for="campusSize">Campus Size:</label>
                        <input type="text" id="campusSize" name="campusSize"><br><br>

                        <label for="classrooms">Number of Classrooms:</label>
                        <input type="text" id="classrooms" name="classrooms"><br><br>

                        <label for="laboratories">Number of Laboratories:</label>
                        <input type="text" id="laboratories" name="laboratories"><br><br>

                        <label for="library">Number of Libraries:</label>
                        <input type="text" id="library" name="library"><br><br>

                        <label for="hostel">Number of Hostel:</label>
                        <input type="text" id="hostel" name="hostel"><br>
                    </div>

                    <div class="record details">

                        <h1>Affiliation</h1>
                        <p>The college is affiliated with the following universities and institutions:</p>

                        <label for="affiliation1">Affiliation 1:</label>
                        <input type="text" id="affiliation1" name="affiliation1" required><br>

                        <label for="affiliation2">Affiliation 2:</label>
                        <input type="text" id="affiliation2" name="affiliation2"><br><br>
                    </div>

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
                        echo " please login as College to submit the form";
                    }
                    ?>

        </form>
    </section>
 
    <script>
        <?php include "../JS/college_form.js" ?>
    </script>
</body>

</html>